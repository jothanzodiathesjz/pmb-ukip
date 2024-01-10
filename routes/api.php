<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/dashboard/akun/{id}/wali', [UserDashboardController::class, 'createWali']);
Route::get('/dashboard/akun/{id}/wali', [UserDashboardController::class, 'getWali']);
Route::put('/dashboard/akun/{id}/wali', [UserDashboardController::class, 'updateWali']);

Route::get('/dashboard/akun/others/{id}', [UserDashboardController::class, 'getOthers']);
Route::post('/dashboard/akun/others', [UserDashboardController::class, 'createOthers']);
Route::put('/dashboard/akun/others', [UserDashboardController::class, 'updateOthers']);

Route::post('/berkas', [UserDashboardController::class, 'createBerkas']);
Route::get('/berkas/{id}', [UserDashboardController::class, 'getBerkas']);
Route::get('/dashboard/akun/{id}/biodata', [UserDashboardController::class, 'getBiodata']);
Route::get('/dashboard/akun/{id}/sekolah', [UserDashboardController::class, 'getSekolah']);
Route::get('/dashboard/akun/{id}/jurusan', [UserDashboardController::class, 'getJurusan']);
Route::get('/dashboard/akun/{id}/others', [UserDashboardController::class, 'getOthers']);
Route::get('/dashboard/akun/{id}/berkas', [UserDashboardController::class, 'getBerkas']);
Route::post('/dashboard/akun/{id}/pengumuman', [UserDashboardController::class, 'createPengumuman']);
Route::post('/admin/store', [UserController::class, 'createAdmin']);
Route::post('/pimpinan/store', [UserController::class, 'createPimpinan']);

Route::get('/admin/users',[UserDashboardController::class, 'getDataUsers']);
Route::delete('/admin/users/{id}',[UserDashboardController::class, 'deleteUsers']);

