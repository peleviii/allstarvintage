<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GameMatch;
use App\Models\Team;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMatches = GameMatch::count();
        $playedMatches = GameMatch::where('played', true)->count();
        $teams = Team::count();

        return view('admin.dashboard', compact('totalMatches', 'playedMatches', 'teams'));
    }
    public function exportExcel()
    {
        $spreadsheet = new Spreadsheet();

        // ΦΥΛΛΟ 1 - Παίκτες
        $sheet1 = $spreadsheet->getActiveSheet();
        $sheet1->setTitle('Παίκτες');
        $sheet1->fromArray(['#', 'Ονοματεπώνυμο', 'Φύλο', 'Ομάδα', 'Όμιλος'], null, 'A1');

        $players = \App\Models\Player::with('team')->orderBy('team_id')->orderBy('number')->get();
        foreach ($players as $i => $player) {
            $sheet1->fromArray([
                $player->number,
                $player->name,
                $player->gender === 'Α' ? 'Άνδρας' : 'Γυναίκα',
                $player->team->name ?? '-',
                $player->team->group ?? '-',
            ], null, 'A' . ($i + 2));
        }

        // ΦΥΛΛΟ 2 - Ομάδες
        $sheet2 = $spreadsheet->createSheet();
        $sheet2->setTitle('Ομάδες');
        $sheet2->fromArray(['Ομάδα', 'Όμιλος', 'Παίκτες'], null, 'A1');

        $teams = Team::withCount('players')->orderBy('group')->orderBy('name')->get();
        foreach ($teams as $i => $team) {
            $sheet2->fromArray([
                $team->name,
                $team->group ?? '-',
                $team->players_count,
            ], null, 'A' . ($i + 2));
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'allstarvintage_' . date('Ymd') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
