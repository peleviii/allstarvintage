<?php

namespace App\Http\Controllers;

use App\Models\GameMatch;
use App\Models\Team;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $groupMatches = GameMatch::with(['teamHome', 'teamAway'])
            ->where('round', 'group')
            ->orderBy('day')
            ->get()
            ->groupBy('day');

        $knockoutMatches = GameMatch::with(['teamHome', 'teamAway'])
            ->whereIn('round', ['quarterfinal', 'semifinal', 'third_place', 'fifth_place', 'seventh_place', 'final', 'event'])
            ->get()
            ->sortBy(function ($match) {
                $order = [
                    'seventh_place' => 1,
                    'fifth_place'   => 2,
                    'event'         => 3,
                    'semifinal'     => 4,
                    'third_place'   => 5,
                    'final'         => 6,
                ];
                return $order[$match->round] ?? 99;
            })
            ->groupBy('round');

        return view('matches.index', compact('groupMatches', 'knockoutMatches'));
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
