

<form action="{{ route('checkin.checkNumber') }}" method="POST">
    @csrf
    <input type="number" class="form-control" name="number" required autofocus value="2026080087">
</form>

