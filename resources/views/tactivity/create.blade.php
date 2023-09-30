@extends("layouts.app")

@section("content")
<div class="container-fluid">

    @include("components.alert_block")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route("analyses.index") }}">Barcode</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Barcode</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tambah {{ ucfirst("barcode") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("analyses.store") }}" method="POST">
            @csrf @method("POST")

                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">

                <div class="mb-3">
                    <label for="material_id">{{ ucfirst("material") }}</label>
                    <select class="form-control" name="material_id">
                        @foreach ($materials as $material)
                            <option value="{{ $material->id }}">{{ $material->name }}</option>
                        @endforeach
                    </select>
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

