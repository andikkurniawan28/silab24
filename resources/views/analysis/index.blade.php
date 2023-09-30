@extends("layouts.app")

@section("content")
<div class="container-fluid">

    <x-alert_block></x-alert_block>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("analisa") }}</h5>
        </div>
        <div class="card-body">
            <form action={{ route("verifikasi_mandor") }} method="POST">
            @csrf
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-outline-primary btn-sm text-right" data-toggle="modal" data-target="#create">
                    @include("components.icon", ["icon" => "plus "])
                    Tambah
                </button>
                <button type="button" class="btn btn-outline-secondary btn-sm text-right" data-toggle="modal" data-target="#createHK">Input HK</button>
                <button type="button" class="btn btn-outline-info btn-sm text-right" data-toggle="modal" data-target="#createRendemen">Input Rendemen</button>
                <button type="button" class="btn btn-outline-success btn-sm text-right" data-toggle="modal" data-target="#createPolAmpas">Input Pol Ampas</button>
                <button type="button" class="btn btn-outline-dark btn-sm text-right" data-toggle="modal" data-target="#createPolBlotong">Input Pol Blotong</button>
                <button type="button" class="btn btn-outline-danger btn-sm text-right" data-toggle="modal" data-target="#createAnalisaUmum">Input Analisa Umum</button>
                <button type="button" class="btn btn-outline-warning btn-sm text-right text-dark" data-toggle="modal" data-target="#createAnalisaKetel">Input Analisa Ketel</button>
                <button type="submit" class="btn btn-outline-primary btn-sm text-right">
                    @include('components.icon', ['icon' => 'check '])
                    Setuju
                </button>
                <label class="btn btn-outline-secondary btn-sm text-right">
                    <input type="checkbox" id="select_all">
                    @include('components.icon', ['icon' => 'list '])
                    Pilih Semua
                </label>
            </div>
            <div class="table-responsive">
                <br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</td>
                            <th>Timestamp</td>
                            <th>Material</td>
                            <th>Analisa</td>
                            <th>User</td>
                            <th>Status</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($analyses as $analysis)
                        <tr>
                            <td>{{ $analysis->id }}</td>
                            <td>{{ $analysis->created_at }}</td>
                            <td>{{ $analysis->material->name }}</td>
                            <td>
                                @foreach($indicators as $indicator)
                                    @if($analysis->{$indicator->name} != NULL)
                                        <li>{{ $indicator->name }} : {{ $analysis->{$indicator->name} }}</li>
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $analysis->user->name }}</td>
                            <td>
                                @if($analysis->is_verified == 0)
                                    {{ "Perlu persetujuan" }}
                                    <input type="checkbox" name="id[]" class="checkbox" value="{{ $analysis->id }}" />
                                @else
                                    {{ "Sudah disetujui" }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route("analyses.edit", $analysis->id) }}" type="button" class="btn btn-outline-success btn-sm">
                                    @include("components.icon", ["icon" => "edit "])
                                    Edit
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{ $analysis->id }}">
                                    @include("components.icon", ["icon" => "trash "])
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </form>
                </table>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>

