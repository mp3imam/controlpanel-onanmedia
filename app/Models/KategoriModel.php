<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'MsKategori';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function scopeActive($q){
        $q->where('MsKategori.isAktif',1);
    }

}
