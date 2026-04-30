<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StandingsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MatchAdminController;
use App\Http\Controllers\Admin\TeamAdminController;
use App\Http\Controllers\Admin\TournamentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DrawController;


require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('home');
});

Route::get('/kanones', function () {
    return view('rules');
});

Route::get('/programa', [MatchController::class, 'index'])->name('matches.index');

Route::get('/omades', [TeamController::class, 'index'])->name('teams.index');
Route::get('/omades/{team}', [TeamController::class, 'show'])->name('teams.show');

Route::get('/vathmologia', [StandingsController::class, 'index'])->name('standings.index');

Route::get('/epikoinonia', [ContactController::class, 'index'])->name('contact.index');
Route::post('/epikoinonia', [ContactController::class, 'send'])->name('contact.send');

Route::get('/xorigoi', function () {
    return view('sponsors');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/matches', [MatchAdminController::class, 'index'])->name('matches');
    Route::patch('/matches/{gameMatch}', [MatchAdminController::class, 'update'])->name('matches.update');
    Route::patch('/matches/{gameMatch}/teams', [MatchAdminController::class, 'updateTeams'])->name('matches.updateTeams');
    Route::get('/teams/create', [TeamAdminController::class, 'create'])->name('teams.create');
    Route::post('/teams', [TeamAdminController::class, 'store'])->name('teams.store');
    Route::get('/teams', [TeamAdminController::class, 'index'])->name('teams');
    Route::get('/teams/{team}/edit', [TeamAdminController::class, 'edit'])->name('teams.edit');
    Route::patch('/teams/{team}', [TeamAdminController::class, 'update'])->name('teams.update');
    Route::post('/teams/{team}/players', [TeamAdminController::class, 'storePlayer'])->name('teams.players.store');
    Route::patch('/players/{player}', [TeamAdminController::class, 'updatePlayer'])->name('players.update');
    Route::delete('/players/{player}', [TeamAdminController::class, 'destroyPlayer'])->name('players.destroy');
    Route::delete('/teams/{team}/logo', [TeamAdminController::class, 'destroyLogo'])->name('teams.logo.destroy');
    Route::delete('/teams/{team}/photo', [TeamAdminController::class, 'destroyPhoto'])->name('teams.photo.destroy');
    Route::post('/tournament/generate-matches', [TournamentController::class, 'generateMatches'])->name('tournament.generate');
    Route::get('/draw', [DrawController::class, 'index'])->name('draw');
    Route::post('/draw', [DrawController::class, 'update'])->name('draw.update');
});
