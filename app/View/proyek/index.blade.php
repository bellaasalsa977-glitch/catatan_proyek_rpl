```html
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Catatan Proyek RPL') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tombol Tambah Data -->
            <div class="mb-6 flex justify-end">
                <a href="{{ route('proyek.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                    + Tambah Proyek Baru
                </a>
            </div>

            <!-- Notifikasi Sukses -->
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Tabel Data Proyek -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 w-full text-left">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Proyek</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Teknologi</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Mulai</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Selesai</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($proyeks as $proyek)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium">{{ $proyek->nama_proyek }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $proyek->jenis_proyek }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $proyek->teknologi }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $proyek->status_proyek == 'Selesai' ? 'bg-green-100 text-green-800' : ($proyek->status_proyek == 'Sedang Berjalan' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                            {{ $proyek->status_proyek }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($proyek->tanggal_mulai)->format('d M Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $proyek->tanggal_selesai ? \Carbon\Carbon::parse($proyek->tanggal_selesai)->format('d M Y') : '-' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center flex justify-center gap-2">
                                        <a href="{{ route('proyek.edit', $proyek->id) }}" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 px-3 py-1 rounded">Edit</a>
                                        
                                        <form action="{{ route('proyek.destroy', $proyek->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus catatan proyek ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 px-3 py-1 rounded">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-10 whitespace-nowrap text-sm text-gray-500 text-center">
                                        Belum ada catatan proyek. Klik tombol di atas untuk menambah!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>