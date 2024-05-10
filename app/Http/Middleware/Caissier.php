<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Employe;
use Illuminate\Support\Facades\Auth;

class Caissier
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role === 'agent' && Employe::find(Auth::user()->id)->caissiere) {
            return $next($request);
        } else {
            abort(401);
        }
    }
}
