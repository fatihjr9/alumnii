<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniAdminController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::all();
        return view('admin.alumni.index', compact('alumnis'));
    }

    public function destroy(Alumni $alumni)
    {
        $alumni->delete();
        return redirect()->route('alumni.index');
    }
}