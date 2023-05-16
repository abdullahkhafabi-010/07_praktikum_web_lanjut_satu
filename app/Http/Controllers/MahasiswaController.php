<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\Mahasiswa_Matakuliah;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // $user = Auth::user(); // tidak menggunakan login
        //fungsi eloquent menampilkan data menggunakan pagination
        $mahasiswas = Mahasiswa::paginate(5); // Mengambil 5 isi tabel
        // $posts = Mahasiswa::orderBy('Nim', 'desc');
        return view('mahasiswas.index', compact('mahasiswas'));
    }

    public function create()
    {
        $kelas = Kelas::all(); //mendapatkan data dari table kelas
        return view('mahasiswas.create',['kelas' => $kelas]);
    }
    
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Tanggal_Lahir' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            'Email' => 'required',
        ]);
        // fungsi eloquent untuk menambah data
        $mahasiswa= new Mahasiswa;
        $mahasiswa->Nim=$request->get('Nim');
        $mahasiswa->Nama=$request->get('Nama');
        $mahasiswa->Tanggal_Lahir=$request->get('Tanggal_Lahir');
        $mahasiswa->Jurusan=$request->get('Jurusan');
        $mahasiswa->No_Handphone=$request->get('No_Handphone');
        $mahasiswa->Email=$request->get('Email');

        //fungsi eloquent untuk menambah data dengan relasi belongs to
        $kelas = new kelas;
        $kelas->id = $request->get('Kelas');

        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
        ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }
    
    public function show($Nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Mahasiswa = Mahasiswa::find($Nim);
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }
    
    public function edit($Nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mahasiswa = Mahasiswa::find($Nim);
        $kelas = Kelas::all();
        return view('mahasiswas.edit', compact('Mahasiswa', 'kelas'));
    }
    
    public function update(Request $request, $Nim)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Tanggal_Lahir' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            'Email' => 'required',
        ]);
        // fungsi eloquent untuk mengupdate data inputan kita
        $mahasiswa=Mahasiswa::find($Nim);
        $mahasiswa->Nim=$request->get('Nim');
        $mahasiswa->Nama=$request->get('Nama');
        $mahasiswa->Tanggal_Lahir=$request->get('Tanggal_Lahir');
        $mahasiswa->Jurusan=$request->get('Jurusan');
        $mahasiswa->No_Handphone=$request->get('No_Handphone');
        $mahasiswa->Email=$request->get('Email');

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save;

        // jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
        ->with('success', 'Mahasiswa Berhasil Diupdate');
    }
    
    public function destroy( $Nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::find($Nim)->delete();
        return redirect()->route('mahasiswas.index')
        -> with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $mahasiswas = Mahasiswa::where('Nama', 'like', "%" . $keyword. "%")->paginate(5);
        return view('mahasiswas.index', compact('mahasiswas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function khs($Nim)
    {
        //$Mahasiswa = Mahasiswa::find($nim);
        $Mahasiswa = Mahasiswa::find($Nim);
        $Matakuliah = Matakuliah::all();
        //$MataKuliah = $Mahasiswa->MataKuliah()->get();
        $Mahasiswa_Matakuliah = Mahasiswa_Matakuliah::where('mahasiswa_id', '=', $Nim)->get();
        return view('mahasiswas.khs', ['Mahasiswa' => $Mahasiswa], ['MahasiswaMatakuliah' => $Mahasiswa_Matakuliah], compact('Mahasiswa_Matakuliah'));
    }
}
