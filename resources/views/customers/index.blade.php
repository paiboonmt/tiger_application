@extends('layouts.admin')
@section('title', 'รายชื่อสมาชิก')
@section('head', 'รายชื่อสมาชิก')
@section('link', 'customers')

@section('content')
@stack('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <div class="row">
        <div class="col p-1">
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title">รายชื่อสมาชิก ที่ยังมีอายุการใช้งาน</h3>
                    <div class="card-tools">
                        <a href="{{ route('customers.create') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i>
                            เพิ่มสมาชิก
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-hover" id="example1">
                        <thead class="bg-success">
                            <tr>
                                <th hidden>id</th>
                                <td class="text-center">ดู</td>
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
                                        <a href="{{ route('customers.profile_active',$item->id) }}" class="btn btn-sm btn-info">view</a>
                                    </td>
                                    <td>{{ $item->m_card }}</td>
                                    <td>{{ $item->fname }}</td>
                                    <td>{{ $item->invoice }}</td>
                                    <td>{{ $item->nationalty }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->sta_date }}</td>
                                    <td>{{ $item->exp_date }}</td>
                                    <td hidden>{{ $item->date }}</td>
                                    <td><span class="badge badge-info" style="width: 40px;">{{ $item->days_left }}</span></td>
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
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
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