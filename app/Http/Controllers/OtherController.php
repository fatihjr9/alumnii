<?php

namespace App\Http\Controllers;

use App\Models\fakultas;
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
        return view('admin.lainnya.index', compact('fakultas', 'kontak', 'pertanyaan'));
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
    
    // collection

    

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

    // kontak
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