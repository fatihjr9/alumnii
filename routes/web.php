<?php


// use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
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
        Route::get('/berita/add', [\App\Http\Controllers\BeritaController::class, 'create'])->name('berita.create');
        Route::post('/berita/add', [\App\Http\Controllers\BeritaController::class, 'store'])->name('berita.store');
        // dosen
        Route::get('/dosen', [\App\Http\Controllers\DosenController::class, 'index'])->name('dosen.index');
        Route::get('/dosen/add', [\App\Http\Controllers\DosenController::class, 'create'])->name('dosen.create');
        Route::post('/dosen/add', [\App\Http\Controllers\DosenController::class, 'store'])->name('dosen.store');
        // alumni
        Route::get('/alumni', function () { return view('admin.alumni.index');})->name('alumni.index');
        // lainnya
        Route::get('/lainnya', [\App\Http\Controllers\OtherController::class, 'index'])->name('lainnya.index');
        // lainnya -> Fakultas
        Route::get('/lainnya/tambah-fakultas', [\App\Http\Controllers\OtherController::class, 'createFakultas'])->name('lainnya.tambah-fakultas');
        Route::post('/lainnya/tambah-fakultas', [\App\Http\Controllers\OtherController::class, 'storeFakultas'])->name('lainnya.tambah-fakultas');
        // lainnya -> Collection
        Route::get('/lainnya/tambah-collection', [\App\Http\Controllers\OtherController::class, 'createCollection'])->name('tambah-collection');
        Route::post('/lainnya/tambah-collection', [\App\Http\Controllers\OtherController::class, 'storeCollection'])->name('tambah-collection');
        // lainnya -> Kontak
        Route::get('/lainnya/tambah-kontak', [\App\Http\Controllers\OtherController::class, 'createKontak'])->name('lainnya.tambah-kontak.create');
        Route::post('/lainnya/tambah-kontak', [\App\Http\Controllers\OtherController::class, 'storeKontak'])->name('lainnya.tambah-kontak.store');
    });
    
    Route::group(['middleware' => 'role:1', 'prefix' => 'mahasiswa'], function () {
        Route::get('/dashboard', [MahasiswaController::class, 'index'])->name('mahasiswa.dashboard');
        Route::get('/berita', [MahasiswaController::class, 'indexBerita'])->name('mahasiswa.berita');
        Route::get('/agenda', [MahasiswaController::class, 'indexAgenda'])->name('mahasiswa.agenda');
        Route::get('/alumni', [MahasiswaController::class, 'indexAlumni'])->name('mahasiswa.alumni');
    });
});