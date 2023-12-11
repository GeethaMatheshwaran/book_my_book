<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminAuthController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    public function showForm()
    {
        // Check if the user is already authenticated
        // if (Auth::check() && Auth::user()->role == 1) {
            // If the user is a customer and already logged in, redirect to a different route
            return redirect()->route('admin.product.index'); // Redirect to the customer dashboard or any other route
        // }
        // If not authenticated or not a customer, show the login form
        // return view('admin.login');
    }


    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && ($user->password === $request->password) && $user->role == 0) {
            Auth::guard('admin')->login($user); // Use 'admin' guard for admin login
            return redirect()->intended('/');
        } else {
            return redirect()->route('admin.login')->withErrors(['error' => 'Invalid credentials']);
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            if ($role == 1) {
                Auth::logout(); // Logout admin
                return redirect()->route('admin.login'); // Redirect to admin login page
            } elseif ($role === 0) {
                Auth::logout(); // Logout customer
                return redirect()->route('customer.login'); // Redirect to customer login page
            }
        }

        // Redirect to a default page if the user is not logged in or their role is not recognized
        return redirect('/');
    }
}
