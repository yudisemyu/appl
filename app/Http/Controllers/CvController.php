<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class CvController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $skills = $user->skills;
        $sertifikats = $user->sertifikats;

        return view('cv.show', compact('user', 'skills', 'sertifikats')); // View CV ATS-friendly
    }

    public function download()
    {
        $user = Auth::user();
        $user->load('skills', 'sertifikats');

        // PERBAIKAN DI SINI: Kirimkan variabel 'is_pdf' dengan nilai TRUE
        // Buat array data gabungan untuk dikirim ke view
        $data = [
            'user' => $user,
            'is_pdf' => true, // Ini adalah flag yang akan kita gunakan di Blade
        ];

        // Memuat view 'profile.cv' dan mengirimkan data
        $pdf = Pdf::loadView('cv.show', $data); 

        return $pdf->download('CV-' . $user->name . '.pdf');
    }
}
