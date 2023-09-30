@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="m-0 font-weight-bold text-primary">Masakan Turun</h4>
    </div>

    @include("components.alert_block")

    <!-- Content Row -->
    <div class="row">

        @for($y=0; $y<count($masakan_turun); $y++)
        <div class="col-lg-3 mb-4">
            <div class="card bg-dark text-white text-sm shadow">
                <div class="card-body">
                    <div class="font-weight-bold text-light text-uppercase mb-1">
                        {{ $masakan_turun[$y]["name"] }} Turun
                    </div>
                    <div class="table-responsive">
                        <table width="100%" class="table table-sm table-hovered table-bordered text-light text-left">
                            <tr>
                                <th>Time</td>
                                <th>Volume<sub>(HL)</sub></td>
                            </tr>
                            <tr>
                                <td>{{ ucfirst("harian") }}</td>
                                <td>{{ $masakan_turun[$y]["volume"]["harian"] }}</td>
                            </tr>
                            <tr>
                                <td>{{ ucfirst("pagi") }}</td>
                                <td>{{ $masakan_turun[$y]["volume"]["pagi"] }}</td>
                            </tr>
                            <tr>
                                <td>{{ ucfirst("sore") }}</td>
                                <td>{{ $masakan_turun[$y]["volume"]["sore"] }}</td>
                            </tr>
                            <tr>
                                <td>{{ ucfirst("malam") }}</td>
                                <td>{{ $masakan_turun[$y]["volume"]["malam"] }}</td>
                            </tr>
                            @for($i=0; $i<24; $i++)
                            <tr>
                                <td>{{ date("H:i", strtotime($timeframe[$i])) }} - {{ date("H:i", strtotime($timeframe[$i+1])) }}</td>
                                <td>{{ $masakan_turun[$y]["volume"][$i] }}</td>
                            </tr>
                            @endfor
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

