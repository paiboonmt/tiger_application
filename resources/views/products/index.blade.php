@extends('layouts.admin')
@section('title', 'ไทเกอร์ มวยไทย | สินค้า')
@section('head', 'สินค้า')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title">สินค้า</h3>
                    <div class="card-tools">
                        <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> เพิ่มสินค้า
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered" id="product-table">
                        <thead>
                            <tr>
                                <th>รหัสสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>ราคา</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ number_format($product->price, 2) }}</td>
                                    <td>
                                        <form action="{{ route('product.delete', $product->id) }}" method="post">
                                        <div class="btn-group" rows="group">
                                                @csrf
                                                <a href="{{ route('product.edit', $product->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('คุณต้องการลบสินค้านี้?')">
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

    <script>
        $("#product-table").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false, "stateSave": true,
        });
    </script>

    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session()->get('success') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    

@endpush