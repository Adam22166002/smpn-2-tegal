<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $ip = $request->ip();
        $userAgent = $request->header('User-Agent');
        $date = now()->format('Y-m-d');

        // Cek apakah IP sudah tercatat pada hari yang sama
        $existingVisitor = Visitor::where('ip_address', $ip)
            ->whereDate('created_at', $date)
            ->exists();

        if (!$existingVisitor) {
            Visitor::create([
                'ip_address' => $ip,
                'user_agent' => $userAgent
            ]);
        }

        return $next($request);
    }
}
