<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        $category = Category::all();
        return view('admin.product.index',compact('product','category'));
    }
    public function create(){
        $category = Category::all();
        return view('admin.product.create',compact('category'));
    }

    public function save(){
        $product = Product::create(request()->all());
        if($product){
            return redirect()->route('admin.product.index');
        }
    }
    public function show($productId){
        $product = Product::find($productId);
        $category = Category::all();
            return view('admin.product.edit',compact('product','category'));
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
