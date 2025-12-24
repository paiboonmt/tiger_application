@extends('layouts.admin')
@section('title', 'รายชื่อสมาชิก')
@section('head', 'รายชื่อสมาชิก')
@section('link', 'customers')

@section('content')
<div class="row">
    <div class="col p-1">
        <div class="card">
            <!-- <div class="card-header bg-dark">
                <h2>รายชื่อสมาชิก ที่ยังมีอายุการใช้งาน</h2>
            </div> -->
            <div class="card-body">
                <table class="table table-bordered table-hover" id="example1">
                    <thead class="bg-success">
                        <tr>
                            <th hidden>id</th>
                            <th>ดู</th>
                            <th>เลขสมาชิก</th>
                            <th>ชื่อ</th>
                            <th>บิล</th>
                            <th>สัญชาติ</th>
                            <th>บริการ</th>
                            <th>เริ่ม</th>
                            <th>หมด</th>
                            <th hidden>บันทึก</th>
                            <th>วัน</th>
                            <th>ผู้บันทึก</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $item)
                        <tr>
                            <td hidden>{{ $item->id }}</td>
                            <td>
                                <a href="http://172.16.0.3/memberimg/img/{{ $item->image }}" target="_blank">
                                    <img src="http://172.16.0.3/memberimg/img/{{ $item->image }}"
                                        class="img-size-50 mr-2 img-circle"
                                        style="width:40px; height:40px;"
                                    >
                                </a>
                                <span style="color: red; padding-right: 10px;">|</span>
                                <a class="badge badge-info" href="{{ route('customers.profile',$item->id) }}" target="_blank">
                                   profile
                                </a>
                            </td>
                            <td>{{ $item->m_card }}</td>
                            <td>{{ $item->fname }}</td>
                            <td>{{ $item->invoice }}</td>
                            <td>{{ $item->nationalty }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->sta_date }}</td>
                            <td>{{ $item->exp_date }}</td>
                            <td hidden>{{ $item->date }}</td>
                            <td> <span class="badge badge-info" style="width: 40px;">{{ $item->days_left }}</span></td>
                            <td>{{ $item->AddBy }}</td>
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
            "order": [
                [0, "desc"]
            ],
            // "buttons": ["excel"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush