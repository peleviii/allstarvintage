<?php

namespace App\Http\Controllers;

use App\Models\GameMatch;
use App\Models\Team;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $matches = GameMatch::with(['teamHome', 'teamAway'])->get();

        $teamsByGroup = Team::whereNotNull('group')
            ->orderBy('name')
            ->get()
            ->groupBy('group');

        return view('matches.index', compact('matches', 'teamsByGroup'));
    }

    public function update(Request $request, GameMatch $gameMatch)
    {
        $request->validate([
            'sets_home' => 'required|integer|min:0|max:2',
            'sets_away' => 'required|integer|min:0|max:2',
        ]);

        $gameMatch->update([
            'sets_home' => $request->sets_home,
            'sets_away' => $request->sets_away,
            'played'    => true,
        ]);

        return back()->with('success', 'Το αποτέλεσμα αποθηκεύτηκε!');
    }
}
