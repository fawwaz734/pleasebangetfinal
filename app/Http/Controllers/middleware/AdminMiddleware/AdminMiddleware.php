<?php

namespace App\Http\Controllers\middleware\AdminMiddelware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response)  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has the 'admin' role
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
            return redirect()->route('AdminDashboard');
        }

        // If not an admin, redirect to the home page or show an error
        return redirect('/')->with('error', 'You do not have access to this page.');
    }
}