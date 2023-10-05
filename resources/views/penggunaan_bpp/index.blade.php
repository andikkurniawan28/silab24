@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="m-0 font-weight-bold text-primary">Penggunaan Bahan Pembantu Proses</h4>
    </div>

    @include("components.alert_block")

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-12 mb-4">
            <div class="card bg-dark text-white text-sm shadow">
                <div class="card-body">
                    <div class="font-weight-bold text-light text-uppercase mb-1">
                        Penggunaan Bahan Pembantu Proses
                    </div>
                    <div class="table-responsive">
                        <table width="100%" class="table table-sm table-hovered table-bordered text-light text-left">
                            <tr>
                                <th>Time</td>
                                @foreach($chemicals as $chemical)
                                <th>{{ $chemical->name }}</th>
                                @endforeach
                            </tr>
                            @foreach($data as $data)
                            <tr>
                                <td>{{ date("H:i", strtotime($material_balance->created_at)) }}</td>
                                @foreach($chemicals as $chemical)
                                <th>{{ $data[$chemical->name] }}</th>
                                @endforeach
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

