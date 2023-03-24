<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if($request->path() == 'orders') {
            if (!$user->isAdmin()) {
                return redirect()->route('orders');
            }
        }elseif($request->path() == 'admin-categories'){
            if (!$user->isAdmin()) {
                return redirect()->route('categories');
            }
        }
        return $next($request);
    }
}
