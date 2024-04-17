<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = dosen::all();
        return view('admin.dosen.index', compact('dosens'));
    }

    public function create()
    {
        return view('admin.dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nidn' => 'required',
            'mengampu' => 'required',
        ]);

        dosen::create($request->all());

        return redirect()->route('dosen.index')
            ->with('success', 'Dosen created successfully');
    }

    public function edit($id)
    {
        $dosen = dosen::findOrFail($id);
        return view('admin.dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
        ]);

        $dosen = dosen::findOrFail($id);
        $dosen->update($request->all());

        return redirect()->route('dosen.index')
            ->with('success', 'dosen updated successfully');
    }

    public function destroy($id)
    {
        $dosen = dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('dosen.index');
    }
}