<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return match (Auth::user()->role) {
            'admin' => redirect()->route('dashboards.admin'),
            'bienestar' => redirect()->route('dashboards.bienestar'),
            'psicologia' => redirect()->route('dashboards.psicologia'),
            'nomadas' => redirect()->route('dashboards.nomadas'),
            default => redirect('/'),
        };
    }
}
