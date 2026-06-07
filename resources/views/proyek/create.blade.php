<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Catatan Proyek Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-6 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700">Formulir Tugas Proyek</h3>
                        <p class="text-sm text-gray-500">Isi detail proyek software engineering yang sedang kamu kerjakan.</p>
                    </div>
                    <a href="/proyek" class="text-sm text-gray-600 hover:text-gray-900 bg-gray-100 px-3 py-1.5 rounded-md transition">Kembali</a>
                </div>

                <form action="/proyek" method="POST" class="space-y-4">
                    @csrf

                    <!-- Nama Proyek -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Proyek</label>
                        <input type="text" name="nama_proyek" required placeholder="Contoh: Aplikasi Hotel, Web Tiket" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Jenis Proyek -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Proyek</label>
                            <select name="jenis_proyek" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="Web Application">Web Application</option>
                                <option value="Desktop Application">Desktop Application</option>
                                <option value="Mobile Application">Mobile Application</option>
                                <option value="Design UI/UX">Design UI/UX (Figma)</option>
                            </select>
                        </div>

                        <!-- Teknologi -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Teknologi / Stack</label>
                            <input type="text" name="teknologi" required placeholder="Contoh: Laravel, C#, PHP, MySQL" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Proyek (Opsional)</label>
                        <textarea name="deskripsi" rows="3" placeholder="Tulis catatan singkat mengenai progress atau detail proyek..." class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>

                    <!-- Status Proyek -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status Pengerjaan</label>
                        <select name="status_proyek" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="Sedang Dikerjakan">Sedang Dikerjakan (Proses)</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Pending">Pending</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Tanggal Mulai -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Tanggal Selesai -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai (Opsional)</label>
                            <input type="date" name="tanggal_selesai" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="pt-4 flex justify-end">
                        <button type="submit" class="w-full md:w-auto px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-md shadow transition duration-150">
                            Simpan Catatan Proyek
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>