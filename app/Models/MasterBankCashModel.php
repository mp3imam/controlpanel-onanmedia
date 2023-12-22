<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBankCashModel extends Model
{
    use HasFactory;
    protected $table = "transaksi_kas";
    protected $guarded = ['id'];

    public function banks(){
        return $this->hasOne(BankModel::class, 'id', 'bank_id');
    }

    public function users_bank_cash(){
        return $this->hasOne(UserPublicModel::class, 'id', 'user_id');
    }
}
