@extends('layouts.admin')
@section('title', 'Sponsers Page')
@section('head', 'รายชื่อสปอนเซอร์')
@section('link', 'sponsers')
@section('content')
<div class="row">
    <div class="col p-2">
        <div class="card">
            <div class="card-body">
                <table class="table" id="example1">
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
                                <a href="http://172.16.0.3/fighterimg/img/{{ $c->image }}" target="_blank">
                                    <img src="http://172.16.0.3/fighterimg/img/{{ $c->image }}"
                                        alt="User Avatar"
                                        class="img-size-50 mr-2 img-circle"
                                        style="width:40px; height:40px;">
                                    </a>
                                    <span style="color: red; padding-right: 10px;">|</span>

                                <a href="{{ route('sponsers.profile',$c->id ) }}" class="badge badge-info">ดูโปรไฟล์</a>
                            </td>
                            <td>{{ $c->m_card }}</td>
                            <td>{{ $c->fname }}</td>
                            <td>{{ $c->nationalty }}</td>
                            <td>{{ $c->type_training }}</td>
                            <td>{{ $c->type_fighter }}</td>
                            <td><span class="badge badge-success">{{ date('d-m-y', is_numeric($c->sta_date) ? $c->sta_date : strtotime($c->sta_date)) }}</span></td>
                            <td><span class="badge badge-warning">{{ date('d-m-y', is_numeric($c->exp_date) ? $c->exp_date : strtotime($c->exp_date)) }}</span></td>
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
<script>
    $(function() {
        $("#example1").DataTable({
            // "responsive": true,
            // "lengthChange": true,
            "autoWidth": false,
            "saveState": true,
            "order": [[ 0, "desc" ]],
            // "buttons": ["excel"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush