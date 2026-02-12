@extends('layouts.admin')
@section('title', 'Check in report Page')

@section('content')
<div class="row">
    <div class="col p-1">
        <div class="card">
            <div class="card-header bg-dark">
                <h2>
                    รายงานเข้าใช้บริการ
                </h2>
            </div>
            <div class="card-body">
                <!-- ฟอร์มค้นหาตามช่วงวันที่ -->
                <form method="POST" action="{{ route('report.checkin.search') }}" class="mb-4">
                    @csrf
                    <div class="row g-3 align-items-end">
                        <div class="col-md-4">
                            <label for="start_date" class="form-label">จากวันที่</label>
                            <input
                                type="date"
                                class="form-control"
                                id="start_date"
                                name="start_date"
                                value="{{ \Carbon\Carbon::yesterday()->format('Y-m-d') }}"
                                required>
                        </div>
                        <div class="col-md-4">
                            <label for="end_date" class="form-label">ถึงวันที่</label>
                            <input
                                type="date"
                                class="form-control"
                                id="end_date"
                                name="end_date"
                                value="{{ date('Y-m-d') }}"
                                required>
                        </div>
                        <div class="col-md-4">
                            <button
                                type="submit"
                                class="btn btn-primary">
                                <i class="fas fa-search"></i>
                                ค้นหา
                            </button>
                            <a
                                href="{{ route('report.checkin') }}"
                                class="btn btn-secondary">
                                <i class="fas fa-redo"></i>
                                รีเซ็ต
                            </a>
                        </div>
                    </div>
                </form>

                <!-- ตารางแสดงผลข้อมูล -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="table">
                        <thead class="table-dark">
                            <tr>
                                <th>วันที่</th>
                                <th>จำนวนครั้ง</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($data) && $data->count() > 0)
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }}</td>
                                    <td>{{ $item->quantity }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2" class="text-center">ไม่มีข้อมูลในช่วงวันที่ที่เลือก</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@if(isset($data) && $data->count() > 0)
<script>
    $(function() {
        $("#table").DataTable({
            "autoWidth": false,
            "saveState": true,
            "buttons": ["excel","print"],
        }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
    });
</script>
@endif
@endpush