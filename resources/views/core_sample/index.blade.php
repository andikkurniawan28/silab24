@extends("layouts.app")

@section("content")
<div class="container-fluid">

    <x-alert_block></x-alert_block>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("ARI Core Sample") }}</h5>
        </div>
        <div class="card-body">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create">
                    @include("components.icon", ["icon" => "plus "])
                    Tambah
                </button>
                <a href="{{ route("core_samples.create2") }}" class="btn btn-outline-secondary btn-sm">
                    @include("components.icon", ["icon" => "barcode "])
                    Tap Kartu
                </a>
            </div>
            <div class="table-responsive">
                <br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</td>
                            <th>Timestamp</td>
                            <th>SPTA</td>
                            <th>Antrian</td>
                            <th>Register</td>
                            {{-- <th>Petani</td> --}}
                            <th>%Brix</td>
                            <th>%Pol</td>
                            <th>Pol</td>
                            <th>Rendemen</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($core_samples as $core_sample)
                        <tr>
                            <td>{{ $core_sample->id }}</td>
                            <td>{{ $core_sample->created_at }}</td>
                            <td>{{ $core_sample->posbrix->spta }}</td>
                            <td>{{ $core_sample->posbrix->barcode_antrian }}</td>
                            <td>{{ $core_sample->posbrix->register }}</td>
                            {{-- <td>{{ $core_sample->posbrix->nama_petani }}</td> --}}
                            <td>{{ $core_sample->pbrix }}</td>
                            <td>{{ $core_sample->ppol }}</td>
                            <td>{{ $core_sample->pol }}</td>
                            <td>{{ $core_sample->rendemen }}</td>
                            <td>
                                <form action="{{ route("core_samples.destroy", $core_sample->id) }}" method="POST">
                                @csrf @method("DELETE")
                                <a href="{{ route("core_samples.edit", $core_sample->id) }}" type="button" class="btn btn-outline-success btn-sm">
                                    @include("components.icon", ["icon" => "edit "])
                                    Edit
                                </a>
                                <button type="submit" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{ $core_sample->id }}">
                                    @include("components.icon", ["icon" => "trash "])
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

<div class="modal fade" id="create" tabindex="-1" core_sample="dialog" core_samplea-labelledby="createLabel" core_samplea-hidden="true">
    <div class="modal-dialog" core_sample="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Tambah {{ ucfirst("ARI Core Sample") }}</h5>
                <button type="button" class="close" data-dismiss="modal" core_samplea-label="Close"><span core_samplea-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route("core_samples.store") }}" class="text-dark">
                @csrf
                @method("POST")

                @include("components.input",[
                    "label" => "ID",
                    "name" => "id",
                    "type" => "number",
                    "value" => "",
                    "modifier" => "required",
                ])

                @include("components.input",[
                    "label" => "%Brix",
                    "name" => "pbrix",
                    "type" => "number",
                    "value" => "",
                    "modifier" => "required",
                ])

                @include("components.input",[
                    "label" => "%Pol",
                    "name" => "ppol",
                    "type" => "number",
                    "value" => "",
                    "modifier" => "required",
                ])

                @include("components.input",[
                    "label" => "Pol",
                    "name" => "pol",
                    "type" => "number",
                    "value" => "",
                    "modifier" => "required",
                ])

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

@endsection

