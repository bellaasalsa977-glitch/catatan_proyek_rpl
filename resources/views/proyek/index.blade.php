<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Catatan Proyek RPL') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Pesan Sukses Alert -->
            @if(session('success'))
                <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg border border-green-200" role="alert">
                    <span class="font-medium">Sukses!</span> {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Header Atas Tabel -->
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700">Daftar Proyek Kamu</h3>
                        <p class="text-sm text-gray-500">Kelola semua riwayat pengerjaan proyek software engineering di sini.</p>
                    </div>
                    <!-- Tombol Tambah Proyek -->
                    <a href="/proyek/create" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow-sm transition duration-150 ease-in-out">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Proyek Baru
                    </a>
                </div>

                <!-- Tabel Data Proyek -->
                <div class="overflow-x-auto border border-gray-200 sm:rounded-lg shadow-sm">
                    <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                        <thead class="bg-gray-50 text-gray-700 uppercase text-xs font-semibold tracking-wider">
                            <tr>
                                <th class="px-6 py-3">Nama Proyek</th>
                                <th class="px-6 py-3">Jenis Proyek</th>
                                <th class="px-6 py-3">Teknologi</th>
                                <th class="px-6 py-3">Status</th>
                                <th class="px-6 py-3">Tanggal Mulai</th>
                                <th class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse($proyeks as $p)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $p->nama_proyek }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $p->jenis_proyek }}</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                            {{ $p->teknologi }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($p->status_proyek == 'Selesai')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Selesai</span>
                                        @elseif($p->status_proyek == 'Sedang Dikerjakan')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Proses</span>
                                        * @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Pending</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-gray-500">{{ \Carbon\Carbon::parse($p->tanggal_mulai)->format('d M Y') }}</td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium space-x-2">
                                        <!-- Tombol Edit -->
                                        <a href="/proyek/{{ $p->id }}/edit" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1.5 rounded-md transition">Edit</a>
                                        
                                        <!-- Tombol Hapus -->
                                        <form action="/proyek/{{ $p->id }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin mau menghapus proyek ini, Salsa?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-md transition">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <!-- Tampilan Jika Tabel Masih Kosong -->
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                        <svg class="mx-auto h-12 w-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                        </svg>
                                        <span class="font-medium text-base text-gray-600">Belum ada catatan proyek.</span>
                                        <p class="text-sm text-gray-400 mt-1">Klik tombol "Tambah Proyek Baru" di atas untuk mengisi tugas pertamamu!</p>
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