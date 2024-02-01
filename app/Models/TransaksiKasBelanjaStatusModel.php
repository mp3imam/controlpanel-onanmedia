<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKasBelanjaStatusModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $table = 'transaksi_kas_belanja_status';
    protected $guarded = ['id'];

    public function statuses(){
        return $this->hasOne(MasterKasBelanja::class, 'status','id');
    }

}
