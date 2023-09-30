<table border="1">
    <tr>
        <th>id</th>
    </tr>
    @foreach ($data as $data)
    <tr>
        <td>{{ $data->id }}</td>
    </tr>
    @endforeach
</table>
