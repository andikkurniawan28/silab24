@extends("layouts.app")

@section("content")
<div class="container-fluid">

    <x-alert_block></x-alert_block>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("Posbrix") }}</h5>
        </div>
        <div class="card-body">
            <div class="btn-group" role="group" aria-label="Basic example">
                {{-- <a href="{{ route("posbrixes.create2", "CS") }}" type="button" class="btn btn-outline-secondary btn-sm">EK Core Sample</a> --}}
                <a href="{{ route("posbrixes.create2", "EK") }}" type="button" class="btn btn-outline-secondary btn-sm">
                    @include("components.icon", ["icon" => "plus "])
                    EK
                </a>
                <a href="{{ route("posbrixes.create2", "EB|GD") }}" type="button" class="btn btn-outline-secondary btn-sm">
                    @include("components.icon", ["icon" => "plus "])
                    EB/GD
                </a>
            </div>
            <div class="table-responsive">
                <br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</td>
                            <th>Timestamp</td>
                            <th>SPTA</td>
                            <th>Jenis</td>
                            <th>Brix</td>
                            <th><a href="{{ route("varieties.index") }}" target="_blank">Varietas</a></td>
                            <th><a href="{{ route("kawalans.index") }}" target="_blank">Kawalan</a></td>
                            <th>Status</td>
                            <th>Core</td>
                            <th>Gil_Mini</td>
                            <th>User</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posbrixes as $posbrix)
                        <tr>
                            <td>{{ $posbrix->id }}</td>
                            <td>{{ $posbrix->created_at }}</td>
                            <td>{{ $posbrix->spta }}</td>
                            <td>{{ $posbrix->category }}</td>
                            <td>{{ $posbrix->brix }}</td>
                            <td>
                                @if($posbrix->variety_id != NULL)
                                    {{ $posbrix->variety->name }}
                                @else
                                    {{ $posbrix->variety_id }}
                                @endif
                            </td>
                            <td>
                                @if($posbrix->kawalan_id != NULL)
                                    {{ $posbrix->kawalan->name }}
                                @else
                                    {{ $posbrix->kawalan_id }}
                                @endif
                            </td>
                            <td>
                                @if($posbrix->is_accepted === 1)<span class="badge badge-primary">{{ "Diterima" }}</span>
                                @elseif($posbrix->is_accepted === 0)<span class="badge badge-warning">{{ "Ditolak" }}</span>
                                @elseif($posbrix->is_accepted === 2)<span class="badge badge-danger">{{ "Terbakar" }}</span>
                                @elseif($posbrix->is_accepted === 3)<span class="badge badge-info">{{ "Lolos" }}</span>
                                @else{{ "-" }}
                                @endif
                            </td>
                            <td>{{ $posbrix->core_sample->rendemen ?? "-" }}</td>
                            <td>{{ $posbrix->ari->rendemen ?? "-" }}</td>
                            <td>{{ $posbrix->user->name }}</td>
                            <td>
                                <form action="{{ route("posbrixes.destroy", $posbrix->id) }}" method="POST">
                                @csrf @method("DELETE")
                                <a href="{{ route("posbrixes.edit", $posbrix->id) }}" class="btn btn-outline-success btn-sm">
                                    @include("components.icon", ["icon" => "edit "])
                                    Edit
                                </a>
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    @include("components.icon", ["icon" => "trash "])
                                    Hapus
                                </button>
                                </form>
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

@endsection

