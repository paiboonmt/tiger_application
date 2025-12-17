@extends('layouts.admin')
@section('title', 'รายชื่อสมาชิก')

@section('content')
<div class="row">
    <div class="col p-2">
        <div class="card">
            <div class="card-header bg-dark">
                <h1 class="card-title">รายชื่อสมาชิก</h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="example1">
                    <thead>
                        <tr>
                            <th hidden>ID</th>
                            <th>หมายเลขสมาชิก</th>
                            <th>ชื่อ</th>
                            <th>หมายเลขบิล</th>
                            <th>สัญชาติ</th>
                            <th>บริการ</th>
                            <th>เริ่ม</th>
                            <th>หมด</th>
                            <th>บันทึก</th>
                            <th>ผู้บันทึก</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $c)
                        <tr>
                            <td hidden>{{ $c->id }}</td>
                            <td>{{ $c->m_card }}</td>
                            <td>{{ $c->fname }}</td>
                            <td>{{ $c->invoice }}</td>
                            <td>{{ $c->nationalty }}</td>
                            <td>{{ $c->product_name }}</td>
                            <td>{{ $c->sta_date }}</td>
                            <td>{{ $c->exp_date }}</td>
                            <td>{{ $c->date }}</td>
                            <td>{{ $c->AddBy }}</td>
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