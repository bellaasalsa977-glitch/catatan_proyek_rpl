<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyekController extends Controller
{
    // 1. Menampilkan semua catatan proyek milik siswa yang sedang login
    public function index()
    {
        $proyeks = Proyek::where('user_id', Auth::id())->get();
        return view('proyek.index', compact('proyeks'));
    }

    // 2. Menampilkan form tambah proyek baru
    public function create()
    {
        return view('proyek.create');
    }

    // 3. Menyimpan data proyek baru dari form ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'jenis_proyek' => 'required|string',
            'teknologi' => 'required|string',
            'deskripsi' => 'nullable|string',
            'status_proyek' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
        ]);

        Proyek::create([
            'user_id' => Auth::id(), // Otomatis mengambil ID siswa yang login
            'nama_proyek' => $request->nama_proyek,
            'jenis_proyek' => $request->jenis_proyek,
            'teknologi' => $request->teknologi,
            'deskripsi' => $request->deskripsi,
            'status_proyek' => $request->status_proyek,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()->route('proyek.index')->with('success', 'Catatan proyek berhasil ditambahkan!');
    }

    // 4. Menampilkan form edit proyek
    public function edit(Proyek $proyek)
    {
        // Memastikan siswa hanya bisa mengedit proyek miliknya sendiri
        if ($proyek->user_id !== Auth::id()) {
            abort(403);
        }
        return view('proyek.edit', compact('proyek'));
    }

    // 5. Menyimpan perubahan data proyek yang di-edit
    public function update(Request $request, Proyek $proyek)
    {
        if ($proyek->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'jenis_proyek' => 'required|string',
            'teknologi' => 'required|string',
            'deskripsi' => 'nullable|string',
            'status_proyek' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
        ]);

        $proyek->update($request->all());

        return redirect()->route('proyek.index')->with('success', 'Catatan proyek berhasil diperbarui!');
    }

    // 6. Menghapus catatan proyek
    public function destroy(Proyek $proyek)
    {
        if ($proyek->user_id !== Auth::id()) {
            abort(403);
        }

        $proyek->delete();

        return redirect()->route('proyek.index')->with('success', 'Catatan proyek berhasil dihapus!');
    }
}