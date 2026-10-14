@extends('layouts.admin')
@section('title', 'ไทเกอร์ มวยไทย | แก้ไขชำระเงิน')
@section('head', 'แก้ไขชำระเงิน')

@section('content')

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header bg-dark">
                <div class="card-title">
                    <h2>แก้ไขชำระเงิน</h2>
                </div>
                <div class="card-tools">
                    <a href="{{ route('payment.index') }}" class="btn btn-primary">
                        <i class="fas fa-undo-alt"></i>
                        กลับ
                    </a>
                </div>
            </div>
            <form action="{{ route('payment.update', $payment->pay_id) }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="pay_name">ชื่อชำระเงิน</label>
                        <input type="text" class="form-control" id="pay_name" name="pay_name" value="{{ $payment->pay_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="value">ราคา</label>
                        <input type="number" class="form-control" id="value" name="value" value="{{ $payment->value }}" required>
                    </div>
                </div>
                <!-- footer -->
                <div class="card-footer">
                    <button type="submit" class="col-12 btn btn-success">อัปเดท</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@push('scripts')
@endpush