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
        $galeri = Galeri::all();
        return view('admin.lainnya.index', compact('fakultas', 'kontak', 'galeri'));
    }
    // fakultas
    public function createFakultas()
    {
        return view('admin.lainnya.action.createFakultas');
    }
    public function storeFakultas(Request $request)
    {
        $data = $request->validate([
            'nama_fakultas' => 'required',
            'nama_prodi' => 'required',
        ]);

        fakultas::create($data);

        return redirect()->route('lainnya.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function editFakultas($id)
    {
        $fakultas = fakultas::findOrFail($id);
        return view('admin.lainnya.action.editFakultas', compact('fakultas'));
    }

    public function updateFakultas(Request $request, $id)
    {
        $request->validate([
            'nama_fakultas' => 'required',
            'nama_prodi' => 'required',
        ]);

        $fakultas = fakultas::findOrFail($id);
        $fakultas->update($request->all());

        return redirect()->route('lainnya.index')
            ->with('success', 'dosen updated successfully');
    }

    public function destroyFakultas($id)
    {
        $fakultas = fakultas::findOrFail($id);
        $fakultas->delete();
        return redirect()->route('lainnya.index');
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

    public function editGaleri($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.lainnya.action.editGaleri', compact('galeri'));
    }

    public function updateGaleri(Request $request, $id)
    {
        $request->validate([
            'judul_galeri' => 'required',
            'galeri.*' => 'image|mimes:jpeg,jpg,png,svg|max:2048',
        ]);

        $galeri = Galeri::findOrFail($id);

        // Hapus gambar lama
        $decodedImages = json_decode($galeri->galeri, true);

        if (is_array($decodedImages)) {
            foreach ($decodedImages as $image) {
                $imagePath = public_path('galeri/' . $image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        // Upload gambar baru
        $files = [];
        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $file) {
                $name = time() . rand(1, 50) . '.' . $file->extension();
                $file->move(public_path('galeri/'), $name);
                $files[] = $name;
            }
        }

        // Update data Galeri
        $galeri->update([
            'judul_galeri' => $request->input('judul_galeri'),
            'galeri' => $files,
        ]);

        return redirect()->route('lainnya.index')->with('success', 'Galeri updated successfully');
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

    public function editKontak($id)
    {
        $kontak = kontak::findOrFail($id);
        return view('admin.lainnya.action.editKontak', compact('Kontak'));
    }

    public function updateKontak(Request $request, $id)
    {
        $request->validate([
            'icon' => 'image|mimes:png,jpg,jpeg,svg|max:512',
            'alamat_kontak' => 'required',
        ]);

        $kontak = kontak::findOrFail($id);

        // Handle image upload if provided
        if ($request->hasFile('icon')) {
            $validatedData = $request->validate([
                'icon' => 'required|image|mimes:png,jpg,jpeg,svg|max:512',
            ]);

            // Delete old icon
            $oldIconPath = public_path('icon/') . $kontak->icon;
            if (file_exists($oldIconPath)) {
                unlink($oldIconPath);
            }

            // Upload new icon
            $newIcon = $request->file('icon');
            $newIconName = time() . '.' . $newIcon->getClientOriginalExtension();
            $newIcon->move(public_path('icon/'), $newIconName);

            $kontak->update([
                'icon' => $newIconName,
                'alamat_kontak' => $request->input('alamat_kontak'),
            ]);
        } else {
            // No new icon provided, update other fields
            $kontak->update([
                'alamat_kontak' => $request->input('alamat_kontak'),
            ]);
        }

        return redirect()->route('lainnya.index')->with('success', 'Kontak updated successfully');
    }

    public function destroyKontak($id)
    {
        $kontak = kontak::findOrFail($id);
        $kontak->delete();
        return redirect()->route('lainnya.index');
    }

}