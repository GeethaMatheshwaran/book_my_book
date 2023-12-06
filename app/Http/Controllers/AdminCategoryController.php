<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.category.index')->with('category',$category);
    }
    public function create(){
        return view('admin.category.create');
    }

    public function save(){
        $category = Category::create(request()->all());
        if($category){
            return redirect()->route('admin.category.index');
        }
    }
    public function show($categoryId){

        // Use lowercase 'category' instead of 'category::find'
        $category = Category::find($categoryId);
        // dd($category);
                if($category){
            return view('admin.category.edit')->with('category',$category);
        }
    }

    public function update(Request $request){
        $category = category::find($request->id);
        $category->update($request->all());
        return redirect()->route('admin.category.index');
    }

    public function delete($id){
        $category = category::find($id);
        $category->delete();
        return redirect()->route('admin.category.index');

    }
}
