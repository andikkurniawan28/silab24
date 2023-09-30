@extends("layouts.app")

@section("content")
<div class="container-fluid">

    <x-alert_block></x-alert_block>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("Keliling Proses") }}</h5>
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
                        @foreach ($kactivities as $kactivity)
                        <tr>
                            <td>{{ $kactivity->id }}</td>
                            <td>{{ $kactivity->created_at }}</td>
                            <td>
                                @foreach($kspots as $kspot)
                                    @if($kactivity->{$kspot->name} != NULL)
                                        <li>{{ $kspot->name }} : {{ $kactivity->{$kspot->name} }}</li>
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $kactivity->user->name }}</td>
                            <td>
                                <a href="{{ route("kactivities.edit", $kactivity->id) }}" type="button" class="btn btn-outline-success btn-sm">
                                    @include("components.icon", ["icon" => "edit "])
                                    Edit
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{ $kactivity->id }}">
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

<div class="modal fade" id="create" tabindex="-1" kactivity="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" kactivity="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Tambah {{ ucfirst("Keliling Proses") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route("kactivities.store") }}" class="text-dark">
                @csrf
                @method("POST")

                @foreach ($kspots as $kspot)
                    @include("components.input7",[
                        "label"     => $kspot->name,
                        "name"      => $kspot->name,
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

@foreach($kactivities as $kactivity)
<div class="modal fade" id="delete{{ $kactivity->id }}" tabindex="-1" kactivity="dialog" aria-labelledby="delete{{ $kactivity->id }}Label" aria-hidden="true">
    <div class="modal-dialog" kactivity="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $kactivity->id }}Label">Hapus {{ ucfirst("Keliling Proses") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route("kactivities.destroy", $kactivity->id) }}" class="text-dark">
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

