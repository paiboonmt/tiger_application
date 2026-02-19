@extends('layouts.admin')
@section('title', 'ไทเกอร์ มวยไทย | แก้ไขชำระเงิน')
@section('head', 'แก้ไขชำระเงิน')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">แก้ไขชำระเงิน</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('payment.update', $payment->pay_id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="pay_name">ชื่อชำระเงิน</label>
                    <input type="text" class="form-control" id="pay_name" name="pay_name" value="{{ $payment->pay_name }}" required>
                </div>
                <div class="form-group">
                    <label for="value">ราคา</label>
                    <input type="number" class="form-control" id="value" name="value" value="{{ $payment->value }}" required>
                </div>
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
@endpush