@extends('layouts.admin')
@section('title', 'ไทเกอร์ มวยไทย | รายการชำระเงิน')
@section('head', 'สัญชาติ')
@section('content')
    @stack('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-dark">
                    <div class="card-title">รายการ สัญชาติ (Nationality)</div>
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
                                <th>ลำดับที่</th>
                                <th>ไอดี</th>
                                <th>ชื่อสัญชาติ</th>
                                <th class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $nationality)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $nationality->nationality_id }}</td>
                                    <td>{{ $nationality->n_name }}</td>
                                    <th class="text-center">
                                        <form action="{{ route('nationality.delete', $nationality->nationality_id) }}"
                                            method="POST" class="form-delete">
                                            <div class="btn-group" role="group">
                                                @csrf
                                                <a href="{{ route('nationality.edit', $nationality->nationality_id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-sm">
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
    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ',
                text: @json(session('success')),
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: @json($errors->first())
            });
        </script>
    @endif
    
    <script>
        // ยืนยันการลบด้วย SweetAlert2
        $(document).on('submit', '.form-delete', function(e) {
            e.preventDefault();
            const form = this;
            Swal.fire({
                icon: 'warning',
                title: 'ยืนยันการลบ',
                text: 'คุณต้องการลบข้อมูลนี้หรือไม่?',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'ลบ',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
    <script>
        $(function() {
            $("#nationalityTable").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "order": [
                    [1, 'desc']
                ],
            }).buttons().container().appendTo('#nationalityTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
