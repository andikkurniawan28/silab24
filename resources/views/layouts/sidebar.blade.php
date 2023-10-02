<ul class="navbar-nav bg-gradient-light sidebar sidebar-light accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route("home") }}">
        <div class="sidebar-brand-icon">
            <img src="/admin_template/img/QC.png" width="50" height="50" alt="Logo QC">
        </div>
        <div class="sidebar-brand-text mx-3">SILAB</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ route("home") }}">
        <i class="fas fa-fw fa-home"></i>
        <span>Home</span></a>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link" href="/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Hasil Analisa</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                @foreach($stations as $station)
                    <a class="collapse-item" href="{{ route('station_result', $station->id) }}">{{ $station->name }}</a>
                @endforeach
                <a class="collapse-item" href="{{ route("keliling_result") }}">Keliling Proses</a>
                <a class="collapse-item" href="{{ route("material_balance") }}">Material Balance</a>
                <a class="collapse-item" href="{{ route("timbangan_in_proses") }}">Timbangan In Proses</a>
                <a class="collapse-item" href="{{ route("masakan_turun") }}">Masakan Turun</a>
            </div>
        </div>
    </li>

    @if(Auth()->user()->role_id <= 8)

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cetak_barcode" aria-expanded="true" aria-controls="cetak_barcode">
            <i class="fas fa-fw fa-barcode"></i>
            <span>Cetak Barcode</span>
        </a>
        <div id="cetak_barcode" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                @foreach($stations as $station)
                    <a class="collapse-item" href="{{ route('cetak_barcode_by_category', $station->id) }}">{{ $station->name }}</a>
                @endforeach
            </div>
        </div>
    </li>

    @endif

    @if(Auth()->user()->role_id <= 9)

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-edit"></i>
            <span>Data Off Farm</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>

                @if(Auth()->user()->role_id < 9)

                <a class="collapse-item" href="{{ route('analyses.index') }}">Analisa</a>
                <a class="collapse-item" href="{{ route('balances.index') }}">Balance Nira Mentah</a>
                <a class="collapse-item" href="{{ route('kactivities.index') }}">Keliling Proses</a>
                <a class="collapse-item" href="{{ route('tactivities.index') }}">Taksasi</a>
                <a class="collapse-item" href="{{ route('chemicalcheckings.index') }}">Penggunaan BPP</a>
                <a class="collapse-item" href="{{ route('consumableusages.index') }}">Bahan-Bahan Lab</a>
                @endif

                @if(Auth()->user()->role_id <= 6)
                <a class="collapse-item" href="{{ route('mollases.index') }}">Timbangan Tetes</a>
                <a class="collapse-item" href="{{ route('rawsugarinputs.index') }}">Timbangan RS In</a>
                <a class="collapse-item" href="{{ route('rawsugaroutputs.index') }}">Timbangan RS Out</a>
                @endif

                <a class="collapse-item" href="{{ route('cetak_ronsel') }}">Cetak Ronsel</a>
                <a class="collapse-item" href="{{ route('tactivities.index') }}">Taksasi</a>
                <a class="collapse-item" href="{{ route('imbibitions.index') }}">Air Imbibisi</a>
            </div>
        </div>
    </li>
    @endif

    @if(Auth()->user()->role_id < 9)
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1" aria-expanded="true" aria-controls="collapseUtilities1">
            <i class="fas fa-fw fa-edit"></i>
            <span>Data On Farm</span>
        </a>
        <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                <a class="collapse-item" href="{{ route('analisa_pendahuluans.index') }}">Analisa Pendahuluan</a>
                <a class="collapse-item" href="{{ route('posbrixes.index') }}">Posbrix</a>
                <a class="collapse-item" href="{{ route('core_samples.index') }}">ARI Core Sample</a>
                <a class="collapse-item" href="{{ route('aris.index') }}">ARI Gilingan Mini</a>
                <a class="collapse-item" href="{{ route('scores.index') }}">Penilaian MBS</a>
            </div>
        </div>
    </li>
    @endif

    @if(Auth()->user()->role_id <= 7)
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-file-signature"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                    {{-- <a class="collapse-item" href="{{ route('report') }}" target="_blank">Cetak Laporan</a> --}}
                    <a class="collapse-item" href="{{ route('cetak_laporan_mandor') }}">Laporan Mandor</a>
            </div>
        </div>
    </li>
    @endif

    {{-- @if(Auth()->user()->role_id <= 8)
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
            <i class="fas fa-fw fa-mobile"></i>
            <span>Aplikasi</span>
        </a>
        <div id="collapse2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                <a class="collapse-item" href="{{ route('scan_rfid_core_sample_ek') }}" target="_blank">Pos Brix Core</a>
                <a class="collapse-item" href="{{ route('scan_rfid_core_sample_eb') }}" target="_blank">Pos Brix EB/GD Core 2</a>
                <a class="collapse-item" href="{{ route('scan_rfid') }}" target="_blank">Pos Brix EK</a>
                <a class="collapse-item" href="{{ route('scan_rfid_eb') }}" target="_blank">Pos Brix EB/GD</a>
                <a class="collapse-item" href="{{ route('tap_timbangan') }}" target="_blank">Tap Timbangan EK</a>
                <a class="collapse-item" href="{{ route('tap_timbangan_eb') }}" target="_blank">Tap Timbangan EB/GD</a>
                <a class="collapse-item" href="{{ route('tap_core_sampling') }}" target="_blank">Tap Core Sampling</a>
                <a class="collapse-item" href="{{ route('meja_selatan') }}" target="_blank">Penilaian Meja Selatan</a>
                <a class="collapse-item" href="{{ route('meja_utara') }}" target="_blank">Penilaian Meja Utara</a>
                <a class="collapse-item" href="{{ route('view_ari') }}" target="_blank">Display Analisa Rendemen</a>
                <a class="collapse-item" href="{{ route('display_core_sample') }}" target="_blank">Display Core Sample</a>
                <a class="collapse-item" href="{{ route('view_arisampling') }}" target="_blank">Display Sampling</a>
                <a class="collapse-item" href="{{ route('display_ari_sampling2') }}" target="_blank">Display Sampling 2</a>
                <a class="collapse-item" href="{{ route('view_timbangan') }}" target="_blank">Display Timbangan</a>
                <a class="collapse-item" href="{{ route('view_onfarm', date('Y-m-d')) }}" target="_blank">Display On Farm</a>
                <a class="collapse-item" href="{{ route('find_result_by_identity') }}">Cari Data On Farm</a>
            </div>
        </div>
    </li>
    @endif --}}

    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
