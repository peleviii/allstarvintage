<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\GameMatch;

class StandingsController extends Controller
{
    public function index()
    {
        $groups = ['A', 'B', 'C', 'D'];
        $standings = [];

        foreach ($groups as $group) {
            $teams = Team::where('group', $group)->with(['homeMatches', 'awayMatches'])->get();

            $groupStandings = $teams->map(function ($team) {
                $points = 0;
                $wins = 0;
                $losses = 0;
                $setsFor = 0;
                $setsAgainst = 0;
                $played = 0;

                foreach ($team->homeMatches->where('played', true) as $match) {
                    [$hp, $ap] = $match->getPointsHome();
                    $points += $hp;
                    $setsFor += $match->sets_home;
                    $setsAgainst += $match->sets_away;
                    $played++;
                    $match->sets_home > $match->sets_away ? $wins++ : $losses++;
                }

                foreach ($team->awayMatches->where('played', true) as $match) {
                    [$hp, $ap] = $match->getPointsHome();
                    $points += $ap;
                    $setsFor += $match->sets_away;
                    $setsAgainst += $match->sets_home;
                    $played++;
                    $match->sets_away > $match->sets_home ? $wins++ : $losses++;
                }

                return [
                    'team'         => $team,
                    'played'       => $played,
                    'wins'         => $wins,
                    'losses'       => $losses,
                    'sets_for'     => $setsFor,
                    'sets_against' => $setsAgainst,
                    'points'       => $points,
                ];
            })->sortByDesc('points')->values();

            $standings[$group] = $groupStandings;
        }

        return view('standings.index', compact('standings'));
    }
}