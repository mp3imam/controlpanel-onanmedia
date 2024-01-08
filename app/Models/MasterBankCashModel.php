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

    public function banks(){
        return $this->hasOne(BankModel::class, 'id', 'bank_id');
    }

    public function coa_kas_saldo(){
        return $this->hasOne(MasterCoaModel::class, 'id', 'bank_id');
    }

    public function users_bank_cash(){
        return $this->hasOne(UserPublicModel::class, 'id', 'user_id');
    }
}
