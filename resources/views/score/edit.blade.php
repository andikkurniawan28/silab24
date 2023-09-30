@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route("home") }}">{{ ucfirst("home") }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route("aris.index") }}">ARI {{ ucfirst("Gilingan Mini") }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("Gilingan Mini") }}</li>
      </ol>
    </nav>

    @include("components.alert_block")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst('Gilingan Mini') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('aris.update', $ari->id) }}" method="POST">
                @csrf @method('PUT')
                <input hidden name="user_id" value="{{ Auth()->user()->id }}" readonly>
                @include('components.input',[
                    'label' => 'ID',
                    'name' => 'id',
                    'type' => 'number',
                    'value' => $ari->id,
                    'modifier' => 'readonly',
                ])
                @include('components.input',[
                    'label' => 'Rendemen',
                    'name' => 'yield',
                    'type' => 'number',
                    'value' => $ari->yield,
                    'modifier' => 'required autofocus',
                ])
                @include('components.input',[
                    'label' => '%Brix',
                    'name' => 'pbrix',
                    'type' => 'number',
                    'value' => $ari->pbrix,
                    'modifier' => 'required',
                ])
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save
                        @include('components.icon', ['icon' => 'save'])
                    </button>
                </div>
            </form>
        </div>
        <div class="card-footer">

        </div>
    </div>
</div>

@endsection
