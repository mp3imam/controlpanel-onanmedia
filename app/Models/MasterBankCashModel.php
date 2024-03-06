<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterBankCashModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $connection = "pgsql";
    protected $table = "transaksi_kas";
    protected $guarded = ['id'];

    const KATEGORY_KAS_SALDO = "1";
    const KATEGORY_KAS_PENGEMBALIAN = "2";
    const KATEGORY_KAS_BELANJA = "3";
    const KATEGORY_KAS_PEMBELIAN = "4";

    const STATUS_PERMINTAAN = "1";
    const STATUS_DISETUJUI = "2";
    const STATUS_SEMUA = "3";

    public function banks(){
        return $this->hasOne(BankModel::class, 'id', 'tujuan_id');
    }

    public function details(){
        return $this->hasOne(TransaksiKasDetail::class, 'id', 'kas_id');
    }

    public function coa_kas_saldo(){
        return $this->hasOne(MasterCoaModel::class, 'id', 'bank_id');
    }

    public function banks_pengembalian(){
        return $this->hasOne(BankModel::class, 'id', 'tujuan_id');
    }

    public function coa_kas_saldo_pengembalian(){
        return $this->hasOne(MasterCoaModel::class, 'id', 'bank_id');
    }

    public function users_bank_cash(){
        return $this->hasOne(UserPublicModel::class, 'id', 'user_id');
    }

    public function statuses(){
        return $this->hasOne(TransasksiKasStatusModel::class, 'id', 'status_id');
    }

    public function file()
    {
        return $this->hasMany(TransaksiKasFileModel::class, 'kas_id');
    }

    function scopeKasSaldo(){
        return $this->whereKategori(MasterBankCashModel::KATEGORY_KAS_SALDO);
    }
}
