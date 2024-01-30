<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterKasBelanja extends Model
{
    use HasFactory, SoftDeletes;
    protected $connection = 'pgsql';
    protected $table = 'transaksi_kas_belanjas';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    const STATUS_CREATE = "1";
    const STATUS_ON_PROGRESS = "2";
    const STATUS_PROSESS = "3";
    const STATUS_TOLAK = "4";
    const STATUS_HISTORY = "5";
    const STATUS_PENDING = "6";

    public function banks_belanja(){
        return $this->hasOne(BankModel::class, 'id', 'account_id');
    }

    public function coa_belanja(){
        return $this->hasOne(MasterCoaModel::class, 'id', 'account_id');
    }

    public function kas_file(){
        return $this->hasMany(MasterKasBelanjaFile::class, 'kas_id');
    }

    public function belanja_detail(){
        return $this->hasMany(MasterKasBelanjaDetail::class, 'kas_id');
    }

    public function scopeTotal($q){
        return $q->with(['belanja_detail' => function($q) {
            $q->selectRaw('kas_id, sum("nominal") jumlah_nominal')
            ->groupBy('kas_id');
        }]);
    }
}
