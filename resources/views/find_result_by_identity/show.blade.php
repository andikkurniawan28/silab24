<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<table class="table table-sm table-bordered table-striped table-dark text-xs">
    <tr>
        <th colspan="8">Pos Brix</th>
        <th colspan="9">Analisa Rendemen</th>
    </tr>
    <tr>
        <th>#</th>
        {{-- <th>PID</th> --}}
        <th>Jam Masuk</th>
        <th>SPTA</th>
        <th>Var</th>
        <th>Kawalan</th>
        <th>Brix</th>
        <th>Status</th>
        {{-- <th>RID</th> --}}
        <th>Antrian</th>
        <th>Nopol</th>
        <th>Register</th>
        <th>KUD</th>
        <th>Pos</th>
        <th>Wilayah</th>
        <th>Petani</th>
        {{-- <th>SID</th> --}}
        {{-- <th>Jam ARI</th> --}}
        <th>%Brix</th>
        <th>%Pol</th>
        <th>%R</th>
    </tr>
    @foreach($data as $data)
    <tr>
        <td>{{ $loop->iteration }}</td>
        {{-- <td class="text-warning">{{ $data->id }}</td> --}}
        <td>{{ $data->created_at }}</td>
        <td>{{ $data->spta }}</td>
        <td>{{ $data->variety->name ?? '-' }}</td>
        <td>{{ $data->kawalan->name ?? '-' }}</td>
        <td>{{ $data->brix }}</td>
        <td>
            @if($data->is_accepted === 1)
                {{ 'Diterima' }}
            @elseif($data->is_accepted === 2)
                {{ 'Terbakar' }}
            @elseif($data->is_accepted === 0)
                {{ 'Ditolak' }}
            @endif
        </td>
        {{-- <td class="text-warning">
            @foreach($data->rit as $rit)
                {{ $rit->id }}
            @endforeach
        </td> --}}
        <td>
            @foreach($data->rit as $rit)
                {{ $rit->barcode_antrian ?? '-' }}
            @endforeach
        </td>
        <td>
            @foreach($data->rit as $rit)
            {{ $rit->nopol ?? '-' }}
            @endforeach
        </td>
        <td>
            @foreach($data->rit as $rit)
            {{ $rit->register ?? '-' }}
            @endforeach
        </td>
        <td>
            @foreach($data->rit as $rit)
                @if($rit->kud_id != NULL)
                    {{ $rit->kud->name ?? '-' }}
                @endif
            @endforeach
        </td>
        <td>
            @foreach($data->rit as $rit)
                @if($rit->pospantau_id != NULL)
                    {{ $rit->pospantau->name ?? '-' }}
                @endif
            @endforeach
        </td>
        <td>
            @foreach($data->rit as $rit)
                @if($rit->wilayah_id != NULL)
                    {{ $rit->wilayah->name ?? '-' }}
                @endif
            @endforeach
        </td>
        <td>
            @foreach($data->rit as $rit)
                {{ $rit->petani ?? '-' }}
            @endforeach
        </td>
        {{-- <td class="text-warning">
            @foreach($data->rit as $rit)
                @foreach($rit->ari_sampling as $ari_sampling)
                    {{ $ari_sampling->id }}
                @endforeach
            @endforeach
        </td> --}}
        {{-- <td>
            @foreach($data->rit as $rit)
                @foreach($rit->ari_sampling as $ari_sampling)
                    {{ $ari_sampling->created_at }}
                @endforeach
            @endforeach
        </td> --}}
        <td>
            @foreach($data->rit as $rit)
                @foreach($rit->ari_sampling as $ari_sampling)
                    @foreach($ari_sampling->ari as $ari)
                        {{ $ari->pbrix }}
                    @endforeach
                @endforeach
            @endforeach
        </td>
        <td>
            @foreach($data->rit as $rit)
                @foreach($rit->ari_sampling as $ari_sampling)
                    @foreach($ari_sampling->ari as $ari)
                        {{ $ari->ppol }}
                    @endforeach
                @endforeach
            @endforeach
        </td>
        <td>
            @foreach($data->rit as $rit)
                @foreach($rit->ari_sampling as $ari_sampling)
                    @foreach($ari_sampling->ari as $ari)
                        {{ $ari->yield }}
                    @endforeach
                @endforeach
            @endforeach
        </td>
    </tr>
    @endforeach
</table>
