@extends('layouts.admin')

@section('title', 'ไทเกอร์ มวยไทย | แก้ไขสัญชาติ')
@section('page-title', 'แก้ไขสัญชาติ')

@section('content')
<div class="row">
    <div class="col-6 mx-auto">
        <div class="card">
            <div class="card-header bg-dark">

                <div class="card-title">
                    แก้ไขสัญชาติ
                </div>
                <div class="card-tools">
                    <a href="{{ route('nationality.index') }}" class="btn btn-info btn-sm">
                        <i class="fas fa-arrow-left"></i>
                        กลับ
                    </a>
                </div>

            </div>
            <div class="card-body">
                <form action="{{ route('nationality.update', $nationality->nationality_id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="n_name">ชื่อสัญชาติ</label>
                                <input type="text" name="n_name" id="n_name" class="form-control" required
                                    value="{{ $nationality->n_name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                บันทึก_ข้อมูล
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