<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::all();
        return view('mahasiswa.alumni', compact('alumnis'));
    }

    public function create()
    {
        $isAlumni = Alumni::where('id', auth()->user()->id)->exists();
        if ($isAlumni) {
            return redirect()->route('mahasiswa.alumni');
        }
        return view('mahasiswa.action.CreateAlumni');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'foto' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'nama' => 'required',
            'npm' => 'required',
            'prodi' => 'required',
            'thn_masuk' => 'required',
            'thn_lulus' => 'required',
        ]);

        // Handle image upload
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('alumni/'), $imageName);
            $validatedData['foto'] = $imageName;
        }
        Alumni::create($validatedData);

        return redirect()->route('mahasiswa.alumni')->with('success', 'Alumni created successfully');
    }
}