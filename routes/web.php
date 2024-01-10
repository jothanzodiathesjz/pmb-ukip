<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Auth;

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
    return view('front.index');
})->name('home');

Route::post('/register', [UserController::class, 'create'])->name('register.post');
Route::get('/register', function () {
    return view('auth.register');
})->name('register.show');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/admin', function () {
    return view('admin.index');
});
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::middleware(['auth', 'permission:user'])->group(function () {
    Route::get('/dashboard/akun/{id}', [UserDashboardController::class, 'viewAkun'])->name('dashboard.users');
    Route::get('/dashboard/berkas/{id}', [UserDashboardController::class, 'viewBerkas'])->name('dashboard.berkas');
    Route::get('/dashboard/pengumuman/{id}', [UserDashboardController::class, 'pengumumanView'])->name('dashboard.pengumuman');
    Route::get('/dashboard/users/{id}', [UserDashboardController::class, 'dataUsersView'])->name('dashboard.users');
    Route::get('/dashboard/peserta', [UserDashboardController::class, 'dataPesertaView'])->name('dashboard.peserta');

    Route::post('/dashboard/akun/{id}/biodata', [UserDashboardController::class, 'createBiodata']);
    Route::post('/dashboard/akun/{id}/sekolahs', [UserDashboardController::class, 'createSekolah']);
    Route::post('/dashboard/akun/{id}/jurusan', [UserDashboardController::class, 'createJurusan']);
    // get data byapi
    Route::get('/dashboard/akun/{id}/biodata', [UserDashboardController::class, 'getBiodata']);
    Route::get('/dashboard/akun/{id}/sekolah', [UserDashboardController::class, 'getSekolah']);
    Route::get('/dashboard/akun/{id}/jurusan', [UserDashboardController::class, 'getJurusan']);
    Route::get('/dashboard/akun/{id}/others', [UserDashboardController::class, 'getOthers']);
    
    // update Data by Api
    Route::put('/dashboard/akun/{id}/biodata', [UserDashboardController::class, 'updateBiodata']);
    Route::put('/dashboard/akun/{id}/sekolah', [UserDashboardController::class, 'updateSekolah']);
    Route::put('/dashboard/akun/{id}/jurusan', [UserDashboardController::class, 'updateJurusan']);
});

// Route::middlewareGroup('auth', [auth.session])
