<?php


// use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AlumniAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.register');
});

Route::get('dashboard', 'App\Http\Controllers\HomeController@index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    
    Route::group(['middleware' => 'role:0', 'prefix' => 'admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // agenda
        Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
        Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create');
        Route::post('/agenda/create', [AgendaController::class, 'store'])->name('agenda.store');
        // berita
        Route::get('/berita', [\App\Http\Controllers\BeritaController::class, 'index'])->name('berita.index');
        Route::get('/berita/create', [\App\Http\Controllers\BeritaController::class, 'create'])->name('berita.create');
        Route::post('/berita/create', [\App\Http\Controllers\BeritaController::class, 'store'])->name('berita.store');
        Route::delete('/berita/{id}', [\App\Http\Controllers\BeritaController::class, 'destroy'])->name('berita.destroy');
        // dosen
        Route::get('/dosen', [\App\Http\Controllers\DosenController::class, 'index'])->name('dosen.index');
        Route::get('/dosen/create', [\App\Http\Controllers\DosenController::class, 'create'])->name('dosen.create');
        Route::post('/dosen/create', [\App\Http\Controllers\DosenController::class, 'store'])->name('dosen.store');
        // alumni
        Route::get('/alumni', [\App\Http\Controllers\AlumniAdminController::class, 'index'])->name('alumni.index');
        Route::get('/alumni-template/{id}', [\App\Http\Controllers\AlumniAdminController::class, 'show'])->name('alumni.template');
        Route::get('/alumni/create', [\App\Http\Controllers\AlumniAdminController::class, 'create'])->name('alumni.create');
        Route::post('/alumni/create', [\App\Http\Controllers\AlumniAdminController::class, 'store'])->name('alumni.store');
        Route::delete('/alumni/{alumni}',[\App\Http\Controllers\AlumniAdminController::class, 'destroy'])->name('alumni.destroy');
        // lainnya
        Route::get('/lainnya', [\App\Http\Controllers\OtherController::class, 'index'])->name('lainnya.index');
        // lainnya -> Fakultas
        Route::get('/lainnya/tambah-fakultas', [\App\Http\Controllers\OtherController::class, 'createFakultas'])->name('lainnya.tambah-fakultas');
        Route::post('/lainnya/tambah-fakultas', [\App\Http\Controllers\OtherController::class, 'storeFakultas'])->name('lainnya.tambah-fakultas');
        // lainnya -> Collection
        Route::get('/lainnya/tambah-galeri', [\App\Http\Controllers\OtherController::class, 'createGaleri'])->name('lainnya.tambah-galeri.create');
        Route::post('/lainnya/tambah-galeri', [\App\Http\Controllers\OtherController::class, 'storeGaleri'])->name('lainnya.tambah-galeri.store');
        Route::delete('/lainnya/galeri/{id}', [\App\Http\Controllers\OtherController::class, 'deleteGaleri'])->name('lainnya.galeri.delete');
        // lainnya -> Kontak
        Route::get('/lainnya/tambah-kontak', [\App\Http\Controllers\OtherController::class, 'createKontak'])->name('lainnya.tambah-kontak.create');
        Route::post('/lainnya/tambah-kontak', [\App\Http\Controllers\OtherController::class, 'storeKontak'])->name('lainnya.tambah-kontak.store');
        // lainnya -> Pertanyaan
    });
    
    Route::group(['middleware' => 'role:1', 'prefix' => 'mahasiswa'], function () {
        Route::get('/dashboard', [MahasiswaController::class, 'index'])->name('mahasiswa.dashboard');
        Route::get('/berita', [MahasiswaController::class, 'indexBerita'])->name('mahasiswa.berita');
        Route::get('/agenda', [MahasiswaController::class, 'indexAgenda'])->name('mahasiswa.agenda');
        Route::get('/alumni', [AlumniController::class, 'index'])->name('mahasiswa.alumni');
        // Daftar Alumni - Main
        Route::get('/alumni/daftar-alumni', [AlumniController::class, 'create'])->name('mahasiswa.alumni.create');
        Route::post('/alumni/daftar-alumni', [AlumniController::class, 'store'])->name('mahasiswa.alumni.store');
    });
});