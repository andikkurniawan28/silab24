@extends('layouts.app')

@section('content')
<div class="container-fluid">

    @include("components.alert_block")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit Analisa Pendahuluan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('analisa_pendahuluans.update', $analisa_pendahuluan->id) }}" method="POST">
            @csrf
            @method('PUT')
                <input hidden name="user_id" value="{{ Auth()->user()->id }}" readonly>

                @include('components.input',[
                    'label' => 'ID',
                    'name' => 'id',
                    'type' => 'number',
                    'value' => $analisa_pendahuluan->id,
                    'modifier' => 'readonly',
                ])

                @include('components.input',[
                    'label' => 'Register',
                    'name' => 'register',
                    'type' => 'text',
                    'value' => $analisa_pendahuluan->register,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Berat Tebu',
                    'name' => 'berat_tebu',
                    'type' => 'number',
                    'value' => $analisa_pendahuluan->berat_tebu,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Berat Nira',
                    'name' => 'berat_nira',
                    'type' => 'number',
                    'value' => $analisa_pendahuluan->berat_nira,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => '%Brix Atas',
                    'name' => 'pbrix_atas',
                    'type' => 'number',
                    'value' => $analisa_pendahuluan->pbrix_atas,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => '%Pol Atas',
                    'name' => 'ppol_atas',
                    'type' => 'number',
                    'value' => $analisa_pendahuluan->ppol_atas,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Pol Atas',
                    'name' => 'pol_atas',
                    'type' => 'number',
                    'value' => $analisa_pendahuluan->pol_atas,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Rendemen Atas',
                    'name' => 'rendemen_atas',
                    'type' => 'number',
                    'value' => $analisa_pendahuluan->rendemen_atas,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => '%Brix Tengah',
                    'name' => 'pbrix_tengah',
                    'type' => 'number',
                    'value' => $analisa_pendahuluan->pbrix_tengah,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => '%Pol Tengah',
                    'name' => 'ppol_tengah',
                    'type' => 'number',
                    'value' => $analisa_pendahuluan->ppol_tengah,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Pol Tengah',
                    'name' => 'pol_tengah',
                    'type' => 'number',
                    'value' => $analisa_pendahuluan->pol_tengah,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Rendemen Tengah',
                    'name' => 'rendemen_tengah',
                    'type' => 'number',
                    'value' => $analisa_pendahuluan->rendemen_tengah,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => '%Brix Bawah',
                    'name' => 'pbrix_bawah',
                    'type' => 'number',
                    'value' => $analisa_pendahuluan->pbrix_bawah,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => '%Pol Bawah',
                    'name' => 'ppol_bawah',
                    'type' => 'number',
                    'value' => $analisa_pendahuluan->ppol_bawah,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Pol Bawah',
                    'name' => 'pol_bawah',
                    'type' => 'number',
                    'value' => $analisa_pendahuluan->pol_bawah,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Rendemen Bawah',
                    'name' => 'rendemen_bawah',
                    'type' => 'number',
                    'value' => $analisa_pendahuluan->rendemen_bawah,
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

