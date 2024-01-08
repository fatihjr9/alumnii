<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Fakultas;
use App\Models\SessionFormUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumniController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::latest()->get();;
        $user = Auth::user();
        $filled = SessionFormUser::where('user_id', $user->id)->exists();
        return view('mahasiswa.alumni', compact('alumnis', 'filled'));
    }

    public function create()
    {
        $user = Auth::user();
        $filled = SessionFormUser::where('user_id', $user->id)->exists();

        if ($filled) {
            return redirect()->route('mahasiswa.alumni.index')->with('message', 'You have already submitted the alumni form.');
        }

        $jurusan = Fakultas::all();
        return view('mahasiswa.action.CreateAlumni', compact('jurusan'));
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

        $user = Auth::user();
        $alumni = Alumni::create($validatedData);
        SessionFormUser::create(['user_id' => $user->id, 'alumni_id' => $alumni->id]);

        return redirect()->route('mahasiswa.alumni')->with('success', 'Alumni created successfully');
    }
}