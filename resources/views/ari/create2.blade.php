@extends("layouts.app")

@section("content")
<div class="container-fluid">

    @include("components.alert_block")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tap Kartu ARI {{ ucfirst("Gilingan Mini") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("aris.process") }}" method="POST">
                @csrf @method("POST")
                <input hidden name="user_id" value="{{ Auth()->user()->id }}" readonly>
                <div class="form-group row">
                    <label for="data" class="col-sm-2 col-form-label">Data</label>
                    <div class="col-sm-10">
                      <input type="text" step="any" class="form-control" id="data" value="" name="data" maxlength="10" maxlength="10" required autofocus>
                    </div>
                </div>
                <input type="submit" style="visibility: hidden;" />
            </form>
        </div>
        <div class="card-footer">

        </div>
    </div>
</div>

@endsection

