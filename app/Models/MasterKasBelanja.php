<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKasBelanja extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $table = 'transaksi_kas_belanjas';
    protected $guarded = ['id'];

    public function banks_belanja(){
        return $this->hasOne(BankModel::class, 'id', 'bank_id');
    }

    public function coa_belanja(){
        return $this->hasOne(MasterCoaModel::class, 'id', 'bank_id');
    }
}
