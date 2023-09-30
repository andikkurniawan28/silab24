@extends('layouts.app')

@section('content')
<div class="container-fluid">

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('penerimaan') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Timestamp</td>
                            <th>#</td>
                            <th>Kategori</td>
                            <th>Brix</td>
                            <th>Varietas</td>
                            <th>Kawalan</td>
                            <th>Status</td>
                            <th>E-SPTA</td>
                            {{-- <th>RFID</td> --}}
                            <th>Antrian</td>
                            <th>Register</td>
                            <th>Nopol</td>
                            <th>Petani</td>
                            {{-- <th>Action</td> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rits as $rit)
                        <tr>
                            <td>{{ $rit->created_at }}</td>
                            <td>{{ $rit->id }}</td>
                            <td>{{ $rit->category }}</td>
                            <td>{{ $rit->posbrix->brix }}</td>
                            <td>{{ $rit->posbrix->variety->name }}</td>
                            <td>{{ $rit->posbrix->kawalan->name }}</td>
                            <td>
                                @if($rit->posbrix->is_accepted === 1)
                                {{ 'Diterima' }}
                                @elseif($rit->posbrix->is_accepted === 0)
                                {{ 'Ditolak' }}
                                @else
                                {{ '-' }}
                                @endif
                            </td>
                            <td>{{ $rit->spta }}</td>
                            {{-- <td>{{ $rit->rfid }}</td> --}}
                            <td>{{ $rit->barcode_antrian }}</td>
                            <td>{{ $rit->register }}</td>
                            <td>{{ $rit->nopol }}</td>
                            <td>{{ $rit->petani }}</td>
                            {{-- <td>
                                <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit{{ $rit->id }}">
                                    @include('components.icon', ['icon' => 'edit '])
                                    Edit
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{ $rit->id }}">
                                    @include('components.icon', ['icon' => 'trash '])
                                    Hapus
                                </button>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{-- <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create">
                @include('components.icon', ['icon' => 'plus '])
                Tambah
            </button> --}}
        </div>
    </div>
</div>

<div class="modal fade" id="create" tabindex="-1" rit="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" rit="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Tambah {{ ucfirst('penerimaan') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('rits.store') }}" class="text-dark">
                @csrf
                @method('POST')

                @include('components.input',[
                    'label' => 'RFID',
                    'name' => 'rfid',
                    'type' => 'text',
                    'value' => '',
                    'modifier' => 'required',
                ])

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save
                    @include('components.icon', ['icon' => 'save'])
                </button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($rits as $rit)
<div class="modal fade" id="edit{{ $rit->id }}" tabindex="-1" rit="dialog" aria-labelledby="edit{{ $rit->id }}Label" aria-hidden="true">
    <div class="modal-dialog" rit="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $rit->id }}Label">Edit {{ ucfirst('penerimaan') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('rits.update', $rit->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input',[
                    'label' => 'RFID',
                    'name' => 'rfid',
                    'type' => 'text',
                    'value' => $rit->rfid,
                    'modifier' => 'required',
                ])

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save
                    @include('components.icon', ['icon' => 'edit'])
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($rits as $rit)
<div class="modal fade" id="delete{{ $rit->id }}" tabindex="-1" rit="dialog" aria-labelledby="delete{{ $rit->id }}Label" aria-hidden="true">
    <div class="modal-dialog" rit="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $rit->id }}Label">Hapus {{ ucfirst('penerimaan') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('rits.destroy', $rit->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Apakah Anda yakin ?</p>

                @include('components.input',[
                    'label' => 'RFID',
                    'name' => 'rfid',
                    'type' => 'text',
                    'value' => $rit->rfid,
                    'modifier' => 'readonly',
                ])
                <input type="hidden" name="rit_id" value="{{ $rit->rit_id }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes
                    @include('components.icon', ['icon' => 'trash'])
                </button>
            </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

