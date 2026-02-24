@extends('layouts.admin')
@section('title', 'ไทเกอร์ มวยไทย | บทบาท')
@section('head', 'บทบาท')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">บทบาท</h3>
                    <a href="{{ route('roles.create') }}" class="btn btn-primary float-right">เพิ่มบทบาท</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ชื่อ</th>
                                <th>การจัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">แก้ไข</a>
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">ลบ</button>
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
@endpush