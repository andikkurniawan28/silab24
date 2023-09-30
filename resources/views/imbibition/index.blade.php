@extends("layouts.app")

@section("content")
<div class="container-fluid">

    <x-alert_block></x-alert_block>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("Air Imbibisi") }}</h5>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create">
                @include("components.icon", ["icon" => "plus "])
                Tambah
            </button>
            <div class="table-responsive">
                <br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</td>
                            <th>Timestamp</td>
                            <th>Totalizer</td>
                            <th>Flow Imb</td>
                            {{-- <th>Imb % Tebu</td> --}}
                            <th>User</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($imbibitions as $imbibition)
                        <tr>
                            <td>{{ $imbibition->id }}</td>
                            <td>{{ $imbibition->created_at }}</td>
                            <td>{{ $imbibition->totalizer }}</td>
                            <td>{{ $imbibition->flow_imb }}</td>
                            {{-- <td>{{ $imbibition->imb_persen_tebu }}</td> --}}
                            <td>{{ $imbibition->user->name }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{ $imbibition->id }}">
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

<div class="modal fade" id="create" tabindex="-1" imbibition="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" imbibition="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Tambah {{ ucfirst("imbibisi") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route("imbibitions.store") }}" class="text-dark">
                @csrf
                @method("POST")

                <div class="form-group row">
                    <label for="created_at" class="col-sm-2 col-form-label">Time</label>
                    <div class="col-sm-10">
                        <select name="created_at" class="form-control">
                            @for($i=0; $i < 24; $i++)
                                <option value="{{ $timeframe[$i] }}">{{ date("H:i", strtotime($timeframe[$i])) }} - {{ date("H:i", strtotime($timeframe[$i+1])) }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                @include("components.input",[
                    "label" => "Totalizer",
                    "name" => "totalizer",
                    "type" => "number",
                    "value" => "",
                    "modifier" => "required",
                ])

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

@foreach($imbibitions as $imbibition)
<div class="modal fade" id="delete{{ $imbibition->id }}" tabindex="-1" imbibition="dialog" aria-labelledby="delete{{ $imbibition->id }}Label" aria-hidden="true">
    <div class="modal-dialog" imbibition="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $imbibition->id }}Label">Hapus {{ ucfirst("imbibisi") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route("imbibitions.destroy", $imbibition->id) }}" class="text-dark">
                @csrf
                @method("DELETE")
                <p>Apakah Anda yakin ?</p>
                <input type="hidden" name="imbibition_id" value="{{ $imbibition->imbibition_id }}">
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

