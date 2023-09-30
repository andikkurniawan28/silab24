@extends("layouts.app")

@section("content")
<div class="container-fluid">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route("home") }}">{{ ucfirst("home") }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route("posbrixes.index") }}">{{ ucfirst("posbrix") }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah {{ ucfirst("posbrix") }}</li>
      </ol>
    </nav>

    <x-alert_block></x-alert_block>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tambah {{ ucfirst("posbrix") }} {{ $category }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("posbrixes.store") }}" method="POST">
                @csrf @method("POST")
                <input hidden name="user_id" value="{{ Auth()->user()->id }}" readonly>
                <input hidden name="category" value="{{ $category }}" readonly>
                @include("components.input6",[
                    "label" => "SPTA",
                    "name" => "spta",
                    "type" => "text",
                    "value" => NULL,
                    "modifier" => "required autofocus",
                ])
                @include("components.input6",[
                    "label" => "Brix",
                    "name" => "brix",
                    "type" => "number",
                    "value" => NULL,
                    "modifier" => "required",
                ])

                <div class="form-group row">
                    <label for="variety_id" class="col-sm-4 col-form-label">{{ ucfirst("varietas") }}</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="variety_id">
                            @foreach ($varieties as $variety)
                                <option value="{{ $variety->id }}" @if($variety->id == 10) {{ "selected" }}@endif>{{ $variety->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kawalan_id" class="col-sm-4 col-form-label">{{ ucfirst("kawalan") }}</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="kawalan_id">
                            @foreach ($kawalans as $kawalan)
                                <option value="{{ $kawalan->id }}" @if($kawalan->id == 1) {{ "selected" }}@endif>{{ $kawalan->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="is_accepted" class="col-sm-4 col-form-label">{{ ucfirst("status") }}</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="is_accepted">
                            <option value="1">{{ ucfirst("diterima") }}</option>
                            <option value="0">{{ ucfirst("ditolak") }}</option>
                            <option value="2">{{ ucfirst("terbakar") }}</option>
                            <option value="3">{{ ucfirst("lolos") }}</option>
                        </select>
                    </div>
                </div>
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

