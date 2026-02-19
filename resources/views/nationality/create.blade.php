@extends('layouts.admin')

@section('title', 'ไทเกอร์ มวยไทย | เพิ่มสัญชาติ')
@section('page-title', 'เพิ่มสัญชาติ')

@section('content')

<div class="row">
    <div class="col-6 p-2">
        <div class="card">
            <div class="card-header bg-dark">
                <div class="row">
                    <div class="col">
                        <h4>เพิ่มสัญชาติ</h4>
                    </div>
                    <div class="col text-end">
                        <a href="{{ route('nationality.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            กลับ
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('nationality.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">ชื่อสัญชาติ</label>
                                <input type="text" name="n_name" class="form-control" autofocus required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                บันทึก
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush