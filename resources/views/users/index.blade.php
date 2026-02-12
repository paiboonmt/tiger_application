@extends('layouts.admin')
@section('title', 'จัดการ ผู้ใช้งานระบบ')
@section('head', 'ผู้ใช้งานระบบ')
@section('content')

<div class="row">
    <div class="col-md-12 p-1">
        <div class="card">
            <div class="card-header bg-dark">
                <a href="{{ route('users.create') }}" class="btn btn-info">
                    เพื่มผู้ใช้งานระบบ
                </a>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered table-striped" id="user">
                    <thead>
                        <tr>
                            <th>ไอดี</th>
                            <th>ชื่อ</th>
                            <th>อีเมล</th>
                            <th>สิทธิ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <form action="#" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route( 'users.edit',$user->id ) }}" class="btn btn-warning">แก้ไข</a>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('ยืนยันการลบข้อมูล ?')">ลบ</button>
                                    </form>
                                </div>
                            </td>
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
    $(document).ready(function() {
        $('#user').DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "language": {
                "lengthMenu": "แสดง _MENU_ รายการต่อหน้า",
                "zeroRecords": "ไม่พบข้อมูล",
                "info": "แสดงหน้า _PAGE_ จาก _PAGES_",
                "infoEmpty": "ไม่มีข้อมูล",
                "infoFiltered": "(กรองจากทั้งหมด _MAX_ รายการ)",
                "search": "ค้นหา:",
                "paginate": {
                    "first": "หน้าแรก",
                    "last": "หน้าสุดท้าย",
                    "next": "ถัดไป",
                    "previous": "ก่อนหน้า"
                }
            },
        });
    });
</script>
@endpush