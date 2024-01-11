<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = berita::latest()->get();
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'nama' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('berita/'), $imageName);
            $validatedData['gambar'] = $imageName;
        }
        berita::create($validatedData);

        return redirect()->route('berita.index');
    }

    public function destroy($id)
    {
        $berita = berita::findOrFail($id);
        $berita->delete();
        return redirect()->route('berita.index');
    }
}
