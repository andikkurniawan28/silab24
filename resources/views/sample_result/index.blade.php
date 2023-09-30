@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <x-alert_block></x-alert_block>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ $material }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</td>
                            <th>Time</td>
                            @foreach($methods as $method)
                            <th>{{ $method->indicator->name }}</td>
                            @endforeach
                            @if($material_id >= 43 && $material_id <= 49 )
                            <th>Pan</td>
                            <th>Hl</td>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($samples as $sample)
                        <tr>
                            <td>{{ $sample->id }}</td>
                            <td>{{ $sample->created_at }}</td>
                            @foreach($methods as $method)
                            <td>{{ $sample->{$method->indicator->name} }}</td>
                            @endforeach
                            @if($material_id >= 43 && $material_id <= 49 )
                            <td>{{ $sample->pan }}</td>
                            <td>{{ $sample->volume }}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

