{{-- <p>Dalam perbaikan</p> --}}
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="refresh" content="5;URL='{{ route('view_arisampling') }}'">

<head>

    @include('layouts.head')

</head>

<body class="bg-gradient-info">

    <div class="container">

        <br>
        <h1 class="text-xl text-white text-center">Monitoring Pengambilan Contoh ARI</h1>
        <h1 class="text-white" align="right"><div id = "clock" onload="currentTime()"></div></h1>


        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-header">
                        <h3>Engkel Besar</h3>
                    </div>

                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                <div class="table-responsive">

                                    {{-- <table class="table table-sm table-bordered table-striped table-dark">
                                        <tr>
                                            <th colspan="3">Jumlah Pengambilan Sampel</th>
                                        </tr>
                                        <tr>
                                            <th>Hari Ini</th>
                                            <td>{{ $eb_today }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kemarin</th>
                                            <td>{{ $eb_yesterday }}</td>
                                        </tr>
                                        <tr>
                                            <th>SD Hari Ini</th>
                                            <td>{{ $eb_until_today }}</td>
                                        </tr>
                                    </table> --}}

                                    <table class="table table-sm table-bordered table-striped table-dark">
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Time</th>
                                            <th>Antrian</th>
                                            <th>Nopol</th>
                                            <th>B</th>
                                            <th>P</th>
                                        </tr>
                                        @foreach($eb as $eb)
                                        <tr>
                                            <td>{{ $eb->id }}</td>
                                            <td>{{ date('H:i:s', strtotime($eb->created_at)) }}</td>
                                            <td>{{ $eb->rit->barcode_antrian }}</td>
                                            <td>{{ $eb->rit->nopol }}</td>
                                            <td>
                                                @foreach($eb->ari as $eb_ari)
                                                    {{ $eb_ari->pbrix }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($eb->ari as $eb_ari)
                                                    {{ $eb_ari->ppol }}
                                                @endforeach
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-header">
                        <h3>Engkel Kecil</h3>
                    </div>

                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                <div class="table-responsive">

                                    {{-- <table class="table table-sm table-bordered table-striped table-dark">
                                        <tr>
                                            <th colspan="3">Jumlah Pengambilan Sampel</th>
                                        </tr>
                                        <tr>
                                            <th>Hari Ini</th>
                                            <td>{{ $ek_today }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kemarin</th>
                                            <td>{{ $ek_yesterday }}</td>
                                        </tr>
                                        <tr>
                                            <th>SD Hari Ini</th>
                                            <td>{{ $ek_until_today }}</td>
                                        </tr>
                                    </table> --}}

                                    <table class="table table-sm table-bordered table-striped table-dark">
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Time</th>
                                            <th>Antrian</th>
                                            <th>Nopol</th>
                                            <th>B</th>
                                            <th>P</th>
                                        </tr>
                                        @foreach($ek as $ek)
                                        <tr>
                                            <td>{{ $ek->id }}</td>
                                            <td>{{ date('H:i:s', strtotime($ek->created_at)) }}</td>
                                            <td>{{ $ek->rit->barcode_antrian }}</td>
                                            <td>{{ $ek->rit->nopol }}</td>
                                            <td>
                                                @foreach($ek->ari as $ek_ari)
                                                    {{ $ek_ari->pbrix }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($ek->ari as $ek_ari)
                                                    {{ $ek_ari->ppol }}
                                                @endforeach
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>

    @include('layouts.script')
    <script>
        function currentTime() {
        let date = new Date();
        let hh = date.getHours();
        let mm = date.getMinutes();
        let ss = date.getSeconds();
        // let session = "AM";

        // if(hh === 0){
        //     hh = 12;
        // }
        // if(hh > 12){
        //     hh = hh - 12;
        //     session = "PM";
        // }

        // hh = (hh < 10) ? "0" + hh : hh;
        // mm = (mm < 10) ? "0" + mm : mm;
        // ss = (ss < 10) ? "0" + ss : ss;

        // let time = hh + ":" + mm + ":" + ss + " " + session;
        let time = hh + ":" + mm + ":" + ss;

        document.getElementById("clock").innerText = time;
        let t = setTimeout(function(){ currentTime() }, 1000);
        }

        currentTime();
    </script>

</body>

</html>
