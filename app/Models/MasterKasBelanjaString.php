<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterKasBelanjaString extends Model
{
    use HasFactory, SoftDeletes;
    protected $connection = 'pgsql';
    protected $table = 'transaksi_kas_belanjas';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    protected $keyType = 'string';

    const STATUS_CREATE = "1";
    const STATUS_ON_PROGRESS = "2";
    const STATUS_PROSESS = "3";
    const STATUS_TOLAK = "4";
    const STATUS_HISTORY = "5";
    const STATUS_PENDING = "6";

    public function banks_belanja(){
        return $this->hasOne(BankModel::class, 'id', 'account_id');
    }

    public function users(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function coa_belanja(){
        return $this->hasOne(MasterCoaModel::class, 'id');
    }

    public function kas_file(){
        return $this->hasMany(MasterKasBelanjaFile::class, 'kas_id');
    }

    public function scopeBelanjaDetail($query, $status){
        return $query->whereHas('belanja_barang', function ($q) use($status){
            $q->whereIn('status', $status);
        });
    }

    public function belanja_barang(){
        return $this->hasMany(MasterKasBelanjaDetail::class, 'kas_id');
    }

    public function scopeBelanjaCreate($query){
        return $query->whereHas('belanja_barang', function ($q) {
            $q->whereStatus(1);
        });
    }

    public function scopeBelanjaOnProgress($query){
        return $query->whereHas('belanja_barang', function ($q) {
            $q->whereStatus(2);
        });
    }
    public function scopeBelanjaProses($query){
        return $query->whereHas('belanja_barang', function ($q) {
            $q->whereStatus(3);
        });
    }
    public function scopeBelanjaTolak($query){
        return $query->whereHas('belanja_barang', function ($q) {
            $q->whereStatus(4);
        });
    }
    public function scopeBelanjaHistory($query){
        return $query->whereHas('belanja_barang', function ($q) {
            $q->whereStatus(5);
        });
    }
    public function scopeBelanjaPending($query){
        return $query->whereHas('belanja_barang', function ($q) {
            $q->whereStatus(6);
        });
    }

    public function statuses(){
        return $this->belongsTo(TransaksiKasBelanjaStatusModel::class, 'status');
    }

    public function scopeTotal($q){
        return $q->with(['belanja_detail' => function($q) {
            $q->selectRaw('kas_id, sum("nominal") jumlah_nominal')
            ->groupBy('kas_id');
        }]);
    }
}
