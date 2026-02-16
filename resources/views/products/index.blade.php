@extends('layouts.admin')
@section('title', 'ไทเกอร์ มวยไทย | สินค้า')
@section('head', 'สินค้า')

@section('content')
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
                    <table class="table table-bordered" id="product-table">
                        <thead>
                            <tr>
                                <th>ชื่อสินค้า</th>
                                <th>ราคา</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ number_format($product->price ,2) }}</td>
                                    <td>
                                        <div class="btn-group" rows="group">
                                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
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
        $(document).ready(function() {
            $('#product-table').DataTable();
        });
    </script>

@endpush