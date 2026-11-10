<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDOException;

class CheckinController extends Controller
{
    public function index()
    {
        $data = [];
        return view('checkin.index',compact('data'));
    }

    function checkNumber(Request $request)
    {

        $request->validate([
            'number' => 'required|numeric',
        ]);

        $count = DB::table('member')
            ->where('m_card', $request->number)
            ->count();

        if ( $count > 0) {
            $data = DB::table('member')
                ->where('m_card', $request->number)
                ->first();

            return redirect()->route('checkin.index', ['data' => $data]);
        } else {
            return back()->with('error', 'Member not found.');
        }

    }
}
