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

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700 text-left">
                                    <th class="py-2 px-4 border-b dark:border-gray-600">No</th>
                                    <th class="py-2 px-4 border-b dark:border-gray-600">NIK</th>
                                    <th class="py-2 px-4 border-b dark:border-gray-600">Nama</th>
                                    <th class="py-2 px-4 border-b dark:border-gray-600">Jenis Kelamin</th>
                                    <th class="py-2 px-4 border-b dark:border-gray-600">No HP</th>
                                    <th class="py-2 px-4 border-b dark:border-gray-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($wargas as $warga)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td class="py-2 px-4 border-b dark:border-gray-700">
                                            {{ $loop->iteration + ($wargas->currentPage() - 1) * $wargas->perPage() }}
                                        </td>
                                        <td class="py-2 px-4 border-b dark:border-gray-700">{{ $warga->nik }}</td>
                                        <td class="py-2 px-4 border-b dark:border-gray-700">{{ $warga->nama }}</td>
                                        <td class="py-2 px-4 border-b dark:border-gray-700">{{ $warga->jenis_kelamin }}
                                        </td>
                                        <td class="py-2 px-4 border-b dark:border-gray-700">{{ $warga->no_hp ?? '-' }}
                                        </td>
                                        <td class="py-2 px-4 border-b dark:border-gray-700">
                                            <a href="{{ route('warga.edit', $warga->id) }}"
                                                class="text-yellow-500 hover:text-yellow-700 dark:text-yellow-400 dark:hover:text-yellow-300 mr-2">Edit</a>

                                            <form action="{{ route('warga.destroy', $warga->id) }}" method="POST"
                                                class="inline-block"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-4 text-center text-gray-500 dark:text-gray-400">
                                            Belum ada data warga.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $wargas->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
