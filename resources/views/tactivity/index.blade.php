@extends("layouts.app")

@section("content")
<div class="container-fluid">

    <x-alert_block></x-alert_block>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("Taksasi") }}</h5>
        </div>
        <div class="card-body">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-outline-primary btn-sm text-right" data-toggle="modal" data-target="#create">
                    @include("components.icon", ["icon" => "plus "])
                    Tambah
                </button>
            </div>
            <div class="table-responsive">
                <br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</td>
                            <th>Timestamp</td>
                            <th>Data</td>
                            <th>User</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tactivities as $tactivity)
                        <tr>
                            <td>{{ $tactivity->id }}</td>
                            <td>{{ $tactivity->created_at }}</td>
                            <td>
                                @foreach($tspots as $tspot)
                                    @if($tactivity->{$tspot->name} != NULL)
                                        <li>{{ $tspot->name }} : {{ $tactivity->{$tspot->name} }}</li>
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $tactivity->user->name }}</td>
                            <td>
                                <a href="{{ route("tactivities.edit", $tactivity->id) }}" type="button" class="btn btn-outline-success btn-sm">
                                    @include("components.icon", ["icon" => "edit "])
                                    Edit
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{ $tactivity->id }}">
                                    @include("components.icon", ["icon" => "trash "])
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </form>
                </table>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>

<div class="modal fade" id="create" tabindex="-1" tactivity="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" tactivity="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Tambah {{ ucfirst("Taksasi") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route("tactivities.store") }}" class="text-dark">
                @csrf
                @method("POST")

                @foreach ($tspots as $tspot)
                    @include("components.input7",[
                        "label"     => $tspot->name,
                        "name"      => $tspot->name,
                        "type"      => "number",
                        "value"     => "",
                        "modifier"  => "",
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

@foreach($tactivities as $tactivity)
<div class="modal fade" id="delete{{ $tactivity->id }}" tabindex="-1" tactivity="dialog" aria-labelledby="delete{{ $tactivity->id }}Label" aria-hidden="true">
    <div class="modal-dialog" tactivity="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $tactivity->id }}Label">Hapus {{ ucfirst("Taksasi") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route("tactivities.destroy", $tactivity->id) }}" class="text-dark">
                @csrf
                @method("DELETE")
                <p>Apakah Anda yakin ?</p>
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

