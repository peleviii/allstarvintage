<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use App\Models\Team;

class TournamentController extends Controller
{
    public function generateMatches()
    {
        // Έλεγχος ότι έχουμε 12 ομάδες
        $total = Team::count();
        if ($total !== 12) {
            return back()->with('error', "Χρειάζονται 12 ομάδες! Αυτή τη στιγμή έχεις {$total}.");
        }

        Artisan::call('tournament:generate-matches');
        return back()->with('success', 'Οι αγώνες δημιουργήθηκαν επιτυχώς!');
    }
}