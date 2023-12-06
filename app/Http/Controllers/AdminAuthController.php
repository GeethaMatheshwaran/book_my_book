<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminAuthController extends Controller {
    public function index() {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    public function showForm() {
        // $user = User::all();
        return view('admin.login');
    }


    public function login(Request $request) {
        $user = User::where('email', $request->email)->first();

        if($user) {
            if(($user->password === $request->password) && $user->role == 1) {
                Auth::login($user); // Log the user in
                return redirect()->intended('bookIndex');
            } else {
                return redirect()->route('admin.login')->withErrors(['error' => 'Invalid credentials']);
            }
        } else {
            return redirect()->route('admin.login')->withErrors(['error' => 'User not found']);
        }
    }

   public function logout()
{
    Auth::logout(); // Logout the currently authenticated user
    return redirect()->route('admin.login'); // Redirect to the desired page after logout
}
}
