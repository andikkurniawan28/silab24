{{-- @if(Auth()->user()->role_id > 1)
Dalam perbaikan, mohon menunggu...
@else --}}
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

        <title>{{ env('APP_NAME') }}</title>

        <link rel="icon" type="image/png" href="/admin_template/img/QC.png"/>
        <link href="/admin_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> --}}
        <link href="/admin_template/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="/admin_template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	</head>

	<body>

        @if($request->handling == 'export')
            @php
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=Laporan_Silab_".$request->date.".xls");
            @endphp
        @endif

        <div class="wrapper">

            <section class="invoice">

                <br></br>

                <div class="row d-flex justify-content-center text-dark text-dark">
                    <div class="col-10 table-responsive">
                        <table border='1' cellpadding='0' width='100%'>
                            <thead>
                                <tr>
                                    <th rowspan='2'><img class='rounded mx-auto d-block' src='/admin_template/img/ka.jpg' width="100" height="100"></img></th>
                                    <th colspan='3' class='text-center'>
                                        <H6><STRONG>PT. KEBON AGUNG UNIT PABRIK GULA KEBON AGUNG</STRONG></H6>
                                        <p><SMALL>FORMULIR</SMALL></p>
                                        <H4><STRONG>LAPORAN MANDOR OFF-FARM</STRONG></H4>
                                    </th>
                                    <th rowspan='2'><img class='rounded mx-auto d-block' src='/admin_template/img/QC.png' width="100" height="100"></img></th>
                                </tr>
                                <tr>
                                    <th class='text-center'>No Dok : KBA/FRM/QC/005-00</th>
                                    <th class='text-center'>Tanggal : {{ date('d-m-Y', strtotime(session("time_start"))) }}</th>
                                    <th class='text-center'>
                                        @switch($request->shift)
                                            @case(1)
                                                {{ 'Shift Pagi' }}
                                                @break
                                            @case(2)
                                                {{ 'Shift Sore' }}
                                                @break
                                            @case(3)
                                                {{ 'Shift Malam' }}
                                                @break
                                            @default
                                                {{ 'Harian' }}
                                                @break
                                        @endswitch
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            <br>

			<div class='row d-flex justify-content-center text-dark'>

			    <div class="col-5 table-responsive">

                    <h3 class="page-header">Material Balance</h3>
                    <table width='100%' border='1' cellpadding='5'>
                        <thead>
                            <tr bgcolor="pink">
                                <th>Tebu</th>
                                <th>NM</th>
                                <th>Imbibisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $balance["tebu"] }}</td>
                                <td>{{ $balance["flow_nm"] }}</td>
                                <td>{{ $balance["flow_imb"] }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>

                    <h3 class="page-header">Timbangan in Proses</h3>
                    <table width='100%' border='1' cellpadding='5'>
                        <thead>
                            <tr bgcolor="pink">
                                <th>Raw Sugar Diolah</th>
                                <th>Raw Sugar Output</th>
                                <th>Tetes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $rs_in["netto"] }}</td>
                                <td>{{ $rs_out["netto"] }}</td>
                                <td>{{ $tetes["netto"] }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>

                    @for($i=0; $i<count($data); $i+=2)
                    <h3 class="page-header">{{ $data[$i]["name"] }}</h3>
                    <table width='100%' border='1' cellpadding='5'>
                        <thead>
                            <tr bgcolor="pink">
                                <th>Uraian</th>
                                @if($i==0)
                                <th>%Brix</th>
                                <th>%Pol</th>
                                <th>HK</th>
                                <th>IU</th>
                                <th>%Air</th>
                                <th>SO<sub>2</sub></th>
                                @endif
                                @if($i==2 || $i==4)
                                <th>%Brix</th>
                                <th>%Pol</th>
                                <th>HK</th>
                                <th>IU</th>
                                <th>CaO</th>
                                <th>pH</th>
                                <th>Turbidity</th>
                                <th>Pol</th>
                                <th>%Air</th>
                                @endif
                                @if($i==6)
                                <th>%Brix</th>
                                <th>%Pol</th>
                                <th>HK</th>
                                <th>IU</th>
                                @endif
                                @if($i==8)
                                <th>%Brix</th>
                                <th>TSAI</th>
                                @endif
                                @if($i==10)
                                <th>IU</th>
                                <th>%Air</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @for($j=0; $j<count($data[$i]["material"]); $j++)
                            <tr>
                                <td>{{ $data[$i]["material"][$j]["name"] }}</td>
                                @if($i==0)
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Brix"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Pol"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["HK"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["IU"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Air"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["SO2"] }}</td>
                                @endif
                                @if($i==2 || $i==4)
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Brix"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Pol"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["HK"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["IU"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["CaO"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["pH"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["Turbidity"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["Pol"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Air"] }}</td>
                                @endif
                                @if($i==6)
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Brix"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Pol"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["HK"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["IU"] }}</td>
                                @endif
                                @if($i==8)
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Brix"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["TSAI"] }}</td>
                                @endif
                                @if($i==10)
                                <td>{{ $data[$i]["material"][$j]["analysis"]["IU"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Air"] }}</td>
                                @endif
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                    <br>
                    @endfor

                    <h3 class="page-header">Keliling Proses</h3>
                    <table width='100%' border='1' cellpadding='5'>
                        <thead>
                            <tr bgcolor="pink">
                                <th>Titik</th>
                                <th>Rerata</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kspots as $kspot)
                            <tr>
                                <td>{{ $kspot->name }}</td>
                                <td>{{ $keliling[$kspot->name] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>

			    </div>

			    <div class="col-5 table-responsive">
                    @for($i=1; $i<count($data); $i+=2)
                    <h3 class="page-header">{{ $data[$i]["name"] }}</h3>
                    <table width='100%' border='1' cellpadding='5'>
                        <thead>
                            <tr bgcolor="pink">
                                <th>Uraian</th>
                                @if($i==1)
                                <th>%Brix</th>
                                <th>%Pol</th>
                                <th>HK</th>
                                <th>%R</th>
                                <th>IU</th>
                                <th>pH</th>
                                <th>Pol</th>
                                <th>%ZK</th>
                                <th>%Air</th>
                                <th>PI</th>
                                <th>%Sabut</th>
                                @endif
                                @if($i==3)
                                <th>%Brix</th>
                                <th>%Pol</th>
                                <th>HK</th>
                                <th>IU</th>
                                <th>CaO</th>
                                <th>pH</th>
                                <th>Turbidity</th>
                                @endif
                                @if($i==5)
                                <th>Turun</th>
                                <th>Hl</th>
                                <th>%Brix</th>
                                <th>%Pol</th>
                                <th>HK</th>
                                <th>IU</th>
                                @endif
                                @if($i==7)
                                <th>%Brix</th>
                                <th>%Pol</th>
                                <th>HK</th>
                                <th>IU</th>
                                <th>%Air</th>
                                <th>SO<sub>2</sub></th>
                                @endif
                                @if($i==9)
                                <th>TDS</th>
                                <th>pH</th>
                                <th>Kesadahan</th>
                                <th>Phospat</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @for($j=0; $j<count($data[$i]["material"]); $j++)
                            <tr>
                                <td>{{ $data[$i]["material"][$j]["name"] }}</td>
                                @if($i==1)
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Brix"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Pol"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["HK"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%R"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["IU"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["pH"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["Pol_Ampas"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Zk"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Air"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["PI"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Sabut"] }}</td>
                                @endif
                                @if($i==3)
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Brix"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Pol"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["HK"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["IU"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["CaO"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["pH"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["Turbidity"] }}</td>
                                @endif
                                @if($i==5)
                                <td>{{ $data[$i]["material"][$j]["analysis"]["Jumlah"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["Volume"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Brix"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Pol"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["HK"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["IU"] }}</td>
                                @endif
                                @if($i==7)
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Brix"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Pol"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["HK"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["IU"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["%Air"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["SO2"] }}</td>
                                @endif
                                @if($i==9)
                                <td>{{ $data[$i]["material"][$j]["analysis"]["TDS"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["pH"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["Sadah"] }}</td>
                                <td>{{ $data[$i]["material"][$j]["analysis"]["P2O5"] }}</td>
                                @endif
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                    <br>
                    @endfor

                    <h3 class="page-header">Penggunaan BPP</h3>
                    <table width='100%' border='1' cellpadding='5'>
                        <thead>
                            <tr bgcolor="pink">
                                <th>Chemical</th>
                                <th>Penggunaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chemicals as $chemical)
                            <tr>
                                <td>{{ $chemical->name }}</td>
                                <td>{{ $penggunaan[$chemical->name] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>

                    <div class="row">
                        <div class="col-6">
                            <br><br>
                            <br><br>
                            <br><br>
                            <br><br>
                            <p class='text-center'>Mengetahui,</p>
                            <br></br><br></br>
                            <br></br>
                            <p class='text-center'><strong><u>--------</u></strong></p>
                            <p class='text-center'>Chemiker Jaga</p>
                        </div>
                        <div class="col-6">
                            <br><br>
                            <br><br>
                            <br><br>
                            <br><br>
                            <p class='text-center'>Kebonagung, {{ date('d-m-Y') }}</p>
                            <br></br><br></br>
                            <br></br>
                            <p class='text-center'><strong><u>{{ Auth()->user()->name }}</u></strong></p>
                            <p class='text-center'>Mandor QC</p>
                        </div>
                    </div>

			    </div>

			</div>

		  </section>
		  <!-- /.content -->
		</div>
		<!-- ./wrapper -->

		<script type="text/javascript">
		  window.addEventListener("load", window.print());
		</script>

	</body>
</html>
