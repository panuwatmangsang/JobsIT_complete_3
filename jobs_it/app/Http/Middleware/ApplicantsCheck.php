<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApplicantsCheck
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

        if (!session()->has('LoggedApp') && ($request->path() != 'auth/applicants_login' && $request->path() != 'auth/applicants_register')) {
            return redirect('auth/applicants_login')->with('fail', 'คุณต้อง login ก่อน');
        }

        if (session()->has('LoggedApp') && ($request->path() == 'auth/applicants_login' || $request->path() == 'auth/applicants_register')) {
            return back();
        }

        return $next($request)->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Prangma', 'no-cache')
            ->header('Expires', 'Sat 01 Jan 2021 00:00:00 GMT');
    }
}
