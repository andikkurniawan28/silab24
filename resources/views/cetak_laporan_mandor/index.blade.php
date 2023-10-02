@extends("layouts.app")

@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">

    <x-alert_block></x-alert_block>

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-4 mb-4">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    <div class="font-weight-bold text-light text-uppercase mb-1">
                        Laporan Mandor
                    </div>
                    <hr>
                    <form action="{{ route("cetak_laporan_mandor_process") }}" method="POST" target="_blank">
                        @csrf
                        @method("POST")
                        <div class="form-group">
                            <div class="input-group">
                                <select class="form-control" name="shift">
                                    <option value="1">Pagi</option>
                                    <option value="2">Sore</option>
                                    <option value="3">Malam</option>
                                    <option value="0">Harian</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="handling" value="print" class="btn btn-warning text-dark">Print <i class="fas fa-print"></i></button>
                            <button type="submit" name="handling" value="export" class="btn btn-warning text-dark">Export <i class="fas fa-download"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

     </div>

</div>

@endsection
