<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    // Display check-in report
    public function checkin()
    {
        return view('reports.checkin');
    }

    // search check-in report
    public function searchCheckin(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $data = DB::table('totel')
            ->whereBetween('date', [$startDate, $endDate])
            ->get();
        return view('reports.checkin',['data' => $data]);
    }



    // Display customer total report
    public function customerTotal()
    {
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

        $checkInTotals = DB::table('totel')
            ->whereDate('date', DB::raw('CURRENT_DATE'))
            ->first();    
  
        $newMemberTotals = DB::table('member')
            ->where('status_code', 4)
            ->whereDate('date', DB::raw('CURRENT_DATE'))
            ->count('id');

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


        return view('reports.customer_total',  
            [
                'data' => $data ?? 0,
                'typeTotals' => $typeTotals ?? [],
                'checkInTotals' => $checkInTotals->quantity ?? 0   ,
                'newMemberTotals' => $newMemberTotals ?? 0,
                'ageCounts' => $ageCounts ?? [] 
            ]);
    }
}
