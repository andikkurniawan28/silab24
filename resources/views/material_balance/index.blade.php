@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="m-0 font-weight-bold text-primary">Material Balance</h4>
    </div>

    @include("components.alert_block")

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-12 mb-4">
            <div class="card bg-dark text-white text-sm shadow">
                <div class="card-body">
                    <div class="font-weight-bold text-light text-uppercase mb-1">
                        Material Balance
                    </div>
                    <div class="table-responsive">
                        <table width="100%" class="table table-sm table-hovered table-bordered text-light text-left">
                            <tr>
                                <th>Time</td>
                                <th>Tebu<sub>(Ku)</sub></td>
                                <th>NM<sub>(m<sup>3</sup>)</sub></td>
                                <th>SFC<sub>(m<sup>3</sup>)</sub></td>
                                <th>Imbibisi<sub>(m<sup>3</sup>)</sub></td>
                            </tr>
                            @foreach($material_balance as $material_balance)
                            <tr>
                                <td>{{ date("H:i", strtotime($material_balance->created_at)) }}</td>
                                <td>{{ $material_balance->tebu }}</td>
                                <td>{{ $material_balance->flow_nm }}</td>
                                <td>{{ $material_balance->sfc }}</td>
                                <td>{{ $material_balance->flow_imb }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <br>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

