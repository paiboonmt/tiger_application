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
        // dd($customers);
        return view('customers.index', ['customers' => $customers]);
    }

    public function expired()
    {
        $customers = DB::table('member')
            ->join('products', 'member.package', '=', 'products.id')
            ->where('member.status_code', '=', 4)
            ->where('member.exp_date', '<=', date('Y-m-d'))
            ->select('member.*', 'products.product_name')
            ->limit(50)
            ->orderBy('member.id', 'desc')
            ->get();

        foreach ($customers as $customer) {
            $expDate = \Carbon\Carbon::parse($customer->exp_date);
            $today = \Carbon\Carbon::today();
            $customer->days_left = $today->diffInDays($expDate, false);
        }

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

        return view(
            'customers.profile',
            [
                'member' => $member,
                'product' => $product,
                'timeLine' => $timeLine,
                'file' => $file,
            ]
        );
    }

    public function create()
    {
        // Getall nationality
        $nationality_data = DB::table('tb_nationality')->get();
        // Getall package
        $product_data = DB::table('products')->get();
        return view('customers.create', ['nationality_data' => $nationality_data, 'product_data' => $product_data]);
    }

    public function store(Request $request)
    {
        dd($request->all());
            // "_token" => "jBoVRRZ3VVBU091DKnofghvpwvxJYWqLFt4lPA3H"
            // "group" => "1"
            // "gender" => "ชาย"
            // "fname" => "Mr.Paiboon Yaniwong"
            // "nationality" => "Thailand"
            // "phone" => "1234567890"
            // "m_card" => "1234567890"
            // "p_visa" => "1234567890"
            // "email" => "paiboon@gmail.com"
            // "product" => "All Inclusive Training (Weekly)"
            // "accom" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, voluptatibus?"
            // "comment" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, nihil."
            // "sta_date" => "2026-05-07"
            // "exp_date" => "2026-06-06"
            // "em_phone" => "1234567890"
            // "em_name" => "นายสมชาย ใจดี"
            // "photo" =>
            
    }
}
