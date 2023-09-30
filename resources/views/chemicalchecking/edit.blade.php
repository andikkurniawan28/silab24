@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <x-alert_block></x-alert_block>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst('Penggunaan BPP') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('chemicalcheckings.update', $chemicalchecking->id) }}" method="POST">
            @csrf
            @method('PUT')

                @foreach ($chemicals as $chemical)
                    @include("components.input7",[
                        "label"     => $chemical->name,
                        "name"      => $chemical->name,
                        "type"      => "number",
                        "value"     => $chemicalchecking->{$chemical->name},
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

