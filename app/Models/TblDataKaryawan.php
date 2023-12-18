<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblDataKaryawan extends Model
{
    use HasFactory;
    protected $table = 'tbl_data_karyawan';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function divisis(){
        return $this->belongsTo(DivisiModel::class, 'cl_divisi_id', 'id');
    }

    public function gaji(){
        return $this->belongsTo(TblDataKaryawanGajiModel::class, 'guid', 'id');
    }
}
