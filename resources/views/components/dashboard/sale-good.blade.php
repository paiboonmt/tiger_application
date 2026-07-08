<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title">
                    <i class="fas fa-chart-area mr-1"></i>
                    บริการที่ขายดีที่สุด เดือน {{ $month }}
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
                        @foreach($serviceSales as $report)
                            <tr>
                                <td>{{ $report->product_name }}</td>
                                <td>{{ number_format($report->sum_total, 2) }} บาท</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>