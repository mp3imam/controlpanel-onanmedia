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

    public function belanja_detail(){
        return $this->belongsTo(MasterKasBelanja::class, 'id', 'kas_id');
    }
}
