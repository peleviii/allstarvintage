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

        if ($gameMatch->round === 'group') {
            $this->tryFillQuarterfinals();
        }

        if ($gameMatch->round === 'quarterfinal') {
            $this->tryFillSemifinals();
        }

        if ($gameMatch->round === 'semifinal') {
            $winner = $request->sets_home > $request->sets_away ? $gameMatch->team_home_id : $gameMatch->team_away_id;
            $loser  = $request->sets_home > $request->sets_away ? $gameMatch->team_away_id : $gameMatch->team_home_id;

            $semis   = GameMatch::where('round', 'semifinal')->orderBy('id')->get();
            $isFirst = $semis->first()->id === $gameMatch->id;

            $final      = GameMatch::where('round', 'final')->first();
            $thirdPlace = GameMatch::where('round', 'third_place')->first();

            if ($isFirst) {
                $final?->update(['team_home_id' => $winner]);
                $thirdPlace?->update(['team_home_id' => $loser]);
            } else {
                $final?->update(['team_away_id' => $winner]);
                $thirdPlace?->update(['team_away_id' => $loser]);
            }
        }

        return back()->with('success', 'Το αποτέλεσμα αποθηκεύτηκε!');
    }

    private function tryFillQuarterfinals(): void
    {
        $groups = ['A', 'B', 'C', 'D'];
        $groupWinners = [];

        foreach ($groups as $group) {
            $teams = Team::where('group', $group)->with(['homeMatches', 'awayMatches'])->get();

            $playedCount = GameMatch::where('round', 'group')
                ->where('played', true)
                ->whereHas('teamHome', fn($q) => $q->where('group', $group))
                ->count();

            if ($playedCount < 3) continue;

            $standings = $teams->map(function ($team) {
                $points = 0; $setsFor = 0; $setsAgainst = 0;

                foreach ($team->homeMatches->where('played', true) as $match) {
                    [$hp] = $match->getPointsHome();
                    $points += $hp;
                    $setsFor += $match->sets_home;
                    $setsAgainst += $match->sets_away;
                }
                foreach ($team->awayMatches->where('played', true) as $match) {
                    [, $ap] = $match->getPointsHome();
                    $points += $ap;
                    $setsFor += $match->sets_away;
                    $setsAgainst += $match->sets_home;
                }

                return ['team' => $team, 'points' => $points, 'sd' => $setsFor - $setsAgainst];
            })->sortByDesc('points')->sortByDesc('sd')->values();

            if ($standings->count() < 2) continue;

            $groupWinners[$group] = [
                'first'  => $standings[0]['team'],
                'second' => $standings[1]['team'],
                'third'  => $standings[2]['team'] ?? null,
            ];
        }

        if (count($groupWinners) < 4) return;

        $quarters = GameMatch::where('round', 'quarterfinal')->orderBy('id')->get();

        if ($quarters->count() >= 4) {
            $quarters[0]->update(['team_home_id' => $groupWinners['A']['first']->id,  'team_away_id' => $groupWinners['B']['second']->id]);
            $quarters[1]->update(['team_home_id' => $groupWinners['B']['first']->id,  'team_away_id' => $groupWinners['A']['second']->id]);
            $quarters[2]->update(['team_home_id' => $groupWinners['C']['first']->id,  'team_away_id' => $groupWinners['D']['second']->id]);
            $quarters[3]->update(['team_home_id' => $groupWinners['D']['first']->id,  'team_away_id' => $groupWinners['C']['second']->id]);
        }

        // Αποκλεισμένοι — 3οι κάθε ομίλου
        $losersMatches = GameMatch::where('round', 'event')->orderBy('id')->get();
        if ($losersMatches->count() >= 2) {
            $losersMatches[0]->update([
                'team_home_id' => $groupWinners['A']['third']?->id,
                'team_away_id' => $groupWinners['B']['third']?->id,
            ]);
            $losersMatches[1]->update([
                'team_home_id' => $groupWinners['C']['third']?->id,
                'team_away_id' => $groupWinners['D']['third']?->id,
            ]);
        }
    }

    private function tryFillSemifinals(): void
    {
        $quarters = GameMatch::where('round', 'quarterfinal')
            ->where('played', true)
            ->orderBy('id')
            ->get();

        if ($quarters->count() < 4) return;

        $semis = GameMatch::where('round', 'semifinal')->orderBy('id')->get();
        if ($semis->count() < 2) return;

        $getWinner = fn($m) => $m->sets_home > $m->sets_away ? $m->team_home_id : $m->team_away_id;

        $semis[0]->update(['team_home_id' => $getWinner($quarters[0]), 'team_away_id' => $getWinner($quarters[1])]);
        $semis[1]->update(['team_home_id' => $getWinner($quarters[2]), 'team_away_id' => $getWinner($quarters[3])]);
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