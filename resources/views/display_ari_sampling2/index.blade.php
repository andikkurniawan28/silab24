{{-- <p>Dalam perbaikan</p> --}}
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="refresh" content="3;URL='{{ route('display_ari_sampling2') }}'">

<head>

    @include('layouts.head')

</head>

<body class="bg-gradient-secondary">

    <div class="container">

        <br>
        <h1 class="text-xl text-white text-center">Monitoring Pengambilan Contoh ARI</h1>
        <h1 class="text-white" align="right"><div id = "clock" onload="currentTime()"></div></h1>

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-header">
                        <h3>Sampling ARI 2</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <table class="table table-sm table-bordered table-striped table-dark">
                                        <tr>
                                            <th>Nomor Sampel</th>
                                            <th>Timestamp</th>
                                            <th>Antrian</th>
                                            <th>#</th>
                                            <th>Nopol</th>
                                            <th>%Brix</th>
                                            <th>%Pol</th>
                                            {{-- <th>%R</th> --}}
                                        </tr>
                                        @foreach($rits as $rit)
                                        <tr>
                                            <td>
                                                @foreach($rit->ari_sampling as $ari_sampling)
                                                {{ $ari_sampling->id }}
                                                @endforeach
                                            </td>
                                            <td>{{ $rit->updated_at }}</td>
                                            <td>{{ $rit->barcode_antrian }}</td>
                                            <td>{{ $rit->category }}</td>
                                            <td>{{ $rit->nopol }}</td>
                                            <td>
                                                @foreach($rit->ari_sampling as $ari_sampling)
                                                    @foreach($ari_sampling->ari as $ari)
                                                    {{ $ari->pbrix }}
                                                    @endforeach
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($rit->ari_sampling as $ari_sampling)
                                                    @foreach($ari_sampling->ari as $ari)
                                                    {{ $ari->ppol }}
                                                    @endforeach
                                                @endforeach
                                            </td>
                                            {{-- <td>
                                                @foreach($rit->ari_sampling as $ari_sampling)
                                                    @foreach($ari_sampling->ari as $ari)
                                                    {{ $ari->yield }}
                                                    @endforeach
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
