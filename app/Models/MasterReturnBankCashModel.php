<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterReturnBankCashModel extends Model
{
    use HasFactory;
    protected $connection = "pgsql";
    protected $table = "transaksi_return_kas";
    protected $guarded = ['id'];

    public function banks(){
        return $this->hasOne(BankModel::class, 'id', 'bank_id');
    }

    public function coa_kas_kembali(){
        return $this->hasOne(MasterCoaModel::class, 'id', 'tujuan_id');
    }

    public function users_bank_cash(){
        return $this->hasOne(UserPublicModel::class, 'id', 'user_id');
    }
}
