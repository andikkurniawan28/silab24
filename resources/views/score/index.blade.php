@extends("layouts.app")

@section("content")
<div class="container-fluid">

    <x-alert_block></x-alert_block>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("Penilaian MBS") }}</h5>
        </div>
        <div class="card-body">
            @for($i=1; $i<=5; $i++)
            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create{{ $i }}">
                @include("components.icon", ["icon" => "plus "])
                Meja Tebu {{ $i }}
            </button>
            @endfor
            <div class="table-responsive">
                <br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</td>
                            <th>Timestamp</td>
                            <th>SPTA</td>
                            <th>Antrian</td>
                            <th>Register</td>
                            <th>Meja</td>
                            <th>Kotoran</th>
                            <th>Score</td>
                            <th>User</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scores as $score)
                        <tr>
                            <td>{{ $score->id }}</td>
                            <td>{{ $score->created_at }}</td>
                            <td>{{ $score->posbrix->spta }}</td>
                            <td>{{ $score->posbrix->barcode_antrian }}</td>
                            <td>{{ $score->posbrix->register }}</td>
                            <td>{{ $score->cane_table }}</td>
                            <td>
                                @foreach ($dirts as $dirt)
                                @if($score->{$dirt->name} != NULL)
                                <li>{{ $dirt->name }} : {{ $score->{$dirt->name} }}%</li>
                                @endif
                                @endforeach
                            </td>
                            <td>{{ $score->value }}</td>
                            <td>{{ $score->user->name }}</td>
                            <td>
                                <a href="{{ route("scores.edit", $score->id) }}" type="button" class="btn btn-outline-success btn-sm">
                                    @include("components.icon", ["icon" => "edit "])
                                    Edit
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{ $score->id }}">
                                    @include("components.icon", ["icon" => "trash "])
                                    Hapus
                                </button>
                            </td>
                        </tr>
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
                <h5 class="modal-title" id="createLabel">{{ ucfirst("penilaian MBS") }} Meja Tebu {{ $i }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route("scores.store") }}">
                @csrf @method("POST")

                @include("components.input", [
                    "label"     => "Barcode Antrian",
                    "name"      => "data",
                    "type"      => "text",
                    "value"     => "24",
                    "modifier"  => "required",
                ])

                @foreach($dirts as $dirt)
                    @include("components.input", [
                        "label"     => $dirt->name,
                        "name"      => $dirt->name,
                        "type"      => "number",
                        "value"     => "",
                        "modifier"  => "",
                    ])
                @endforeach

                {{-- @foreach($dirts as $dirt)
                <div class="form-group row">
                    <label for="{{ $dirt->id }}" class="col-sm-3 col-form-label">{{ $dirt->name }}</label>
                    <div class="col-sm-9">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            @switch($dirt->id)

                                @case(1)
                                    @for($j=0; $j<=20; $j+=4)
                                        <label class="btn btn-outline-primary btn-toggle  btn-sm">
                                            <input type="radio" name="{{ $dirt->name }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
                                            @if($j == 0)
                                            {{ "checked" }}
                                            @endif
                                            > {{ $j }}%
                                        </label>
                                    @endfor
                                @break

                                @case(2)
                                    @for($j=0; $j<=20; $j+=4)
                                        <label class="btn btn-outline-primary btn-toggle  btn-sm">
                                            <input type="radio" name="{{ $dirt->name }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
                                            @if($j == 0)
                                            {{ "checked" }}
                                            @endif
                                            > {{ $j }}%
                                        </label>
                                    @endfor
                                @break

                                @case(3)
                                    @for($j=0; $j<=20; $j+=4)
                                        <label class="btn btn-outline-primary btn-toggle  btn-sm">
                                            <input type="radio" name="{{ $dirt->name }}" id="{{ $dirt->id }}" autocomplete="off" value="{{ $j }}"
                                            @if($j == 0)
                                            {{ "checked" }}
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
                                            {{ "checked" }}
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
                                            {{ "checked" }}
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
                                            {{ "checked" }}
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
                                            {{ "checked" }}
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
                                            {{ "checked" }}
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
                @endforeach --}}

                <input type="hidden" name="cane_table" value="{{ $i }}">
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save
                    @include("components.icon", ["icon" => "save"])
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endfor

@foreach($scores as $score)
<div class="modal fade" id="delete{{ $score->id }}" tabindex="-1" score="dialog" aria-labelledby="delete{{ $score->id }}Label" aria-hidden="true">
    <div class="modal-dialog" score="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $score->id }}Label">Hapus {{ ucfirst("penilaian MBS") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route("scores.destroy", $score->id) }}" class="text-dark">
                @csrf
                @method("DELETE")
                <p>Apakah Anda yakin ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes
                    @include("components.icon", ["icon" => "trash"])
                </button>
            </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

