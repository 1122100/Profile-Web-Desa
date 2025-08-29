<?php
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\PertanianController;
use App\Http\Controllers\PeternakanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UMKMController;
use Illuminate\Support\Facades\Route;







/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Halaman publik
Route::view('/', 'users.home')->name('home');
Route::view('/desa', 'users.desa')->name('desa');
Route::view('/informasi', 'users.informasi')->name('informasi');
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak.index');
Route::post('/kontak', [ContactController::class, 'send'])->name('kontak.store');
// Halaman admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    Route::resource('desa', DesaController::class);
    Route::resource('dusun', DusunController::class);
    Route::resource('pertanian', PertanianController::class);
    Route::resource('peternakan', PeternakanController::class);
    Route::resource('lembaga', LembagaController::class);
    Route::resource('umkm', UMKMController::class);
});
// Add this line to your routes file
Route::get('/dusun', [App\Http\Controllers\DusunController::class, 'index'])->name('dusun');
// Kontak routes
Route::middleware(['auth','verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/kontak', [ContactController::class, 'adminIndex'])->name('kontak.index');
    Route::get('/kontak/{id}', [ContactController::class, 'show'])->name('kontak.show');
    Route::patch('/kontak/{id}/mark-as-read', [ContactController::class, 'markAsRead'])->name('kontak.mark-as-read');
    Route::delete('/kontak/{id}', [ContactController::class, 'destroy'])->name('kontak.destroy');
});
// Public routes for news
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
// Admin routes for news management
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/berita', [BeritaController::class, 'adminIndex'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{beritum}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{beritum}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{beritum}', [BeritaController::class, 'destroy'])->name('berita.destroy');
});
// Sitemap
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index']);
require __DIR__.'/auth.php';

