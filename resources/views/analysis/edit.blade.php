@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <x-alert_block></x-alert_block>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst('analisa') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('analyses.update', $analysis->id) }}" method="POST">
            @csrf
            @method('PUT')

                @foreach ($indicators as $indicator)
                    @include("components.input",[
                        "label"     => $indicator->name,
                        "name"      => $indicator->name,
                        "type"      => "number",
                        "value"     => $analysis->{$indicator->name},
                        "modifier"  => "",
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

