<div class="row">
    <!-- Left col -->
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
                        @foreach($saleReport1Month as $report)
                            <tr>
                                <td data-order="{{ $report->order_date }}">{{ date('d-m-Y', strtotime($report->order_date)) }}</td>
                                <td>{{ number_format($report->sum, 2) }} บาท</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Right col -->
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
                        @foreach($saleReport12Month as $report)
                            <tr>
                                <td data-order="{{ $report->month }}">{{ $report->month }}</td>
                                <td>{{ number_format($report->sum, 2) }} บาท</td>
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
                        @foreach($saleReportYear as $report)
                            <tr>
                                <td data-order="{{ $report->year }}">{{ $report->year }}</td>
                                <td>{{ number_format($report->sum, 2) }} บาท</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>รวม</td>
                            <td>{{ number_format($saleReportYear->sum('sum'), 2) }} บาท</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>