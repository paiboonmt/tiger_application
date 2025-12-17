@extends('layouts.admin')
@section('title', 'Sponsers Page')

@section('content')
<div class="row">
    <div class="col p-2">
        <div class="card">
            <div class="card-header bg-dark">
                <h1 class="card-title">รายชื่อสมาชิก Free Training </h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="example1">
                    <thead>
                        <tr>
                            <th hidden>ID</th>
                            <th>หมายเลขสมาชิก</th>
                            <th>ชื่อ</th>
                            <th>สัญชาติ</th>
                            <th>ประเภท</th>
                            <th>โปรแกรม</th>
                            <th>เริ่ม</th>
                            <th>หมด</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $c)
                        <tr>
                            <td hidden>{{ $c->id }}</td>
                            <td>{{ $c->m_card }}</td>
                            <td>{{ $c->fname }}</td>
                            <td>{{ $c->nationalty }}</td>
                            <td>{{ $c->type_training }}</td>
                            <td>{{ $c->type_fighter }}</td>
                            <td>{{ $c->sta_date }}</td>
                            <td>{{ $c->exp_date }}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function() {
        $("#example1").DataTable({
            // "responsive": true,
            // "lengthChange": true,
            "autoWidth": false,
            "saveState": true,
            "buttons": [ "excel"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush