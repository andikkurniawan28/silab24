@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="m-0 font-weight-bold text-primary">{{ 'Hl Masakan Turun' }}</h4>
    </div>

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card bg-dark text-white text-sm shadow">
                <div class="card-body">
                    <div class="font-weight-bold text-light text-uppercase mb-1">
                        Hl Masakan Turun
                    </div>
                    <div class="table-responsive">
                        <table width="100%" class="table table-sm table-hovered text-light text-left">
                            <tr>
                                <th>Ploeg</th>
                                <th>Masakan R1<sub>(Hl)</sub></th>
                                <th>Masakan R2<sub>(Hl)</sub></th>
                                <th>Masakan A Raw<sub>(Hl)</sub></th>
                            </tr>
                            <tr>
                                <th>Pagi</td>
                                <td>
                                    @if($hl_masakan['masakan_r1']['pagi'] > 0)
                                    {{ number_format($hl_masakan['masakan_r1']['pagi']) }}
                                    @else
                                    {{ '-' }}
                                    @endif
                                </td>
                                <td>
                                    @if($hl_masakan['masakan_r2']['pagi'] > 0)
                                    {{ number_format($hl_masakan['masakan_r2']['pagi']) }}
                                    @else
                                    {{ '-' }}
                                    @endif
                                </td>
                                <td>
                                    @if($hl_masakan['masakan_a_raw']['pagi'] > 0)
                                    {{ number_format($hl_masakan['masakan_a_raw']['pagi']) }}
                                    @else
                                    {{ '-' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Siang</td>
                                <td>{{ number_format($hl_masakan['masakan_r1']['siang']) }}</td>
                                <td>{{ number_format($hl_masakan['masakan_r2']['siang']) }}</td>
                                <td>{{ number_format($hl_masakan['masakan_a_raw']['siang']) }}</td>
                            </tr>
                            <tr>
                                <th>Malam</td>
                                <td>{{ number_format($hl_masakan['masakan_r1']['malam']) }}</td>
                                <td>{{ number_format($hl_masakan['masakan_r2']['malam']) }}</td>
                                <td>{{ number_format($hl_masakan['masakan_a_raw']['malam']) }}</td>
                            </tr>
                            <tr>
                                <th>Hari Ini</td>
                                <td>{{ number_format($hl_masakan['masakan_r1']['harian']) }}</td>
                                <td>{{ number_format($hl_masakan['masakan_r2']['harian']) }}</td>
                                <td>{{ number_format($hl_masakan['masakan_a_raw']['harian']) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
