<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // Tikrinama, ar vartotojas prisijungęs
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Prašome prisijungti.');
        }

        // Tikrinama, ar vartotojas turi nurodytą rolę
        if (!$request->user()->hasRole($role)) {
            return redirect()->route('home')->with('error', 'Neturite prieigos teisių.');
        }

        return $next($request);
    }
}
