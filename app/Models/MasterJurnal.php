<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterJurnal extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $guarded = ['id'];

    public function details(){
        return $this->hasMany(JurnalUmumDetail::class, 'jurnal_umum_id');
    }

    public function scopeTotal($q){
        return $q->with(['details' => function($q) {
            $q->selectRaw('jurnal_umum_id, sum("debet") jumlah_debet, sum("kredit") jumlah_kredit')
            ->groupBy('jurnal_umum_id');
        }]);
    }
}
