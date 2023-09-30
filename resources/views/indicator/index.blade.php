@extends("layouts.app")

@section("content")
<div class="container-fluid">

    <x-alert_block></x-alert_block>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("indikator") }}</h5>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create">
                @include("components.icon", ["icon" => "plus "])
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
                        @foreach ($indicators as $indicator)
                        <tr>
                            <td>{{ $indicator->id }}</td>
                            <td>{{ $indicator->created_at }}</td>
                            <td>{{ $indicator->name }}</td>
                            <td>
                                {{-- <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit{{ $indicator->id }}">
                                    @include("components.icon", ["icon" => "edit "])
                                    Edit
                                </button> --}}
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{ $indicator->id }}">
                                    @include("components.icon", ["icon" => "trash "])
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

<div class="modal fade" id="create" tabindex="-1" indicator="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" indicator="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Tambah {{ ucfirst("indikator") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route("indicators.store") }}" class="text-dark">
                @csrf
                @method("POST")

                @include("components.input",[
                    "label" => "Nama",
                    "name" => "name",
                    "type" => "text",
                    "value" => "",
                    "modifier" => "required",
                ])

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save
                    @include("components.icon", ["icon" => "save"])
                </button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($indicators as $indicator)
<div class="modal fade" id="edit{{ $indicator->id }}" tabindex="-1" indicator="dialog" aria-labelledby="edit{{ $indicator->id }}Label" aria-hidden="true">
    <div class="modal-dialog" indicator="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $indicator->id }}Label">Edit {{ ucfirst("indikator") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route("indicators.update", $indicator->id) }}" class="text-dark">
                @csrf
                @method("PUT")

                @include("components.input",[
                    "label" => "Nama",
                    "name" => "name",
                    "type" => "text",
                    "value" => $indicator->name,
                    "modifier" => "required",
                ])

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save
                    @include("components.icon", ["icon" => "edit"])
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($indicators as $indicator)
<div class="modal fade" id="delete{{ $indicator->id }}" tabindex="-1" indicator="dialog" aria-labelledby="delete{{ $indicator->id }}Label" aria-hidden="true">
    <div class="modal-dialog" indicator="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $indicator->id }}Label">Hapus {{ ucfirst("indikator") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route("indicators.destroy", $indicator->id) }}" class="text-dark">
                @csrf
                @method("DELETE")
                <p>Apakah Anda yakin ?</p>

                @include("components.input",[
                    "label" => "Nama",
                    "name" => "name",
                    "type" => "text",
                    "value" => $indicator->name,
                    "modifier" => "readonly",
                ])
                <input type="hidden" name="indicator_id" value="{{ $indicator->indicator_id }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes
                    @include("components.icon", ["icon" => "trash"])
                </button>
            </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

