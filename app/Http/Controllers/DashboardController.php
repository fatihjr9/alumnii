<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use App\Models\agenda;
use App\Models\berita;
use App\Models\fakultas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDosen = dosen::count();
        $totalAgenda = agenda::count();
        $totalBerita = berita::count();
        $totalFakultas = fakultas::count();

        return view('admin.dashboard', [
            'totalDosen' => $totalDosen,
            'totalAgenda' => $totalAgenda,
            'totalBerita' => $totalBerita,
            'totalFakultas' => $totalFakultas
        ]);
    }
}
