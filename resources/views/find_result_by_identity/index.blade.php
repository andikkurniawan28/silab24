@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

     <!-- Content Row -->
     <div class="row">

        <div class="col-lg-4 mb-4">
            <div class="card bg-dark text-white shadow">
                <div class="card-body">
                    <div class="font-weight-bold text-light text-uppercase mb-1">
                        Cari Data
                    </div>
                    <hr>
                    <form action="{{ route('find_result_by_identity_process') }}" method="POST" target="_blank">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <div class="input-group">
                                <input id="text1" name="id" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <select class="form-control" name="type">
                                    <option value="spta">SPTA</option>
                                    <option value="barcode_antrian">Nomor Antrian</option>
                                    <option value="nopol">Nopol</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="handling" value="print" class="btn btn-warning text-dark">Print <i class='fas fa-print'></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

     </div>

</div>

@endsection
