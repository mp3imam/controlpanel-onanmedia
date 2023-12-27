<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKasBelanjaFile extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $table = 'transaksi_kas_belanja_file';
    protected $guarded = ['id'];

    public function kas_file(){
        return $this->hasOne(MasterKasBelanja::class, 'id', 'kas_id');
    }
}
