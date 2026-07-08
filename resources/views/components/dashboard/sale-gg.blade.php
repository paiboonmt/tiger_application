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
                <canvas id="monthlySalesChart" height="80" data-sales-data='@json($saleReport12Month)'></canvas>
            </div>
        </div>
    </div>
</div>