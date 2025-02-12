<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayananBK
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $allowedRoles = ['BK'];

        if (!in_array($user->role, $allowedRoles)) {
            abort(403, 'Akses tidak sah!');
        }

        return $next($request);
    }
}
