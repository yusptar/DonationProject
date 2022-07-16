<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) { 
            if (Auth::guard($guard)->check() && Auth::user()->roles == "Admin") {
                return redirect()->route('dashboard');
            }elseif (Auth::guard($guard)->check() && Auth::user()->roles == "Pengasuh") {
                return redirect()->route('pengasuh');
            }
             elseif (Auth::guard($guard)->check() && Auth::user()->roles == "Donatur") {
                return redirect()->route('donatur');
            }
        }

        return $next($request);
    }
}
