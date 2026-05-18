<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\GameMatch;

class TournamentSeeder extends Seeder
{
    public function run(): void
    {
        // ΟΜΑΔΕΣ
        $teams = [
            ['name' => 'Sharks',    'group' => 'A'],
            ['name' => 'Maniacs',   'group' => 'A'],
            ['name' => 'Kotinos',   'group' => 'A'],
            ['name' => 'AOM1',      'group' => 'B'],
            ['name' => 'Galatsi',   'group' => 'B'],
            ['name' => 'Itea',      'group' => 'B'],
            ['name' => 'Zografou',  'group' => 'C'],
            ['name' => 'AOM2',      'group' => 'C'],
            ['name' => 'Falireas',  'group' => 'C'],
            ['name' => 'Gerakas',   'group' => 'D'],
            ['name' => 'Titanes',   'group' => 'D'],
            ['name' => 'Astegoi',   'group' => 'D'],
        ];

        foreach ($teams as $t) {
            Team::create($t);
        }

        $t = Team::all()->keyBy('name');

        // ΑΓΩΝΕΣ
        $matches = [
            // ΠΑΡΑΣΚΕΥΗ - Όμιλοι
            ['day' => 1, 'match_time' => '18:00', 'round' => 'group', 'home' => 'Sharks',   'away' => 'Maniacs'],
            ['day' => 1, 'match_time' => '19:15', 'round' => 'group', 'home' => 'AOM1',     'away' => 'Galatsi'],
            ['day' => 1, 'match_time' => '20:30', 'round' => 'group', 'home' => 'Zografou', 'away' => 'AOM2'],
            ['day' => 1, 'match_time' => '21:45', 'round' => 'group', 'home' => 'Gerakas',  'away' => 'Titanes'],

            // ΣΑΒΒΑΤΟ - Όμιλοι
            ['day' => 2, 'match_time' => '08:30', 'round' => 'group', 'home' => 'Sharks',   'away' => 'Kotinos'],
            ['day' => 2, 'match_time' => '09:45', 'round' => 'group', 'home' => 'AOM1',     'away' => 'Itea'],
            ['day' => 2, 'match_time' => '11:00', 'round' => 'group', 'home' => 'Zografou', 'away' => 'Falireas'],
            ['day' => 2, 'match_time' => '12:15', 'round' => 'group', 'home' => 'Gerakas',  'away' => 'Astegoi'],
            ['day' => 2, 'match_time' => '13:30', 'round' => 'group', 'home' => 'Maniacs',  'away' => 'Kotinos'],
            ['day' => 2, 'match_time' => '14:45', 'round' => 'group', 'home' => 'Galatsi',  'away' => 'Itea'],
            ['day' => 2, 'match_time' => '16:00', 'round' => 'group', 'home' => 'AOM2',     'away' => 'Falireas'],
            ['day' => 2, 'match_time' => '17:15', 'round' => 'group', 'home' => 'Titanes',  'away' => 'Astegoi'],

            // ΣΑΒΒΑΤΟ - Προημιτελικοί
            ['day' => 2, 'match_time' => '18:30', 'round' => 'quarterfinal', 'match_label' => 'Προημιτελικός 1', 'home' => null, 'away' => null],
            ['day' => 2, 'match_time' => '19:45', 'round' => 'quarterfinal', 'match_label' => 'Προημιτελικός 2', 'home' => null, 'away' => null],
            ['day' => 2, 'match_time' => '21:00', 'round' => 'quarterfinal', 'match_label' => 'Προημιτελικός 3', 'home' => null, 'away' => null],
            ['day' => 2, 'match_time' => '22:15', 'round' => 'quarterfinal', 'match_label' => 'Προημιτελικός 4', 'home' => null, 'away' => null],

            // ΚΥΡΙΑΚΗ
            ['day' => 3, 'match_time' => '9:00', 'round' => 'seventh_place', 'match_label' => 'Κατάταξη 7η-8η', 'home' => null, 'away' => null],
            ['day' => 3, 'match_time' => '10:15', 'round' => 'fifth_place',  'match_label' => 'Κατάταξη 5η-6η', 'home' => null, 'away' => null],
            ['day' => 3, 'match_time' => '11:30', 'round' => 'semifinal',    'match_label' => 'Ημιτελικός 1',  'home' => null, 'away' => null],
            ['day' => 3, 'match_time' => '12:45', 'round' => 'semifinal',    'match_label' => 'Ημιτελικός 2',  'home' => null, 'away' => null],
            ['day' => 3, 'match_time' => '14:00', 'round' => 'event', 'match_label' => 'Αποκλ. Ομίλου Α vs Αποκλ. Ομίλου Β', 'home' => null, 'away' => null],
            ['day' => 3, 'match_time' => '15:15', 'round' => 'event', 'match_label' => 'Αποκλ. Ομίλου Γ vs Αποκλ. Ομίλου Δ', 'home' => null, 'away' => null],
            ['day' => 3, 'match_time' => '16:30', 'round' => 'event', 'match_label' => 'Νικητής vs Νικητής', 'home' => null, 'away' => null],

            ['day' => 3, 'match_time' => '17:45', 'round' => 'third_place',  'match_label' => 'Μικρός Τελικός', 'home' => null, 'away' => null],
            ['day' => 3, 'match_time' => '19:00', 'round' => 'event',        'match_label' => 'Αγώνας Επιλέκτων', 'home' => null, 'away' => null],
            ['day' => 3, 'match_time' => '19:15', 'round' => 'event',        'match_label' => 'Music Show', 'home' => null, 'away' => null],
            ['day' => 3, 'match_time' => '19:30', 'round' => 'final',        'match_label' => 'ΜΕΓΑΛΟΣ ΤΕΛΙΚΟΣ', 'home' => null, 'away' => null],
        ];

        foreach ($matches as $m) {
            GameMatch::create([
                'day'          => $m['day'],
                'match_time'   => $m['match_time'],
                'round'        => $m['round'],
                'match_label'  => $m['match_label'] ?? null,
                'team_home_id' => $m['home'] ? $t[$m['home']]->id : null,
                'team_away_id' => $m['away'] ? $t[$m['away']]->id : null,
                'played'       => false,
            ]);
        }
    }
}
