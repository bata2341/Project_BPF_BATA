<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('dashboardAdmin_index');
        } elseif ($user->role === 'guru') {
            return redirect()->route('dashboardGuru_index');
        } elseif ($user->role === 'kepala_sekolah') {
            return redirect()->route('dashboardKepsek_index');
        }

        return redirect()->route('home');
    }
}
