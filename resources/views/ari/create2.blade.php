@extends("layouts.app")

@section("content")
<div class="container-fluid">

    <x-breadcrumb1 route="{{ route('aris.index') }}" routeName="ARI Gilingan Mini" title="Tap Kartu ARI Gilingan Mini"></x-breadcrumb1>

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
            <div class="table-responsive">
                <table class="table table-bordered table-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Timestamp</th>
                            <th>Nopol</th>
                            <th>Antrian</th>
                            <th>Tidak Sukses</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ari as $ari)
                        <tr>
                            <td>{{ $ari->id }}</td>
                            <td>{{ $ari->created_at }}</td>
                            <td>{{ $ari->posbrix->nopol }}</td>
                            <td>{{ $ari->posbrix->barcode_antrian }}</td>
                            <td>
                                <form action="{{ route("aris.destroy", $ari->id) }}" method="POST">
                                @csrf @method("DELETE")
                                <button type="submit" class="btn btn-sm btn-outline-warning">Tidak Sukses</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

