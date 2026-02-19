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
                <div class="card-body">
                    <table class="table table-sm" id="nationalityTable">
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
                                    <td>{{ $nationality->nationality_id }}</td>
                                    <td>{{ $nationality->n_name }}</td>
                                    <th>
                                        <form action="{{ route('nationality.delete', $nationality->nationality_id) }}" method="POST">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('nationality.edit', $nationality->nationality_id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                    แก้ไข
                                                </a>
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่?')">
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

    <script>
         $(document).ready(function () {
            $('#nationalityTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "stateSave": true,
            });
        });
    </script>

@endpush