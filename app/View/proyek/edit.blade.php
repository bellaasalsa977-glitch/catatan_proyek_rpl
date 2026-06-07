<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Catatan Proyek') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('proyek.update', $proyek->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nama_proyek" class="block text-sm font-medium text-gray-700">Nama Proyek</label>
                            <input type="text" name="nama_proyek" id="nama_proyek" value="{{ old('nama_proyek', $proyek->nama_proyek) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('nama_proyek') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="jenis_proyek" class="block text-sm font-medium text-gray-700">Jenis Proyek</label>
                                <select name="jenis_proyek" id="jenis_proyek" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="Web Application" {{ $proyek->jenis_proyek == 'Web Application' ? 'selected' : '' }}>Web Application</option>
                                    <option value="Desktop Application" {{ $proyek->jenis_proyek == 'Desktop Application' ? 'selected' : '' }}>Desktop Application</option>
                                    <option value="Mobile Application" {{ $proyek->jenis_proyek == 'Mobile Application' ? 'selected' : '' }}>Mobile Application</option>
                                </select>
                                @error('jenis_proyek') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="teknologi" class="block text-sm font-medium text-gray-700">Teknologi</label>
                                <input type="text" name="teknologi" id="teknologi" value="{{ old('teknologi', $proyek->teknologi) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                @error('teknologi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi / Progress Proyek</label>
                            <textarea name="deskripsi" id="deskripsi" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('deskripsi', $proyek->deskripsi) }}</textarea>
                            @error('deskripsi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                            <div>
                                <label for="status_proyek" class="block text-sm font-medium text-gray-700">Status Proyek</label>
                                <select name="status_proyek" id="status_proyek" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="Baru Mulai" {{ $proyek->status_proyek == 'Baru Mulai' ? 'selected' : '' }}>Baru Mulai</option>
                                    <option value="Sedang Berjalan" {{ $proyek->status_proyek == 'Sedang Berjalan' ? 'selected' : '' }}>Sedang Berjalan</option>
                                    <option value="Selesai" {{ $proyek->status_proyek == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                                @error('status_proyek') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ old('tanggal_mulai', $proyek->tanggal_mulai) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                @error('tanggal_mulai') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai (Opsional)</label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai" value="{{ old('tanggal_selesai', $proyek->tanggal_selesai) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                @error('tanggal_selesai') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="flex justify-end gap-2">
                            <a href="{{ route('proyek.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">
                                Batal
                            </a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Perbarui Catatan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>