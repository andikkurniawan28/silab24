@extends("layouts.app")

@section("content")
<div class="container-fluid">

    @include("components.alert_block")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route("analisa_ketel") }}">Analisa Ketel</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Analisa Ketel</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tambah {{ ucfirst("Analisa Ketel") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("analisa_ketel_store") }}" method="POST">
            @csrf @method("POST")

                @include("components.input", [
                    "label"     => "ID",
                    "name"      => "id",
                    "type"      => "number",
                    "value"     => NULL,
                    "modifier"  => "required autofocus"
                ])

                @foreach ($indicators as $indicator)

                    @include("components.input", [
                        "label"     => $indicator->name,
                        "name"      => $indicator->name,
                        "type"      => "number",
                        "value"     => NULL,
                        "modifier"  => ""
                    ])
                @endforeach

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save
                        @include("components.icon", ["icon" => "save"])
                    </button>
                </div>

            </form>
        </div>
        <div class="card-footer">

        </div>
    </div>
</div>

@endsection

