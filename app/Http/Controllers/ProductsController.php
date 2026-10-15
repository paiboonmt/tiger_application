<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDOException;

class ProductsController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
        ]);

        $detail = '';
        $code = 0;

        try {
            DB::table('products')->insert([
                'product_name' => $request->product_name,
                'price' => $request->price,
                'detail' => $detail,
                'code' => $code,
            ]);
            $mass = 'บันทึกข้อมูลเรียบร้อยแล้ว';
            return redirect()->back()->with('success', $mass);
        } catch (PDOException $e) {
            return redirect()->back()->withErrors(['error' => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล: ' . $e->getMessage()]);
        }
    }
    public function edit(int $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        abort_if(!$product, 404);
        return view('products.edit', compact('product'));
    }
    public function update(Request $request, int $id)
    {
        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
        ]);

        $detail = '';
        $code = 0;

        try {
            DB::table('products')->where('id', $id)->update([
                'product_name' => $request->product_name,
                'price' => $request->price,
                'detail' => $detail,
                'code' => $code,
            ]);
            $mass = 'อัปเดทข้อมูลเรียบร้อยแล้ว';
            return redirect()->back()->with('success', $mass);
        } catch (PDOException $e) {
            return redirect()->back()->withErrors(['error' => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล: ' . $e->getMessage()]);
        }
    }
    public function destroy($id)
    {
        try {
            DB::table('products')->where('id', $id)->delete();
            $mass = 'ลบข้อมูลเรียบร้อยแล้ว';
            return redirect()->route('product.index')->with('success',$mass);
        } catch (PDOException $e) {
            return redirect()->back()->withErrors(['error' => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล: ' . $e->getMessage()]);
        }
    }
}
