@extends("layouts.app")

@section("content")
<div class="container-fluid">

    @include("components.alert_block")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Analisa</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("analisa") }}</h5>
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
                            <th>Material</td>
                            <th>Timestamp</td>
                            @foreach ($indicators as $indicator)
                                <th>{{ $indicator->name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($analyses as $analysis)
                        <tr>
                            <td>{{ $analysis->id }}</td>
                            <td>{{ $analysis->material->name }}</td>
                            <td>{{ $analysis->created_at }}</td>
                            @foreach ($indicators as $indicator)
                                <td>{{ $analysis->{$indicator->name} }}</td>
                            @endforeach
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

<div class="modal fade" id="create" tabindex="-1" analysis="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" analysis="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Tambah {{ ucfirst("analisa") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route("analisa.process") }}" class="text-dark">
                @csrf
                @method("POST")

                @include("components.input",[
                    "label" => "ID",
                    "name" => "id",
                    "type" => "number",
                    "value" => "",
                    "modifier" => "required",
                ])

                @foreach ($indicators as $indicator)
                @include("components.input",[
                    "label" => $indicator->name,
                    "name" => $indicator->name,
                    "type" => "number",
                    "value" => "",
                    "modifier" => "",
                ])
                @endforeach

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

