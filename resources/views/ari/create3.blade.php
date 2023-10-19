@extends("layouts.app")

@section("content")
<div class="container-fluid">

    <x-breadcrumb1 route="{{ route('aris.index') }}" routeName="ARI Gilingan Mini" title="Gelas ARI Gilingan Mini"></x-breadcrumb1>

    @include("components.alert_block")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Gelas ARI {{ ucfirst("Gilingan Mini") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("gelas_ari.process") }}" method="POST">
                @csrf @method("POST")
                <div class="form-group row">
                    <label for="data" class="col-sm-2 col-form-label">{{ ucfirst("identificator") }}</label>
                    <div class="col-sm-10">
                      <input type="text" step="any" class="form-control" id="identificator" value="" name="identificator" maxlength="10" maxlength="10" required autofocus>
                    </div>
                </div>
                <input type="submit" style="visibility: hidden;" />
            </form>
        </div>
        <div class="card-footer">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Identificator</th>
                            <th>Timestamp</th>
                            <th>Nopol</th>
                            <th>Antrian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gelas_ari as $gelas_ari)
                        <tr>
                            <td>{{ $gelas_ari->identificator }}</td>
                            <td>{{ $gelas_ari->created_at }}</td>
                            <td>{{ $gelas_ari->ari->posbrix->nopol }}</td>
                            <td>{{ $gelas_ari->ari->posbrix->barcode_antrian }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
