@extends('layouts.admin')
@section('title', 'Customer Total Report Page')

@section('content')

<div class="row">
    <div class="col p-1">
        <div class="row">
            <div class="col-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">จำนวนลูกค้าทั้งหมด</span>
                        <span class="info-box-number" style="font-size: 24px; font-weight: bold;">
                            {{ $data }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-clock"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">ลูกค้าที่เข้าใช้บริการวันนี้</span>
                        <span class="info-box-number" style="font-size: 24px; font-weight: bold;">
                            {{ $checkInTotals}}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-check"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">ลูกค้าสมัครสมาชิกใหม่วันนี้</span>
                        <span class="info-box-number" style="font-size: 24px; font-weight: bold;">
                            {{ $newMemberTotals }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="card px-1">
            <table
                class="table table-bordered table-striped"
                id="table_count_product">
                <thead>
                    <tr>
                        <th>ชื่อบริการ</th>
                        <th>จำนวนครั้ง</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($typeTotals as $s)
                    <tr>
                        <td>{{ $s->product_name }}</td>
                        <td>{{ $s->total }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-6">
        <div class="card px-1">
            <table class="table table-bordered" id="table_age_counts">
                <thead>
                    <tr>
                        <th scope="col">ช่วงอายุ</th>
                        <th scope="col">จำนวนลูกค้า</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ageCounts as $ageRange => $count)
                    <tr>
                        <td>{{ $ageRange }}</td>
                        <td>{{ $count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(function() {
        $("#table_count_product").DataTable({
            "autoWidth": false,
            "searching": false,
            "order": [
                [1, "desc"]
            ],
            "info": false,
            "lengthChange": false,
        }).buttons().container().appendTo('#table_count_product_wrapper .col-md-6:eq(0)');
        $("#table_age_counts").DataTable({
            "autoWidth": false,
            "searching": false,
            "order": [
                [1, "desc"]
            ],
            "info": false,
            "lengthChange": false,
        }).buttons().container().appendTo('#table_age_counts_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush