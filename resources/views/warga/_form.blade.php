<div class="mb-5">
    <x-input-label for="nik" value="Nomor Induk Kependudukan (NIK)" class="font-bold mb-1" />
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fa-solid fa-id-badge text-gray-400 dark:text-gray-500"></i>
        </div>

        <input id="nik" name="nik" type="text" maxlength="16" required
            class="pl-10 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm transition duration-200"
            value="{{ old('nik', $warga->nik ?? '') }}"
            oninput="this.value = this.value.replace(/[^0-9]/g, ''); document.getElementById('nik-counter').innerText = this.value.length;" />
    </div>

    <div class="flex justify-between items-start mt-1">
        <x-input-error :messages="$errors->get('nik')" class="mt-0" />
        <span class="text-xs text-gray-500 dark:text-gray-400 ml-auto font-medium">
            <span id="nik-counter">{{ strlen(old('nik', $warga->nik ?? '')) }}</span>/16 Karakter
        </span>
    </div>
</div>

<div class="mb-5">
    <x-input-label for="nama" value="Nama Lengkap" class="font-bold mb-1" />
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fa-solid fa-user text-gray-400 dark:text-gray-500"></i>
        </div>
        <input id="nama" name="nama" type="text" required
            class="pl-10 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm transition duration-200"
            value="{{ old('nama', $warga->nama ?? '') }}" />
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('nama')" />
</div>

<div class="mb-5">
    <x-input-label for="jenis_kelamin" value="Jenis Kelamin" class="font-bold mb-1" />
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fa-solid fa-venus-mars text-gray-400 dark:text-gray-500"></i>
        </div>
        <select id="jenis_kelamin" name="jenis_kelamin" required
            class="pl-10 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm transition duration-200">
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-Laki"
                {{ old('jenis_kelamin', $warga->jenis_kelamin ?? '') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki
            </option>
            <option value="Perempuan"
                {{ old('jenis_kelamin', $warga->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan
            </option>
        </select>
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('jenis_kelamin')" />
</div>

<div class="mb-5">
    <x-input-label for="alamat" value="Alamat Lengkap" class="font-bold mb-1" />
    <div class="relative">
        <div class="absolute top-3 left-3 flex items-start pointer-events-none">
            <i class="fa-solid fa-map-location-dot text-gray-400 dark:text-gray-500"></i>
        </div>
        <textarea id="alamat" name="alamat" required rows="3"
            class="pl-10 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm transition duration-200">{{ old('alamat', $warga->alamat ?? '') }}</textarea>
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
</div>

<div class="mb-5">
    <x-input-label for="no_hp" value="Nomor WhatsApp (Opsional)" class="font-bold mb-1" />
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fa-brands fa-whatsapp text-gray-400 dark:text-gray-500"></i>
        </div>
        <input id="no_hp" name="no_hp" type="text"
            class="pl-10 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm transition duration-200"
            value="{{ old('no_hp', $warga->no_hp ?? '') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '');" />
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('no_hp')" />
</div>

<div class="mb-8 p-4 bg-gray-50 dark:bg-gray-800/50 border border-gray-200 dark:border-gray-700 rounded-lg">
    <x-input-label for="foto" value="Foto Warga (Opsional)"
        class="font-bold mb-3 block text-gray-700 dark:text-gray-300" />
    <div class="flex items-center gap-5">
        @if (isset($warga) && $warga->foto)
            <img src="{{ asset($warga->foto) }}" alt="Foto Warga"
                class="w-16 h-16 rounded-full object-cover border-2 border-indigo-500 shadow-sm">
        @else
            <div
                class="w-16 h-16 rounded-full bg-white dark:bg-gray-700 flex items-center justify-center text-gray-400 border-2 border-dashed border-gray-300 dark:border-gray-600 shadow-sm">
                <i class="fa-solid fa-camera text-xl"></i>
            </div>
        @endif

        <div class="flex-1">
            <input type="file" id="foto" name="foto" accept="image/*"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-400 focus:outline-none dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-l-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-gray-700 dark:file:text-gray-300 transition duration-200">
            <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400"><i
                    class="fa-solid fa-circle-info mr-1"></i>Format: PNG, JPG, JPEG, GIF, WEBP (Maksimal 2MB).</p>
        </div>
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('foto')" />
</div>
