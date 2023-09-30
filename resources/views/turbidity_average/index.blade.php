<table width="80%" border="1">
    <tr>
        <th>Tanggal</th>
        <th>Nira Mentah</th>
        <th>Nira Tapis</th>
    </tr>
    @foreach($data as $data)
    <tr>
        <td>{{ $data["batas_bawah"] }}</td>
        <td>{{ $data["nira_mentah"] }}</td>
        <td>{{ $data["nira_tapis"] }}</td>
    </tr>
    @endforeach
</table>
