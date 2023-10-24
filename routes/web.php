<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LoginController;
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

//admin
// Route::middleware('auth')->group(function () {
    Route::get('/admin', [DashboardController::class , 'index' ]);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('mastersiswa/{id_siswa}/hapus', [SiswaController::class , 'hapus' ])->name('mastersiswa.hapus');
    Route::resource('mastersiswa', SiswaController::class);
    Route::resource('masterproject', ProjectController::class);
    Route::resource('masterkontak', KontakController::class);
// });


//guest
// Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
    Route::get('/', function () { return view('home'); });
    Route::get('/about', function () { return view('about'); });
    Route::get('/project', function () { return view('project'); });
    Route::get('/contact', function () { return view('contact'); });
// });










