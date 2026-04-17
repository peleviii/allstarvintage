<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GameMatch;
use App\Models\Team;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMatches = GameMatch::count();
        $playedMatches = GameMatch::where('played', true)->count();
        $teams = Team::count();

        return view('admin.dashboard', compact('totalMatches', 'playedMatches', 'teams'));
    }
}