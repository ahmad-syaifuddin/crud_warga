<?php

namespace App\Http\Controllers;

use App\Http\Requests\WargaRequest;
use App\Models\Warga;
use Illuminate\Support\Facades\File;

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
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            // Buat nama file unik dengan timestamp
            $nama_file = time().'_'.$file->getClientOriginalName();
            // Pindahkan file langsung ke folder public/images/warga_foto
            $file->move(public_path('images/warga_foto'), $nama_file);
            // Simpan path-nya ke database
            $data['foto'] = 'images/warga_foto/'.$nama_file;
        }

        Warga::create($data);

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
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            // Cek dan hapus foto lama di folder public jika ada
            if ($warga->foto && File::exists(public_path($warga->foto))) {
                File::delete(public_path($warga->foto));
            }

            $file = $request->file('foto');
            $nama_file = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/warga_foto'), $nama_file);
            $data['foto'] = 'images/warga_foto/'.$nama_file;
        }

        $warga->update($data);

        return redirect()->route('warga.index')->with('success', 'Data Warga berhasil diupdate!');
    }

    public function destroy(Warga $warga)
    {
        // Hapus file fisik foto di folder public
        if ($warga->foto && File::exists(public_path($warga->foto))) {
            File::delete(public_path($warga->foto));
        }

        $warga->delete();

        return redirect()->route('warga.index')->with('success', 'Data Warga berhasil dihapus!');
    }
}
