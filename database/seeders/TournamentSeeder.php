<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Player;
use App\Models\GameMatch;

class TournamentSeeder extends Seeder
{
    public function run(): void
    {
        $teamNames = [
            'A' => ['Ομάδα A1', 'Ομάδα A2', 'Ομάδα A3'],
            'B' => ['Ομάδα B1', 'Ομάδα B2', 'Ομάδα B3'],
            'C' => ['Ομάδα C1', 'Ομάδα C2', 'Ομάδα C3'],
            'D' => ['Ομάδα D1', 'Ομάδα D2', 'Ομάδα D3'],
        ];

        foreach ($teamNames as $group => $names) {
            foreach ($names as $name) {
                Team::create(['name' => $name, 'group' => $group]);
            }
        }

        $teams = Team::orderBy('id')->get()->keyBy('name');

        // ΠΑΡΑΣΚΕΥΗ — Φάση Ομίλων
        $groupMatches = [
            ['Ομάδα A1', 'Ομάδα A2', '1', '18:30', 'Αγώνας 1 — Όμιλος Α'],
            ['Ομάδα B1', 'Ομάδα B2', '1', '19:30', 'Αγώνας 2 — Όμιλος Β'],
            ['Ομάδα C1', 'Ομάδα C2', '1', '20:30', 'Αγώνας 3 — Όμιλος Γ'],
            ['Ομάδα D1', 'Ομάδα D2', '1', '21:30', 'Αγώνας 4 — Όμιλος Δ'],
            ['Ομάδα A1', 'Ομάδα A3', '2', '08:00', 'Αγώνας 5 — Όμιλος Α'],
            ['Ομάδα B1', 'Ομάδα B3', '2', '09:00', 'Αγώνας 6 — Όμιλος Β'],
            ['Ομάδα C1', 'Ομάδα C3', '2', '10:00', 'Αγώνας 7 — Όμιλος Γ'],
            ['Ομάδα D1', 'Ομάδα D3', '2', '11:00', 'Αγώνας 8 — Όμιλος Δ'],
            ['Ομάδα A2', 'Ομάδα A3', '2', '12:00', 'Αγώνας 9 — Όμιλος Α'],
            ['Ομάδα B2', 'Ομάδα B3', '2', '13:00', 'Αγώνας 10 — Όμιλος Β'],
            ['Ομάδα C2', 'Ομάδα C3', '2', '14:00', 'Αγώνας 11 — Όμιλος Γ'],
            ['Ομάδα D2', 'Ομάδα D3', '2', '15:00', 'Αγώνας 12 — Όμιλος Δ'],
        ];

        foreach ($groupMatches as [$home, $away, $day, $time, $label]) {
            GameMatch::create([
                'team_home_id' => $teams[$home]->id,
                'team_away_id' => $teams[$away]->id,
                'day'          => $day,
                'round'        => 'group',
                'match_time'   => $time,
                'match_label'  => $label,
                'played'       => false,
            ]);
        }

        // ΣΑΒΒΑΤΟ — Προημιτελικοί
        $quarterfinals = [
            ['Ομάδα A3', 'Ομάδα B2', '2', '16:00', 'Προημιτελικός 1'],
            ['Ομάδα B3', 'Ομάδα A2', '2', '17:00', 'Προημιτελικός 2'],
            ['Ομάδα C3', 'Ομάδα D2', '2', '18:00', 'Προημιτελικός 3'],
            ['Ομάδα D3', 'Ομάδα C2', '2', '19:00', 'Προημιτελικός 4'],
        ];

        foreach ($quarterfinals as [$home, $away, $day, $time, $label]) {
            GameMatch::create([
                'team_home_id' => $teams[$home]->id,
                'team_away_id' => $teams[$away]->id,
                'day'          => $day,
                'round'        => 'quarterfinal',
                'match_time'   => $time,
                'match_label'  => $label,
                'played'       => false,
            ]);
        }

        // ΚΥΡΙΑΚΗ — Knockout
        $firstTeam = Team::first();
        $knockouts = [
            ['3', '10:00', 'Κατάταξη 7η-8η',       'seventh_place'],
            ['3', '11:00', 'Κατάταξη 5η-6η',       'fifth_place'],
            ['3', '13:30', 'Ημιτελικός 1',          'semifinal'],
            ['3', '14:45', 'Ημιτελικός 2',          'semifinal'],
            ['3', '16:30', 'Μικρός Τελικός (3η-4η)', 'third_place'],
            ['3', '19:30', 'Μεγάλος Τελικός',       'final'],
        ];

        foreach ($knockouts as [$day, $time, $label, $round]) {
            GameMatch::create([
                'team_home_id' => $firstTeam->id,
                'team_away_id' => $firstTeam->id,
                'day'          => $day,
                'round'        => $round,
                'match_time'   => $time,
                'match_label'  => $label,
                'played'       => false,
            ]);
        }
    }
}