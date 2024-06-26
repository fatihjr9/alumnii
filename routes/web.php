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
        Route::get('/agenda/edit/{id}', [AgendaController::class, 'edit'])->name('agenda.edit');
        Route::put('/agenda/{id}', [AgendaController::class, 'update'])->name('agenda.update');
        Route::post('/agenda/create', [AgendaController::class, 'store'])->name('agenda.store');
        Route::delete('/agenda/{id}', [AgendaController::class, 'destroy'])->name('agenda.destroy');

        // berita
        Route::get('/berita', [\App\Http\Controllers\BeritaController::class, 'index'])->name('berita.index');
        Route::get('/berita/create', [\App\Http\Controllers\BeritaController::class, 'create'])->name('berita.create');
        Route::post('/berita/create', [\App\Http\Controllers\BeritaController::class, 'store'])->name('berita.store');
        Route::get('/berita/edit/{id}', [\App\Http\Controllers\BeritaController::class, 'edit'])->name('berita.edit');
        Route::put('/berita/{id}', [\App\Http\Controllers\BeritaController::class, 'update'])->name('berita.update');
        Route::delete('/berita/{id}', [\App\Http\Controllers\BeritaController::class, 'destroy'])->name('berita.destroy');
        // dosen
        Route::get('/dosen', [\App\Http\Controllers\DosenController::class, 'index'])->name('dosen.index');
        Route::get('/dosen/create', [\App\Http\Controllers\DosenController::class, 'create'])->name('dosen.create');
        Route::post('/dosen/create', [\App\Http\Controllers\DosenController::class, 'store'])->name('dosen.store');
        Route::get('/dosen/edit/{id}', [\App\Http\Controllers\DosenController::class, 'edit'])->name('dosen.edit');
        Route::put('/dosen/{id}', [\App\Http\Controllers\DosenController::class, 'update'])->name('dosen.update');
        Route::delete('/dosen/{id}', [\App\Http\Controllers\DosenController::class, 'destroy'])->name('dosen.destroy');
        // alumni
        Route::get('/alumni', [\App\Http\Controllers\AlumniAdminController::class, 'index'])->name('alumni.index');
        Route::get('/alumni-template/{id}', [\App\Http\Controllers\AlumniAdminController::class, 'show'])->name('alumni.template');
        Route::get('/alumni/create', [\App\Http\Controllers\AlumniAdminController::class, 'create'])->name('alumni.create');
        Route::post('/alumni/create', [\App\Http\Controllers\AlumniAdminController::class, 'store'])->name('alumni.store');
        Route::get('/alumni/edit/{id}', [\App\Http\Controllers\AlumniAdminController::class, 'edit'])->name('alumni.edit');
        Route::put('/alumni/{id}', [\App\Http\Controllers\AlumniAdminController::class, 'update'])->name('alumni.update');
        Route::get('download/{nama}', [\App\Http\Controllers\AlumniAdminController::class, 'downloadPDF'])->name('alumni.download');
        Route::delete('/alumni/{alumni}',[\App\Http\Controllers\AlumniAdminController::class, 'destroy'])->name('alumni.destroy');
        // lainnya
        Route::get('/lainnya', [\App\Http\Controllers\OtherController::class, 'index'])->name('lainnya.index');
        // lainnya -> Fakultas
        Route::get('/lainnya/tambah-fakultas', [\App\Http\Controllers\OtherController::class, 'createFakultas'])->name('lainnya.tambah-fakultas');
        Route::post('/lainnya/tambah-fakultas', [\App\Http\Controllers\OtherController::class, 'storeFakultas'])->name('lainnya.tambah-fakultas');
        Route::get('/lainnya/edit-fakultas/{id}', [\App\Http\Controllers\OtherController::class, 'editFakultas'])->name('lainnya.edit-fakultas');
        Route::put('/lainnya/edit-fakultas/{id}', [\App\Http\Controllers\OtherController::class, 'updateFakultas'])->name('lainnya.edit-fakultas');
        Route::delete('/lainnya/fakultas/{id}', [\App\Http\Controllers\OtherController::class, 'destroyFakultas'])->name('lainnya.destroy-fakultas');
        // lainnya -> Collection
        Route::get('/lainnya/tambah-galeri', [\App\Http\Controllers\OtherController::class, 'createGaleri'])->name('lainnya.tambah-galeri.create');
        Route::post('/lainnya/tambah-galeri', [\App\Http\Controllers\OtherController::class, 'storeGaleri'])->name('lainnya.tambah-galeri.store');
        Route::get('/lainnya/edit-galeri/{id}', [\App\Http\Controllers\OtherController::class, 'editGaleri'])->name('lainnya.edit-galeri.edit');
        Route::put('/lainnya/edit-galeri/{id}', [\App\Http\Controllers\OtherController::class, 'updateGaleri'])->name('lainnya.edit-galeri.update');
        Route::delete('/lainnya/galeri/{id}', [\App\Http\Controllers\OtherController::class, 'deleteGaleri'])->name('lainnya.galeri.delete');
        // lainnya -> Kontak
        Route::get('/lainnya/tambah-kontak', [\App\Http\Controllers\OtherController::class, 'createKontak'])->name('lainnya.tambah-kontak.create');
        Route::post('/lainnya/tambah-kontak', [\App\Http\Controllers\OtherController::class, 'storeKontak'])->name('lainnya.tambah-kontak.store');
        Route::get('/lainnya/edit-kontak/{id}', [\App\Http\Controllers\OtherController::class, 'editKontak'])->name('lainnya.edit-kontak.edit');
        Route::put('/lainnya/edit-kontak/{id}', [\App\Http\Controllers\OtherController::class, 'updateKontak'])->name('lainnya.edit-kontak.update');
        Route::delete('/lainnya/kontak/{id}', [\App\Http\Controllers\OtherController::class, 'destroyKontak'])->name('lainnya.destroy-kontak.destroy');
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