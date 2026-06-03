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
                            <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="text" name="group" value="1" hidden>

                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label>เพศ</label>
                                                    <select name="gender" class="form-control" required>
                                                        <!-- <option value="" disabled selected>เลือกเพศ</option> -->
                                                        <option value="ชาย">ชาย</option>
                                                        <option value="หญิง">หญิง</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>ชื่อ นามสกุล</label>
                                                    <input type="text" class="form-control" name="fname" required
                                                        value="Mr.Paiboon Yaniwong">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>สัญชาติ</label>
                                                    <!-- <input type="text" class="form-control" name="nationalty"> -->
                                                    <select name="nationality" class="form-control" required>
                                                        <!-- <option value="" disabled selected>เลือกสัญชาติ</option> -->
                                                        @foreach($nationality_data as $row)
                                                            <!-- <option value="{{ $row->n_name }}">{{ $row->n_name }}</option> -->
                                                            <option value="Thailand">Thailand</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>หมายเลขโทรศัพท์</label>
                                                    <input type="text" class="form-control" name="phone" required
                                                        value="1234567890">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>หมายเลขสมาชิก</label>
                                                    <input type="text" class="form-control" name="m_card" required
                                                        value="1234567890">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>หมายเลขบัตรประจำตัว</label>
                                                    <input type="text" class="form-control" name="p_visa" required
                                                        value="1234567890">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>อีเมล</label>
                                                    <input type="email" class="form-control" name="email" required
                                                        value="paiboon@gmail.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col" style="align-items: center;">
                                                <div class="form-group">
                                                    <label>อัปโหลดรูปภาพ</label>
                                                    <div class="mb-2">
                                                        <img id="photo-preview" src="#" alt="ตัวอย่างรูปภาพ"
                                                            style="display:none; width:150px; height:150px; object-fit:cover; border:2px solid #ddd; border-radius:8px;">
                                                        <div id="photo-placeholder"
                                                            style="width:150px; height:150px; border:2px dashed #ccc; border-radius:8px; display:flex; align-items:center; justify-content:center; color:#aaa; font-size:13px;">
                                                            ไม่มีรูปภาพ
                                                        </div>
                                                    </div>
                                                    <input type="file" class="form-control-file" name="photo" required
                                                        accept="image/*" id="photo-input">
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="form-group">
                                                    <label for="product">ชื่อบริการ</label>
                                                    <select name="product" class="form-control" required>
                                                        <option value="" disabled selected>เลือกบริการ</option>
                                                        @foreach($product_data as $row)
                                                            <option value="{{ $row->product_name }}">{{ $row->product_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>สถานที่พัก</label>
                                                            <textarea name="accom" class="form-control"
                                                                rows="3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, voluptatibus?</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>หมายเหตุ</label>
                                                            <textarea name="comment" class="form-control"
                                                                rows="3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, nihil.</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>เริ่มต้นใช้งาน</label>
                                                    <input type="date" name="sta_date" class="form-control" required
                                                        value="{{ date('Y-m-d') }}">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>วันหมดอายุบัตร</label>
                                                    <input type="date" name="exp_date" class="form-control" required
                                                        value="{{ date('Y-m-d', strtotime('+30 day')) }}">
                                                </div>
                                            </div>
                                            <!-- <div class="col-3">
                                                    <div class="form-group">
                                                        <label>จำนวนวันคงเหลือ</label>
                                                        <input type="text" name="days_left" class="form-control" >
                                                    </div>
                                                </div> -->
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>บันทึกเมื่อวันที่</label>
                                                    <input type="text" class="form-control" required
                                                        value="{{ date('Y-m-d H:i:s') }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>บันทึกข้อมูลโดย</label>
                                                    <input type="text" class="form-control" required
                                                        value="{{ Auth::user()->name }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>เบอร์ติดต่อฉุกเฉิน</label>
                                            <input type="text" class="form-control bg-danger text-white" name="em_phone"
                                                value="1234567890" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>ชื่อผู้ติดต่อฉุกเฉิน</label>
                                            <input type="text" class="form-control bg-danger text-white" name="em_name"
                                                value="นายสมชาย ใจดี" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                        <a href="{{ route('customers.index') }}" class="btn btn-secondary">ยกเลิก</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.getElementById('photo-input').addEventListener('change', function () {
            const file = this.files[0];
            const preview = document.getElementById('photo-preview');
            const placeholder = document.getElementById('photo-placeholder');

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    placeholder.style.display = 'none';
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
                preview.src = '#';
                placeholder.style.display = 'flex';
            }
        });
    </script>
@endpush