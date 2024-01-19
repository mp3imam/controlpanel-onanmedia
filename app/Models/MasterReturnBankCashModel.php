<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterReturnBankCashModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $connection = "pgsql";
    protected $table = "transaksi_kas";
    protected $guarded = ['id'];

    public function banks_kembali(){
        return $this->hasOne(BankModel::class, 'id', 'bank_id');
    }

    public function coa_kas_kembali(){
        return $this->hasOne(MasterCoaModel::class, 'id', 'tujuan_id');
    }

    public function users_bank_cash(){
        return $this->hasOne(UserPublicModel::class, 'id', 'user_id');
    }

    public function file()
    {
        return $this->hasMany(TransaksiKasFileModel::class, 'kas_id');
    }

    function scopeKasPengembalian(){
        return $this->whereKategori(MasterBankCashModel::KATEGORY_KAS_PENGEMBALIAN);
    }
}
