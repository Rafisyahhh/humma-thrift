<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DevelopmentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the application is in development mode
        if (app()->environment('local')) {
            // If in development mode, continue with the request
            return $next($request);
        }

        // If not in development mode, return a 403 Forbidden response
        abort(403);
    }
}
