@extends('layouts.app')

@section('content')
<div class="container-fluid">

    @include("components.alert_block")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('analisa') }} Pendahuluan</h5>
        </div>
        <div class="card-body">
            <a href="{{ route("analisa_pendahuluans.create") }}" type="button" class="btn btn-outline-primary btn-sm">
                @include('components.icon', ['icon' => 'plus '])
                Tambah
            </a>
            <div class="table-responsive">
                <br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th rowspan="2">ID</td>
                            <th rowspan="2">Wilayah</td>
                            <th rowspan="2">Register</td>
                            <th colspan="2">Berat</td>
                            <th colspan="4">Atas</td>
                            <th colspan="4">Tengah</td>
                            <th colspan="4">Bawah</td>
                            <th rowspan="2">Action</td>
                        </tr>
                        <tr>
                            <th>Tebu</td>
                            <th>Nira</td>
                            <th>%Brix</td>
                            <th>%Pol</td>
                            <th>Pol</td>
                            <th>Rend</td>
                            <th>%Brix</td>
                            <th>%Pol</td>
                            <th>Pol</td>
                            <th>Rend</td>
                            <th>%Brix</td>
                            <th>%Pol</td>
                            <th>Pol</td>
                            <th>Rend</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($analisa_pendahuluan as $analisa_pendahuluan)
                        <tr>
                            <td>{{ $analisa_pendahuluan->id }}</td>
                            <td>{{ $analisa_pendahuluan->kud->name }}</td>
                            <td>{{ $analisa_pendahuluan->register }}</td>
                            <td>{{ $analisa_pendahuluan->berat_tebu }}</td>
                            <td>{{ $analisa_pendahuluan->berat_nira }}</td>
                            <td>{{ $analisa_pendahuluan->pbrix_atas }}</td>
                            <td>{{ $analisa_pendahuluan->ppol_atas }}</td>
                            <td>{{ $analisa_pendahuluan->pol_atas }}</td>
                            <td>{{ $analisa_pendahuluan->rendemen_atas }}</td>
                            <td>{{ $analisa_pendahuluan->pbrix_tengah }}</td>
                            <td>{{ $analisa_pendahuluan->ppol_tengah }}</td>
                            <td>{{ $analisa_pendahuluan->pol_tengah }}</td>
                            <td>{{ $analisa_pendahuluan->rendemen_tengah }}</td>
                            <td>{{ $analisa_pendahuluan->pbrix_bawah }}</td>
                            <td>{{ $analisa_pendahuluan->ppol_bawah }}</td>
                            <td>{{ $analisa_pendahuluan->pol_bawah }}</td>
                            <td>{{ $analisa_pendahuluan->rendemen_bawah }}</td>
                            <td>
                                <form action="{{ route("analisa_pendahuluans.destroy", $analisa_pendahuluan->id) }}" method="POST">
                                @csrf @method("DELETE")
                                <a href="{{ route('analisa_pendahuluans.edit', $analisa_pendahuluan->id) }}" type="button" class="btn btn-outline-success btn-sm">
                                    @include('components.icon', ['icon' => 'edit '])
                                    Edit
                                </a>
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    @include('components.icon', ['icon' => 'trash '])
                                    Hapus
                                </button>
                                </form>
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

@endsection

