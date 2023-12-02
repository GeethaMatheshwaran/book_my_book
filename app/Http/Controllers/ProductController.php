<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('admin.product.index')->with('product',$product);
    }
    public function create(){
        return view('admin.product.create');
    }

    public function save(){
        $product = Product::create(request()->all());
        if($product){
            return redirect()->route('admin.product.index');
        }
    }
    public function show($productId){

        // Use lowercase 'product' instead of 'product::find'
        $product = Product::find($productId);
        // dd($product);
                if($product){
            return view('admin.product.edit')->with('product',$product);
        }
    }

    public function update(Request $request){
        $product = product::find($request->id);
        $product->update($request->all());
        return redirect()->route('admin.product.index');
    }

    public function delete($id){
        $product = product::find($id);
        $product->delete();
        return redirect()->route('admin.product.index');

    }
}
