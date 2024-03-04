<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKaryawanModel extends Model
{
    use HasFactory;
    protected $table = "data_karyawan";
    protected $guarded = ['id'];

    public function agama_personal()
    {
        return $this->hasOne(AgamaModel::class, 'id','agama_id');
    }

    public function pendidikan_terakhir_banget()
    {
        return $this->hasOne(PendidikanModel::class, 'id','pendidikan_terakhir');
    }
}
