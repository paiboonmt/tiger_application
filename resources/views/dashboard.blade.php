@extends('layouts.admin')

@section('title', 'ไทเกอร์ มวยไทย | แดชบอร์ด')
@section('head', 'แดชบอร์ด')

@section('breadcrumb')
    <li class="breadcrumb-item active">แดชบอร์ด</li>
@endsection

@section('content')

@include('components/dashboard/box')

    <!-- เป็น Admin ถึงจะมองเห็น -->
    @if (Auth::user()->role == 'admin')
        @include('components/dashboard/daily-sale')
        @include("components/dashboard/sale-gg")
        @include('components/dashboard/sale-good')
    @endif


@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        const chartCanvas = document.getElementById('monthlySalesChart');

        if (chartCanvas && typeof Chart !== 'undefined') {
            const monthlyData = JSON.parse(chartCanvas.dataset.salesData || '[]');

            if (Array.isArray(monthlyData) && monthlyData.length) {
                const months = monthlyData.map(item => item.month);
                const sales = monthlyData.map(item => parseFloat(item.sum));
                const ctx = chartCanvas.getContext('2d');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: months,
                        datasets: [{
                            label: 'ยอดขาย (บาท)',
                            data: sales,
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 2,
                            borderRadius: 5
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function (context) {
                                        return 'ยอดขาย: ' + context.parsed.y.toLocaleString('th-TH', {
                                            minimumFractionDigits: 2,
                                            maximumFractionDigits: 2
                                        }) + ' บาท';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function (value) {
                                        return value.toLocaleString('th-TH') + ' ฿';
                                    }
                                }
                            }
                        }
                    }
                });
            }
        }

        $(function () {
            const initDataTable = (selector, options = {}) => {
                if (typeof $.fn.DataTable !== 'function') return;
                const $table = $(selector);
                if (!$table.length) return;
                $table.DataTable(options);
            };

            initDataTable('#table-sale-report-1month', {
                paging: true,
                lengthChange: false,
                searching: false,
                ordering: true,
                info: false,
                autoWidth: false,
                responsive: false,
                pageLength: 5,
                order: [[0, 'desc']]
            });

            initDataTable('#table-sale-report-12month', {
                paging: true,
                lengthChange: false,
                searching: false,
                ordering: false,
                info: false,
                autoWidth: false,
                responsive: false,
                pageLength: 5,
                order: [[0, 'desc']]
            });

            initDataTable('#table-service-sales', {
                paging: true,
                lengthChange: false,
                searching: false,
                ordering: true,
                info: false,
                autoWidth: false,
                responsive: false,
                pageLength: 10,
                order: [[2, 'desc']]
            });
        });
    </script>
@endpush