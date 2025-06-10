<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class HybridAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        Log::info('HybridAuthMiddleware: Checking authentication', [
            'session_id' => session()->getId(),
            'is_authenticated' => Auth::check()
        ]);

        if (Auth::check()) {
            Log::info('HybridAuthMiddleware: User is authenticated', [
                'user_id' => Auth::id(),
                'email' => Auth::user()->email
            ]);
            return $next($request);
        }

        Log::warning('HybridAuthMiddleware: User is not authenticated');
        return redirect()->route('login')->with('error', 'Please login to access this page.');
    }
} 