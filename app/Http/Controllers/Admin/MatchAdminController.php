<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GameMatch;
use App\Models\Team;
use Illuminate\Http\Request;

class MatchAdminController extends Controller
{
    public function index()
    {
        $groupMatches = GameMatch::with(['teamHome', 'teamAway'])
            ->where('round', 'group')
            ->orderBy('day')
            ->get()
            ->groupBy('day');

        $knockoutMatches = GameMatch::with(['teamHome', 'teamAway'])
            ->whereIn('round', ['quarterfinal', 'semifinal', 'third_place', 'final'])
            ->get()
            ->sortBy(function ($match) {
                $order = ['quarterfinal' => 1, 'semifinal' => 2, 'third_place' => 3, 'final' => 4];
                return $order[$match->round];
            })
            ->groupBy('round');

        $teams = Team::orderBy('group')->orderBy('name')->get();

        return view('admin.matches', compact('groupMatches', 'knockoutMatches', 'teams'));
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

        // Αυτόματη προώθηση νικητή/ηττημένου
        if ($gameMatch->round === 'semifinal') {
            $winner = $request->sets_home > $request->sets_away
                ? $gameMatch->team_home_id
                : $gameMatch->team_away_id;

            $loser = $request->sets_home > $request->sets_away
                ? $gameMatch->team_away_id
                : $gameMatch->team_home_id;

            // Βρες τους 2 ημιτελικούς
            $semis = GameMatch::where('round', 'semifinal')->orderBy('id')->get();
            $isFirstSemi = $semis->first()->id === $gameMatch->id;

            $final = GameMatch::where('round', 'final')->first();
            $thirdPlace = GameMatch::where('round', 'third_place')->first();

            if ($isFirstSemi) {
                $final->update(['team_home_id' => $winner]);
                $thirdPlace->update(['team_home_id' => $loser]);
            } else {
                $final->update(['team_away_id' => $winner]);
                $thirdPlace->update(['team_away_id' => $loser]);
            }
        }

        return back()->with('success', 'Το αποτέλεσμα αποθηκεύτηκε!');
    }
    public function updateTeams(Request $request, GameMatch $gameMatch)
    {
        $request->validate([
            'team_home_id' => 'required|exists:teams,id',
            'team_away_id' => 'required|exists:teams,id|different:team_home_id',
        ]);

        $gameMatch->update([
            'team_home_id' => $request->team_home_id,
            'team_away_id' => $request->team_away_id,
            'sets_home'    => null,
            'sets_away'    => null,
            'played'       => false,
        ]);

        return back()->with('success', 'Οι ομάδες ενημερώθηκαν!');
    }
}
