<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
{
    if (!auth()->check() || auth()->user()->is_admin != 0) {
        abort(403);
    }
    return $next($request);
}
}
