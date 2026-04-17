<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Team;
use App\Models\GameMatch;

class GenerateMatches extends Command
{
    protected $signature = 'tournament:generate-matches';
    protected $description = 'Generates matches based on current teams in each group';

    public function handle()
    {
        foreach (['A', 'B', 'C', 'D'] as $group) {
            $count = Team::where('group', $group)->count();
            if ($count !== 3) {
                $this->error("Ο Όμιλος {$group} έχει {$count} ομάδες. Χρειάζονται ακριβώς 3!");
                return;
            }
        }
        // Ανανεώνουμε μόνο τις ομάδες στους αγώνες ομίλων
        $groupGames = GameMatch::where('round', 'group')->orderBy('id')->get();

        $teams = [];
        foreach (['A', 'B', 'C', 'D'] as $group) {
            $teams[$group] = Team::where('group', $group)->orderBy('id')->get();
        }

        $placeholder = Team::first();

        // ΠΑΡΑΣΚΕΥΗ — Φάση Ομίλων
        $groupMatchesDay1 = [
            [$teams['A'][0], $teams['A'][1], '1', '18:30', 'Αγώνας 1 — Όμιλος Α'],
            [$teams['B'][0], $teams['B'][1], '1', '19:30', 'Αγώνας 2 — Όμιλος Β'],
            [$teams['C'][0], $teams['C'][1], '1', '20:30', 'Αγώνας 3 — Όμιλος Γ'],
            [$teams['D'][0], $teams['D'][1], '1', '21:30', 'Αγώνας 4 — Όμιλος Δ'],
        ];

        foreach ($groupMatchesDay1 as [$home, $away, $day, $time, $label]) {
            GameMatch::create([
                'team_home_id' => $home->id,
                'team_away_id' => $away->id,
                'day' => $day,
                'round' => 'group',
                'match_time' => $time,
                'match_label' => $label,
                'played' => false,
            ]);
        }

        // ΣΑΒΒΑΤΟ — Φάση Ομίλων (συνέχεια)
        $groupMatchesDay2 = [
            [$teams['A'][0], $teams['A'][2], '2', '08:00', 'Αγώνας 5 — Όμιλος Α'],
            [$teams['B'][0], $teams['B'][2], '2', '09:00', 'Αγώνας 6 — Όμιλος Β'],
            [$teams['C'][0], $teams['C'][2], '2', '10:00', 'Αγώνας 7 — Όμιλος Γ'],
            [$teams['D'][0], $teams['D'][2], '2', '11:00', 'Αγώνας 8 — Όμιλος Δ'],
            [$teams['A'][1], $teams['A'][2], '2', '12:00', 'Αγώνας 9 — Όμιλος Α'],
            [$teams['B'][1], $teams['B'][2], '2', '13:00', 'Αγώνας 10 — Όμιλος Β'],
            [$teams['C'][1], $teams['C'][2], '2', '14:00', 'Αγώνας 11 — Όμιλος Γ'],
            [$teams['D'][1], $teams['D'][2], '2', '15:00', 'Αγώνας 12 — Όμιλος Δ'],
        ];

        foreach ($groupMatchesDay2 as [$home, $away, $day, $time, $label]) {
            GameMatch::create([
                'team_home_id' => $home->id,
                'team_away_id' => $away->id,
                'day' => $day,
                'round' => 'group',
                'match_time' => $time,
                'match_label' => $label,
                'played' => false,
            ]);
        }

        // ΣΑΒΒΑΤΟ — Προημιτελικοί
        $quarterfinals = [
            [$placeholder, $placeholder, '2', '16:00', 'Προημιτελικός 1', 'quarterfinal'],
            [$placeholder, $placeholder, '2', '17:00', 'Προημιτελικός 2', 'quarterfinal'],
            [$placeholder, $placeholder, '2', '18:00', 'Προημιτελικός 3', 'quarterfinal'],
            [$placeholder, $placeholder, '2', '19:00', 'Προημιτελικός 4', 'quarterfinal'],
        ];

        foreach ($quarterfinals as [$home, $away, $day, $time, $label, $round]) {
            GameMatch::create([
                'team_home_id' => $home->id,
                'team_away_id' => $away->id,
                'day' => $day,
                'round' => $round,
                'match_time' => $time,
                'match_label' => $label,
                'played' => false,
            ]);
        }

        // ΚΥΡΙΑΚΗ
        $sundayMatches = [
            [$placeholder, $placeholder, '3', '10:00', 'Κατάταξη 7η-8η',        'seventh_place'],
            [$placeholder, $placeholder, '3', '11:00', 'Κατάταξη 5η-6η',        'fifth_place'],
            [null,          null,          '3', '12:00', 'Τουρνουά Ακαδημιών',    'event'],
            [$placeholder, $placeholder, '3', '13:30', 'Ημιτελικός 1',           'semifinal'],
            [$placeholder, $placeholder, '3', '14:45', 'Ημιτελικός 2',           'semifinal'],
            [$placeholder, $placeholder, '3', '16:30', 'Μικρός Τελικός (3η-4η)', 'third_place'],
            [null,          null,          '3', '17:30', 'Αγώνας Επιλέκτων',      'event'],
            [null,          null,          '3', '19:00', 'Music Show 🎵',          'event'],
            [$placeholder, $placeholder, '3', '19:30', 'Μεγάλος Τελικός 🏆',     'final'],
        ];

        foreach ($sundayMatches as [$home, $away, $day, $time, $label, $round]) {
            GameMatch::create([
                'team_home_id' => $home ? $home->id : null,
                'team_away_id' => $away ? $away->id : null,
                'day'          => $day,
                'round'        => $round,
                'match_time'   => $time,
                'match_label'  => $label,
                'played'       => false,
            ]);
        }

        $this->info('✅ Οι αγώνες δημιουργήθηκαν επιτυχώς!');
    }
}
