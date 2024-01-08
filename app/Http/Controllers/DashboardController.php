<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use App\Models\agenda;
use App\Models\Alumni;
use App\Models\berita;
use App\Models\fakultas;
use App\Models\Galeri;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {   
        // Galeri
        $galeri = Galeri::latest()->take(1)->get();
        // Dosen
        $totalDosen = dosen::count();
        $dosen = dosen::latest()->take(3)->get();

        // Agenda
        $totalAgenda = Agenda::count();
        $agenda = Agenda::latest()->take(4)->get();

        // Berita
        $totalBerita = berita::count();
        $berita = berita::latest()->take(1)->get();
        // Fakultas
        $fakultas = fakultas::all()->take(3);
        $totalFakultas = fakultas::count();

        // Alumni
        $totalAlumni = Alumni::count();
        $alumni = Alumni::latest()->take(3)->get();


        return view('admin.dashboard', [
            'totalDosen' => $totalDosen,
            'totalAgenda' => $totalAgenda,
            'totalBerita' => $totalBerita,
            'totalFakultas' => $totalFakultas,
            'totalAlumni' => $totalAlumni,
            // Get all
            'berita' => $berita,
            'fakultas' => $fakultas,
            'alumni' => $alumni,
            'agenda' => $agenda,
            'dosen' => $dosen,
            'galeri' => $galeri,
        ]);
    }
}
