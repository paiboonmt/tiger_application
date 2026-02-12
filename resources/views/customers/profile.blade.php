@extends('layouts.admin')
@section('title', 'Profile : '. $member->fname)
@section('head', 'รายชื่อสมาชิก > ข้อมูลสมาชิก')

@section('content')

<div class="row">
    <div class="col-md-12 p-1">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">ข้อมูลส่วนบุคคล</a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">บันทึกรานการเข้าใช้พื้นที่</a></li>
                    <li class="nav-item"><a class="nav-link" href="#document" data-toggle="tab">เอกสารส่วนบุคคล</a></li>
                    <li class="nav-item"><a class="nav-link" href="#data" data-toggle="tab">Data</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                        <div class="row">
                            <div class="col-2 text-center">
                                <a
                                    href="http://119.63.78.98:8889/memberimg/img/{{ $member->image }}"
                                    data-fancybox="gallery-1">
                                    <img
                                        src="http://119.63.78.98:8889/memberimg/img/{{ $member->image }}"
                                        class="img-fluid rounded" style="max-width: 200px;"/>
                                </a>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>เพศ</label>
                                            <input type="text" class="form-control" value="{{ $member->sex }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>ชื่อ นามสกุล</label>
                                            <input type="text" class="form-control" value="{{ $member->fname }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>สัญชาติ</label>
                                            <input type="text" class="form-control" value="{{ $member->nationalty }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>หมายเลขโทรศัพท์</label>
                                            <input type="text" class="form-control" value="{{ $member->phone }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>หมายเลขสมาชิก</label>
                                            <input type="text" class="form-control" value="{{ $member->m_card }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>หมายเลขบัตรประจำตัว</label>
                                            <input type="text" class="form-control" value="{{ $member->p_visa }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>อีเมล</label>
                                            <input type="text" class="form-control" value="{{ $member->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @if ($member->package == 147)
                                        <div class="col-4">
                                            <!-- product -->
                                            <div class="form-group">
                                                <label>บริการ</label>
                                                <input type="text" class="form-control" value="{{ $product->product_name }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <!-- product price -->
                                            <div class="forp">
                                                <label>ราคา</label>
                                                <input type="text" class="form-control" value="{{ number_format($product->price,2) }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <!-- product price -->
                                            <div class="forp">
                                                <label>จำนวนคงครั้งคงเหลือ</label>
                                                <input type="text" class="form-control" value="{{ $member->dropin }}">
                                            </div>
                                        </div>
                                    @else
                                     <div class="col-6">
                                        <!-- product -->
                                         <div class="form-group">
                                            <label>บริการ</label>
                                            <input type="text" class="form-control" value="{{ $product->product_name }}">
                                         </div>
                                    </div>
                                    <div class="col-6">
                                        <!-- product price -->
                                         <div class="forp">
                                            <label>ราคา</label>
                                            <input type="text" class="form-control" value="{{ number_format($product->price,2) }}">
                                         </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>สถานที่พัก</label>
                                            <textarea name="" id="" class="form-control" rows="3">{{ $member->accom }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>หมายเหตุ</label>
                                            <textarea name="" id="" class="form-control" rows="3">{{ $member->comment }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>เริ่มต้นใช้งาน</label>
                                            <input type="date" class="form-control" value="{{ $member->sta_date }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>วันหมดอายุบัตร</label>
                                            <input type="date" class="form-control" value="{{ $member->exp_date }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>จำนวนวันคงเหลือ</label>
                                            <input type="text" class="form-control" value="{{ $member->days_left }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>บันทึกเมื่อวันที่</label>
                                            <input type="text" class="form-control" value="{{ $member->date }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>บันทึกข้อมูลโดย</label>
                                            <input type="text" class="form-control" value="{{ $member->AddBy }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>เบอร์ติดต่อฉุกเฉิน</label>
                                            <input type="text" class="form-control" value="{{ $member->emergency }}">
                                        </div>
                                    </div>
                              
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                        <table class="table" id="timeLineTable">
                            <thead>
                                <tr>
                                    <th>#No</th>
                                    <th>Date : Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($timeLine as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->date }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="document">
                        <div class="row">
                            @foreach ($file as $doc)
                            <div style="width: 350px;" class="px-2">
                                <div class="card">
                                    <div class="card-body text-center">

                                        <a
                                            href="http://119.63.78.98:8889/memberimg/file/{{ $doc->image }}"
                                            data-fancybox="gallery-2"
                                            data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code">
                                            <img
                                                src="http://119.63.78.98:8889/memberimg/file/{{ $doc->image }}"
                                                width="100%" />
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane" id="data">
                        <pre>{{ json_encode($member, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE) }}</pre>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#timeLineTable').DataTable({
            "ordering": true,
            "searching": true,
            "paging": true,
            "info": true,
            "lengthChange": false,
            "pageLength": 10,
        });
    });

    Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });
</script>
@endpush