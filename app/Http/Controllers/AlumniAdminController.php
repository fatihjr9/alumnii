<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class AlumniAdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $alumnis = Alumni::latest();

        if ($search) {
            $alumnis->where(function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                      ->orWhere('npm', 'like', '%' . $search . '%')
                      ->orWhere('prodi', 'like', '%' . $search . '%');
            });
        }
    
        $alumnis = $alumnis->get();
        return view('admin.alumni.index', compact('alumnis'));
    }

    public function show($id)
    {
        $alumni = Alumni::where('id', $id)->firstOrFail();
        return view('admin.alumni.template', compact('alumni'));
    }

    public function create()
    {
        $jurusan = Fakultas::all();
        return view('admin.alumni.create', compact('jurusan'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'foto' => 'required|image|mimes:png,jpg,jpeg,svg|max:1024',
            'nama'=>'required',
            'npm'=>'required',
            'alamat'=>'required',
            'kontak'=>'required',
            'email'=>'required',
            'prodi'=>'required',
            'thn_lulus'=>'required',
            // Pekerjaan
            'tempat_kerja'=>'required',
            'alamat_kerja'=>'required',
            'kontak_kerja'=>'required',
            'sesuai_minat'=>'required',
            'info_kerja'=>'required',
            'waktu_kerja'=>'required',
            'alasan'=>'required',
            'penghasilan_pertama'=>'required',
            'penghasilan_rata'=>'required',
            'riwayat_kerja'=>'required',
            'nama_alamat_lembaga'=>'required',
            'kategori_lembaga'=>'required',
            'status'=>'required',
            'pangkat'=>'required',
            'jabaran'=>'required',
            // lainnya
            'saran_prodi'=>'required',
            'saran_himal'=>'required',
            'saran_dosen'=>'required',
            'interaksi_pimpinan'=>'required',
            'layanan_kemahasiswaan'=>'required',
            'info_teman'=>'required',
            'kesiapan_saudara'=>'required',
            'jejaring'=>'required',
            'penyedia_fasilitas'=>'required',
            'catatan_prodi'=>'required',
        ]);

        // Handle image upload
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('alumni/'), $imageName);
            $validatedData['foto'] = $imageName;
        }

        $alumni = Alumni::create($validatedData);

        return redirect()->route('alumni.index')->with('success', 'Alumni created successfully');
    }

    public function destroy(Alumni $alumni)
    {
        $alumni->delete();
        return redirect()->route('alumni.index');
    }
}