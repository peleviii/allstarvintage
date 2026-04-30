<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class TeamAdminController extends Controller
{
    public function index()
    {
        $teams = Team::withCount('players')->orderBy('name')->get()->groupBy('group');
        return view('admin.teams.index', compact('teams'));
    }
    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'group' => 'nullable|in:A,B,C,D',
        ]);

        Team::create([
            'name'  => $request->name,
            'group' => $request->group ?: null,
        ]);

        return redirect()->route('admin.teams')->with('success', 'Η ομάδα προστέθηκε!');
    }
    public function edit(Team $team)
    {
        $team->load('players');
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'group' => 'nullable|in:A,B,C,D',
            'logo'  => 'nullable|image|max:2048',
            'photo' => 'nullable|image|max:4096',
        ]);

        $data = $request->only('name', 'group');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('teams/logos', 'public');
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('teams/photos', 'public');
        }

        $team->update($data);

        return back()->with('success', 'Η ομάδα ενημερώθηκε!');
    }

    public function storePlayer(Request $request, Team $team)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'number' => 'required|integer|min:1|max:99',
            'gender' => 'required|in:Α,Γ',
        ]);

        $team->players()->create($request->only('name', 'number', 'gender'));

        return back()->with('success', 'Ο παίκτης προστέθηκε!');
    }

    public function updatePlayer(Request $request, Player $player)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'number' => 'required|integer|min:1|max:99',
            'gender' => 'required|in:Α,Γ',
        ]);

        $player->update($request->only('name', 'number', 'gender'));

        return back()->with('success', 'Ο παίκτης ενημερώθηκε!');
    }
    public function destroyPlayer(Player $player)
    {
        $player->delete();
        return back()->with('success', 'Ο παίκτης διαγράφηκε!');
    }
}
