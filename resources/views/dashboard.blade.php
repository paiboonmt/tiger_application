@extends('layouts.admin')
@section('title', 'ไทเกอร์ มวยไทย | แดชบอร์ด')
@section('head', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
@stack('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">


<!-- box -->
@include('components/dashboard/box')

@if(Auth::user()->role == 'admin')
<!-- table -->
@include('components/dashboard/daily-sale')
@endif
<!-- sale-good -->
@include('components/dashboard/sale-good')

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
            $("#table-sale-report-1month").DataTable({
                // "responsive": true,
                // "lengthChange": true,
                "lengthChange": false,
                "searching": false,
                "autoWidth": false,
                "saveState": true,
                "pageLength": 5,
                "order": [[0, "desc"]],
                // "buttons": ["excel"]
            }).buttons().container().appendTo('#table-sale-report-1month_wrapper .col-md-6:eq(0)');
            $("#table-sale-report-12month").DataTable({
                // "responsive": true,
                // "lengthChange": true,
                "lengthChange": false,
                "searching": false,
                "autoWidth": false,
                "saveState": true,
                "pageLength": 5,
                "order": [[0, "desc"]],
                
                // "buttons": ["excel"]
            }).buttons().container().appendTo('#table-sale-report-12month_wrapper .col-md-6:eq(0)');
            $("#table-sale-report-year").DataTable({
                // "responsive": true,
                // "lengthChange": true,
                "lengthChange": false,
                "searching": false,
                "autoWidth": false,
                "saveState": true,
                "pageLength": 5,
                "order": [[0, "desc"]],
                // "buttons": ["excel"]
            }).buttons().container().appendTo('#table-sale-report-year_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush