<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Catatan Proyek') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-6 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700">Formulir Perubahan Proyek</h3>
                        <p class="text-sm text-gray-500">Perbarui informasi detail mengenai progress proyek kamu.</p>
                    </div>
                    <a href="/proyek" class="text-sm text-gray-600 hover:text-gray-900 bg-gray-100 px-3 py-1.5 rounded-md transition">Batal</a>
                </div>

                <form action="/proyek/{{ $proyek->id }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Proyek</label>
                        <input type="text" name="nama_proyek" value="{{ $proyek->nama_proyek }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Proyek</label>
                            <select name="jenis_proyek" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="Web Application" {{ $proyek->jenis_proyek == 'Web Application' ? 'selected' : '' }}>Web Application</option>
                                <option value="Desktop Application" {{ $proyek->jenis_proyek == 'Desktop Application' ? 'selected' : '' }}>Desktop Application</option>
                                <option value="Mobile Application" {{ $proyek->jenis_proyek == 'Mobile Application' ? 'selected' : '' }}>Mobile Application</option>
                                <option value="Design UI/UX" {{ $proyek->jenis_proyek == 'Design UI/UX' ? 'selected' : '' }}>Design UI/UX (Figma)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Teknologi / Stack</label>
                            <input type="text" name="teknologi" value="{{ $proyek->teknologi }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Proyek (Opsional)</label>
                        <textarea name="deskripsi" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ $proyek->deskripsi }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status Pengerjaan</label>
                        <select name="status_proyek" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="Sedang Dikerjakan" {{ $proyek->status_proyek == 'Sedang Dikerjakan' ? 'selected' : '' }}>Sedang Dikerjakan (Proses)</option>
                            <option value="Selesai" {{ $proyek->status_proyek == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="Pending" {{ $proyek->status_proyek == 'Pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" value="{{ $proyek->tanggal_mulai }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai (Opsional)</label>
                            <input type="date" name="tanggal_selesai" value="{{ $proyek->tanggal_selesai }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="pt-4 flex justify-end">
                        <button type="submit" class="w-full md:w-auto px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-md shadow transition duration-150">
                            Perbarui Catatan Proyek
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>