<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->employee->type == 'admin') {
            // dd(Auth::user()->employee->type == 'admin'); // جرب هنا
            return $next($request);
        } else {

            // dd( Auth::user()->employee->type == 'admin');
            return redirect()->route("error403");
        }
        // return $next($request);
    }
}
