@extends('layouts.admin')
@section('title', 'ไทเกอร์ มวยไทย | รายการชำระเงิน')
@section('head', 'รายการชำระเงิน')

@section('content')
    <div class="card">
        <div class="card-header bg-dark">

            <h2 class="card-title">รายการชำระเงิน</h2>

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
                        <th>ไอดี</th>
                        <th>วิธีชำระเงิน</th>
                        <th>เปอร์เซน</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $payment->pay_id }}</td>
                            <td>{{ $payment->pay_name }}</td>
                            <td>{{ $payment->value }}</td>
                            <td class="text-center">
                                <form action="{{ route('payment.destroy', $payment->pay_id) }}" method="POST"style="display: inline;">
                                    @csrf
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('payment.edit', $payment->pay_id) }}" class="btn btn-success">
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
@endsection

@push('scripts')
    <script>
        $('#payment-table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    </script>
@endpush