@extends('layouts.admin')
@section('title', 'Sponsers Page')
@section('head', 'รายชื่อสปอนเซอร์')
@section('link', 'sponsers')

@section('content')
@stack('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">


    <div class="row">
        <div class="col p-2">
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm" id="example1">
                        <thead>
                            <tr>
                                <th hidden>ID</th>
                                <th>โปรไฟล์</th>
                                <th>หมายเลขสมาชิก</th>
                                <th>ชื่อ</th>
                                <th>สัญชาติ</th>
                                <th>ประเภท</th>
                                <th>โปรแกรม</th>
                                <th>เริ่ม</th>
                                <th>หมด</th>
                                <th>คงเหลือ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $c)
                                <tr>
                                    <td hidden>{{ $c->id }}</td>
                                    <td>
                                        <a href="{{ route('sponsers.profile_expired', $c->id) }}" target="_blank">
                                            <img src="http://172.16.0.3/fighterimg/img/{{ $c->image }}" alt="User Avatar"
                                                class="img-size-50 mr-2 img-circle" style="width:40px; height:40px;">
                                        </a>
                                    </td>
                                    <td>{{ $c->m_card }}</td>
                                    <td>{{ $c->fname }}</td>
                                    <td>{{ $c->nationalty }}</td>
                                    <td>{{ $c->type_training }}</td>
                                    <td>{{ $c->type_fighter }}</td>
                                    <td>
                                        <span class="badge badge-success">{{ date('d-m-y', is_numeric($c->sta_date) ? $c->sta_date : strtotime($c->sta_date)) }}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-warning">{{ date('d-m-y', is_numeric($c->exp_date) ? $c->exp_date : strtotime($c->exp_date)) }}</span>
                                    </td>
                                    <td class="text-center">
                                        @if ($c->days_left >= 0)
                                            <span class="badge badge-info">{{ $c->days_left }} วัน</span>
                                        @else
                                            <span class="badge badge-danger">หมดอายุ</span>
                                        @endif
                                    </td>
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
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


    <script>
        $(function () {
            $("#example1").DataTable({
                // "responsive": true,
                // "lengthChange": true,
                "autoWidth": false,
                "saveState": true,
                "order": [[0, "desc"]],
                // "buttons": ["excel"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush