@extends('layouts.admin')
@section('title', 'ไทเกอร์ มวยไทย | แก้ไขบทบาท')
@section('head', 'แก้ไขบทบาท')

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i> แก้ไขบทบาท
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">ชื่อ</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}">
                        </div>
                        <div class="form-group">
                            <label for="status">สถานะ</label>
                            <select name="status" id="status" class="form-control">
                                <option value="active" {{ $role->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $role->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
@endpush