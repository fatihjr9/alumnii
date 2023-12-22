<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use App\Models\berita;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $berita = berita::all();
        $agenda = agenda::all();
        
        return view('mahasiswa.dashboard', compact('berita', 'agenda'));
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
