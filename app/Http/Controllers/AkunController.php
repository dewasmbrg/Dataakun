<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Role;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $katakunci = $request->katakunci;
    $jumlahbaris = 5;

    if (strlen($katakunci)) {
        $data = Akun::where('kode_akun', 'like', "%$katakunci%")
            ->orWhere('nama_akun', 'like', "%$katakunci%")
            ->orWhere('deskripsi', 'like', "%$katakunci%")
            ->orWhere('tipe_akun', 'like', "%$katakunci%")
            ->orWhere('kategori_akun', 'like', "%$katakunci%")
            ->orWhere('level_akun', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
    } else {
        $data = Akun::with('role')->orderBy('kode_akun', 'asc')->paginate($jumlahbaris);
    }

        return view('akun.index', compact('data', 'katakunci'));
}

    public function cetak()
    {
        $cetak = Akun::with('role')->orderBy('kode_akun', 'asc')->get();
        return view('akun/cetak')->with('cetak', $cetak);
    }
    
    public function create()
    {
        $wil = Role::all();
        return view('akun.create', compact('wil'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_akun' => 'required|numeric|unique:akun',
            'nama_akun' => 'required',
            'deskripsi' => 'required',
            'tipe_akun' => 'required',
            'kategori_akun' => 'required',
            'level_akun' => 'required',
            'created_at' => 'required|date_format:Y-m-d H:i:s',
        ], [
            'kode_akun.required' => 'Kode Akun Wajib Diisi',
            'kode_akun.numeric' => 'Kode Akun Wajib Diisi Dalam Format Angka',
            'kode_akun.unique' => 'Kode Akun Sudah Pernah Digunakan, Silahkan Pilih Kode Yang Lain',
            'nama_akun.required' => 'Nama Akun Wajib Diisi',
            'deskripsi.required' => 'Deskripsi Wajib Diisi',
            'tipe_akun.required' => 'Tipe Akun Wajib Diisi',
            'kategori_akun.required' => 'Kategori Akun Wajib Diisi',
            'level_akun.required' => 'Nomor Induk Wajib Diisi',
        ]);

        $data = $request->only(['kode_akun', 'nama_akun', 'deskripsi', 'tipe_akun', 'kategori_akun', 'level_akun', 'created_at']);
        
        Akun::create($data);
        return redirect('akun')->with('success', 'Berhasil Memasukkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Akun::where('kode_akun', $id)->firstOrFail();
        return view('akun.show', compact('data'));

        if (!$data) {
            return redirect('/Akun')->with('eror', 'Data tidak ditemukan.');
        }

        $wil = role::find($data->kode_level);
        return view('akun/detail', compact('wil', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data akun berdasarkan ID beserta relasi dengan role
        $data = Akun::with('role')->findOrFail($id);

        // Ambil semua level kecuali level yang sedang digunakan oleh akun
        $wil = Role::where('kode_level', '!=', $data->role->kode_level)->get();

        return view('akun.edit', compact('wil', 'data'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_akun' => 'required',
            'deskripsi' => 'required',
            'tipe_akun' => 'required',
            'kategori_akun' => 'required',
            'level_akun' => 'required',
            'created_at' => 'required|date_format:Y-m-d H:i:s',
        ], [
            'kode_akun.numeric' => 'Kode Akun Wajib Diisi Dalam Format Angka ',
            'nama_akun.required' => 'Nama Akun Wajib Diisi',
            'deskripsi.required' => 'Deskripsi Wajib Diisi',
            'tipe_akun.required' => 'Tipe Akun Wajib Diisi',
            'kategori_akun.required' => 'Kategori Akun Wajib Diisi',
            'level_akun.required' => 'Nomor Induk Wajib Diisi',
        ]);

        $data = $request->only(['nama_akun', 'deskripsi', 'tipe_akun', 'kategori_akun', 'level_akun']);
        
        Akun::where('kode_akun', $id)->update($data);
        return redirect('/akun')->with('success', 'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Akun::where('kode_akun', $id)->delete();
        return redirect('/akun')->with('success', 'Berhasil Hapus Data');
    }
}