<div class="modal fade" id="create" tabindex="-1" analysis="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" analysis="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Tambah {{ ucfirst("analisa") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route("analyses.store") }}" class="text-dark">
                @csrf
                @method("POST")

                <div class="form-group row">
                    <label for="role_id" class="col-sm-4 col-form-label">Material</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="material_id">
                            @foreach ($materials as $material)
                                <option value="{{ $material->id }}">
                                    {{ $material->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                @foreach ($indicators as $indicator)
                    @include("components.input6",[
                        "label"     => $indicator->name,
                        "name"      => $indicator->name,
                        "type"      => "number",
                        "value"     => "",
                        "modifier"  => "",
                    ])
                @endforeach

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

<div class="modal fade" id="createHK" tabindex="-1" analysis="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" analysis="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Input HK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route("input_hk") }}" class="text-dark">
                @csrf
                @method("POST")

                @include("components.input6",[
                    "label"     => "Barcode",
                    "name"      => "id",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "required",
                ])

                @include("components.input6",[
                    "label"     => "%Brix",
                    "name"      => "%Brix",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "required",
                ])

                @include("components.input6",[
                    "label"     => "%Pol",
                    "name"      => "%Pol",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "required",
                ])

                @include("components.input6",[
                    "label"     => "Pol",
                    "name"      => "Pol",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "required",
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

<div class="modal fade" id="createRendemen" tabindex="-1" analysis="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" analysis="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Input Rendemen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route("input_rendemen") }}" class="text-dark">
                @csrf
                @method("POST")

                @include("components.input6",[
                    "label"     => "Barcode",
                    "name"      => "id",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "",
                ])

                @include("components.input6",[
                    "label"     => "%Brix",
                    "name"      => "%Brix",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "",
                ])

                @include("components.input6",[
                    "label"     => "%Pol",
                    "name"      => "%Pol",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "",
                ])

                @include("components.input6",[
                    "label"     => "Pol",
                    "name"      => "Pol",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "",
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

<div class="modal fade" id="createPolAmpas" tabindex="-1" analysis="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" analysis="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Input Pol Ampas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route("input_pol_ampas") }}" class="text-dark">
                @csrf
                @method("POST")

                @include("components.input6",[
                    "label"     => "Barcode",
                    "name"      => "id",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "",
                ])

                @include("components.input6",[
                    "label"     => "%Zk",
                    "name"      => "%Zk",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "",
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

<div class="modal fade" id="createPolBlotong" tabindex="-1" analysis="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" analysis="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Input Pol Blotong</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route("input_pol_blotong") }}" class="text-dark">
                @csrf
                @method("POST")

                @include("components.input6",[
                    "label"     => "Barcode",
                    "name"      => "id",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "",
                ])

                @include("components.input6",[
                    "label"     => "Berat Kering",
                    "name"      => "%Zk",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "",
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

<div class="modal fade" id="createAnalisaUmum" tabindex="-1" analysis="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" analysis="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Input Analisa Umum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route("input_analisa_umum") }}" class="text-dark">
                @csrf
                @method("POST")

                @include("components.input6",[
                    "label"     => "Barcode",
                    "name"      => "id",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "",
                ])

                @include("components.input6",[
                    "label"     => "CaO",
                    "name"      => "CaO",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "",
                ])

                @include("components.input6",[
                    "label"     => "pH",
                    "name"      => "pH",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "",
                ])

                @include("components.input6",[
                    "label"     => "Turbidity",
                    "name"      => "Turbidity",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "",
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

<div class="modal fade" id="createAnalisaKetel" tabindex="-1" analysis="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" analysis="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Input Analisa Ketel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route("input_analisa_umum") }}" class="text-dark">
                @csrf
                @method("POST")

                @include("components.input6",[
                    "label"     => "Barcode",
                    "name"      => "id",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "",
                ])

                @include("components.input6",[
                    "label"     => "TDS",
                    "name"      => "TDS",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "",
                ])

                @include("components.input6",[
                    "label"     => "pH",
                    "name"      => "pH",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "",
                ])

                @include("components.input6",[
                    "label"     => "Sadah",
                    "name"      => "Sadah",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "",
                ])

                @include("components.input6",[
                    "label"     => "P2O5",
                    "name"      => "P2O5",
                    "type"      => "number",
                    "value"     => "",
                    "modifier"  => "",
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

@foreach($analyses as $analysis)
<div class="modal fade" id="delete{{ $analysis->id }}" tabindex="-1" analysis="dialog" aria-labelledby="delete{{ $analysis->id }}Label" aria-hidden="true">
    <div class="modal-dialog" analysis="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $analysis->id }}Label">Hapus {{ ucfirst("analisa") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route("analyses.destroy", $analysis->id) }}" class="text-dark">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });

    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
        });
    });
</script>

@endsection

