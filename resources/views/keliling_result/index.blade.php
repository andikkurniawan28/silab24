@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="m-0 font-weight-bold text-primary">Keliling Proses</h4>
    </div>

    @include("components.alert_block")

    <!-- Content Row -->
    <div class="row">

        @foreach ($kspots as $kspot)
        <div class="col-lg-4 mb-4">
            <div class="card bg-dark text-white text-sm shadow">
                <div class="card-body">

                    <div class="font-weight-bold text-light text-uppercase mb-1">
                        {{ $kspot->name }}
                    </div>

                    <div class="table-responsive">
                        <table width="100%" class="table table-sm table-hovered table-bordered text-light text-left">
                            <tr>
                                <th>Time</td>
                                <th>Value</td>
                            </tr>
                            @foreach($kactivities as $kactivity)
                            @if($kactivity->{$kspot->name} == NULL) @continue @endif
                            <tr>
                                <td>{{ date("H:i", strtotime($kactivity->created_at)) }}</td>
                                <td>{{ $kactivity->{$kspot->name} }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <br>

                </div>
            </div>
        </div>
        @endforeach

    </div>

</div>
@endsection

