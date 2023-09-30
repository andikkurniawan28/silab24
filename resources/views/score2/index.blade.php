@extends('layouts.app')

@section('content')
<div class="container-fluid">

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <p>Error :</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('scoring') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>#</td>
                            <th>Antrian</td>
                            <th>Rafaksi<br>MBS</td>
                            <th>ARI<br>Core</td>
                            <th>ARI<br>Gil.Mini</td>
                            <th>ARI<br>Rata<sup>2</sup></td>
                            <th>&Delta;<sub>thd<br>NPP</sub></td>
                            <th>Rafaksi<br>ARI</td>
                            <th>Score</td>
                            <th>Reward(+)/<br>Punishment(-)</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scores as $score)
                        @if($score["core"] != 0)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
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
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            @for($i=1; $i<=5; $i++)
            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create{{ $i }}">
                @include('components.icon', ['icon' => 'plus '])
                Meja Tebu {{ $i }}
            </button>
            @endfor
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

                <div class="form-group row">
                    <label for="rit_id" class="col-sm-3 col-form-label">Rendemen ARI</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="rit_id">
                            @foreach ($rits as $rit)
                            <option value="{{ $rit->ari_sampling->rit_id ?? "" }}">
                                Antrian :  {{ $rit->ari_sampling->rit->barcode_antrian ?? "" }} -- R ARI :
                                {{ $rit->yield }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                @foreach($dirts as $dirt)
                <div class="form-group row">
                    <label for="{{ $dirt->id }}" class="col-sm-3 col-form-label">{{ $dirt->name }}</label>
                    <div class="col-sm-9">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            @switch($dirt->id)
                                @case(1)
                                    @for($j=0; $j<=20; $j+=2)
                                        <label class="btn btn-outline-primary btn-toggle  btn-sm">
                                            <input type="radio" name="{{ $dirt->id }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
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
                                            <input type="radio" name="{{ $dirt->id }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
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
                                            <input type="radio" name="{{ $dirt->id }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
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
                                            <input type="radio" name="{{ $dirt->id }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
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
                                            <input type="radio" name="{{ $dirt->id }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
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
                                            <input type="radio" name="{{ $dirt->id }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
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
                                            <input type="radio" name="{{ $dirt->id }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
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
                                            <input type="radio" name="{{ $dirt->id }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
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

