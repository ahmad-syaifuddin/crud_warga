<div class="mb-4">
    <x-input-label for="nik" value="NIK" />
    <x-text-input id="nik" name="nik" type="text" class="mt-1 block w-full"
        value="{{ old('nik', $warga->nik ?? '') }}" required />
    <x-input-error class="mt-2" :messages="$errors->get('nik')" />
</div>

<div class="mb-4">
    <x-input-label for="nama" value="Nama Lengkap" />
    <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full"
        value="{{ old('nama', $warga->nama ?? '') }}" required />
    <x-input-error class="mt-2" :messages="$errors->get('nama')" />
</div>

<div class="mb-4">
    <x-input-label for="jenis_kelamin" value="Jenis Kelamin" />
    <select id="jenis_kelamin" name="jenis_kelamin" required
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
        <option value="">-- Pilih --</option>
        <option value="Laki-Laki"
            {{ old('jenis_kelamin', $warga->jenis_kelamin ?? '') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
        <option value="Perempuan"
            {{ old('jenis_kelamin', $warga->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>
    <x-input-error class="mt-2" :messages="$errors->get('jenis_kelamin')" />
</div>

<div class="mb-4">
    <x-input-label for="alamat" value="Alamat" />
    <textarea id="alamat" name="alamat" required rows="3"
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">{{ old('alamat', $warga->alamat ?? '') }}</textarea>
    <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
</div>

<div class="mb-6">
    <x-input-label for="no_hp" value="Nomor HP (Opsional)" />
    <x-text-input id="no_hp" name="no_hp" type="text" class="mt-1 block w-full"
        value="{{ old('no_hp', $warga->no_hp ?? '') }}" />
    <x-input-error class="mt-2" :messages="$errors->get('no_hp')" />
</div>
