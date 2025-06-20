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
        $pdf = Pdf::loadView('cv.show'); // Ambil view yang sama, render jadi PDF
        return $pdf->download('CV-' . Auth::user()->name . '.pdf');
    }
}
