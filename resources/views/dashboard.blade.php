@extends('layouts.admin')
@section('title', 'ไทเกอร์ มวยไทย | แดชบอร์ด')
@section('head', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
@include('components/dashboard/box')
@endsection

@push('scripts')

@endpush