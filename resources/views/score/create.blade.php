@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route("home") }}">{{ ucfirst("home") }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route("scores.index") }}">{{ ucfirst("score") }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah {{ ucfirst("score") }}</li>
      </ol>
    </nav>

    @include("components.alert_block")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tambah {{ ucfirst('score') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('scores.store') }}" method="POST">
                @csrf @method('POST')
                <input hidden name="user_id" value="{{ Auth()->user()->id }}" readonly>
                @include('components.input',[
                    'label' => 'Antrian',
                    'name' => 'barcode_antrian',
                    'type' => 'text',
                    'value' => NULL,
                    'modifier' => 'required autofocus',
                ])
                @include('components.input',[
                    'label' => 'Meja Tebu',
                    'name' => 'cane_table',
                    'type' => 'number',
                    'value' => NULL,
                    'modifier' => 'required',
                ])
                @foreach($dirts as $dirt)
                    @include('components.input',[
                        'label' => $dirt->name,
                        'name' => $dirt->name,
                        'type' => 'number',
                        'value' => NULL,
                        'modifier' => NULL,
                    ])
                @endforeach
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

