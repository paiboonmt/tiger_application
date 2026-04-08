@extends('layouts.admin')
@section('title', 'สร้างสมาชิกใหม่')
@section('head', 'สร้างสมาชิกใหม่')

@section('content')

<div class="row">
    <div class="col-md-12 p-1">
        <div class="card">

            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>เพศ</label>
                                            <select name="gender"class="form-control" required>
                                                <option value="" disabled selected>เลือกเพศ</option>
                                                <option value="ชาย">ชาย</option>
                                                <option value="หญิง">หญิง</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>ชื่อ นามสกุล</label>
                                            <input type="text" class="form-control" name="fname">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>สัญชาติ</label>
                                            <input type="text" class="form-control" name="nationalty">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>หมายเลขโทรศัพท์</label>
                                            <input type="text" class="form-control" name="phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>หมายเลขสมาชิก</label>
                                            <input type="text" class="form-control" name="m_card">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>หมายเลขบัตรประจำตัว</label>
                                            <input type="text" class="form-control" name="p_visa">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>อีเมล</label>
                                            <input type="text" class="form-control" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="product">ชื่อบริการ</label>
                                            <select name="product" id="product" class="form-control">
                                               
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>สถานที่พัก</label>
                                            <textarea name="accom" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>หมายเหตุ</label>
                                            <textarea name="comment" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>เริ่มต้นใช้งาน</label>
                                            <input type="date" name="sta_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>วันหมดอายุบัตร</label>
                                            <input type="date" name="exp_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>จำนวนวันคงเหลือ</label>
                                            <input type="text" name="days_left" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>บันทึกเมื่อวันที่</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>บันทึกข้อมูลโดย</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>เบอร์ติดต่อฉุกเฉิน</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
@endpush
