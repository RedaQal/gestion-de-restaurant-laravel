<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MultiLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()) {
            if (Auth::user()->role === 'admin') {
                return to_route('dashboard.index');
            } else {
                if (Employe::find(Auth::user()->id)->serveur) {
                    return redirect()->route('serveur.index');
                }
                if (Employe::find(Auth::user()->id)->cuisinier) {
                    return redirect()->route('cuisinier.index');
                }
                // if (Employe::find(Auth::user()->id)->caissiere) {
                //     return "caissier";
                // }
                return to_route('serveur.index');
            }
        } else {
            return $next($request);
        }
    }
}
