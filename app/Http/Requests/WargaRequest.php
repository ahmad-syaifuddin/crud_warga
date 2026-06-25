<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WargaRequest extends FormRequest
{
    /**
     * Tentukan apakah user diizinkan membuat request ini.
     */
    public function authorize(): bool
    {
        return true; // WAJIB DIUBAH JADI TRUE
    }

    /**
     * Dapatkan aturan validasi.
     */
    public function rules(): array
    {
        // Tangkap ID dari route saat proses Update. Jika proses Create, nilainya null.
        // Tanda ?-> adalah fitur PHP 8 (Nullsafe operator)
        $wargaId = $this->route('warga')?->id;

        return [
            // Gunakan $wargaId agar pengecualian NIK otomatis berjalan saat update
            'nik' => 'required|numeric|digits:16|unique:wargas,nik,'.$wargaId,
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'alamat' => 'required|string',
            'no_hp' => 'nullable|numeric',
        ];
    }
}
