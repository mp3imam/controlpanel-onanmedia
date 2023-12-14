<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BahasaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DaftarProductJasaController;
use App\Http\Controllers\DaftarTenderController;
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
use App\Http\Controllers\UserRolePageController;

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

    Route::resource('users_public', UserPublicController::class);
    Route::get('user_product_datatable', [UserPublicController::class,'user_product'])->name('user_product_datatable');
    Route::get('user_keahlian_datatable', [UserPublicController::class,'user_keahlian'])->name('user_keahlian_datatable');
    Route::get('user_pendidikan_datatable', [UserPublicController::class,'user_pendidikan'])->name('user_pendidikan_datatable');
    Route::get('user_bahasa_datatable', [UserPublicController::class,'user_bahasa'])->name('user_bahasa_datatable');
    Route::get('user_alamat_datatable', [UserPublicController::class,'user_alamat'])->name('user_alamat_datatable');
    Route::post('aktifkan_seller', [UserPublicController::class,'aktifkan_seller'])->name('aktifkan_seller');

    Route::resource('transaksi', TransactionsController::class);
    Route::get('transaksi_product_datatable', [TransactionsController::class,'transaksi_product'])->name('transaksi_product_datatable');

    Route::resource('daftar_tender', DaftarTenderController::class);

    Route::resource('daftar_product_jasa', DaftarProductJasaController::class);
    Route::get('daftar_pricing_datatable', [DaftarProductJasaController::class,'daftar_pricing'])->name('daftar_pricing_datatable');

    Route::resource('request_pencarian_dana', RequestPencarianDanaController::class);

    // Finance
    Route::resource('master_coa', MasterCoaController::class);

    // HRD

    // Master Data
    Route::resource('bahasa', BahasaController::class);
    Route::post('bahasa.status', [BahasaController::class,'bahasa_status'])->name('bahasa.status');
    Route::resource('kategori', KategoriController::class);
    Route::resource('subkategori', SubKategoriController::class);
    Route::resource('pekerjaan', PekerjaanController::class);
    Route::resource('pendidikan', PendidikanController::class);

    // Pengaturan
    Route::resource('users', UserController::class);
    Route::post('users.pdf', [UserController::class, 'pdf'])->name('users.pdf');
    Route::resource('users_role_page', UserRolePageController::class);

});
