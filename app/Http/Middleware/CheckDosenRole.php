<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDosenRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role = null): Response
    {
        if (!auth()->guard('dosen')->check()) {
            return redirect('/loginadmin')->with('error', 'Silakan login terlebih dahulu.');
        }

        $dosen = auth()->guard('dosen')->user();

        // If no specific role is required, just check if user is authenticated
        if ($role === null) {
            return $next($request);
        }

        // Check if user has the required role
        if (!$dosen->hasRole($role)) {
            return redirect('/admin/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
