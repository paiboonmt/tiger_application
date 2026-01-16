@extends('layouts.admin')
@section('title', 'จัดการ ผู้ใช้งานระบบ')
@section('head', 'แก้ไขผู้ใช้งานระบบ')
@section('content')


<div class="row">
    <div class="col-md-6 mx-auto p-1 ">

        <form method="POST" action="{{ route('users.update',$data->id) }}">
            @csrf
            <div class="card p-3">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                value="{{ $data->name }}"
                                required/>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                value="{{ $data->email }}"
                                required>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control">
                                <option value="{{ $data->role }}">{{ $data->role }}</option>
                                @if ( $data->role == 'admin')
                                    <option value="user">User</option>
                                @elseif ( $data->role == 'user')
                                    <option value="admin">Admin</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="password">New Password ( <span class="text-danger">ถ้าไม่เปลี่ยนพาสเวิดส์ ให้ปล่อยเป็นค่าว่าง</span> )</label>
                            <input
                                type="password"
                                class="form-control"
                                name="password">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password ( <span class="text-danger">ถ้าไม่เปลี่ยนพาสเวิดส์ ให้ปล่อยเป็นค่าว่าง</span> )</label>
                            <input
                                type="password"
                                class="form-control"
                                name="password_confirmation">
                        </div>
                    </div>

                </div>
                <div class="form-group mt-3 text-end">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        ย้อนกลับ
                    </a>
                    <button type="submit" class="btn btn-primary">
                        บันทึก
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>


@endsection

@push('scripts')

@endpush