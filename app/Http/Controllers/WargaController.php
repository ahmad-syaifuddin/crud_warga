<?php

namespace App\Http\Controllers;

use App\Http\Requests\WargaRequest;
use App\Models\Warga;

class WargaController extends Controller
{
    /**
     * 1. INDEX: Menampilkan Semua data Warga
     */
    public function index()
    {
        $wargas = Warga::latest()->paginate(10);

        return view('warga.index', compact('wargas'));
    }

    /**
     * 2. CREATE: Menampilkan Halaman Form tambah warga
     */
    public function create()
    {
        return view('warga.create');
    }

    /**
     * 3. STORE: Memproses penyimpanan data dari form create ke database
     */
    public function store(WargaRequest $request)
    {
        Warga::create($request->all());

        return redirect()->route('warga.index')->with('success', 'Data Warga berhasil ditambahkan!');
    }

    /**
     * 4. SHOW: Menampilkan detail 1 orang warga (opsional, bisa dikosongkan dulu)
     */
    public function show(Warga $warga)
    {
        //
    }

    /**
     * 5. EDIT: Menampilkan halaman form edit data warga (berdasarkan ID)
     */
    public function edit(Warga $warga)
    {
        return view('warga.edit', compact('warga'));
    }

    /**
     * 6. UPDATE: Memproses perubahan data dari form edit ke database
     */
    public function update(WargaRequest $request, Warga $warga)
    {
        $warga->update($request->all());

        return redirect()->route('warga.index')->with('success', 'Data Warga berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warga $warga)
    {
        $warga->delete();

        return redirect()->route('warga.index')->with('success', 'Data Warga berhasil dihapus!');
    }
}
