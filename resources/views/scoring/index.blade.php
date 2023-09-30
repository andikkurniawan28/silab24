@extends('layouts.app')

@section('content')
<div class="container-fluid">

    @include("components.alert_block")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Reward & Punishment</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('Reward & Punishment') }}</h5>
        </div>
        <div class="card-body">
            @for($i=1; $i<=5; $i++)
            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create{{ $i }}">
                @include('components.icon', ['icon' => 'plus '])
                Meja Tebu {{ $i }}
            </button>
            @endfor
            <div class="table-responsive">
                <br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>#</td>
                            <th>Timestamp</td>
                            <th>Antrian</td>
                            <th>Rafaksi<br>MBS</td>
                            <th>ARI<br>Core</td>
                            <th>ARI<br>Gil.Mini</td>
                            <th>ARI<br>Rata<sup>2</sup></td>
                            <th>&Delta;<sub>thd<br>NPP</sub></td>
                            <th>Rafaksi<br>ARI</td>
                            <th>Score</td>
                            <th>Reward(-)/<br>Punishment(+)</td>

                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($scores as $score)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ date("Y-m-d H:i", strtotime($score["tgl_daftar"])) }}</td>
                            <td>{{ $score["antrian"] }}</td>
                            <td>{{ number_format($score["rafaksi"], 2) }}</td>
                            <td>{{ number_format($score["core"], 2) }}</td>
                            <td>{{ number_format($score["mini"], 2) }}</td>
                            <td>{{ number_format($score["ari"], 2) }}</td>
                            <td>{{ number_format($score["delta_npp"], 2) }}</td>
                            <td>@if($score["rp"] > 0){{ "+" }}@endif{{ number_format($score["rp"],2) }}</td>
                            <td>{{ number_format($score["rafaksi_terkoreksi"], 2) }}</td>
                            <td>{{ $score["mbs_name"] }}</td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>

@for($i=1; $i<=5; $i++)
<div class="modal fade" id="create{{ $i }}" tabindex="-1" score="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" score="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">{{ ucfirst('scoring') }} Meja {{ $i }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('scores.store') }}" class="text-dark" enctype="multipart/form-data">
                @csrf
                @method('POST')

                @include("components.input", [
                    "label"     => "Antrian",
                    "name"      => "barcode_antrian",
                    "type"      => "text",
                    "value"     => NULL,
                    "modifier"  => "required",
                ])

                @foreach($dirts as $dirt)
                <div class="form-group row">
                    <label for="{{ $dirt->id }}" class="col-sm-4 col-form-label">{{ $dirt->name }}</label>
                    <div class="col-sm-8">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            @switch($dirt->id)
                                @case(1)
                                    @for($j=0; $j<=20; $j+=2)
                                        <label class="btn btn-outline-primary btn-toggle  btn-sm">
                                            <input type="radio" name="{{ $dirt->name }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
                                            @if($j == 0)
                                            {{ 'checked' }}
                                            @endif
                                            > {{ $j }}%
                                        </label>
                                    @endfor
                                @break

                                @case(2)
                                    @for($j=0; $j<=20; $j+=2)
                                        <label class="btn btn-outline-primary btn-toggle  btn-sm">
                                            <input type="radio" name="{{ $dirt->name }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
                                            @if($j == 0)
                                            {{ 'checked' }}
                                            @endif
                                            > {{ $j }}%
                                        </label>
                                    @endfor
                                @break

                                @case(3)
                                    @for($j=0; $j<=20; $j+=2)
                                        <label class="btn btn-outline-primary btn-toggle  btn-sm">
                                            <input type="radio" name="{{ $dirt->name }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
                                            @if($j == 0)
                                            {{ 'checked' }}
                                            @endif
                                            > {{ $j }}%
                                        </label>
                                    @endfor
                                @break

                                @case(4)
                                    @for($j=0; $j<=20; $j+=4)
                                        <label class="btn btn-outline-primary btn-toggle  btn-sm">
                                            <input type="radio" name="{{ $dirt->name }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
                                            @if($j == 0)
                                            {{ 'checked' }}
                                            @endif
                                            > {{ $j }}%
                                        </label>
                                    @endfor
                                @break

                                @case(5)
                                    @for($j=0; $j<=20; $j+=4)
                                        <label class="btn btn-outline-primary btn-toggle  btn-sm">
                                            <input type="radio" name="{{ $dirt->name }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
                                            @if($j == 0)
                                            {{ 'checked' }}
                                            @endif
                                            > {{ $j }}%
                                        </label>
                                    @endfor
                                @break

                                @case(6)
                                    @for($j=0; $j<=20; $j+=4)
                                        <label class="btn btn-outline-primary btn-toggle  btn-sm">
                                            <input type="radio" name="{{ $dirt->name }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
                                            @if($j == 0)
                                            {{ 'checked' }}
                                            @endif
                                            > {{ $j }}%
                                        </label>
                                    @endfor
                                @break

                                @case(7)
                                    @for($j=0; $j<=100; $j+=20)
                                        <label class="btn btn-outline-primary btn-toggle  btn-sm">
                                            <input type="radio" name="{{ $dirt->name }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
                                            @if($j == 0)
                                            {{ 'checked' }}
                                            @endif
                                            > {{ $j }}%
                                        </label>
                                    @endfor
                                @break

                                @case(8)
                                    @for($j=0; $j<=100; $j+=20)
                                        <label class="btn btn-outline-primary btn-toggle  btn-sm">
                                            <input type="radio" name="{{ $dirt->name }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
                                            @if($j == 0)
                                            {{ 'checked' }}
                                            @endif
                                            > {{ $j }}%
                                        </label>
                                    @endfor
                                @break

                                @default
                                @break
                            @endswitch
                        </div>
                    </div>
                </div>
                @endforeach

                <input type="hidden" name="cane_table" value="{{ $i }}">
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save
                    @include('components.icon', ['icon' => 'save'])
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endfor

@endsection
