<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total members
        $data = DB::table('member')
            ->where('status_code', 4)
            ->whereDate('exp_date', '>=', now()->toDateString())
            ->count('id');

        // Type product total
        $typeTotals = DB::table('member')
            ->join('products', 'member.package', '=', 'products.id')
            ->select('products.product_name', DB::raw('count(*) as total'))
            ->where('status_code', 4)
            ->whereDate('exp_date', '>=', now()->toDateString())
            ->groupBy('products.product_name')
            ->get();

        // Check-in today total
        $checkInTotals = DB::table('totel')
            ->whereDate('date',  now()->toDateString())
            ->first();

        // New members today total
        $newMemberTotals = DB::table('member')
            ->where('status_code', 4)
            ->whereDate('date',  now()->toDateString())
            ->count('id');

        // จำนวนสมาชิกที่เข้าใช้บริการฟรี
        $freeMemberTotals = DB::table('member')
            ->where('status_code', 3)
            ->whereDate('exp_date', '>=',  now()->toDateString())
            ->count('id');

        // Age group counts
        $ageRanges = [
            'น้อยกว่า 18' => [0, 17],
            'อายุระหว่าง 18 ถึง 25' => [18, 25],
            'อายุระหว่าง 26 ถึง 35' => [26, 35],
            'อายุระหว่าง 36 ถึง 45' => [36, 45],
            'อายุระหว่าง 46 ถึง 60' => [46, 60],
            'อายุมากกว่า 60' => [61, 200],
        ];
        $ageCounts = [];
        foreach ($ageRanges as $key => [$min, $max]) {
            $ageCounts[$key] = DB::table('member')
                ->where('status_code', 4)
                ->whereDate('exp_date', '>=',  now()->toDateString())
                ->whereRaw("TIMESTAMPDIFF(YEAR, birthday, CURDATE()) BETWEEN ? AND ?", [$min, $max])
                ->count('id');
        }

        // Table report Sale total 1 month
        $saleReport1Month = DB::table('orders')
            ->selectRaw('DATE(`date`) as order_date, SUM(total) as sum')
            ->where('date', '>=', Carbon::now()->subMonth())
            ->groupBy(DB::raw('DATE(`date`)'))
            ->orderByRaw('DATE(`date`) DESC')
            ->limit(100)
            ->get();

        // Total report Sale total 12 month
        $saleReport12Month = DB::table('orders')
            ->selectRaw("DATE_FORMAT(`date`, '%Y-%m') AS month, SUM(total) AS sum")
            ->groupByRaw("DATE_FORMAT(`date`, '%Y-%m')")
            ->orderBy('month', 'DESC')
            ->limit(12)
            ->get();

        // Total report sale total year
        $saleReportYear = DB::table('orders')
            ->selectRaw("DATE_FORMAT(`date`, '%Y') AS year, SUM(total) AS sum")
            ->groupByRaw("DATE_FORMAT(`date`, '%Y')")
            ->orderBy('year', 'DESC')
            ->limit(3)
            ->get();

        function month($m)
        {
            $months = [
                '01' => 'มกราคม',
                '02' => 'กุมภาพันธ์',
                '03' => 'มีนาคม',
                '04' => 'เมษายน',
                '05' => 'พฤษภาคม',
                '06' => 'มิถุนายน',
                '07' => 'กรกฎาคม',
                '08' => 'สิงหาคม',
                '09' => 'กันยายน',
                '10' => 'ตุลาคม',
                '11' => 'พฤศจิกายน',
                '12' => 'ธันวาคม'
            ];
            return $months[$m] ?? '';
        }

        $m = month(date('m'));

        $serviceSales = DB::table('order_details')
            ->select(
                'product_id',
                'product_name',
                'total',
                DB::raw('COUNT(*) as total_orders'),
                DB::raw('SUM(quantity) as total_quantity_sold'),
                DB::raw('SUM(total) as sum_total')
            )
            ->where('date', '>=', Carbon::now()->subMonth())
            ->groupBy('product_id', 'product_name', 'total')
            ->orderBy('sum_total', 'DESC')
            ->get();

        return view(
            'dashboard',
            [
                'data' => $data ?? 0,
                'typeTotals' => $typeTotals ?? [],
                'checkInTotals' => $checkInTotals->quantity ?? 0,
                'newMemberTotals' => $newMemberTotals ?? 0,
                'ageCounts' => $ageCounts ?? [],
                'saleReport1Month' => $saleReport1Month ?? [],
                'saleReport12Month' => $saleReport12Month ?? [],
                'saleReportYear' => $saleReportYear ?? [],
                'freeMemberTotals' => $freeMemberTotals ?? 0,
                'serviceSales' => $serviceSales ?? [],
                'month' => $m ?? [],
            ]
        );
    }
}
