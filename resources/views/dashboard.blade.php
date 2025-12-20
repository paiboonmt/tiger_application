@extends('layouts.admin')

@section('title', 'Dashboard | Tiger Application')
@section('page-title', 'Dashboard')

@section('breadcrumb')
<li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<!-- Info boxes -->
<div class="row">

    <div class="col-12 p-2 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">จำนวนลูกค้าที่เป็นสมาชิก</span>
                <span class="info-box-number">{{ $data }}</span>
            </div>
        </div>
    </div>

    <div class="col-12 p-2 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">ลูกค้าสมัครสมาชิกใหม่วันนี้</span>
                <span class="info-box-number">{{ $newMemberTotals }} </span>
            </div>
        </div>
    </div>

    <div class="col-12 p-2 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-check-double"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">จำนวนลูกค้าที่เข้ามาวันนี้</span>
                <span class="info-box-number">{{ $checkInTotals }}</span>
            </div>
        </div>
    </div>

    <div class="col-12 p-2 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fab fa-first-order-alt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Visitors</span>
                <span class="info-box-number">65,120</span>
            </div>
        </div>
    </div>
</div>

<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <div class="col-md-6">
        <!-- Card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-line mr-1"></i>
                    รายงานยอดขาย 1 เดือนล่าสุด
                </h3>
            </div>
            <div class="card-body p-1">
                <table class="table" id="table-sale-report-1month">
                    <thead>
                        <tr>
                            <th>วันที่</th>
                            <th>ยอดขาย</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($saleReport1Month as $report)
                        <tr>
                            <td>{{ $report->order_date }}</td>
                            <td>{{ number_format($report->sum, 2) }} บาท</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Right col -->
    <div class="col-md-6">
        <!-- Info Box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-bar mr-1"></i>
                    รายงานยอดขาย 12 เดือนล่าสุด
                </h3>
            </div>
            <div class="card-body p-1">
                <table class="table" id="table-sale-report-12month">
                    <thead>
                        <tr>
                            <th>เดือน</th>
                            <th>ยอดขาย</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($saleReport12Month as $report)
                        <tr>
                            <td>{{ $report->month }}</td>
                            <td>{{ number_format($report->sum, 2) }} บาท</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-area mr-1"></i>
                    กราฟยอดขายประจำเดือน
                </h3>
            </div>
            <div class="card-body">
                <canvas id="monthlySalesChart" height="80"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    // Monthly Sales Chart
    const monthlyData = @json($saleReport12Month);
    const months = monthlyData.map(item => item.month);
    const sales = monthlyData.map(item => parseFloat(item.sum));

    const ctx = document.getElementById('monthlySalesChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'ยอดขาย (บาท)',
                data: sales,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'ยอดขาย: ' + context.parsed.y.toLocaleString('th-TH', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' บาท';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString('th-TH') + ' ฿';
                        }
                    }
                }
            }
        }
    });

    $(document).ready(function() {
        $('#table-sale-report-1month').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "pageLength": 5,
            "order": [
                [0, 'desc']
            ]
        });
    });
    $(document).ready(function() {
        $('#table-sale-report-12month').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "pageLength": 5,
            "order": [
                [0, 'desc']
            ]
        });
    });
</script>
@endpush