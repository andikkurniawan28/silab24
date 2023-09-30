@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route("home") }}">{{ ucfirst("home") }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route("posbrixes.index") }}">{{ ucfirst("posbrix") }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("posbrix") }}</li>
      </ol>
    </nav>

    <x-alert_block></x-alert_block>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst('posbrix') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('posbrixes.update', $posbrix->id) }}" method="POST">
                @csrf @method('PUT')
                @include('components.input6',[
                    'label' => 'SPTA',
                    'name' => 'spta',
                    'type' => 'text',
                    'value' => $posbrix->spta,
                    'modifier' => 'required autofocus',
                ])
                @include('components.input6',[
                    'label' => 'Brix',
                    'name' => 'brix',
                    'type' => 'number',
                    'value' => $posbrix->brix,
                    'modifier' => 'required',
                ])
                <div class="form-group row">
                    <label for="category" class="col-sm-4 col-form-label">{{ ucfirst("category") }}</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="category">
                            <option value="CS" @if($posbrix->category == "CS") {{ "selected" }} @endif>{{ strtoupper("ek") }} Core Sample</option>
                            <option value="EK" @if($posbrix->category == "EK") {{ "selected" }} @endif>{{ strtoupper("ek") }} Magersari</option>
                            <option value="EB|GD" @if($posbrix->category == "EB|GD") {{ "selected" }} @endif>{{ strtoupper("eb/gd") }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="variety_id" class="col-sm-4 col-form-label">{{ ucfirst("varietas") }}</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="variety_id">
                            @foreach ($varieties as $variety)
                                <option value="{{ $variety->id }}"
                                    @if($posbrix->variety_id == $variety->id)
                                        {{ "selected" }}
                                    @endif
                                >{{ $variety->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kawalan_id" class="col-sm-4 col-form-label">{{ ucfirst("kawalan") }}</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="kawalan_id">
                            @foreach ($kawalans as $kawalan)
                                <option value="{{ $kawalan->id }}"
                                    @if($posbrix->kawalan_id == $kawalan->id)
                                        {{ "selected" }}
                                    @endif
                                >{{ $kawalan->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="is_accepted" class="col-sm-4 col-form-label">{{ ucfirst("status") }}</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="is_accepted">
                            <option value="1" @if($posbrix->is_accepted == 1) {{ "selected" }} @endif >{{ ucfirst("diterima") }}</option>
                            <option value="0" @if($posbrix->is_accepted == 0) {{ "selected" }} @endif >{{ ucfirst("ditolak") }}</option>
                            <option value="2" @if($posbrix->is_accepted == 2) {{ "selected" }} @endif >{{ ucfirst("terbakar") }}</option>
                            <option value="3" @if($posbrix->is_accepted == 3) {{ "selected" }} @endif >{{ ucfirst("lolos") }}</option>
                        </select>
                    </div>
                </div>
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

