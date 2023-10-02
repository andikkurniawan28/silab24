<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
        <title>{{ env("APP_NAME") }}</title>
        <link rel="icon" type="image/png" href="/admin_template/img/QC.png"/>
        <link href="/admin_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="/admin_template/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="/admin_template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	</head>
	<body>
        <div class="wrapper">
            <section class="invoice">
                <br><br>
                <div class="row d-flex justify-content-center text-dark">
                    <div class="col-11 table-responsive">
                        <table border="1" cellpadding="0" width="100%">
                            <thead>
                                <tr>
                                    <th rowspan="2"><img class="rounded mx-auto d-block" src="/admin_template/img/ka.jpg" width="100" height="100"></img></th>
                                    <th colspan="3" class="text-center">
                                        <h4><STRONG>PT. KEBON AGUNG UNIT PABRIK GULA KEBON AGUNG</STRONG></h4>
                                        <p><SMALL>FORMULIR</SMALL></p>
                                        <h2><STRONG>LAPORAN SISTEM INFORMASI LABORATORIUM</STRONG></h2>
                                    </th>
                                    <th rowspan="2"><img class="rounded mx-auto d-block" src="/admin_template/img/QC.png" width="100" height="100"></img></th>
                                </tr>
                                <tr>
                                    <th class="text-center">No Dok : KBA/FRM/QC/005-00</th>
                                    <th class="text-center">Tanggal : {{ date("d-m-Y", strtotime(session("time_start"))) }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class="row d-flex justify-content-center text-dark">
                    <div class="col-11 table-responsive">
                        <br>
                        <h3>Analisa Laboratorium</h3>
                        <table width="100%" class="table table-dark table-striped table-sm table-bordered table-hover text-xs">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Material</th>
                                    <th>Jumlah</th>
                                    <th>Hl</th>
                                    @foreach($indicators as $indicator)
                                    <th>{{ $indicator->name }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data["analisaLab"] as $analisa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $analisa->name }}</td>
                                    <td>{{ $analisa->analysis->Jumlah }}</td>
                                    <td>{{ $analisa->analysis->Volume }}</td>
                                    @foreach($indicators as $indicator)
                                    <td>{{ $analisa->analysis->{$indicator->name} }}</th>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row d-flex justify-content-center text-dark">
                    <div class="col-5 table-responsive">
                        <br>
                        <h3>Timbangan in Proses</h3>
                        <table width="100%" class="table table-dark table-striped table-sm table-bordered table-hover text-xs">
                            <thead>
                                <tr>
                                    <th>Raw Sugar Diolah</th>
                                    <th>Raw Sugar Output</th>
                                    <th>Tetes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $data["rs_in"]["netto"] }}</td>
                                    <td>{{ $data["rs_out"]["netto"] }}</td>
                                    <td>{{ $data["tetes"]["netto"] }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <br>

                        <h3>Material Balance</h3>
                        <table width="100%" class="table table-dark table-striped table-sm table-bordered table-hover text-xs">
                            <thead>
                                <tr>
                                    <th>Tebu</th>
                                    <th>Nira Mentah</th>
                                    <th>Air Imbibisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $data["material_balance"]["tebu"] }}</td>
                                    <td>{{ $data["material_balance"]["flow_nm"] }}</td>
                                    <td>{{ $data["material_balance"]["flow_imb"] }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <br>

                        <h3>Bahan Pembantu Proses</h3>
                        <table width="100%" class="table table-dark table-striped table-sm table-bordered table-hover text-xs">
                            <thead>
                                <tr>
                                    <th>Bahan</th>
                                    <th>Penggunaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chemicals as $chemical)
                                <tr>
                                    <td>{{ $chemical->name }}</td>
                                    <td>{{ $data["chemical"][$chemical->name] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br>

                        <h3>Bahan-Bahan Lab</h3>
                        <table width="100%" class="table table-dark table-striped table-sm table-bordered table-hover text-xs">
                            <thead>
                                <tr>
                                    <th>Bahan</th>
                                    <th>Satuan</th>
                                    <th>Penggunaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($consumables as $consumable)
                                <tr>
                                    <td>{{ $consumable->name }}</td>
                                    <td>{{ $consumable->unit }}</td>
                                    <td>{{ $data["consumable"][$consumable->name]}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br>

                        <h3>Posbrix</h3>
                        <table width="100%" class="table table-dark table-striped table-sm table-bordered table-hover text-xs">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Rerata</th>
                                    <th>Jumlah</th>
                                    <th>Ditolak</th>
                                    <th>Diterima</th>
                                    <th>Terbakar</th>
                                    <th>Lolos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Core Sample</td>
                                    <td>{{ $data["posbrix"]["brix_core_sample"] }}</td>
                                    <td>{{ $data["posbrix"]["jumlah_core_sample"] }}</td>
                                    <td>{{ $data["posbrix"]["ditolak_core_sample"] }}</td>
                                    <td>{{ $data["posbrix"]["diterima_core_sample"] }}</td>
                                    <td>{{ $data["posbrix"]["terbakar_core_sample"] }}</td>
                                    <td>{{ $data["posbrix"]["lolos_core_sample"] }}</td>
                                </tr>
                                <tr>
                                    <td>Magersari</td>
                                    <td>{{ $data["posbrix"]["brix_magersari"] }}</td>
                                    <td>{{ $data["posbrix"]["jumlah_magersari"] }}</td>
                                    <td>{{ $data["posbrix"]["ditolak_magersari"] }}</td>
                                    <td>{{ $data["posbrix"]["diterima_magersari"] }}</td>
                                    <td>{{ $data["posbrix"]["terbakar_magersari"] }}</td>
                                    <td>{{ $data["posbrix"]["lolos_magersari"] }}</td>
                                </tr>
                                <tr>
                                    <td>Engkel Besar & Gandeng</td>
                                    <td>{{ $data["posbrix"]["brix_gandeng"] }}</td>
                                    <td>{{ $data["posbrix"]["jumlah_gandeng"] }}</td>
                                    <td>{{ $data["posbrix"]["ditolak_gandeng"] }}</td>
                                    <td>{{ $data["posbrix"]["diterima_gandeng"] }}</td>
                                    <td>{{ $data["posbrix"]["terbakar_gandeng"] }}</td>
                                    <td>{{ $data["posbrix"]["lolos_gandeng"] }}</td>
                                </tr>
                                <tr>
                                    <td>Keseluruhan</td>
                                    <td>{{ $data["posbrix"]["brix_total"] }}</td>
                                    <td>{{ $data["posbrix"]["jumlah_total"] }}</td>
                                    <td>{{ $data["posbrix"]["ditolak_total"] }}</td>
                                    <td>{{ $data["posbrix"]["diterima_total"] }}</td>
                                    <td>{{ $data["posbrix"]["terbakar_total"] }}</td>
                                    <td>{{ $data["posbrix"]["lolos_total"] }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <br>

                        <h3>ARI Core Sample</h3>
                        <table width="100%" class="table table-dark table-striped table-sm table-bordered table-hover text-xs">
                            <thead>
                                <tr>
                                    <th>%Brix</th>
                                    <th>%Pol</th>
                                    <th>%Rendemen</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $data["core_sample"]["pbrix"] }}</td>
                                    <td>{{ $data["core_sample"]["ppol"] }}</td>
                                    <td>{{ $data["core_sample"]["rendemen"] }}</td>
                                    <td>{{ $data["core_sample"]["jumlah"] }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <br>

                        <h3>ARI Gilingan Mini</h3>
                        <table width="100%" class="table table-dark table-striped table-sm table-bordered table-hover text-xs">
                            <thead>
                                <tr>
                                    <th>%Brix</th>
                                    <th>%Pol</th>
                                    <th>%Rendemen</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $data["ari"]["pbrix"] }}</td>
                                    <td>{{ $data["ari"]["ppol"] }}</td>
                                    <td>{{ $data["ari"]["rendemen"] }}</td>
                                    <td>{{ $data["ari"]["jumlah"] }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <br>

                        <h3>Penilaian MBS</h3>
                        <table width="100%" class="table table-dark table-striped table-sm table-bordered table-hover text-xs">
                            <thead>
                                <tr>
                                    @foreach ($dirts as $dirt)
                                    <th>{{ $dirt->name }}</th>
                                    @endforeach
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($dirts as $dirt)
                                    <td>{{ $data["score"][$dirt->name] }}</td>
                                    @endforeach
                                    <td>{{ $data["score"]["jumlah"] }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="col-6 table-responsive">
                        <br>
                        <h3>Keliling Proses</h3>
                        <table width="100%" class="table table-dark table-striped table-sm table-bordered table-hover text-xs">
                            <thead>
                                <tr>
                                    <th>Titik</th>
                                    <th>Rerata</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kspots as $kspot)
                                <tr>
                                    <td>{{ $kspot->name }}</td>
                                    <td>{{ $data["keliling"][$kspot->name]}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
        </div>

        <br>

{{-- @endif --}}
