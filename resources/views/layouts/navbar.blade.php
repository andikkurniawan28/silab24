<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow text-dark">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <form action="{{ route("changeDate") }}" method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        @csrf
        <div class="input-group">
            <input type="date" class="form-control bg-light text-black border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2" value="{{ session("date") }}" name="date" onchange="this.form.submit()" required>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>

        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search" action="{{ route("changeDate") }}" method="POST">
                @csrf @method("POST")
                <div class="input-group">
                    <input type="date" class="form-control bg-light border-0 small" value="{{ session("date") }}" name="date" onchange="this.form.submit()" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth()->user()->name }}</span>
                <img class="img-profile rounded-circle" src="/admin_template/img/undraw_profile.svg">
        </a>

        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">


            @if(Auth()->user()->role_id <= 1)
            <a class="dropdown-item" href="{{ route("users.index") }}">
                <i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i> Pengguna
            </a>
            @endif

            @if(Auth()->user()->role_id <= 3)
            <a class="dropdown-item" href="{{ route("stations.index") }}">
                <i class="fas fa-filter fa-sm fa-fw mr-2 text-gray-400"></i> Stasiun
            </a>
            <a class="dropdown-item" href="{{ route("indicators.index") }}">
                <i class="fas fa-asterisk fa-sm fa-fw mr-2 text-gray-400"></i> Indikator
            </a>
            <a class="dropdown-item" href="{{ route("factors.index") }}">
                <i class="fas fa-percent fa-sm fa-fw mr-2 text-gray-400"></i> Faktor
            </a>
            @endif

            @if(Auth()->user()->role_id <= 7)
            <a class="dropdown-item" href="{{ route("materials.index") }}">
                <i class="fas fa-box fa-sm fa-fw mr-2 text-gray-400"></i> Material
            </a>
            <a class="dropdown-item" href="{{ route("methods.index") }}">
                <i class="fas fa-flask fa-sm fa-fw mr-2 text-gray-400"></i> Metode
            </a>
            @endif

            @if(Auth()->user()->role_id <= 3)
            <a class="dropdown-item" href="{{ route("kspots.index") }}">
                <i class="fas fa-map fa-sm fa-fw mr-2 text-gray-400"></i> Titik Keliling
            </a>
            <a class="dropdown-item" href="{{ route("tspots.index") }}">
                <i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i> Titik Taksasi
            </a>
            <a class="dropdown-item" href="{{ route("chemicals.index") }}">
                <i class="fas fa-flask fa-sm fa-fw mr-2 text-gray-400"></i> Bahan Pembantu Proses
            </a>
            <a class="dropdown-item" href="{{ route("consumables.index") }}">
                <i class="fas fa-box fa-sm fa-fw mr-2 text-gray-400"></i> Bahan Analisa
            </a>
            @endif

            @if(Auth()->user()->role_id <= 4)
            <a class="dropdown-item" href="{{ route("kuds.index") }}">
                <i class="fas fa-shop fa-sm fa-fw mr-2 text-gray-400"></i> KUD
            </a>
            <a class="dropdown-item" href="{{ route("pospantaus.index") }}">
                <i class="fas fa-shop fa-sm fa-fw mr-2 text-gray-400"></i> Pos Pantau
            </a>
            <a class="dropdown-item" href="{{ route("wilayahs.index") }}">
                <i class="fas fa-shop fa-sm fa-fw mr-2 text-gray-400"></i> Wilayah
            </a>
            <a class="dropdown-item" href="{{ route("varieties.index") }}">
                <i class="fas fa-file fa-sm fa-fw mr-2 text-gray-400"></i> Varietas
            </a>
            <a class="dropdown-item" href="{{ route("kawalans.index") }}">
                <i class="fas fa-truck fa-sm fa-fw mr-2 text-gray-400"></i> Kawalan
            </a>
            <a class="dropdown-item" href="{{ route("dirts.index") }}">
                <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i> Kotoran
            </a>
            @endif
            {{--

            @if(Auth()->user()->role_id <= 4)
            @endif

            @if(Auth()->user()->role_id <= 2)
            <a class="dropdown-item" href="{{ route("activities") }}">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> Activity Log
            </a>
            @endif --}}

            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
            </a>
        </div>
    </li>

    </ul>

</nav>
<!-- End of Topbar -->
