<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    // Tampilkan daftar skill milik user yang login
    public function index()
    {
        $skills = Auth::user()->skills;
        return view('skills.index', compact('skills'));
    }

    // Tampilkan form tambah skill
    public function create()
    {
        return view('dashboard.skills.create');
    }

    // Simpan skill baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'kategori' => 'required|string',
            'level' => 'required|string',
        ]);

        Auth::user()->skills()->create($request->all());

        return redirect()->route('skills.index')->with('success', 'Skill berhasil ditambahkan.');
    }

    // Tampilkan form edit skill
    public function edit(Skill $skill)
    {
        $this->authorize('update', $skill);
        return view('dashboard.skills.edit', compact('skill'));
    }

    // Update data skill
    public function update(Request $request, Skill $skill)
    {
        $this->authorize('update', $skill);

        $request->validate([
            'nama' => 'required|string',
            'kategori' => 'required|string',
            'level' => 'required|string',
        ]);

        $skill->update($request->all());

        return redirect()->route('skills.index')->with('success', 'Skill berhasil diperbarui.');
    }

    // Hapus skill
    public function destroy(Skill $skill)
    {
        $this->authorize('delete', $skill);
        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Skill berhasil dihapus.');
    }
}
