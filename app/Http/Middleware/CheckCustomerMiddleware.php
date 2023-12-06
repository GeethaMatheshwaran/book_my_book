<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCustomerMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // CheckCustomer middleware
    public function handle($request, Closure $next) {
        if(auth()->check() && auth()->user()->role === 'customer') {
            return $next($request);
        }
        return redirect()->route('admin.login'); // Or wherever you want to redirect for unauthorized access
    }

}
