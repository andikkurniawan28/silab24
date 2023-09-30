@extends('layouts.app')

@section('content')
<div class="container-fluid">

    @include("components.alert_block")

    <div class="row">

        @foreach ($kuds as $kud)

        <div class="col-lg-3 md-3 mb-4">
            <div class="card bg-dark text-white text-xs shadow">
                <div class="card-body">
                    <div class="font-weight-bold text-light text-uppercase mb-1">
                        {{ $kud->name }}
                    </div>
                    <button type="button" class="btn btn-warning text-dark btn-sm" data-toggle="modal" data-target="#create{{ $kud->id }}">
                        @include('components.icon', ['icon' => 'print '])
                            Cetak
                    </button>
                    <br>
                </div>
            </div>
        </div>

        <div class="modal fade" id="create{{ $kud->id }}" tabindex="-1" kud="dialog" aria-labelledby="create{{ $kud->id }}Label" aria-hidden="true">
            <div class="modal-dialog" kud="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="create{{ $kud->id }}Label">Cetak Sampel {{ $kud->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('analisa_pendahuluans.store') }}" class="text-dark">
                        @csrf @method('POST')
                        <input type="hidden" name="kud_id" value="{{ $kud->id }}" readonly>
                        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" readonly>
                        @include('components.input',[
                            'label' => 'Register',
                            'name' => 'register',
                            'type' => 'text',
                            'value' => '',
                            'modifier' => 'required',
                        ])
                        @include('components.input',[
                            'label' => 'Berat Tebu',
                            'name' => 'berat_tebu',
                            'type' => 'number',
                            'value' => '',
                            'modifier' => 'required',
                        ])
                        @include('components.input',[
                            'label' => 'Berat Nira',
                            'name' => 'berat_nira',
                            'type' => 'number',
                            'value' => '',
                            'modifier' => 'required',
                        ])
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"  onclick="this.form.submit(); this.disabled=true;" target="_blank">Save
                            @include('components.icon', ['icon' => 'create'])
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </div>

</div>

@endsection

