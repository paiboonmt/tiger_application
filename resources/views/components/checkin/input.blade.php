<div class="col-6">

    <form action="" method="POST">
        @csrf

        <input type="number" class="form-control" name="checkin" required autofocus
            placeholder="กรอกหมายเลขสมาชิก" value="{{ old('checkin') }}">

    </form>
</div>