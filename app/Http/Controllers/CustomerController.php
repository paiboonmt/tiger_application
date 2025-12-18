<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = DB::table('member')
            ->join('products', 'member.package', '=', 'products.id')
            ->where('member.status_code', '=', 4)
            ->where('member.exp_date', '>=', date('Y-m-d'))
            ->select('member.*', 'products.product_name')
            // ->limit(10)
            ->get();

        foreach ($customers as $customer) {
            $expDate = \Carbon\Carbon::parse($customer->exp_date);
            $today = \Carbon\Carbon::today();
            $customer->days_left = $today->diffInDays($expDate, false);
        }

        return view('customers.index', ['customers' => $customers]);
    }

    public function expired()
    {
        $customers = DB::table('member')
            ->join('products', 'member.package', '=', 'products.id')
            ->where('member.status_code', '=', 4)
            ->where('member.exp_date', '<=', date('Y-m-d'))
            ->select('member.*', 'products.*')
            ->orderBy('member.id', 'desc')
            ->limit(100)
            ->get();
        return view('customers.expired', ['customers' => $customers]);
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


        $timeLine = DB::table('tb_time')
            ->where('ref_m_card', $member->m_card)
            ->orderBy('time_id', 'desc')
            ->get();

        $file = DB::table('tb_files')
            ->where('product_id', $member->id)
            ->get();

        return view(
            'customers.profile',
            [
                'member' => $member,
                'timeLine' => $timeLine,
                'file' => $file,
            ]
        );
    }
}
