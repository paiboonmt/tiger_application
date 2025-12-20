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
            ->whereDate('exp_date', '>=', DB::raw('CURRENT_DATE'))
            ->count('id');

        // Type product total
        $typeTotals = DB::table('member')
            ->join('products', 'member.package', '=', 'products.id')
            ->select('products.product_name', DB::raw('count(*) as total'))
            ->where('status_code', 4)
            ->whereDate('exp_date', '>=', DB::raw('CURRENT_DATE'))
            ->groupBy('products.product_name')
            ->get();

        // Check-in today total
        $checkInTotals = DB::table('totel')
            ->whereDate('date', DB::raw('CURRENT_DATE'))
            ->first();

        // New members today total
        $newMemberTotals = DB::table('member')
            ->where('status_code', 4)
            ->whereDate('date', DB::raw('CURRENT_DATE'))
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
                ->whereDate('exp_date', '>=', DB::raw('CURRENT_DATE'))
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
            ]
        );
    }
}
