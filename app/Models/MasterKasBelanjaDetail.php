<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKasBelanjaDetail extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $table = 'transaksi_kas_belanja_detail';
    protected $guarded = ['id'];

    public function belanja_detail()
    {
        return $this->belongsTo(MasterKasBelanja::class, 'id', 'kas_id');
    }

    public function coa_belanja()
    {
        return $this->hasOne(MasterCoaModel::class, 'id', 'account_id');
    }

    public function banks_belanja()
    {
        return $this->hasOne(BankModel::class, 'id', 'account_id');
    }

    public function satuan_barang()
    {
        return $this->belongsTo(SatuanModel::class, 'satuan_id');
    }
}