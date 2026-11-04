@extends('layouts.admin')
@section('title', 'สร้างสมาชิกใหม่')
@section('head', 'สร้างสมาชิกใหม่')

@section('content')
<div class="row">
    <div class="col-6">
        @include('components/checkin/input')
        @include('components/checkin/table_list')
    </div>
    <div class="col-6">
        @include('components/checkin/profile')
    </div>
</div>
@endsection

@push('scripts')

@endpush