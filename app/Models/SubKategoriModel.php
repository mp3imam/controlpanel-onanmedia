<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategoriModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'MsSubkategori';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function jasa()
    {
        return $this->belongsTo(JasaModel::class, 'msSubKategoriId','id');
    }

    public function scopeActive($q){
        $q->where('MsSubkategori.isAktif',1);
    }
}
