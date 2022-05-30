<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // membuat middleware sendiri
        if(!auth()->check() || auth()->user()->user_role_id !== 1) {
            abort(403);
        }

        // if(!auth()->check() || !auth()->user()->user_role_id) {
        //     abort(403);
        // }

        return $next($request);
    }
}
