<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Laporan Catatan Proyek') }}
            </h2>
            <!-- Tombol Pemicu window.print() -->
            <button onclick="window.print()" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md shadow transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                Cetak Laporan (Print)
            </button>
        </div>
    </x-slot>

    <!-- Area yang akan Dicetak -->
    <div class="py-12" id="print-area">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-sm sm:rounded-lg border border-gray-100">
                
                <!-- Kop / Header Laporan -->
                <div class="text-center border-b-2 border-gray-800 pb-6 mb-6">
                    <h1 class="text-2xl font-bold text-gray-900 uppercase tracking-wide">Sistem Catatan Proyek Siswa RPL</h1>
                    <p class="text-sm text-gray-600 mt-1">Uji Kompetensi Keahlian / Web Technology Kabupaten Subang</p>
                </div>

                <!-- Informasi Identitas Siswa -->
                <div class="grid grid-cols-2 gap-4 text-sm mb-6 bg-gray-50 p-4 rounded-md">
                    <div>
                        <p class="text-gray-500">Nama Siswa:</p>
                        <p class="font-bold text-gray-800 text-base">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-gray-500">Tanggal Cetak:</p>
                        <p class="font-bold text-gray-800 text-base">{{ date('d F Y') }}</p>
                    </div>
                </div>

                <!-- Tabel Data Laporan -->
                <table class="w-full border-collapse border border-gray-300 text-sm text-left">
                    <thead class="bg-gray-100 text-gray-800 uppercase text-xs font-bold">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2.5">Nama Proyek</th>
                            <th class="border border-gray-300 px-4 py-2.5">Jenis Proyek</th>
                            <th class="border border-gray-300 px-4 py-2.5">Teknologi</th>
                            <th class="border border-gray-300 px-4 py-2.5">Status</th>
                            <th class="border border-gray-300 px-4 py-2.5">Tanggal Mulai</th>
                            <th class="border border-gray-300 px-4 py-2.5">Tanggal Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($proyeks as $p)
                            <tr class="text-gray-700">
                                <td class="border border-gray-300 px-4 py-3 font-medium">{{ $p->nama_proyek }}</td>
                                <td class="border border-gray-300 px-4 py-3">{{ $p->jenis_proyek }}</td>
                                <td class="border border-gray-300 px-4 py-3">{{ $p->teknologi }}</td>
                                <td class="border border-gray-300 px-4 py-3 font-semibold">{{ $p->status_proyek }}</td>
                                <td class="border border-gray-300 px-4 py-3">{{ \Carbon\Carbon::parse($p->tanggal_mulai)->format('d M Y') }}</td>
                                <td class="border border-gray-300 px-4 py-3">{{ $p->tanggal_selesai ? \Carbon\Carbon::parse($p->tanggal_selesai)->format('d M Y') : '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="border border-gray-300 px-4 py-6 text-center text-gray-400 italic">Belum ada riwayat catatan proyek yang diinput.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Tanda Tangan Pembimbing -->
                <div class="mt-12 flex justify-end">
                    <div class="text-center w-48 text-sm">
                        <p class="text-gray-600">Mengetahui,</p>
                        <p class="text-gray-600 mb-16">Guru Pembimbing RPL</p>
                        <div class="border-b border-gray-800 w-full"></div>
                        <p class="text-gray-400 text-xs mt-1">NIP. .........................</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Trik CSS Tambahan: Menyembunyikan Navbar & Tombol saat Kertas Di-print -->
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #print-area, #print-area * {
                visibility: visible;
            }
            #print-area {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
        }
    </style>
</x-app-layout>