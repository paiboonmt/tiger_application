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
            ->where('exp_date', '<', date('Y-m-d'))
            ->get();
        return view('sponsers.expired', ['data' => $data]);
    }
}
