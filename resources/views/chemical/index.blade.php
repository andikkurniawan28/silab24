@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <x-alert_block></x-alert_block>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('Bahan Pembantu Proses') }}</h5>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create">
                @include('components.icon', ['icon' => 'plus '])
                Tambah
            </button>
            <div class="table-responsive">
                <br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</td>
                            <th>Timestamp</td>
                            <th>Nama</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chemicals as $chemical)
                        <tr>
                            <td>{{ $chemical->id }}</td>
                            <td>{{ $chemical->created_at }}</td>
                            <td>{{ $chemical->name }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit{{ $chemical->id }}">
                                    @include('components.icon', ['icon' => 'edit '])
                                    Edit
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{ $chemical->id }}">
                                    @include('components.icon', ['icon' => 'trash '])
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>

<div class="modal fade" id="create" tabindex="-1" chemical="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" chemical="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Tambah {{ ucfirst('Bahan Pembantu Proses') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('chemicals.store') }}" class="text-dark">
                @csrf
                @method('POST')

                @include('components.input',[
                    'label' => 'Nama',
                    'name' => 'name',
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

@foreach($chemicals as $chemical)
<div class="modal fade" id="edit{{ $chemical->id }}" tabindex="-1" chemical="dialog" aria-labelledby="edit{{ $chemical->id }}Label" aria-hidden="true">
    <div class="modal-dialog" chemical="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $chemical->id }}Label">Edit {{ ucfirst('Bahan Pembantu Proses') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('chemicals.update', $chemical->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input',[
                    'label' => 'Nama',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $chemical->name,
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

@foreach($chemicals as $chemical)
<div class="modal fade" id="delete{{ $chemical->id }}" tabindex="-1" chemical="dialog" aria-labelledby="delete{{ $chemical->id }}Label" aria-hidden="true">
    <div class="modal-dialog" chemical="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $chemical->id }}Label">Hapus {{ ucfirst('Bahan Pembantu Proses') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('chemicals.destroy', $chemical->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Apakah Anda yakin ?</p>

                @include('components.input',[
                    'label' => 'Nama',
                    'name' => 'name',
                    'type' => 'text',
                    'value' => $chemical->name,
                    'modifier' => 'readonly',
                ])
                <input type="hidden" name="chemical_id" value="{{ $chemical->chemical_id }}">
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

