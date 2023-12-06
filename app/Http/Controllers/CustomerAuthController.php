<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{
    public function showForm() {
        return view('customer.login');
    }

    public function login(Request $request) {
        $user = User::where('email', $request->email)->first();

        if($user) {
            if(($user->password === $request->password) && $user->role == 0) {
                Auth::login($user); // Log the user in
                return redirect()->intended('Books');
            } else {
                return redirect()->route('customer.login')->withErrors(['error' => 'Invalid credentials']);
            }
        } else {
            return redirect()->route('customer.login')->withErrors(['error' => 'User not found']);
        }
    }
}
