<?php

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\NilaiDetailController;
use App\Http\Controllers\NilaiKoassController;
use App\Http\Controllers\nilaiKoassDetailController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PesertaDidikController;
use App\Http\Controllers\RoleUsersController;
use App\Http\Controllers\UsersController;
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
    return view('auth.login');
});
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(
    function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('/users',UsersController::class);
    // Route::post('/users_add',CreateNewUser::class);
    
    Route::resource('/pengajar',PengajarController::class);

    Route::resource('/role_user',RoleUsersController::class);

    Route::resource('/ksm',DepartementController::class);
    
    Route::resource('/peserta_didik',PesertaDidikController::class);
    
    Route::resource('/nilai_pdk',PenilaianController::class);

    Route::resource('/penilaian_detail',NilaiDetailController::class);
    
    Route::get('/nilai_pdk/fetchDosen/{id}', [PenilaianController::class , 'fetchDosen']);
});

Route::get('/keluar',[UsersController::class,'logout'])->name('logout');

