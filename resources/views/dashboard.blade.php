<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Ringkasan Proyek') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Selamat Datang Card -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 overflow-hidden shadow-sm sm:rounded-lg text-white p-6">
                <h3 class="text-2xl font-bold">Selamat Datang, {{ Auth::user()->name }}! 👋</h3>
                <p class="text-blue-100 mt-1 text-sm">Berikut adalah ringkasan progres pengerjaan sistem catatan proyek software engineering kamu.</p>
            </div>

            <!-- Grid Ringkasan Data (Langkah 7) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Total Proyek -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase">Total Proyek</p>
                        <p class="text-3xl font-bold text-gray-800 mt-1">{{ $total_proyek }}</p>
                    </div>
                    <div class="p-3 rounded-full bg-blue-50 text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2"></path></svg>
                    </div>
                </div>

                <!-- Perencanaan -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase">Perencanaan (Pending)</p>
                        <p class="text-3xl font-bold text-gray-800 mt-1">{{ $perencanaan }}</p>
                    </div>
                    <div class="p-3 rounded-full bg-gray-100 text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>

                <!-- Proses / Revisi -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase">Proses / Revisi</p>
                        <p class="text-3xl font-bold text-gray-800 mt-1">{{ $proses }}</p>
                    </div>
                    <div class="p-3 rounded-full bg-yellow-50 text-yellow-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </div>
                </div>

                <!-- Selesai -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase">Selesai</p>
                        <p class="text-3xl font-bold text-gray-800 mt-1">{{ $selesai }}</p>
                    </div>
                    <div class="p-3 rounded-full bg-green-50 text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                </div>
            </div>

            <!-- 5 Data Proyek Terbaru (Langkah 7) -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h4 class="text-md font-bold text-gray-700 mb-4">⏱️ 5 Aktivitas Proyek Terbaru</h4>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                        <thead class="bg-gray-50 text-gray-600 text-xs font-semibold uppercase">
                            <tr>
                                <th class="px-6 py-3">Nama Proyek</th>
                                <th class="px-6 py-3">Jenis Proyek</th>
                                <th class="px-6 py-3">Teknologi</th>
                                <th class="px-6 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse($proyek_terbaru as $pt)
                                <tr>
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $pt->nama_proyek }}</td>
                                    <td class="px-6 py-4 text-gray-500">{{ $pt->jenis_proyek }}</td>
                                    <td class="px-6 py-4 text-gray-500"><span class="px-2 py-0.5 text-xs bg-purple-50 text-purple-700 rounded-md">{{ $pt->teknologi }}</span></td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-0.5 rounded-full text-xs font-medium {{ $pt->status_proyek == 'Selesai' ? 'bg-green-100 text-green-800' : ($pt->status_proyek == 'Sedang Dikerjakan' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ $pt->status_proyek }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-400">Belum ada data proyek terbaru.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>