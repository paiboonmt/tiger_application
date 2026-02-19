<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('payment.index', compact('payments'));
    }

    public function create()
    {
        return view('payment.create');
    }

    public function store(Request $request)
    {
        $payment = new Payment();
        $payment->pay_name = $request->pay_name;
        $payment->value = $request->value;
        $payment->save();
        return redirect()->route('payment.index');
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        return view('payment.edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->pay_name = $request->pay_name;
        $payment->value = $request->value;
        $payment->save();
        return redirect()->route('payment.index');
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return redirect()->route('payment.index');
    }
}
