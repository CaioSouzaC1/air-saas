<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$types)
    {
        $user = Auth::user();

        if (!$user || !in_array($user->type, $types)) {
            if ($user) {
                Auth::logout();
            }
            return to_route('/login');
        }

        return $next($request);
    }
}
