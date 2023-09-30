@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="m-0 font-weight-bold text-primary">Timbangan in Proses</h4>
    </div>

    @include("components.alert_block")

    <!-- Content Row -->
    <div class="row">

        @php $title = ["Raw Sugar Diolah", "Raw Sugar Output", "Tetes"]; @endphp
        @php $name = ["rs_in", "rs_out", "tetes"]; @endphp
        @for($x=0; $x<count($name); $x++)
        <div class="col-lg-4 mb-4">
            <div class="card bg-dark text-white text-sm shadow">
                <div class="card-body">
                    <div class="font-weight-bold text-light text-uppercase mb-1">
                        {{ $title[$x] }}
                    </div>
                    <div class="table-responsive">
                        <table width="100%" class="table table-sm table-hovered table-bordered text-light text-left">
                            <tr>
                                <th>Time</td>
                                <th>Netto<sub>(Kg)</sub></td>
                            </tr>
                            <tr>
                                <td>{{ ucfirst("harian") }}</td>
                                <td>{{ $timbangan[$name[$x]]["harian"] }}</td>
                            </tr>
                            <tr>
                                <td>{{ ucfirst("pagi") }}</td>
                                <td>{{ $timbangan[$name[$x]]["pagi"] }}</td>
                            </tr>
                            <tr>
                                <td>{{ ucfirst("sore") }}</td>
                                <td>{{ $timbangan[$name[$x]]["sore"] }}</td>
                            </tr>
                            <tr>
                                <td>{{ ucfirst("malam") }}</td>
                                <td>{{ $timbangan[$name[$x]]["malam"] }}</td>
                            </tr>
                            @for($i=0; $i<24; $i++)
                            <tr>
                                <td>{{ date("H:i", strtotime($timeframe[$i])) }} - {{ date("H:i", strtotime($timeframe[$i+1])) }}</td>
                                <td>{{ $timbangan[$name[$x]][$i] }}</td>
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

