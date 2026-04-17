<?php

namespace App\Http\Controllers;

use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
         $teams = Team::orderBy('group')->orderBy('name')->get()->groupBy('group');
    return view('teams.index', compact('teams'));
    }

    public function show(Team $team)
    {
        $team->load('players');
        return view('teams.show', compact('team'));
    }
}