{{-- <p>Dalam perbaikan</p> --}}
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="refresh" content="3;URL='{{ route('display_core_sample') }}'">

<head>

    @include('layouts.head')

</head>

<body class="bg-gradient-warning">

    <div class="container">

        <br>
        <h1 class="text-xl text-white text-center">Monitoring Core Sample</h1>
        <h1 class="text-white" align="right"><div id = "clock" onload="currentTime()"></div></h1>

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-header">
                        <h3>Core Sample</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <table class="table table-sm table-bordered table-striped table-dark">
                                        <tr>
                                            <th>Nomor Sampel</th>
                                            <th>Timestamp</th>
                                            <th>SPTA</th>
                                            {{-- <th>Antrian</th> --}}
                                            <th>Posbrix</th>
                                            <th>Brix</th>
                                            <th>Pol</th>
                                            {{-- <th>R</th> --}}
                                        </tr>
                                        @foreach($ari_sampling as $ari_sampling)
                                        <tr>
                                            <td>{{ $ari_sampling->id }}</td>
                                            <td>{{ $ari_sampling->created_at }}</td>
                                            <td>{{ $ari_sampling->rit->spta }}</td>
                                            {{-- <td>{{ $ari_sampling->rit->barcode_antrian ?? '-' }}</td> --}}
                                            <td>{{ $ari_sampling->rit->posbrix->brix ?? '-' }}</td>
                                            <td>
                                                @foreach($ari_sampling->core_sample as $core_sample)
                                                    {{ $core_sample->pbrix }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($ari_sampling->core_sample as $core_sample)
                                                    {{ $core_sample->ppol }}
                                                @endforeach
                                            </td>
                                            {{-- <td>
                                                @foreach($ari_sampling->core_sample as $core_sample)
                                                    {{ $core_sample->yield }}
                                                @endforeach
                                            </td> --}}
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
