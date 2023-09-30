<p>Date : {{ $date }}</p>
<table border="1" width="50%">
    <tr>
        <th>ID</th>
        <th>Time</th>
        <th>Brix</th>
        <th>Pol</th>
        <th>Rendemen</th>
        <th>Duplicate</th>
        <th>Where</th>
    </tr>
    @foreach ($ari as $ari)
    <tr>
        <td>{{ $ari->id }}</td>
        <td>{{ $ari->created_at }}</td>
        <td>{{ $ari->pbrix }}</td>
        <td>{{ $ari->ppol }}</td>
        <td>{{ $ari->yield }}</td>
        <td>{{ $ari->duplicate }}</td>
        <td>{{ $ari->where }}</td>
    @endforeach
</table>
