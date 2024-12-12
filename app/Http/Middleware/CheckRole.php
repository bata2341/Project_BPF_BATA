<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === $role) {
                return $next($request);
            }
            // Redirect based on role
            if ($user->role === 'admin') {
                return redirect()->route('dashboardAdmin_index');
            } elseif ($user->role === 'guru') {
                return redirect()->route('dashboardGuru_index');
            } elseif ($user->role === 'kepala_sekolah') {
                return redirect()->route('dashboardKepsek_index');
            }
        }

        return redirect('/login');
    }
}
