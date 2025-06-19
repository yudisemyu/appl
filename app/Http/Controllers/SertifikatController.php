<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat; // Pastikan model Sertifikat Anda diimpor
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Pastikan ini diimpor
use Illuminate\View\View; // Tambahkan ini untuk type hinting
use Illuminate\Http\RedirectResponse; // Tambahkan ini untuk type hinting

class SertifikatController extends Controller
{
    /**
     * Menampilkan daftar sertifikat milik user yang login (sertifikat/index.blade.php).
     */
    public function index(): View
    {
        $sertifikats = Auth::user()->sertifikats;
        return view('sertifikat.index', compact('sertifikats'));
    }

    /**
     * Menampilkan form untuk menambah sertifikat baru (sertifikat/create.blade.php).
     */
    public function create(): View
    {
        // Jalur view diperbaiki sesuai struktur: resources/views/sertifikat/create.blade.php
        return view('sertifikat.create');
    }

    /**
     * Menyimpan sertifikat baru ke database, termasuk unggahan file.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'tanggal' => 'required|date',
            // NAMA INPUT FILE DIPERBAIKI dari 'file' menjadi 'file_path'
            'file_path' => 'required|file|mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        $filePath = null;
        // PENGAMBILAN FILE DIPERBAIKI dari 'file' menjadi 'file_path'
        if ($request->hasFile('file_path')) {
            // Simpan file ke direktori 'sertifikats' di storage disk 'public'
            $filePath = $request->file('file_path')->store('sertifikats', 'public');
        }

        Auth::user()->sertifikats()->create([
            'judul' => $request->judul,
            'penyelenggara' => $request->penyelenggara,
            'tanggal' => $request->tanggal,
            'file_path' => $filePath, // Sudah benar
        ]);

        // NAMA RUTE DIPERBAIKI dari 'sertifikats.index' menjadi 'sertifikat.index'
        return redirect()->route('sertifikat.index')->with('success', 'Sertifikat berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit sertifikat tertentu (sertifikat/edit.blade.php).
     */
    public function edit(Sertifikat $sertifikat): View
    {
        // Otorisasi: hanya pemilik sertifikat yang boleh mengedit
        // $this->authorize('update', $sertifikat); // Uncomment jika menggunakan Policy

        // JALUR VIEW DIPERBAIKI dari 'dashboard.sertifikats.edit' menjadi 'sertifikat.edit'
        return view('sertifikat.edit', compact('sertifikat'));
    }

    /**
     * Memperbarui data sertifikat di database, termasuk update file.
     */
    public function update(Request $request, Sertifikat $sertifikat): RedirectResponse
    {
        // Otorisasi
        // $this->authorize('update', $sertifikat); // Uncomment jika menggunakan Policy

        $request->validate([
            'judul' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'tanggal' => 'required|date',
            // NAMA INPUT FILE DIPERBAIKI dari 'file' menjadi 'file_path'
            'file_path' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:2048', // Nullable karena file bisa tidak diubah
        ]);

        $data = $request->only(['judul', 'penyelenggara', 'tanggal']);

        // PENGAMBILAN FILE DIPERBAIKI dari 'file' menjadi 'file_path'
        if ($request->hasFile('file_path')) {
            // Hapus file lama jika ada dan file baru diunggah
            if ($sertifikat->file_path) {
                Storage::disk('public')->delete($sertifikat->file_path);
            }
            // Simpan file baru
            $data['file_path'] = $request->file('file_path')->store('sertifikats', 'public');
        }

        $sertifikat->update($data);

        // NAMA RUTE DIPERBAIKI dari 'sertifikats.index' menjadi 'sertifikat.index'
        return redirect()->route('sertifikat.index')->with('success', 'Sertifikat berhasil diperbarui.');
    }

    /**
     * Menghapus sertifikat dari database, termasuk file fisiknya.
     */
    public function destroy(Sertifikat $sertifikat): RedirectResponse
    {
        // Otorisasi
        // $this->authorize('delete', $sertifikat); // Uncomment jika menggunakan Policy

        // Hapus file fisik dari storage jika ada
        if ($sertifikat->file_path) {
            Storage::disk('public')->delete($sertifikat->file_path);
        }
        
        $sertifikat->delete(); // Hapus entri dari database

        // NAMA RUTE DIPERBAIKI dari 'sertifikats.index' menjadi 'sertifikat.index'
        return redirect()->route('sertifikat.index')->with('success', 'Sertifikat berhasil dihapus.');
    }
}