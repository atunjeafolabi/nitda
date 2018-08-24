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
        
        if(Auth::guard($guard)->user()->status == 0) {
            
            Auth::guard($guard)->logout();
            $request->session()->invalidate();
            $request->session()->flash('status_info', 'You have not confirmed your account. Please Check Your Email And Click on the Link Sent To You.');
            return redirect()->back();
        }
        
        return $next($request);
    }
}
