<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
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
            'detail' => '',
            'code' => '',
        ]);
        Products::create($request->all());
        return redirect()->route('product.index');
    }
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view('products.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'detail' => '',
            'code' => '',
        ]);
        $product = Products::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('product.index');
    }
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'ลบสินค้าเรียบร้อยแล้ว');
    }
}
