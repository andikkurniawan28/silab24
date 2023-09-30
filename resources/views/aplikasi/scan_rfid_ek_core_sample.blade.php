<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.head')

</head>

<body class="bg-gradient-danger">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                @if($message = Session::get('error'))
                <br>
                    @include('components.alert', ['message'=>$message, 'color'=>'danger'])
                @endif

                @if ($errors->any())
                <br>
                    <div class="alert alert-danger">
                        <p>Error :</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Pos Brix EK Core Sample</h1>
                                    </div>
                                    <form class="user" action="{{ route('scan_rfid_core_sample_ek_process') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                        <div class="form-group">
                                            <label for="spta" class="col-auto col-form-label">E-SPTA</label>
                                            <input type="text" class="text-lg form-control form-control-user"
                                                id="spta" name="spta" placeholder="Tap Kartu E-SPTA" maxlength="8" minlength="8" autofocus required>
                                            <input type="hidden" name="category" value="CS">
                                            <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                                        </div>
                                    </form>
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
