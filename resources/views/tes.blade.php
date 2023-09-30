
<form action="" method="POST">
    @csrf
    <h4>Input Imbibisi</h4>
    <p>Jam
        <select name="created_at">
            @for($i=0; $i<=23; $i++)
                <option value="{{ $i }}" @if($current_hour == $i) {{ "selected" }} @endif>{{ $i }}:00 - {{ $i+1 }}:00</option>
            @endfor
        </select>
    </p>
    <p>Totalizer <input type="number" name="totalizer"></p>
    <p><input type="submit"></p>
</form>

<table border="1" width="50%">
    <tr>
        <th>Created at</th>
        <th>Totalizer</th>
        <th>Flow</th>
    </tr>
    @foreach ($imbibitions as $imbibition)
    <tr>
        <td>{{ $imbibition->created_at }}</td>
        <td>{{ $imbibition->totalizer }}</td>
        <td>{{ $imbibition->flow_imb }}</td>
    </tr>
    @endforeach
</table>
