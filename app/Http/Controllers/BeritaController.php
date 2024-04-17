<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
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
        $this->validate($request, [
            'nama' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',            
            'gambar.*' => 'image|mimes:jpeg,jpg,png,svg|max:2048',
        ]);

        $files = [];
        $images = $request->file('gambar');
        if ($images) {
            foreach ($images as $image) {
                $randomName = Str::random(20);
                $imageName = $randomName . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('berita/'), $imageName);
                $files[] = $imageName; // Store file names in an array
            }
        }

        $gambarJson = json_encode($files);

        $berita = berita::create([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarJson, // Store file names in the database
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita created successfully');
    }

    public function edit($id)
    {
        $berita = berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',            
            'gambar.*' => 'image|mimes:jpeg,jpg,png,svg|max:2048',
        ]);

        $berita = berita::findOrFail($id);

        // Hapus gambar lama
        $decodedImages = json_decode($berita->gambar, true);

        if (is_array($decodedImages)) {
            foreach ($decodedImages as $image) {
                $imagePath = public_path('berita/' . $image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        // Upload gambar baru
        $files = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $randomName = Str::random(20);
                $name = $randomName . rand(1, 50) . '.' . $file->extension();
                $file->move(public_path('berita/'), $name);
                $files[] = $name;
            }
        }

        // Update data Berita
        $berita->update([
            'nama' => $request->input('nama'),
            'tanggal' => $request->input('tanggal'),
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => json_encode($files),
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita updated successfully');
    }

    public function destroy($id)
    {
        $berita = berita::findOrFail($id);
        $berita->delete();
        return redirect()->route('berita.index');
    }
}
