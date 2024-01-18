<?php

use App\Http\Controllers\API\C2;
use App\Http\Controllers\API\BeritaController;
use App\Http\Controllers\API\MailController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\OnanmediaAPIController;

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

//Protecting Routes['middleware' => ['auth', 'logs_activities']]
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    // Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/roles', [OnanmediaAPIController::class,'roles'])->name('api.roles');
Route::get('get_select2_kategori', [OnanmediaAPIController::class,'select2_kategori'])->name('api.get_select2_kategori');
Route::get('get_select2_menu_parent', [OnanmediaAPIController::class,'select2_parent'])->name('api.get_select2_parent');
Route::get('get_select2_divisi', [OnanmediaAPIController::class,'select2_divisi'])->name('api.get_select2_divisi');
Route::get('get_select2_users', [OnanmediaAPIController::class,'select2_users'])->name('api.get_select2_users');
Route::get('get_select2_banks', [OnanmediaAPIController::class,'select2_banks'])->name('api.get_select2_banks');
Route::get('get_select2_banks_gabungan_kasir', [OnanmediaAPIController::class,'select2_banks_gabungan_kasir'])->name('api.get_select2_banks_gabungan_kasir');
Route::get('get_select2_belanja', [OnanmediaAPIController::class,'select2_belanja'])->name('api.get_select2_belanja');
Route::get('get_select2_mata_uangs', [OnanmediaAPIController::class,'select2_mata_uangs'])->name('api.get_select2_mata_uangs');
Route::get('get_select2_header_coa', [OnanmediaAPIController::class,'select2_header_coa'])->name('api.get_select2_header_coa');
Route::get('get_select2_deskripsi_coa', [OnanmediaAPIController::class,'select2_deskripsi_coa'])->name('api.get_select2_deskripsi_coa');
Route::get('get_select2_uraian_coa', [OnanmediaAPIController::class,'select2_uraian_coa'])->name('api.get_select2_uraian_coa');
Route::get('get_select2_banks_coa', [OnanmediaAPIController::class,'select2_banks_coa'])->name('api.get_select2_banks_coa');
Route::get('get_select2_deskripsi_coa', [OnanmediaAPIController::class,'select2_deskripsi_coa'])->name('api.get_select2_deskripsi_coa');
