@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <x-alert_block></x-alert_block>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst('Taksasi') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('tactivities.update', $tactivity->id) }}" method="POST">
            @csrf
            @method('PUT')

                @foreach ($tspots as $tspot)
                    @include("components.input7",[
                        "label"     => $tspot->name,
                        "name"      => $tspot->name,
                        "type"      => "number",
                        "value"     => $tactivity->{$tspot->name},
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

