<?php

namespace App\Http\Controllers;

use App\Models\Experience; // Pastikan model Experience Anda diimpor
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View; // Untuk type hinting
use Illuminate\Http\RedirectResponse; // Untuk type hinting

class ExperienceController extends Controller
{
    /**
     * Menampilkan daftar pengalaman kerja/profesional milik user yang login (experiences/index.blade.php).
     */
    public function index(): View
    {
        // Mendapatkan semua pengalaman yang dimiliki oleh user yang sedang login
        // Pastikan relasi 'experiences()' ada di model App\Models\User
        $experiences = Auth::user()->experiences()->orderBy('start_date', 'desc')->get(); // Urutkan berdasarkan tanggal terbaru
        return view('experiences.index', compact('experiences'));
    }

    /**
     * Menampilkan formulir untuk menambah pengalaman baru (experiences/create.blade.php).
     */
    public function create(): View
    {
        return view('experiences.create');
    }

    /**
     * Menyimpan pengalaman baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi data yang masuk dari form
        $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date', // end_date harus setelah atau sama dengan start_date
            'description' => 'nullable|string',
        ]);

        // Membuat pengalaman baru untuk user yang sedang login
        Auth::user()->experiences()->create($request->all());

        // Redirect kembali ke daftar pengalaman dengan pesan sukses
        return redirect()->route('experiences.index')->with('success', 'Pengalaman berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir untuk mengedit pengalaman tertentu (experiences/edit.blade.php).
     */
    public function edit(Experience $experience): View
    {
        // Otorisasi: hanya pemilik pengalaman yang boleh mengedit
        // $this->authorize('update', $experience); // Uncomment jika menggunakan Policy ExperiencePolicy
        return view('experiences.edit', compact('experience'));
    }

    /**
     * Memperbarui data pengalaman di database.
     */
    public function update(Request $request, Experience $experience): RedirectResponse
    {
        // Otorisasi
        // $this->authorize('update', $experience); // Uncomment jika menggunakan Policy

        // Validasi data yang masuk
        $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        // Update data pengalaman
        $experience->update($request->all());

        // Redirect kembali ke daftar pengalaman dengan pesan sukses
        return redirect()->route('experiences.index')->with('success', 'Pengalaman berhasil diperbarui.');
    }

    /**
     * Menghapus pengalaman dari database.
     */
    public function destroy(Experience $experience): RedirectResponse
    {
        // Otorisasi
        // $this->authorize('delete', $experience); // Uncomment jika menggunakan Policy

        $experience->delete(); // Hapus pengalaman

        // Redirect kembali ke daftar pengalaman dengan pesan sukses
        return redirect()->route('experiences.index')->with('success', 'Pengalaman berhasil dihapus.');
    }
}