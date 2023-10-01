@extends("layouts.app")

@section("content")
<div class="container-fluid">

    <x-alert_block></x-alert_block>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("Bahan - Bahan Lab") }}</h5>
        </div>
        <div class="card-body">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create">
                    @include("components.icon", ["icon" => "plus "])
                    Tambah
                </button>
                <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#restock">
                    @include("components.icon", ["icon" => "box "])
                    Re-stock
                </button>
            </div>
            <div class="table-responsive">
                <br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</td>
                            <th>Timestamp</td>
                            <th>Nama</td>
                            <th>Satuan</td>
                            <th>Saldo</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consumables as $consumable)
                        <tr>
                            <td>{{ $consumable->id }}</td>
                            <td>{{ $consumable->created_at }}</td>
                            <td>{{ $consumable->name }}</td>
                            <td>{{ $consumable->unit }}</td>
                            <td>{{ $saldo[$consumable->name] }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit{{ $consumable->id }}">
                                    @include("components.icon", ["icon" => "edit "])
                                    Edit
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{ $consumable->id }}">
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

<div class="modal fade" id="create" tabindex="-1" consumable="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" consumable="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Tambah {{ ucfirst("Bahan-Bahan Lab") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route("consumables.store") }}" class="text-dark">
                @csrf
                @method("POST")

                @include("components.input",[
                    "label" => "Nama",
                    "name" => "name",
                    "type" => "text",
                    "value" => "",
                    "modifier" => "required",
                ])

                @include("components.input",[
                    "label" => "Satuan",
                    "name" => "unit",
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

<div class="modal fade" id="restock" tabindex="-1" consumable="dialog" aria-labelledby="restockLabel" aria-hidden="true">
    <div class="modal-dialog" consumable="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="restockLabel">Re-stock {{ ucfirst("Bahan-Bahan Lab") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route("restock") }}" class="text-dark">
                @csrf
                @method("POST")

                @foreach($consumables as $consumable)
                    @include("components.input7",[
                        "label" => $consumable->name,
                        "name"  => $consumable->name,
                        "type"  => "number",
                        "value" => "",
                        "modifier" => "",
                    ])
                @endforeach
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">

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

@foreach($consumables as $consumable)
<div class="modal fade" id="edit{{ $consumable->id }}" tabindex="-1" consumable="dialog" aria-labelledby="edit{{ $consumable->id }}Label" aria-hidden="true">
    <div class="modal-dialog" consumable="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $consumable->id }}Label">Edit {{ ucfirst("Bahan Analisa") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route("consumables.update", $consumable->id) }}" class="text-dark">
                @csrf
                @method("PUT")

                @include("components.input",[
                    "label" => "Nama",
                    "name" => "name",
                    "type" => "text",
                    "value" => $consumable->name,
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

@foreach($consumables as $consumable)
<div class="modal fade" id="delete{{ $consumable->id }}" tabindex="-1" consumable="dialog" aria-labelledby="delete{{ $consumable->id }}Label" aria-hidden="true">
    <div class="modal-dialog" consumable="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $consumable->id }}Label">Hapus {{ ucfirst("Bahan Analisa") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route("consumables.destroy", $consumable->id) }}" class="text-dark">
                @csrf
                @method("DELETE")
                <p>Apakah Anda yakin ?</p>

                @include("components.input",[
                    "label" => "Nama",
                    "name" => "name",
                    "type" => "text",
                    "value" => $consumable->name,
                    "modifier" => "readonly",
                ])
                <input type="hidden" name="consumable_id" value="{{ $consumable->consumable_id }}">
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

