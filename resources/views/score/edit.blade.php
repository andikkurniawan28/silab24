@extends("layouts.app")

@section("content")
<div class="container-fluid">

    @include("components.alert_block")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst("Penilaian MBS") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("scores.update", $score->id) }}" method="POST">
                @csrf @method("PUT")
                <input hidden name="user_id" value="{{ Auth()->user()->id }}" readonly>
                @include("components.input",[
                    "label" => "ID",
                    "name" => "id",
                    "type" => "number",
                    "value" => $score->id,
                    "modifier" => "readonly",
                ])
                @include("components.input",[
                    "label" => "Meja Tebu",
                    "name" => "cane_table",
                    "type" => "number",
                    "value" => $score->cane_table,
                    "modifier" => "required",
                ])
                @foreach($dirts as $dirt)
                    @include("components.input",[
                        "label" => $dirt->name,
                        "name" => $dirt->name,
                        "type" => "number",
                        "value" => $score->{$dirt->name},
                        "modifier" => "",
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
