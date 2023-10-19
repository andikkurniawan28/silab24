@extends("layouts.app")

@section("content")
<div class="container-fluid">

    <x-breadcrumb1 route="{{ route('core_samples.index') }}" routeName="ARI Core Sample" title="Tap Kartu ARI Core Sample"></x-breadcrumb1>

    @include("components.alert_block")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tap Kartu ARI {{ ucfirst("Core Sample") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("core_samples.process") }}" method="POST">
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
                        @foreach ($core_sample as $core_sample)
                        <tr>
                            <td>{{ $core_sample->id }}</td>
                            <td>{{ $core_sample->created_at }}</td>
                            <td>{{ $core_sample->posbrix->nopol }}</td>
                            <td>{{ $core_sample->posbrix->barcode_antrian }}</td>
                            <td>
                                <form action="{{ route("core_samples.destroy", $core_sample->id) }}" method="POST">
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

