<form action="{{ route('goal_seek_process') }}" method="POST">
    @csrf
    @method('POST')
    <p>Date :<input type="date" name="date" required></p>
    <p><input type="submit"></p>
</form>
