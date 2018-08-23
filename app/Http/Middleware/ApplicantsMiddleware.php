<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class ApplicantsMiddleware
{
    /**
     * Handle an incoming request.
     * @atunje This ApplicantsMiddleware authenticates an applicant
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard='applicant')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect(route('applicant.login'));
        }
        
        return $next($request);
    }
}
