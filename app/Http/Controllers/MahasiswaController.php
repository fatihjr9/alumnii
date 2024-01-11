<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use App\Models\Alumni;
use App\Models\berita;
use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Galeri;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {   
        // Galeri
        $galeri = Galeri::latest()->take(1)->get();
        // Dosen
        $totalDosen = Dosen::count();
        $dosen = dosen::latest()->take(3)->get();

        // Agenda
        $totalAgenda = Agenda::count();
        $agenda = Agenda::latest()->take(4)->get();

        // Berita
        $totalBerita = berita::count();
        $berita = berita::latest()->take(1)->get();
        // Fakultas
        $fakultas = Fakultas::all()->take(3);
        $totalFakultas = fakultas::count();

        // Alumni
        $totalAlumni = Alumni::count();
        $alumni = Alumni::latest()->take(3)->get();


        return view('mahasiswa.dashboard', [
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

    public function indexBerita()
    {
        $berita = berita::all();
        
        return view('mahasiswa.berita', compact('berita'));
    }

    public function indexAgenda()
    {
        $agenda = agenda::all();
        
        return view('mahasiswa.agenda', compact('agenda'));
    }

    public function indexAlumni()
    {
        // $agenda = agenda::all();
        
        return view('mahasiswa.alumni');
    }
}
