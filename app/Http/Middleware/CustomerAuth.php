<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    { 
        if (!Auth::check()) {
            return redirect()->route('customer.login'); // Agar user login nahi hai, login page pe redirect karein
        }

        if (Auth::user()->type !== 'customer') {
            return redirect()->route('home')->with('error', 'Access denied.');
        }

        return $next($request);
    }
}
