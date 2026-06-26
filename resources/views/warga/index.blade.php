<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Warga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-300 px-4 py-3 rounded relative"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="mb-4">
                        <a href="{{ route('warga.create') }}"
                            class="bg-red-900 hover:bg-red-950 dark:bg-red-900 dark:hover:bg-red-950 text-white font-bold py-2 px-4 rounded transition">
                            + Tambah Warga
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                        @forelse ($wargas as $warga)
                            <div
                                class="bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-lg transition duration-300">
                                <div class="p-5 border-b border-gray-100 dark:border-gray-700 flex items-center gap-4">
                                    @if ($warga->foto)
                                        <img src="{{ asset($warga->foto) }}" alt="{{ $warga->nama }}"
                                            class="w-16 h-16 rounded-full object-cover border-2 border-indigo-500">
                                    @else
                                        <div
                                            class="w-16 h-16 rounded-full bg-indigo-100 dark:bg-indigo-900 text-indigo-500 dark:text-indigo-300 flex items-center justify-center text-2xl border-2 border-indigo-500">
                                            <i class="fa-solid fa-user-tie"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $warga->nama }}
                                        </h3>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1">
                                            <i class="fa-solid fa-id-card text-xs"></i> {{ $warga->nik }}
                                        </p>
                                    </div>
                                </div>

                                <div class="p-5 space-y-3">
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                        <div class="w-6 text-center text-indigo-400 mr-2"><i
                                                class="fa-solid fa-venus-mars"></i></div>
                                        {{ $warga->jenis_kelamin }}
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                        <div class="w-6 text-center text-green-400 mr-2">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </div>

                                        @if ($warga->no_hp)
                                            {{ $warga->no_hp }}
                                        @else
                                            <span class="italic text-gray-400 dark:text-gray-500">
                                                Nomor WhatsApp belum ada
                                            </span>
                                        @endif
                                    </div>
                                    <div class="flex text-sm text-gray-600 dark:text-gray-300">
                                        <div class="w-6 text-center text-red-400 mr-2 mt-1"><i
                                                class="fa-solid fa-map-location-dot"></i></div>
                                        <span class="flex-1">{{ $warga->alamat }}</span>
                                    </div>
                                </div>

                                <div
                                    class="bg-gray-50 dark:bg-gray-900 p-4 flex justify-between items-center border-t border-gray-100 dark:border-gray-700">
                                    <a href="{{ route('warga.edit', $warga->id) }}"
                                        class="text-yellow-600 hover:text-yellow-700 dark:text-yellow-400 dark:hover:text-yellow-300 font-medium text-sm flex items-center gap-1">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>

                                    <form action="{{ route('warga.destroy', $warga->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus warga ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 font-medium text-sm flex items-center gap-1">
                                            <i class="fa-solid fa-trash-can"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div
                                class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12 bg-white dark:bg-gray-800 rounded-xl shadow border border-gray-100 dark:border-gray-700">
                                <i class="fa-solid fa-folder-open text-6xl text-gray-300 dark:text-gray-600 mb-4"></i>
                                <p class="text-gray-500 dark:text-gray-400 text-lg">Belum ada data warga yang terdaftar.
                                </p>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-4">
                        {{ $wargas->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
