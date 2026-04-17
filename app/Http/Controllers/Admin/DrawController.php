<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class DrawController extends Controller
{
    public function index()
    {
        $teams = Team::whereNotNull('group')
            ->where('group', '!=', '')
            ->orWhereNull('group')
            ->orderBy('name')
            ->get();

        return view('admin.draw', compact('teams'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'groups' => 'required|array',
            'groups.*' => 'nullable|in:A,B,C,D',
        ]);

        foreach ($request->groups as $teamId => $group) {
            Team::where('id', $teamId)->update(['group' => $group ?: null]);
        }

        return back()->with('success', 'Η κλήρωση αποθηκεύτηκε! Μπορείς τώρα να δημιουργήσεις τους αγώνες. ⚡');
    }
}