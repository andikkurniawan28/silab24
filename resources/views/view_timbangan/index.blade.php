<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="refresh" content="3;URL='{{ route('view_timbangan') }}'">

<head>

    @include('layouts.head')

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <br>
        <h1 class="text-xl text-white text-center">Monitoring Tap Timbangan</h1>

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-header">
                        <h3>Tap Timbangan</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <table class="table table-sm table-bordered table-striped table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Timestamp</th>
                                            <th>RFID</th>
                                            <th>Antrian</th>
                                            <th>SPTA</th>
                                            <th>Brix</th>
                                            <th>Nopol</th>
                                        </tr>
                                        @foreach($rits as $rit)
                                        <tr>
                                            <td>{{ $rit->id }}</td>
                                            <td>{{ $rit->updated_at }}</td>
                                            <td>{{ $rit->rfid }}</td>
                                            <td>{{ $rit->barcode_antrian }}</td>
                                            <td>{{ $rit->posbrix->spta }}</td>
                                            <td>{{ $rit->posbrix->brix }}</td>
                                            <td>{{ $rit->nopol }}</td>
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

</body>

</html>
