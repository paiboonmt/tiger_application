@extends('layouts.admin')
@section('title', 'ไทเกอร์ มวยไทย | เพื่มสินค้า')
@section('head', 'ผู้ใช้งานระบบ')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title">เพิ่มสินค้า</h3>
                    <div class="card-tools">
                        <a href="{{ route('product.index') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-arrow-left"></i> ย้อนกลับหน้าสินค้าทั้งหมด
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="product_name">ชื่อสินค้า</label>
                            <input type="text" class="form-control" required name="product_name" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="price">ราคา</label>
                            <input type="number" class="form-control" required name="price">
                        </div>
                        <button type="submit" class="col btn btn-primary">เพิ่มสินค้า</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
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
            }).then(() => {
                window.location = "{{ route('product.index') }}";
            });
        </script>
    @endif

@endpush
