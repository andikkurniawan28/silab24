
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=0.6, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ env('APP_NAME') }}  </title>

        {{-- <link rel="icon" type="image/x-icon" href="landing_template/assets/favicon.ico" /> --}}
	    <link rel="icon" type="image/png" href="/Silab-v3/public/landing_template/img/QC.png"/>
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/Silab-v3/public/landing_template/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">
                    <img src="/Silab-v3/public/admin_template/img/QC.png" width="50" height="50" alt="Logo QC">
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item"><a class="nav-link" href="#20">Bahan Baku</a></li>
                        @if(Auth()->user()->role_id <= 9)
                        <li class="nav-item"><a class="nav-link" href="#24">Timbangan in Proses</a></li>
                        @endif
                        @foreach($stations as $station)
                            <li class="nav-item"><a class="nav-link" href="#{{ $station->id }}">{{ $station->name }}</a></li>
                        @endforeach
                        <li class="nav-item"><a class="nav-link" href="#21">Keliling</a></li>
                        <li class="nav-item"><a class="nav-link" href="#22">Bahan Kimia</a></li>
                        <li class="nav-item"><a class="nav-link" href="#23">Flow NM</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Monitoring Hasil Analisa</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">Tertanggal : {{ date('d-m-Y', strtotime(session('date'))) }}</p>
                        <a class="btn btn-dark btn-xl" href="{{ route('monitoring_select_date') }}">Ganti Tanggal</a>
                        <a class="btn btn-dark btn-xl" href="{{ route('home') }}">Kembali</a>
                    </div>
                </div>
            </div>
        </header>

        <section class="page-section bg-light" id="20">
            <h2 class="text-dark text-center mt-0">Bahan Baku</h2><br><br>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center text-left">
                    <div class="col-lg-12 text-left text-xs">
                        <div class="card bg-dark text-white shadow">
                            <div class="card-header">
                                <h5>Pos Brix</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-sm table-hovered text-light table-bordered text-xs text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID</th>
                                                <th>Time</td>
                                                <th>Kategori</td>
                                                <th>Brix</td>
                                                <th>Varietas</td>
                                                <th>Kawalan</td>
                                                <th>Status</td>
                                                <th>E-SPTA</td>
                                                <th>Antrian</td>
                                                <th>Register</td>
                                                <th>Nopol</td>
                                                <th>Petani</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($posbrixes as $posbrix)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $posbrix->id }}</td>
                                                <td>{{ $posbrix->created_at }}</td>
                                                <td>{{ $posbrix->category }}</td>
                                                <td>{{ $posbrix->brix }}</td>
                                                <td>
                                                    @if($posbrix->variety_id != NULL)
                                                    {{ $posbrix->variety->name }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($posbrix->kawalan_id != NULL)
                                                    {{ $posbrix->kawalan->name }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($posbrix->is_accepted === 1)
                                                    {{ 'Diterima' }}
                                                    @elseif($posbrix->is_accepted === 0)
                                                    {{ 'Ditolak' }}
                                                    @elseif($posbrix->is_accepted === 2)
                                                    {{ 'Terbakar' }}
                                                    @elseif($posbrix->is_accepted === 3)
                                                    {{ 'Lolos' }}
                                                    @else
                                                    {{ '-' }}
                                                    @endif
                                                </td>
                                                <td>{{ $posbrix->spta }}</td>
                                                <td>
                                                    @foreach($posbrix->rit as $rit)
                                                    {{
                                                        $rit->barcode_antrian
                                                    }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($posbrix->rit as $rit)
                                                    {{
                                                        $rit->register
                                                    }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($posbrix->rit as $rit)
                                                    {{
                                                        $rit->nopol
                                                    }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($posbrix->rit as $rit)
                                                    {{
                                                        $rit->petani
                                                    }}
                                                    @endforeach
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>

                    {{-- <div class="col-lg-6 text-left text-xs">
                        <div class="card bg-dark text-white shadow">
                            <div class="card-header">
                                <h5>Penilaian MBS</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-sm table-hovered text-light text-sm-left">
                                        <thead>
                                            <tr>
                                                <th>Time</th>
                                                <th>Nopol</th>
                                                <th>Antrian</th>
                                                <th>Score</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($scores as $score)
                                            <tr>
                                                <td>{{ date('H:i', strtotime($score->created_at)) }}</td>
                                                <td>{{ $score->rit->nopol }}</td>
                                                <td>{{ $score->rit->barcode_antrian }}</td>
                                                <td>{{ $score->value }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div> --}}

                    @if(Auth()->user()->role_id <= 8)
                    <div class="col-lg-12 text-left text-xs">
                        <div class="card bg-dark text-white shadow">
                            <div class="card-header">
                                <h5><button class="button button-outline-primary" onclick="copyAriToClipboard()">Analisa Rendemen</button></h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-sm table-hovered table-bordered text-light text-sm-left" id="ari">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID</th>
                                                <th>Time</th>
                                                <th>Nopol</th>
                                                <th>Antrian</th>
                                                <th>Register</th>
                                                <th>%Brix</th>
                                                <th>%Pol</th>
                                                <th>%Rend</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($aris as $ari)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $ari->id }}</td>
                                                <td>{{ $ari->created_at }}</td>
                                                <td>{{ $ari->ari_sampling->rit->nopol ?? '-' }}</td>
                                                <td>{{ $ari->ari_sampling->rit->barcode_antrian ?? '-' }}</td>
                                                <td>{{ $ari->ari_sampling->rit->register ?? '-' }}</td>
                                                <td>{{ number_format($ari->pbrix, 2) }}</td>
                                                <td>{{ number_format($ari->ppol, 2) }}</td>
                                                <td>{{ number_format($ari->yield, 2) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>

                    <div class="col-lg-12 text-left text-xs">
                        <div class="card bg-dark text-white shadow">
                            <div class="card-header">
                                <h5>Core Sample</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-sm table-hovered table-bordered text-light text-sm-left">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID</th>
                                                <th>Time</th>
                                                <th>Nopol</th>
                                                <th>Antrian</th>
                                                <th>Register</th>
                                                <th>%Brix</th>
                                                <th>%Pol</th>
                                                <th>%Rend</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($core_samples as $core_sample)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $core_sample->id }}</td>
                                                <td>{{ $core_sample->created_at }}</td>
                                                <td>{{ $core_sample->ari_sampling->rit->nopol ?? '-' }}</td>
                                                <td>{{ $core_sample->ari_sampling->rit->barcode_antrian ?? '-' }}</td>
                                                <td>{{ $core_sample->ari_sampling->rit->register ?? '-' }}</td>
                                                <td>{{ number_format($core_sample->pbrix, 2) }}</td>
                                                <td>{{ number_format($core_sample->ppol, 2) }}</td>
                                                <td>{{ number_format($core_sample->yield, 2) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    @endif

                </div>
            </div>
        </section>

        @if(Auth()->user()->role_id <= 9)
        <section class="page-section bg-white" id="24">
            <h2 class="text-dark text-center mt-0">Timbangan in Proses</h2><br><br>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center text-left">
                    <div class="col-lg-4 text-left text-xs">
                        <div class="card bg-dark text-white shadow">
                            <div class="card-header">
                                <h5>Tetes</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-sm table-hovered text-light text-sm-left">
                                        <thead>
                                            <tr>
                                                <th>Time</th>
                                                <th>Netto<sub>(kg)</sub></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>SD Hari Ini</td>
                                                <td>{{ number_format($timbangan['tetes_total']) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Harian</td>
                                                <td>{{ number_format($timbangan['tetes']) }}</td>
                                            </tr>
                                            @for($i=0; $i<=23; $i++)
                                            <tr>
                                                <td>
                                                    @if($i<=18)
                                                    {{ $i+5 }}:00 - {{ $i+6 }}:00
                                                    @else
                                                    {{ $i-19 }}:00 - {{ $i-18 }}:00
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($timbangan['tts'][$i] == 0)
                                                    {{ '-' }}
                                                    @else
                                                    {{ number_format($timbangan['tts'][$i]) }}
                                                    @endif
                                                </td>
                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-4 text-left text-xs">
                        <div class="card bg-dark text-white shadow">
                            <div class="card-header">
                                <h5>Raw Sugar In</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-sm table-hovered text-light text-sm-left">
                                        <thead>
                                            <tr>
                                                <th>Time</th>
                                                <th>Netto<sub>(kg)</sub></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>SD Hari Ini</td>
                                                <td>{{ number_format($timbangan['rawsugarinput_total']) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Harian</td>
                                                <td>{{ number_format($timbangan['rawsugarinput']) }}</td>
                                            </tr>
                                            @for($i=0; $i<=23; $i++)
                                            <tr>
                                                <td>
                                                    @if($i<=18)
                                                    {{ $i+5 }}:00 - {{ $i+6 }}:00
                                                    @else
                                                    {{ $i-19 }}:00 - {{ $i-18 }}:00
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($timbangan['rs_in'][$i] == 0)
                                                    {{ '-' }}
                                                    @else
                                                    {{ number_format($timbangan['rs_in'][$i]) }}
                                                    @endif
                                                </td>
                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-4 text-left text-xs">
                        <div class="card bg-dark text-white shadow">
                            <div class="card-header">
                                <h5>Raw Sugar Out</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-sm table-hovered text-light text-sm-left">
                                        <thead>
                                            <tr>
                                                <th>Time</th>
                                                <th>Netto<sub>(kg)</sub></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>SD Hari Ini</td>
                                                <td>{{ number_format($timbangan['rawsugaroutput_total']) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Harian</td>
                                                <td>{{ number_format($timbangan['rawsugaroutput']) }}</td>
                                            </tr>
                                            @for($i=0; $i<=23; $i++)
                                            <tr>
                                                <td>
                                                    @if($i<=18)
                                                    {{ $i+5 }}:00 - {{ $i+6 }}:00
                                                    @else
                                                    {{ $i-19 }}:00 - {{ $i-18 }}:00
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($timbangan['rs_out'][$i] == 0)
                                                    {{ '-' }}
                                                    @else
                                                    {{ number_format($timbangan['rs_out'][$i]) }}
                                                    @endif
                                                </td>
                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </section>

        @endif

        @foreach($stations as $station)

        @if($station->id % 2 == 0)
        <section class="page-section bg-light" id="{{ $station->id }}">
            <h2 class="text-dark text-center mt-0">{{ $stations[$station->id-1]->name }}</h2><br><br>
            <div class="container px-4 px-lg-5">
        @else
        <section class="page-section bg-white" id="{{ $station->id }}">
            <h2 class="text-dark text-center mt-0">{{ $stations[$station->id-1]->name }}</h2><br><br>
            <div class="container px-4 px-lg-5">
        @endif
                <div class="row gx-4 gx-lg-5 justify-content-center text-left">

                    @if($station->id == 2)
                    <div class="col-lg-6 text-left text-xs">
                        <div class="card bg-dark text-white shadow">
                            <div class="card-header">
                                <h5>Rendemen NPP per Jam</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-sm table-hovered text-light text-sm-left">
                                        <thead>
                                            <tr>
                                                <th>Time</th>
                                                <th>R<sub>(%)</sub></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for($i=0; $i<=23; $i++)
                                            <tr>
                                                <td>
                                                    @if($i<=18)
                                                    {{ $i+5 }}:00 - {{ $i+6 }}:00
                                                    @else
                                                    {{ $i-19 }}:00 - {{ $i-18 }}:00
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($npp['jam'][$i] == 0)
                                                    {{ '-' }}
                                                    @else
                                                    {{ number_format($npp['jam'][$i], 2, ',' , '') }}
                                                    @endif
                                                </td>
                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    @endif
                    @foreach($material[$stations[$station->id-1]->id] as $materialx)
                    <div class="col-lg-6 text-left text-xs">
                        <div class="card bg-dark text-white shadow">
                            <div class="card-header">
                                <h5>{{ strtoupper($materialx->name) }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-sm table-hovered text-light text-sm-left">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Time</th>
                                                @foreach($materialx->method as $method)
                                                    <td>{{ $method->indicator->name }}</td>
                                                @endforeach
                                                @if($materialx->id >= 43 && $materialx->id <= 49 )
                                                    <td>Pan</td>
                                                    <td>Hl</td>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($materialx->sample as $sample)
                                            <tr>
                                                <td>{{ $sample->id }}</td>
                                                <td>{{ date('H:i', strtotime($sample->created_at)) }}</td>
                                                @foreach($materialx->method as $method)
                                                    <td>
                                                        @foreach($sample->analysis as $analysis)
                                                            @if($analysis->indicator->id == $method->indicator_id)
                                                                {{-- {{ $analysis->value }} --}}
                                                                @if($analysis->value != 0)
                                                                {{ number_format($analysis->value, 2, ',' , '') }}
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                @endforeach
                                                @if($materialx->id >= 43 && $materialx->id <= 49 )
                                                <td>{{ $sample->pan }}</td>
                                                <td>{{ $sample->volume }}</td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endforeach

        <section class="page-section bg-light" id="21">
            <h2 class="text-dark text-center mt-0">Keliling</h2><br><br>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center text-left">
                    <div class="col-lg-12 text-left text-xs">
                        <div class="card bg-dark text-white shadow"><div class="card-body">
                            <div class="table-responsive">
                                <table width="100%" class="table table-sm table-hovered text-light text-sm-left">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kactivities as $kactivity)
                                        <tr>
                                            <td>{{ date('H:i', strtotime($kactivity->created_at)) }}</td>
                                            <td>
                                                <ul class="list-group">
                                                @foreach($kactivity->kvalue as $kvalue)
                                                    <li class="list-group-item">{{ $kvalue->kspot->name }} = {{ $kvalue->value }}</li>
                                                @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="page-section bg-white" id="22">
            <h2 class="text-dark text-center mt-0">Bahan Kimia</h2><br><br>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center text-left">
                    <div class="col-lg-12 text-left text-xs">
                        <div class="card bg-dark text-white shadow">
                            <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%" class="table table-sm table-hovered text-light text-sm-left">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($chemicalcheckings as $chemicalchecking)
                                        <tr>
                                            <td>{{ date('H:i', strtotime($chemicalchecking->created_at)) }}</td>
                                            <td>
                                                <ul class="list-group">
                                                @foreach($chemicalchecking->chemicalvalue as $chemicalvalue)
                                                    <li class="list-group-item">{{ $chemicalvalue->chemical->name }} = {{ $chemicalvalue->value }}</li>
                                                @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="page-section bg-light" id="23">
            <h2 class="text-dark text-center mt-0">Flow NM</h2><br><br>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center text-left">

                    <div class="col-lg-6 text-left text-xs">
                        <div class="card bg-dark text-white shadow">
                            <div class="card-header">
                                <h5>Nira Mentah</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-sm table-hovered text-light text-sm-left">
                                        <thead>
                                            <tr>
                                                <th>Time</th>
                                                <th>Tebu</th>
                                                <th>Flow</th>
                                                <th>NM % Tebu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($balances as $balance)
                                            <tr>
                                                <td>{{ date('H:i', strtotime($balance->created_at)) }}</td>
                                                <td>{{ $balance->tebu }}</td>
                                                <td>{{ $balance->flow_nm }}</td>
                                                <td>{{ $balance->nm_persen_tebu }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-6 text-left text-xs">
                        <div class="card bg-dark text-white shadow">
                            <div class="card-header">
                                <h5>Imbibisi</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-sm table-hovered text-light text-sm-left">
                                        <thead>
                                            <tr>
                                                <th>Time</th>
                                                <th>Flow</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($imbibitions as $imbibition)
                                            <tr>
                                                <td>{{ date('H:i', strtotime($imbibition->created_at)) }}</td>
                                                <td>{{ $imbibition->flow_imb }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5">
                <div class="small text-center text-muted">{{  env('APP_NAME') }} <br>Developed by &copy; <a href="https://wa.me/6285733465399" target="_blank">Andik Kurniawan</a></div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="/Silab-v3/public/landing_template/js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script>
            function copyAriToClipboard(){
                var urlField = document.getElementById("ari")
                var range = document.createRange()
                range.selectNode(urlField)
                window.getSelection().addRange(range)
                document.execCommand('copy')
            }
        </script>
    </body>
</html>
