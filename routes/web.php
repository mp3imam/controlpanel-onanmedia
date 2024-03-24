<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BahasaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DaftarProductJasaController;
use App\Http\Controllers\DaftarTenderController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\HrdController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MasterBankCashController;
use App\Http\Controllers\MasterCoaController;
use App\Http\Controllers\MasterJurnalController;
use App\Http\Controllers\MasterKasBelanjaController;
use App\Http\Controllers\MasterReturnBankCashController;
use App\Http\Controllers\MenuPageController;
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

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [DasboardController::class, 'index'])->name('dashboard');
    Route::post('upload-file', [DasboardController::class, 'upload_file'])->name('upload.file');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('users_public', UserPublicController::class);
    Route::get('user_product_datatable', [UserPublicController::class, 'user_product'])->name('user_product_datatable');
    Route::get('user_keahlian_datatable', [UserPublicController::class, 'user_keahlian'])->name('user_keahlian_datatable');
    Route::get('user_pendidikan_datatable', [UserPublicController::class, 'user_pendidikan'])->name('user_pendidikan_datatable');
    Route::get('user_bahasa_datatable', [UserPublicController::class, 'user_bahasa'])->name('user_bahasa_datatable');
    Route::get('user_alamat_datatable', [UserPublicController::class, 'user_alamat'])->name('user_alamat_datatable');
    Route::post('aktifkan_seller', [UserPublicController::class, 'aktifkan_seller'])->name('aktifkan_seller');

    Route::resource('transaksi', TransactionsController::class);
    Route::get('transaksi_product_datatable', [TransactionsController::class, 'transaksi_product'])->name('transaksi_product_datatable');

    Route::resource('daftar_tender', DaftarTenderController::class);

    Route::resource('daftar_product_jasa', DaftarProductJasaController::class);
    Route::post('verifikasi_jasa', [DaftarProductJasaController::class, 'verifikasi_jasa'])->name('verifikasi_jasa');
    Route::get('daftar_pricing_datatable', [DaftarProductJasaController::class, 'daftar_pricing'])->name('daftar_pricing_datatable');

    Route::resource('request_pencarian_dana', RequestPencarianDanaController::class);

    // Finance
    Route::resource('master_coa', MasterCoaController::class);
    Route::get('getDataTableCoa', [MasterCoaController::class, 'get_datatable'])->name('getDataTableCoa');

    // Transaksi Kas
    Route::resource('master_bank_cash', MasterBankCashController::class);
    Route::get('getDataTableBankCash', [MasterBankCashController::class, 'get_datatable'])->name('getDataTableBankCash');
    Route::post('softdelete_kas_isi_saldo', [MasterBankCashController::class, 'softdelete_kas_isi_saldo'])->name('softdelete_kas_isi_saldo');
    Route::get('approve_list', [MasterBankCashController::class, 'approve_list'])->name('approve_list');
    Route::post('approve_direktur', [MasterBankCashController::class, 'approve_direktur'])->name('approve_direktur');

    // Pengembalian Kas
    Route::resource('master_return_bank_cash', MasterReturnBankCashController::class);
    Route::get('getDataTableReturnBankCash', [MasterReturnBankCashController::class, 'get_datatable'])->name('getDataTableReturnBankCash');
    Route::post('softdelete_pengembalian_kas', [MasterReturnBankCashController::class, 'softdelete_pengembalian_kas'])->name('softdelete_pengembalian_kas');
    Route::post('hapus_foto_kas_kembalian', [MasterReturnBankCashController::class, 'hapus_foto'])->name('hapus_foto_kas_kembalian');

    // Kas Belanja
    Route::resource('master_kas_belanja', MasterKasBelanjaController::class)->except('show');
    Route::post('checked_finance', [MasterKasBelanjaController::class, 'checked_finance'])->name('checked_finance');
    Route::post('checked_pending_finance', [MasterKasBelanjaController::class, 'checked_pending_finance'])->name('checked_pending_finance');
    Route::post('approve_finance', [MasterKasBelanjaController::class, 'approve_finance'])->name('approve_finance');
    Route::get('list_pending_finance/{id}/edit', [MasterKasBelanjaController::class, 'list_pending_finance'])->name('list_pending_finance');
    Route::post('upload_bukti_transfer_divisi_finance', [MasterKasBelanjaController::class, 'upload_bukti_transfer_divisi_finance'])->name('upload_bukti_transfer_divisi_finance');
    Route::post('upload_bukti_transfer_finance_divisi', [MasterKasBelanjaController::class, 'upload_bukti_transfer_finance_divisi'])->name('upload_bukti_transfer_finance_divisi');
    Route::post('softdelete_kas_belanja', [MasterKasBelanjaController::class, 'softdelete_kas_belanja'])->name('softdelete_kas_belanja');
    Route::get('getDataTableMasterKasBelanja', [MasterKasBelanjaController::class, 'get_datatable'])->name('getDataTableMasterKasBelanja');
    Route::post('hapus_foto_kas_belanja', [MasterKasBelanjaController::class, 'hapus_foto'])->name('hapus_foto_kas_belanja');
    Route::post('finance_selesai', [MasterKasBelanjaController::class, 'finance_selesai'])->name('finance_selesai');

    // Jurnal Umum
    Route::resource('master_jurnal', MasterJurnalController::class);
    Route::get('master_jurnal_pdf', [MasterJurnalController::class, 'get_pdf'])->name('master_jurnal.pdf');
    Route::get('getDataTableMasterJurnal', [MasterJurnalController::class, 'get_datatable'])->name('getDataTableMasterJurnal');
    Route::post('upload-foto-jurnal-umum', [MasterJurnalController::class, 'upload_file'])->name('upload.foto.jurnal.umum');
    Route::post('softdelete_jurnal_umum', [MasterJurnalController::class, 'softdelete_jurnal_umum'])->name('softdelete_jurnal_umum');
    Route::post('hapus_foto_jurnal_umum', [MasterJurnalController::class, 'hapus_foto'])->name('hapus_foto_jurnal_umum');
    // End Finance

    // HRD
    Route::resource('data_karyawan', HrdController::class);
    Route::post('simpan_karyawan_umum', [HrdController::class, 'simpan_karyawan_umum'])->name('simpan_karyawan_umum');
    Route::post('simpan_karyawan_personal', [HrdController::class, 'simpan_karyawan_personal'])->name('simpan_karyawan_personal');
    Route::post('simpan_karyawan_pekerjaan', [HrdController::class, 'simpan_karyawan_pekerjaan'])->name('simpan_karyawan_pekerjaan');
    Route::get('tabel-karyawan-keluarga', [HrdController::class, 'tabel_karyawan_keluarga'])->name('tabel.karyawan.keluarga');
    Route::post('simpan-karyawan-keluarga', [HrdController::class, 'simpan_karyawan_keluarga'])->name('simpan.karyawan.keluarga');
    Route::get('tabel-karyawan-pendidikan', [HrdController::class, 'tabel_karyawan_pendidikan'])->name('tabel.karyawan.pendidikan');
    Route::post('simpan-karyawan-pendidikan', [HrdController::class, 'simpan_karyawan_pendidikan'])->name('simpan.karyawan.pendidikan');
    Route::get('getDataTableKaryawan', [HrdController::class, 'get_datatable'])->name('getDataTableKaryawan');

    // Master Data
    Route::resource('bahasa', BahasaController::class);
    Route::post('bahasa.status', [BahasaController::class, 'bahasa_status'])->name('bahasa.status');
    Route::resource('kategori', KategoriController::class);
    Route::resource('subkategori', SubKategoriController::class);
    Route::resource('pekerjaan', PekerjaanController::class);
    Route::resource('pendidikan', PendidikanController::class);

    // HelpDesk
    Route::resource('helpdesk_list', HelpdeskController::class);
    Route::post('helpdesk-upload-image', [HelpdeskController::class, 'uploadImage'])->name('helpdesk.upload.image');
    Route::post('aktifkan-seller-chat', [HelpdeskController::class, 'aktifkan_seller_chat'])->name('aktifkan.seller.chat');
    Route::post('selesaikan-keluhan', [HelpdeskController::class, 'selesaikan_keluhan'])->name('selesaikan.keluhan');

    // Pengaturan
    Route::resource('users', UserController::class);
    Route::post('ganti-passowrd', [UserController::class, 'ganti_password'])->name('ganti.password');
    Route::post('users.pdf', [UserController::class, 'pdf'])->name('users.pdf');
    Route::resource('user_role_page', UserRolePageController::class);
    Route::post('tambah_role', [UserRolePageController::class,'tambah_role'])->name('tambah_role');
    Route::resource('menu_page', MenuPageController::class);
    Route::post('update_menu', [MenuPageController::class, 'update_menu'])->name('update_menu');
});
