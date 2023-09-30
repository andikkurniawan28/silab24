<table border="1">
    <tr>
        <th>ID</th>
        <th>Antrian</th>
        <th>Core</th>
        {{-- <th>ARI</th> --}}
    </tr>
    @foreach($data as $data)
    <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->rit->barcode_antrian }}</td>
        <td>{{ $data->core_sample->yield ?? "-" }}</td>
        {{-- <td>{{ $data->ari->yield ?? "-" }}</td> --}}
    </tr>
    @endforeach
</table>
