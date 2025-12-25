@extends('layouts.admin')
@section('title', 'จัดการ ผู้ใช้งานระบบ')
@section('head', 'เพื่มผู้ใช้งานระบบ')
@section('content')

<div class="row">
    <div class="col-md-6 mx-auto p-1 ">

        <form method="POST" action="{{ route('register') }}">
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
                                value="{{old('name')}}"
                                required
                                autofocus
                                autocomplete="name">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                value="{{old('email')}}"
                                required
                                autocomplete="email">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input
                                type="password"
                                class="form-control"
                                name="password"
                                required
                                autocomplete="new-password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input
                                type="password"
                                class="form-control"
                                name="password_confirmation"
                                required
                                autocomplete="password_confirmation">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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