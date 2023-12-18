<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblDataKaryawanGajiModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_data_karyawan_gaji';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function gaji(){
        return $this->belongsTo(TblDataKaryawan::class, 'id');
    }

}
