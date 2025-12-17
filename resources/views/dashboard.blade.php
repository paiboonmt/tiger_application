@extends('layouts.admin')

@section('title', 'Dashboard | Tiger Application')
@section('page-title', 'Dashboard')

@section('breadcrumb')
<li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<!-- Info boxes -->
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Orders</span>
                <span class="info-box-number">150</span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">93,139</span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Members</span>
                <span class="info-box-number">2,000</span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-chart-pie"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Visitors</span>
                <span class="info-box-number">65,120</span>
            </div>
        </div>
    </div>
</div>

<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <div class="col-md-8">
        <!-- Card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-line mr-1"></i>
                    Sales Graph
                </h3>
            </div>
            <div class="card-body">
                <p class="text-center">Chart placeholder</p>
            </div>
        </div>
    </div>

    <!-- Right col -->
    <div class="col-md-4">
        <!-- Info Box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent Activity</h3>
            </div>
            <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                    <li class="item">
                        <div class="product-info">
                            <a href="#" class="product-title">New order received</a>
                            <span class="product-description">5 minutes ago</span>
                        </div>
                    </li>
                    <li class="item">
                        <div class="product-info">
                            <a href="#" class="product-title">User registered</a>
                            <span class="product-description">10 minutes ago</span>
                        </div>
                    </li>
                    <li class="item">
                        <div class="product-info">
                            <a href="#" class="product-title">Payment received</a>
                            <span class="product-description">15 minutes ago</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Custom JavaScript
    console.log('Dashboard loaded');
</script>
@endpush