@extends('layouts.admin')
@section('title', 'ไทเกอร์ มวยไทย | เพื่มสินค้า')
@section('head', 'ผู้ใช้งานระบบ')

@section('content')

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title">เพิ่มสินค้า</h3>
                    <div class="card-tools">
                        <a href="{{ route('product.index') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-arrow-left"></i> กลับ
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="product_name">ชื่อสินค้า</label>
                            <input type="text" class="form-control" id="product_name" name="product_name">
                        </div>
                        <div class="form-group">
                            <label for="price">ราคา</label>
                            <input type="number" class="form-control" id="price" name="price">
                        </div>
                        <div class="form-group">
                            <label for="detail">รายละเอียด</label>
                            <input type="text" class="form-control" id="detail" name="detail">
                        </div>
                        <div class="form-group">
                            <label for="code">รหัสสินค้า</label>
                            <input type="text" class="form-control" id="code" name="code">
                        </div>
                        <button type="submit" class="btn btn-primary">เพิ่มสินค้า</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
@endpush