<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{
    public function showForm() {
        // Check if the user is already authenticated
        // if (Auth::check() && Auth::user()->role == 0) {
            // If the user is a customer and already logged in, redirect to a different route
            return redirect()->route('customer.product.list'); // Redirect to the customer dashboard or any other route
        // }
        // If not authenticated or not a customer, show the login form
        // return view('customer.login');

    }

    public function login(Request $request) {
        $user = User::where('email', $request->email)->first();

        if ($user && ($user->password === $request->password) && $user->role == 1) {
            Auth::guard('customer')->login($user); // Use 'customer' guard for customer login

            return redirect()->intended('bookIndex');
        } else {
            return redirect()->route('customer.login')->withErrors(['error' => 'Invalid credentials']);
        }
    }
}
