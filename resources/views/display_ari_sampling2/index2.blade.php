{{-- <p>Dalam perbaikan</p> --}}
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="refresh" content="3;URL='{{ route('test_display_baru') }}'">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.8, shrink-to-fit=no">
    <meta name="description" content="{{ env("APP_NAME") }}">
    <meta name="author" content="Andik Kurniawan">

    <title>{{ env('APP_NAME') }}</title>
	<link rel="icon" type="image/png" href="/Silab-v3/public/admin_template/img/QC.png"/>
    <link href="/Silab-V3/public/admin_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/Silab-V3/public/admin_template/css/sb-admin-2.min.css" rel="stylesheet">
    {{-- @include('layouts.head') --}}

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
                        <h3>Sampling ARI 3</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <table class="table table-sm table-bordered table-striped table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Nomor Sampel</th>
                                            <th>Timestamp</th>
                                        </tr>
                                        @foreach($data as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->updated_at }}</td>
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
