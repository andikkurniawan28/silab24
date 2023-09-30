@extends('layouts.app')

@section('content')
<div class="container-fluid">

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst('balance Nira Mentah') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("balances.update", $balance->id) }}" method="POST">
                @csrf
                @method("PUT")
                <p>
                    <label>{{ ucfirst("tebu") }}</label>
                    <input type="number" name="tebu" class="form-control" value="{{ $balance->tebu }}">
                </p>
                <p>
                    <label>{{ ucfirst("flow_nm") }}</label>
                    <input type="number" name="flow_nm" class="form-control" value="{{ $balance->flow_nm }}">
                </p>
                <p>
                    <label>{{ ucfirst("nm_persen_tebu") }}</label>
                    <input type="number" name="nm_persen_tebu" class="form-control" value="{{ $balance->nm_persen_tebu }}">
                </p>
                <p>
                    <label>{{ strtoupper("sfc") }}</label>
                    <input type="number" name="sfc" class="form-control" value="{{ $balance->sfc }}">
                </p>
                <p>
                    <button class="btn btn-primary" type="submit">{{ ucfirst("simpan") }}</button>
                </p>
            </form>
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>

@endsection

