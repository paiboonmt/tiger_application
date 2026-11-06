<form action="{{ route('checkin.checkNumber') }}" method="POST">
    @csrf
    <input type="number" class="form-control" name="number" required autofocus value="20269090167">
</form>

