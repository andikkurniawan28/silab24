<table>
    <tr>
        <th>Antrian</th>
        <th>No Meja</th>
        <th>Penilaian</th>
    </tr>
    @foreach ($scores as $score)
    <tr>
        <td>{{ $score["no_antrian"] }}</td>
        <td>{{ $score["no_meja"] }}</td>
        <td>{{ $score["mbs_name"] }}</td>
    </tr>
    @endforeach
</table>
