<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        if (Auth::check() && Auth::user()->role == 'student') {
            return redirect()->route('main.menu');
        } else if (Auth::check() && Auth::user()->role == 'teacher') {
            return redirect()->route('guru.dashboard');
        } else if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }

        return redirect('/');
    }
}
