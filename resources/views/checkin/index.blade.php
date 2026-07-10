@extends('layouts.admin')
@section('title', 'สร้างสมาชิกใหม่')
@section('head', 'สร้างสมาชิกใหม่')

@section('content')
    @include('components/checkin/input')
    @include('components/checkin/table_list')

@endsection

@push('scripts')

@endpush