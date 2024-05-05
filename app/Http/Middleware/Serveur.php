<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Serveur
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role === 'agent' && Employe::find(Auth::user()->id)->serveur) {
            return $next($request);
        } else {
            abort(401);
        }
    }
}
