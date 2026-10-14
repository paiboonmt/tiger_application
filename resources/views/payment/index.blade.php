@extends('layouts.admin')
@section('title', 'ไทเกอร์ มวยไทย | รายการชำระเงิน')
@section('head', 'รายการชำระเงิน')
@section('content')
@stack('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-dark">
                <h2 class="card-title">รายการชำระเงิน (Payments)</h2>
                <div class="card-tools">
                    <a href="{{ route('payment.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i>
                        เพิ่มชำระเงิน
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-sm table-hover" id="payment-table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>วิธีชำระเงิน</th>
                            <th>เปอร์เซน</th>
                            <th class="text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $payment->pay_id }}</td>
                            <td>{{ $payment->pay_name }}</td>
                            <td>{{ $payment->value }}</td>
                            <td class="text-center">
                                <form action="{{ route('payment.destroy', $payment->pay_id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('payment.edit', $payment->pay_id) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </form>
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
<script src="{{ asset('node_modules/sweetalert2/dist/sweetalert2.all.js') }}"></script>

// SweetAlert2
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'สำเร็จ',
        text: @json(session('success')),
        timer: 3000,
        showConfirmButton: false
    });
</script>
@endif


<script>
    // DataTable
    $('#payment-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "order": [
            [0, 'desc']
        ]
    }).buttons().container().appendTo('#payment-table_wrapper .col-md-6:eq(0)');
</script>
@endpush