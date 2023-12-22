<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            // Handle unauthenticated user
            return redirect('/login');
        }
    
        $userRole = Auth::user()->role;
    
        if ($userRole != $role) {
            // Handle unauthorized user
            abort(403, 'Unauthorized action.');
        }
    
        return $next($request);
    }
    
}
