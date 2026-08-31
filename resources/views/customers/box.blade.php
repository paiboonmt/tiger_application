<div class="row">

    <div class="col-12 p-2 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">จำนวนลูกค้าที่เป็นสมาชิก</span>
                <span class="info-box-number">{{ $box }}</span>
            </div>
        </div>
    </div>

    <div class="col-12 p-2 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">ลูกค้าสมัครสมาชิกใหม่วันนี้</span>
                <span class="info-box-number">{{ $newMember }} </span>
            </div>
        </div>
    </div>

    <div class="col-12 p-2 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-check-double"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">จำนวนลูกค้าที่เข้ามาวันนี้</span>
                <span class="info-box-number">{{ 10 }}</span>
            </div>
        </div>
    </div>

    <div class="col-12 p-2 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fab fa-first-order-alt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">จำนวนสมาชิกที่เข้าใช้บริการฟรี</span>
                <span class="info-box-number">{{ 10 }}</span>
            </div>
        </div>
    </div>
</div>