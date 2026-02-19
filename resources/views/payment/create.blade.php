@extends('layouts.admin')
@section('title', 'ไทเกอร์ มวยไทย | เพิ่มชำระเงิน')
@section('head', 'เพิ่มชำระเงิน')

@section('content')

    <div class="row">
        <div class="col-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">เพิ่มชำระเงิน</h3>
                    <div class="card-tools">
                        <a href="{{ route('payment.index') }}" class="btn btn-primary btn-sm">กลับ</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('payment.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="pay_name">ชื่อชำระเงิน</label>
                            <input type="text" class="form-control" id="pay_name" name="pay_name" required>
                        </div>
                        <div class="form-group">
                            <label for="value">ราคา</label>
                            <input type="number" class="form-control" id="value" name="value" required>
                        </div>
                        <button type="submit" class="btn btn-primary">เพิ่ม</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
@endpush