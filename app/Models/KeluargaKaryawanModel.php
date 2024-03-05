<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluargaKaryawanModel extends Model
{
    use HasFactory;
    protected $table = 'keluarga_karyawan';
    protected $guarded = ['id'];

    public function agama_keluarga(){
        return $this->hasOne(AgamaModel::class, 'id', 'agama_id');
    }
}
