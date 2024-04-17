<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use App\Models\Alumni;
use App\Models\berita;
use App\Models\Kontak;
use App\Models\Fakultas;
use App\Models\Galeri;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {   
        // Galeri
        $galeri = Galeri::latest()->take(1)->get();
        // kontak
        $kontak = Kontak::latest()->get();

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
            'totalAgenda' => $totalAgenda,
            'totalBerita' => $totalBerita,
            'totalFakultas' => $totalFakultas,
            'totalAlumni' => $totalAlumni,
            // Get all
            'berita' => $berita,
            'fakultas' => $fakultas,
            'alumni' => $alumni,
            'agenda' => $agenda,
            'kontak' => $kontak,
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
