@extends('layouts.admin')

@section('title', 'ไทเกอร์ มวยไทย | สัญชาติ')
@section('page-title', 'สัญชาติ')

@section('content')


    <div class="row">
        <div class="col-12 p-2">
            <div class="card">
                <div class="card-header bg-dark">
                    <div class="row">
                        <div class="col">
                            <h4>สัญชาติ</h4>
                        </div>
                        <div class="col text-end">
                            <a href="{{ route('nationality.create') }}" class="btn btn-success">
                                <i class="fas fa-plus"></i>
                                เพื่มข้อมูล
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-body">
                    <table class="table table-bordered hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อสัญชาติ</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nationalities as $nationality)
                                <tr>
                                    <td>{{ $nationality->id }}</td>
                                    <td>{{ $nationality->name }}</td>
                                    <th>
                                        <form action="{{ route('nationality.delete', $nationality->id) }}" method="POST">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('nationality.edit', $nationality->id) }}"
                                                    class="btn btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                    แก้ไข
                                                </a>
                                                @csrf
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                    ลบ
                                                </button>
                                            </div>
                                        </form>
                                    </th>
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