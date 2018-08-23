<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class GuestApplicantsMiddleware
{
    /**
     * Handle an incoming request.
     *@atunje Middleware for guest applicants
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard='applicant')
    {
        if (Auth::guard($guard)->check()) {
            return redirect()->route('applicant.dashboard');return $next($request);
        }
        
        return $next($request);
    }
}
