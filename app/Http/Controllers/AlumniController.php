<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $agendas = agenda::all();
        return view('admin.agenda.index', compact('agendas'));
    }
}