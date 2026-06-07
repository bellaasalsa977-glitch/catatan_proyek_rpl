<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
       $user_id = auth()->id();
       
       $total_proyek = \App\Models\Proyek::where('user_id', $user_id)->count();
       $perencanaan = \App\Models\Proyek::where('user_id', $user_id)->where('status_proyek', 'Pending')->count();
       $proses = \App\Models\Proyek::where('user_id', $user_id)->where('status_proyek', 'Sedang Dikerjakan')->count();
       $selesai = \App\Models\Proyek::where('user_id', $user_id)->where('status_proyek', 'Selesai')->count();
       
       // Ambil 5 data proyek terbaru milik siswa login
       $proyek_terbaru = \App\Models\Proyek::where('user_id', $user_id)->latest()->take(5)->get();

       return view('dashboard', compact('total_proyek', 'perencanaan', 'proses', 'selesai', 'proyek_terbaru'));
   })->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
use App\Http\Controllers\ProyekController;

// Jalur CRUD Proyek yang hanya bisa diakses kalau siswa sudah login
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('proyek', ProyekController::class);
});
Route::get('/laporan', function () {
    $user_id = auth()->id();
    // Ambil semua proyek milik siswa yang sedang login
    $proyeks = \App\Models\Proyek::where('user_id', $user_id)->get();

    return view('proyek.laporan', compact('proyeks'));
})->middleware(['auth', 'verified'])->name('laporan.index');