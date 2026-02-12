@extends('layouts.admin')

@section('title', 'รัตชัย | แดชบอร์ด')
@section('page-title', 'แดชบอร์ด')

@section('breadcrumb')
    <li class="breadcrumb-item active">แดชบอร์ด</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 p-2 col-sm-6 col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">จำนวนลูกค้าที่เป็นสมาชิก</span>
                    <span class="info-box-number">{{ $dataMembers['totalMembers'] }}</span>
                </div>
            </div>
        </div>

        <div class="col-12 p-2 col-sm-6 col-md-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">ลูกค้าสมัครสมาชิกใหม่วันนี้</span>
                    <span class="info-box-number">{{ $dataNewMember['totalNewMembers'] }}</span>
                </div>
            </div>
        </div>

        <div class="col-12 p-2 col-sm-6 col-md-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-check-double"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">จำนวนลูกค้าที่เข้ามาวันนี้</span>
                    <span class="info-box-number">{{ $dataCheckin['totalCheckins'] }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
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
                            @foreach ($dataDalySales as $itemDalySales)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($itemDalySales['order_date'])->format('d/m/Y') }}</td>
                                    <td>{{ number_format($itemDalySales['sum'], 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
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
                            @foreach ($dataMonthlySales as $itemMonthlySales)
                                @php
                                    $thai_months = [
                                        '01' => 'มกราคม',
                                        '02' => 'กุมภาพันธ์',
                                        '03' => 'มีนาคม',
                                        '04' => 'เมษายน',
                                        '05' => 'พฤษภาคม',
                                        '06' => 'มิถุนายน',
                                        '07' => 'กรกฎาคม',
                                        '08' => 'สิงหาคม',
                                        '09' => 'กันยายน',
                                        '10' => 'ตุลาคม',
                                        '11' => 'พฤศจิกายน',
                                        '12' => 'ธันวาคม'
                                    ];
                                    $month_num = \Carbon\Carbon::parse($itemMonthlySales['month'])->format('m');
                                @endphp
                                <tr>
                                    <td>{{ $thai_months[$month_num] ?? $itemMonthlySales['month'] }}</td>
                                    <td>{{ number_format($itemMonthlySales['sum'], 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Info Box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-bar mr-1"></i>
                        รายงานยอดขายรายปี
                    </h3>
                </div>
                <div class="card-body p-1">
                    <table class="table" id="table-sale-report-year">
                        <thead>
                            <tr>
                                <th>ปี</th>
                                <th>ยอดขาย</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataYearlySales as $itemYearlySales)
                                <tr>
                                    <td>{{ $itemYearlySales['year'] }}</td>
                                    <td>{{ number_format($itemYearlySales['sum'], 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            @php
                                $totalYearlySales = 0;
                                foreach ($dataYearlySales as $itemYearlySales) {
                                    $totalYearlySales += $itemYearlySales['sum'];
                                }
                            @endphp
                            <tr>
                                <th>รวม</th>
                                <th>{{ number_format($totalYearlySales, 2) }}</th>
                            </tr>
                        </tfoot>
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
                        บริการที่ขายดีที่สุด เดือน {{ $currentMonth }}
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table" id="table-service-sales">
                        <thead>
                            <tr>
                                <th>บริการ</th>
                                <th>ยอดขาย</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataProductPopular as $itemProductPopular)
                                <tr>
                                    <td>{{ $itemProductPopular['product_name'] }}</td>
                                    <td>{{ number_format($itemProductPopular["sum_total"], 2) }}</td>
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
            $('#table-sale-report-1month').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": false,
                "pageLength": 5,
                "order": [
                    [0, 'desc']
                ]
            });
            $('#table-sale-report-12month').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": false,
                "autoWidth": false,
                "responsive": false,
                "pageLength": 5,
                "order": [
                    [0, 'desc']
                ]
            });
            $('#table-service-sales').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": false,
                "pageLength": 5,
                "order": [
                    [1, 'desc']
                ]
            });
        });
        function refreshData() {
            window.location.reload();
        }
        setInterval(refreshData, 180000);
    </script>
@endpush