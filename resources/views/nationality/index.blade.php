@extends('layouts.admin')
@section('title', 'ไทเกอร์ มวยไทย | รายการชำระเงิน')
@section('head', 'สัญชาติ')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <div class="card-title">สัญชาติ</div>
                    <div class="card-tools">
                        <a href="{{ route('nationality.create') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i>
                            เพื่มข้อมูล
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm" id="nationalityTable">
                        <thead>
                            <tr>
                                <th>ไอดี</th>
                                <th>ชื่อสัญชาติ</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nationalities as $nationality)
                                <tr>
                                    <td>{{ $nationality->nationality_id }}</td>
                                    <td>{{ $nationality->n_name }}</td>
                                    <th>
                                        <form action="{{ route('nationality.delete', $nationality->nationality_id) }}"
                                            method="POST">
                                            @csrf
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('nationality.edit', $nationality->nationality_id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </th>
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
        $('#nationalityTable').DataTable({
            "paging": true,
            "pageLength": 35,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "stateSave": true,
            "language": {
                "sProcessing":   "กำลังดำเนินการ...",
                "sLengthMenu":   "แสดง _MENU_ รายการ",
                "sZeroRecords":  "ไม่พบข้อมูล",
                "sInfo":         "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                "sInfoEmpty":    "แสดง 0 ถึง 0 จาก 0 รายการ",
                "sInfoFiltered": "(กรองจากทั้งหมด _MAX_ รายการ)",
                "sSearch":       "ค้นหา:",
                "oPaginate": {
                    "sFirst":    "หน้าแรก",
                    "sPrevious": "ก่อนหน้า",
                    "sNext":     "ถัดไป",
                    "sLast":     "หน้าสุดท้าย"
                }
            },
        });
    </script>
@endpush