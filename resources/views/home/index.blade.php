@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <x-alert_block></x-alert_block>

    <!-- Card Section -->
    <div class="row">

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mb-4">
            <a href="{{ route("dashboard") }}">
            <div class="card bg-white text-primary shadow">
                <div class="card-header">
                    <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                        Dashboard
                    </div>
                </div>
                <div class="card-body text-center">
                    <i class="fa fa-5x fa-tachometer-alt"></i>
                </div>
            </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mb-4">
            <a href="{{ route("keliling_result") }}">
            <div class="card bg-white text-primary shadow">
                <div class="card-header">
                    <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                        Keliling Proses
                    </div>
                </div>
                <div class="card-body text-center">
                    <i class="fa fa-5x fa-running"></i>
                </div>
            </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mb-4">
            <a href="{{ route("material_balance") }}">
            <div class="card bg-white text-primary shadow">
                <div class="card-header">
                    <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                        Material Balance
                    </div>
                </div>
                <div class="card-body text-center">
                    <i class="fa fa-5x fa-balance-scale"></i>
                </div>
            </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mb-4">
            <a href="{{ route("timbangan_in_proses") }}">
            <div class="card bg-white text-primary shadow">
                <div class="card-header">
                    <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                        Timbangan in Proses
                    </div>
                </div>
                <div class="card-body text-center">
                    <i class="fa fa-5x fa-balance-scale"></i>
                </div>
            </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mb-4">
            <a href="{{ route("masakan_turun") }}">
            <div class="card bg-white text-primary shadow">
                <div class="card-header">
                    <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                        Masakan Turun
                    </div>
                </div>
                <div class="card-body text-center">
                    <i class="fa fa-5x fa-arrow-down"></i>
                </div>
            </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mb-4">
            <a href="{{ route("penggunaan_bpp") }}">
            <div class="card bg-white text-primary shadow">
                <div class="card-header">
                    <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                        Penggunaan Bahan Pembantu Proses
                    </div>
                </div>
                <div class="card-body text-center">
                    <i class="fa fa-5x fa-flask"></i>
                </div>
            </div>
            </a>
        </div>

        @foreach ($stations as $station)
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mb-4">
            <a href="{{ route("station_result", $station->id) }}">
            <div class="card bg-white text-primary shadow">
                <div class="card-header">
                    <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                        Hasil Analisa {{ $station->name }}
                    </div>
                </div>
                <div class="card-body text-center">
                    <i class="fa fa-5x fa-folder"></i>
                </div>
            </div>
            </a>
        </div>
        @endforeach

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mb-4">
            <a href="{{ route("cetak_ronsel") }}">
            <div class="card bg-white text-primary shadow">
                <div class="card-header">
                    <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                        Cetak Ronsel
                    </div>
                </div>
                <div class="card-body text-center">
                    <i class="fa fa-5x fa-print"></i>
                </div>
            </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mb-4">
            <a href="{{ route("tactivities.index") }}">
            <div class="card bg-white text-primary shadow">
                <div class="card-header">
                    <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                        Taksasi
                    </div>
                </div>
                <div class="card-body text-center">
                    <i class="fa fa-5x fa-eye"></i>
                </div>
            </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mb-4">
            <a href="{{ route("imbibitions.index") }}">
            <div class="card bg-white text-primary shadow">
                <div class="card-header">
                    <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                        Air Imbibisi
                    </div>
                </div>
                <div class="card-body text-center">
                    <i class="fa fa-5x fa-tint"></i>
                </div>
            </div>
            </a>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

@endsection
