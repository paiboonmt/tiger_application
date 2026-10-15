<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDOException;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = DB::table('payment')->get();
        return view('payment.index', compact('payments'));
    }

    public function create()
    {
        return view('payment.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'pay_name' => 'required|string|max:255',
            'value' => 'required|numeric',
        ]);

        try {
            DB::table('payment')->insert([
                'pay_name' => $request->pay_name,
                'value' => $request->value,
            ]);
            $mass = 'บันทึกข้อมูลเรียบร้อยแล้ว';
            return redirect()->route('payment.index')->with('success', $mass);
        } catch (PDOException $e) {
            return redirect()->back()->withErrors(['error' => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $payment = DB::table('payment')->where('pay_id', $id)->first();
        return view('payment.edit', compact('payment'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'pay_name' => 'required|string|max:255',
            'value' => 'required|numeric',
        ]);

        try {
            DB::table('payment')->where('pay_id', $id)->update([
                'pay_name' => $request->pay_name,
                'value' => $request->value,
            ]);
            $mass = 'อัปเดตข้อมูลเรียบร้อยแล้ว';
            return redirect()->route('payment.index')->with('success', $mass);
        } catch (PDOException $e) {
            return redirect()->back()->withErrors(['error' => 'เกิดข้อผิดพลาดในการอัปเดตข้อมูล: ' . $e->getMessage()]);
        }

    }

    public function destroy($id)
    {
        $validate = DB::table('payment')->where('pay_id', $id)->first();
        if (!$validate) {
            return redirect()->back()->withErrors(['error' => 'ไม่พบข้อมูลที่ต้องการลบ']);
        }
        
        try {
            DB::table('payment')->where('pay_id', $id)->delete();
            $mass = 'ลบข้อมูลเรียบร้อยแล้ว';
            return redirect()->route('payment.index')->with('success', $mass);
        } catch (PDOException $e) {
            return redirect()->back()->withErrors(['error' => 'เกิดข้อผิดพลาดในการลบข้อมูล: ' . $e->getMessage()]);
        }
    }
}

