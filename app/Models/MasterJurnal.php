<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterJurnal extends Model
{
    use HasFactory, SoftDeletes;
    protected $connection = 'pgsql';
    protected $table = "jurnals_umum";
    protected $guarded = ['id'];

    public function details(){
        return $this->hasMany(JurnalUmumDetail::class, 'jurnal_umum_id');
    }

    public function jurnal_banks(){
        return $this->hasOne(BankModel::class, 'id', 'bank_id');
    }

    public function scopeTotal($q){
        return $q->with(['details' => function($q) {
            $q->selectRaw('jurnal_umum_id, sum("debet") jumlah_debet, sum("kredit") jumlah_kredit')
            ->groupBy('jurnal_umum_id');
        }]);
    }

    public function jurnal_file(){
        return $this->hasMany(MasterJurnalFile::class, 'jurnal_umum_id');
    }
}
