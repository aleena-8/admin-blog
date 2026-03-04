<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in and role is admin
        if (Auth::check() && Auth::user()->role->name === 'admin') {
            return $next($request);
        }

        // If not admin, abort with 403 forbidden or redirect
        abort(403, 'Unauthorized action.');
        // or use: return redirect()->route('dashboard');
    }
}