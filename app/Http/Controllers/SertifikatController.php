<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SertifikatController extends Controller
{
    public function index()
    {
        $sertifikats = Auth::user()->sertifikats;
        return view('dashboard.sertifikats.index', compact('sertifikats'));
    }

    public function create()
    {
        return view('dashboard.sertifikats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'penyelenggara' => 'required|string',
            'tanggal' => 'required|date',
            'file' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('file')->store('sertifikats', 'public');

        Auth::user()->sertifikats()->create([
            'judul' => $request->judul,
            'penyelenggara' => $request->penyelenggara,
            'tanggal' => $request->tanggal,
            'file_path' => $path,
        ]);

        return redirect()->route('sertifikats.index')->with('success', 'Sertifikat berhasil ditambahkan.');
    }

    public function edit(Sertifikat $sertifikat)
    {
        $this->authorize('update', $sertifikat);
        return view('dashboard.sertifikats.edit', compact('sertifikat'));
    }

    public function update(Request $request, Sertifikat $sertifikat)
    {
        $this->authorize('update', $sertifikat);

        $request->validate([
            'judul' => 'required|string',
            'penyelenggara' => 'required|string',
            'tanggal' => 'required|date',
            'file' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['judul', 'penyelenggara', 'tanggal']);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($sertifikat->file_path);
            $data['file_path'] = $request->file('file')->store('sertifikats', 'public');
        }

        $sertifikat->update($data);

        return redirect()->route('sertifikats.index')->with('success', 'Sertifikat berhasil diperbarui.');
    }

    public function destroy(Sertifikat $sertifikat)
    {
        $this->authorize('delete', $sertifikat);
        Storage::disk('public')->delete($sertifikat->file_path);
        $sertifikat->delete();

        return redirect()->route('sertifikats.index')->with('success', 'Sertifikat berhasil dihapus.');
    }
}
