{{-- <p>Dalam perbaikan</p> --}}
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="refresh" content="5;URL='{{ route('view_ari') }}'">

<head>

    @include('layouts.head')

</head>

<body class="bg-gradient-secondary">

    <div class="container">

        <br>
        <h1 class="text-xl text-white text-center">Monitoring Analisa Rendemen</h1>

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-header">
                        <h3>Analisa Rendemen</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <table class="table table-sm table-bordered table-striped table-dark">
                                        <tr>
                                            <th>Nomor Sampel</th>
                                            <th>Kategori</th>
                                            <th>Antrian</th>
                                            <th>Nopol</th>
                                            <th>Timestamp</th>
                                            <th>Brix</th>
                                            <th>Pol</th>
                                            <th>R</th>
                                        </tr>
                                        @foreach($ari_sampling as $ari_sampling)
                                        <tr>
                                            <td>{{ $ari_sampling->id }}</td>
                                            <td>{{ $ari_sampling->category }}</td>
                                            <td>{{ $ari_sampling->rit->barcode_antrian }}</td>
                                            <td>{{ $ari_sampling->rit->nopol }}</td>
                                            <td>{{ $ari_sampling->created_at }}</td>
                                            <td>
                                                @foreach($ari_sampling->ari as $ari)
                                                    {{ $ari->pbrix }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($ari_sampling->ari as $ari)
                                                    {{ $ari->ppol }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($ari_sampling->ari as $ari)
                                                    {{ $ari->yield }}
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

    @include('layouts.script')

</body>

</html>
