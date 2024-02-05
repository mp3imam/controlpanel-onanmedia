<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKasDetail extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $table = 'transaksi_kas_detail';
    protected $guarded = ['id'];

    public function details(){
        return $this->belongsTo(MasterBankCashModel::class, 'kas_id');
    }
}
