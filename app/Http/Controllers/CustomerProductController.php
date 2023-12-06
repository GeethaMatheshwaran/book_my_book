<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CustomerProductController extends Controller
{
    public function index()
    {
        $books = Product::all(); // Retrieve all books from the database

        return view('customer.product', compact('books'));
    }
}
