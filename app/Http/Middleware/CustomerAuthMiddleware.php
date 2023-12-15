<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        //  dd(Auth::check() && ( (Auth::user()->role) == '0'));
        if (Auth::check() && ( (Auth::user()->role) == '0') ) {
            return $next($request);
        }

        return redirect()->route('customer.login'); // Redirect to login if not authenticated as a customer
    }
}
