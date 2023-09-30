<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.head')

</head>

<body class="bg-gradient-warning">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Pos Brix</h1>
                                    </div>
                                    <form class="user" action="{{ route('process_rfid') }}" method="POST">
                                    @csrf
                                    @method('POST')

                                        <div class="form-group">
                                            <label for="spta" class="col-auto col-form-label">E-SPTA</label>
                                            <input type="text" class="form-control" id="spta" name="spta" value="{{ $spta }}" maxlength="10" readonly>
                                            <input type="hidden" class="form-control" id="category" name="category" value="{{ $category }}" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="brix" class="col-auto col-form-label">Brix</label><br>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                @for($i=5; $i<=20; $i++)
                                                <label class="btn
                                                @if($i < 10)
                                                {{ 'btn-outline-danger' }}
                                                @else
                                                {{ 'btn-outline-primary' }}
                                                @endif
                                                 btn-toggle  btn-md">
                                                    <input type="radio" name="brix" id="brix" autocomplete="off" value="{{ $i }}"
                                                    @if($i == 15)
                                                    {{ 'checked' }}
                                                    @endif
                                                    > {{ $i }}
                                                </label>
                                                @endfor
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="variety" class="col-auto col-form-label">Varietas</label><br>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                @foreach($varieties as $variety)
                                                <label class="btn btn-outline-primary btn-toggle  btn-md">
                                                    <input type="radio" name="variety_id" id="variety_id" autocomplete="off" value="{{ $variety->id }}"
                                                    @if($variety->id == 10)
                                                    {{ 'checked' }}
                                                    @endif
                                                    > {{ $variety->name }}
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="kawalan" class="col-auto col-form-label">Kawalan</label><br>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                @foreach($kawalans as $kawalan)
                                                <label class="btn btn-outline-primary btn-toggle  btn-md">
                                                    <input type="radio" name="kawalan_id" id="kawalan_id" autocomplete="off" value="{{ $kawalan->id }}"
                                                    @if($kawalan->id == 1)
                                                    {{ 'checked' }}
                                                    @endif
                                                    > {{ $kawalan->name }}
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputState">Status</label><br>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                @for($i=0; $i<=2; $i++)
                                                <label class="btn
                                                @if($i == 0)
                                                {{ 'btn-outline-danger' }}
                                                @else
                                                {{ 'btn-outline-primary' }}
                                                @endif
                                                 btn-toggle  btn-md">
                                                    <input type="radio" name="is_accepted" id="is_accepted" autocomplete="off" value="{{ $i }}"
                                                        @if($i == 1)
                                                        {{ 'checked' }}
                                                        @endif
                                                    >
                                                        @if($i == 0)
                                                        {{ 'Ditolak' }}
                                                        @elseif($i == 2)
                                                        {{ 'Terbakar' }}
                                                        @elseif($i == 3)
                                                        {{ 'Lolos' }}
                                                        @else
                                                        {{ 'Diterima' }}
                                                    @endif
                                                </label>
                                                @endfor
                                            </div>
                                        </div>

                                        <br><br>
                                        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                                        <button type="submit" class="btn btn-dark btn-user btn-block">
                                            Simpan
                                        </button>
                                        <hr>
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
