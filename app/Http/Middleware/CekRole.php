<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;
use App\Models\User;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->level == $role)
            return $next($request);
        else
            return redirect('/');
    }
}
