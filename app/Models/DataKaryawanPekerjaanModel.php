<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKaryawanPekerjaanModel extends Model
{
    use HasFactory;
    protected $table = "data_karyawan_pekerjaan";
    protected $guarded = ['id'];

    public function data_karyawan()
    {
        return $this->belongsTo(DataKaryawanModel::class, 'data_karyawan_id');
    }

    public function departement()
    {
        return $this->belongsTo(DepartementModel::class, 'departement_id');
    }
}
