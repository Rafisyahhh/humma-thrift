<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class UserOnlineMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @see https://medium.com/@rpatutorials8910/understanding-user-online-offline-status-in-laravel-749a416e2bc7#:~:text=The%20simplest%20method%20is%20to,or%20offline%20status%20of%20users.
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $expiresAt = now()->addMinutes(1);
            Cache::put('user-is-online-' . Auth::id(), true, $expiresAt);
        }

        return $next($request);
    }
}
