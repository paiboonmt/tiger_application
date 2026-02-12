<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SponserController extends Controller
{
    public function index()
    {
        $data = DB::table('member')
            ->where('status_code', '=', 3)
            ->where('exp_date', '>=', date('Y-m-d'))
            ->orderBy('id', 'desc')
            // ->limit(100)
            ->get();
        foreach ($data as $member) {
            $expDate = \Carbon\Carbon::parse($member->exp_date);
            $today = \Carbon\Carbon::today();
            $member->days_left = $today->diffInDays($expDate, false);
        }
        return view('sponsers.index', ['data' => $data]);
    }

    public function expired()
    {
        $data = DB::table('member')
            ->where('status_code', '=', 3)
            ->where('exp_date', '<=', date('Y-m-d'))
            ->orderBy('id', 'desc')
            // ->limit(100)
            ->get();
        foreach ($data as $member) {
            $expDate = \Carbon\Carbon::parse($member->exp_date);
            $today = \Carbon\Carbon::today();
            $member->days_left = $today->diffInDays($expDate, false);
        }
        return view('sponsers.expired', ['data' => $data]);
    }

    public function profile($id)
    {
        $member = DB::table('member')
            ->where('id', $id)
            ->first();

        if ($member && $member->exp_date) {
            $expDate = \Carbon\Carbon::parse($member->exp_date);
            $today = \Carbon\Carbon::today();
            $member->days_left = $today->diffInDays($expDate, false);
        } else {
            $member->days_left = null;
        }

        // Join with products table to get product_name
        $product = DB::table('products')
            ->where('id', $member->package)
            ->first();

        $timeLine = DB::table('tb_time')
            ->where('ref_m_card', $member->m_card)
            ->orderBy('time_id', 'desc')
            ->get();

        $file = DB::table('tb_files')
            ->where('product_id', $member->id)
            ->get();
        
        // คำนวนอายุวันเกิด
        if ($member && $member->birthday) { // dob = วันเกิด
            $birthday = \Carbon\Carbon::parse($member->birthday);
            $today = \Carbon\Carbon::today();
            $member->age = (int) round($birthday->diffInYears($today) + 0.92602739726);
        } else {
            $member->age = null;
        }

        return view('sponsers.profile', 
        [
                'member' => $member,
                'product' => $product,
                'timeLine' => $timeLine,
                'file' => $file,
            ]);
    }
}
