@extends('layouts.admin')
@section('title', 'Profile Page')
<!-- @section('page-title', 'Start Page') -->
@section('head', 'Sponser Profile')

@push('styles')
<style>
    #profileImage {
        border-radius: 5px;
        cursor: pointer;
        max-width: 100%;
    }

    #profileImage:hover {
        transform: scale(1.01) rotate(-1deg);
        transition: transform 0.9s cubic-bezier(0.4, 0.2, 0.2, 1);
    }

    .ribbon-wrapper {
        transition: opacity 0.9s cubic-bezier(0.4, 0.2, 0.2, 1);
    }
    #profileImage:hover ~ .ribbon-wrapper,
    .position-relative:hover .ribbon-wrapper {
        opacity: 0;
    }
    
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-md-12 p-1">
        <div class="card card-primary card-outline shadow">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timelines</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Documents</a></li>
                    <li class="nav-item"><a class="nav-link" href="#data" data-toggle="tab">Data</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                        <div class="row">
                            <div class="col-2 text-center">
                                <div class="position-relative">
                                    <div class="ribbon-wrapper">
                                        @if ($member->days_left >= 0)
                                        <div class="ribbon bg-success">
                                            {{ $member->days_left }} วัน
                                        </div>
                                        @else
                                        <div class="ribbon bg-red">
                                            {{ $member->days_left }} วัน
                                        </div>
                                        @endif
                                    </div>
                                    <a
                                        href="http://172.16.0.3/fighterimg/img/{{ $member->image }}"
                                        data-fancybox="gallery-1">
                                        <img id="profileImage"
                                            src="http://172.16.0.3/fighterimg/img/{{ $member->image }}"
                                             />
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">

                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>Gender</label>
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
                                            <label>Number card id</label>
                                            <input type="text" class="form-control" value="{{ $member->m_card }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>National ID card number Or Passport</label>
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
                                            <label>Birth day</label>
                                            <input type="date" class="form-control" value="{{ $member->birthday }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input type="text" class="form-control" value="{{ $member->age }} Years">
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
                                            <label>Height</label>
                                            <input type="text" class="form-control" value="{{ $member->height }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Weight</label>
                                            <input type="text" class="form-control" value="{{ $member->weigh }}">
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
                                            <label>Remart</label>
                                            <textarea name="" id="" class="form-control" rows="3">{{ $member->comment }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Start Training</label>
                                            <input type="date" class="form-control" value="{{ $member->sta_date }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Card Expriy</label>
                                            <input type="date" class="form-control" value="{{ $member->exp_date }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            @if ($member->days_left >= 0)
                                                <label>Date Quantity</label>
                                                <input type="text" class="form-control bg-success" value="{{ $member->days_left }}">
                                            @else
                                                <label>Date Quantity</label>
                                                <input type="text" class="form-control bg-danger" value="{{ $member->days_left }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Type Of Training</label>
                                            <input type="text" class="form-control" value="{{ $member->type_training }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Type Of Use</label>
                                            <input type="text" class="form-control" value="{{ $member->type_fighter }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Created At</label>
                                            <input type="text" class="form-control" value="{{ $member->date }}">
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
                    <div class="tab-pane" id="settings">
                        <div class="row">
                            @foreach ($file as $doc)
                            <div style="width: 350px;" class="px-2">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <a href="http://172.16.0.3/fighterimg/file/{{ $doc->image }}" data-fancybox="gallery-2">
                                            <img src="http://172.16.0.3/fighterimg/file/{{ $doc->image }}" width="100%" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="data">
                        <pre>{{ json_encode($member, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE) }}</pre>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
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