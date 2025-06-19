<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest; // Pastikan ini ada dan berisi aturan validasi yang lengkap
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna.
     * Ini adalah metode yang akan dipanggil oleh rute 'profile.show'.
     */

    public function profile(): View
    {
        $user = Auth::user();
        return view('profile.profile', compact('user'));
    }

    /**
     * Menampilkan formulir untuk mengedit profil pengguna.
     * Ini adalah metode yang akan dipanggil oleh rute 'profile.edit'.
     */
    public function edit(Request $request): View
    {
        // Berdasarkan struktur folder Anda: resources/views/profile/edit.blade.php
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Memperbarui informasi profil pengguna.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user(); // Dapatkan user yang sedang login

        // Mengisi atribut model dari data yang sudah divalidasi
        // Pastikan properti ini ada di $fillable array model User Anda
        $user->fill($request->validated());

        // Penanganan email yang berubah
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // Redirect ke halaman tampilan profil setelah update berhasil
        return Redirect::route('profile.profile')->with('status', 'profile-updated');
    }

    /**
     * Menghapus akun pengguna.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout(); // Logout pengguna

        $user->delete(); // Hapus pengguna dari database

        $request->session()->invalidate(); // Invalidasi sesi
        $request->session()->regenerateToken(); // Regenerate token

        return Redirect::to('/'); // Redirect ke halaman utama
    }
}