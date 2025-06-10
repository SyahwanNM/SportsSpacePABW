<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiTokenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->bearerToken()) {
            $request->headers->set('Authorization', 'Bearer ' . $request->bearerToken());
        }

        return $next($request);
    }
} 