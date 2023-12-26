<?php

namespace App\Http\Controllers;

use App\Models\fakultas;
use App\Models\Galeri;
use App\Models\kontak;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function index()
    {
        $fakultas = fakultas::all();
        $kontak = kontak::all();
        $pertanyaan = Pertanyaan::all();
        $galeri = Galeri::all();
        return view('admin.lainnya.index', compact('fakultas', 'kontak', 'pertanyaan', 'galeri'));
    }
    // fakultas
    public function createFakultas()
    {
        return view('admin.lainnya.action.createFakultas');
    }
    public function storeFakultas(Request $request)
    {
        $request->validate([
            'nama_fakultas' => 'required',
            'nama_prodi' => 'required',
        ]);

        fakultas::create([
            'nama_fakultas' => $request->nama_fakultas,
            'nama_prodi' => $request->nama_prodi,
        ]);

        return redirect()->route('lainnya.index')->with('success', 'Data berhasil ditambahkan');
    }
    
    // galeri
    public function createGaleri()
    {
        return view('admin.lainnya.action.createGaleri');
    }

    public function storeGaleri(Request $request)
    {
        $this->validate($request, [
            'judul_galeri' => 'required',
            'galeri.*' => 'image|mimes:jpeg,jpg,png,svg|max:2048',
        ]);
    
        $files = [];
        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $file) {
                $name = time() . rand(1, 50) . '.' . $file->extension();
                $file->move(public_path('galeri/'), $name);
                $files[] = $name;
            }
        }
    
        $file = new Galeri();
        $file->judul_galeri = $request->input('judul_galeri');
        $file->galeri = $files;
        $file->save();
    
        return redirect()->route('lainnya.index')->with('success', 'Kontak created successfully');
    }   

    public function deleteGaleri($id)
    {
        $galeri = Galeri::findOrFail($id);

        $decodedImages = json_decode($galeri->galeri, true);

        if (is_array($decodedImages)) {
            foreach ($decodedImages as $image) {
                $imagePath = public_path('galeri/' . $image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }
        $galeri->delete();

        return redirect()->route('lainnya.index')->with('success', 'Galeri deleted successfully');
    }

    // kontak
    public function createKontak()
    {
        return view('admin.lainnya.action.createContact');
    }

    public function storeKontak(Request $request)
    {
        $validatedData = $request->validate([
            'icon' => 'required|image|mimes:png,jpg,jpeg,svg|max:512',
            'alamat_kontak' => 'required',
        ]);
    
        // Handle image upload
        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('icon/'), $imageName);
            $validatedData['icon'] = $imageName;
        }
    
        kontak::create($validatedData);
    
        return redirect()->route('lainnya.index')->with('success', 'Kontak created successfully');
    }


    // pertanyaan
    public function createPertanyaan()
    {
        return view('admin.lainnya.action.createPertanyaan');
    }

    public function storePertanyaan(Request $request)
    {
        $validatedData = $request->validate([
            'pertanyaan' => 'required',
        ]);
    
        Pertanyaan::create($validatedData);
    
        return redirect()->route('lainnya.index')->with('success', 'Kontak created successfully');
    }



}