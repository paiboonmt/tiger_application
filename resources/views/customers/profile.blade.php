@extends('layouts.admin')
@section('title', 'โปรไฟล์ สมาชิก')

@section('content')

<div class="row">
    <div class="col-md-12 p-2">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timelines</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Documents</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane" id="activity">
                        <div class="row">
                            <div class="col-2 text-center">
                                <img src="http://172.16.0.3/memberimg/img/{{ $member->image }}" alt="Profile Image" class="img-fluid rounded" style="max-width: 200px;">
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
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" value="{{ $member->fname }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Nationality</label>
                                            <input type="text" class="form-control" value="{{ $member->nationalty }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" value="{{ $member->phone }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Card Number</label>
                                            <input type="text" class="form-control" value="{{ $member->m_card }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Card id</label>
                                            <input type="text" class="form-control" value="{{ $member->p_visa }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" value="{{ $member->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Height</label>
                                            <input type="text" class="form-control" value="{{ $member->height }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Weight</label>
                                            <input type="text" class="form-control" value="{{ $member->weigh }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Emergency</label>
                                            <input type="text" class="form-control" value="{{ $member->emergency }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea name="" id="" class="form-control" rows="3">{{ $member->accom }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Remark</label>
                                            <textarea name="" id="" class="form-control" rows="3">{{ $member->comment }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <input type="date" class="form-control" value="{{ $member->sta_date }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Expire Date</label>
                                            <input type="date" class="form-control" value="{{ $member->exp_date }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Remaining days</label>
                                            <input type="text" class="form-control" value="{{ $member->days_left }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Created At</label>
                                            <input type="text" class="form-control" value="{{ $member->date }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Create By</label>
                                            <input type="text" class="form-control" value="{{ $member->AddBy }}" readonly>
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
                                    <th>ลำดับที่</th>
                                    <th>วันที่</th>
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

                    <div class="tab-pane active " id="settings">
                        <div class="row">
                            @foreach ($file as $doc)
                            <div style="width: 350px;" class="px-2">
                                <div class="card">
                                    <div class="card-body text-center">

                                        <a
                                            href="http://172.16.0.3/memberimg/file/{{ $doc->image }}"
                                            data-fancybox="gallery"
                                            data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code">
                                            <img
                                                src="http://172.16.0.3/memberimg/file/{{ $doc->image }}"
                                                width="100%" />
                                        </a>

                                        <!-- <img src="http://172.16.0.3/memberimg/file/{{ $doc->image }}"
                                            alt="Document Image"
                                            class="img-fluid rounded"
                                            style="max-width: 100%;"> -->
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
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