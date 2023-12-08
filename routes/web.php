<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BahasaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DaftarProductJasaController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MasterCoaController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\RequestPencarianDanaController;
use App\Http\Controllers\SubKategoriController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UserPublicController;

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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::post('post-register', [AuthController::class, 'postregister'])->name('register.post');

Route::get('/', [HomeController::class, 'root'])->name('root');

Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard', [DasboardController::class, 'index'])->name('dashboard');;
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('users.pdf', [UserController::class, 'pdf'])->name('users.pdf');
    Route::resource('users', UserController::class);
    Route::resource('users_public', UserPublicController::class);
    Route::resource('transaksi', TransactionsController::class);
    Route::resource('daftar_product_jasa', DaftarProductJasaController::class);
    Route::resource('request_pencarian_dana', RequestPencarianDanaController::class);

    // Finance
    Route::resource('master_coa', MasterCoaController::class);


    // HRD


    // Master Data
    Route::resource('bahasa', BahasaController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('subkategori', SubKategoriController::class);
    Route::resource('pekerjaan', PekerjaanController::class);
    Route::resource('pendidikan', PendidikanController::class);

});
