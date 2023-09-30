@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="m-0 font-weight-bold text-primary">{{ $title }}</h3>
    </div>

    <x-alert_block></x-alert_block>

    <!-- Content Row -->
    <div class="row">

        @for($i=0; $i<count($materials); $i++)
        <div class="col-lg-6 mb-4">
            <div class="card bg-gradient-dark text-white text-sm shadow">
                <div class="card-body">
                    <div class="font-weight-bold text-light text-uppercase mb-1 text-lg">
                        <a href="{{ route("sample_result", $materials[$i]["id"]) }}" class="text-light">
                            {{ $materials[$i]->name }}
                        </a>
                    </div>
                    <div class="table-responsive">
                        <br>
                        <table width="100%" class="table table-sm table-hovered table-bordered text-light text-left">
                            <tr>
                                <th>ID</th>
                                <th>Time</th>
                                @foreach ($materials[$i]->method as $method)
                                <th>{{ $method->indicator->name }}</th>
                                @endforeach
                            </tr>
                            @foreach($materials[$i]["analysis"] as $analysis)
                            <tr>
                                <td>{{ $analysis["id"] }}</td>
                                <td>{{ date("H:i", strtotime($analysis["created_at"])) }}</td>
                                @foreach ($materials[$i]->method as $method)
                                <td>{{ $analysis[$method->indicator->name] }}</th>
                                @endforeach
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        @endfor

    </div>

</div>
@endsection

