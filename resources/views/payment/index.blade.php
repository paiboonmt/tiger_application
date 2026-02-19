@extends('layouts.admin')
@section('title', 'ไทเกอร์ มวยไทย | รายการชำระเงิน')
@section('head', 'รายการชำระเงิน')

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h3 class="card-title">รายการชำระเงิน</h3>
            <div class="card-tools">
                <a href="{{ route('payment.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i>
                    เพิ่มชำระเงิน
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table" id="payment-table">
                <thead>
                    <tr>
                        <th>ชื่อชำระเงิน</th>
                        <th>ราคา</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $payment->pay_name }}</td>
                            <td>{{ $payment->value }}</td>
                            <td class="text-center">
                                <form action="{{ route('payment.destroy', $payment->pay_id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('payment.edit', $payment->pay_id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                            แก้ไข
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่?')">
                                            <i class="fas fa-trash"></i>
                                            ลบ
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
@endsection

@push('scripts')

    <script>
        $(document).ready(function () {
            $('#payment-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

@endpush