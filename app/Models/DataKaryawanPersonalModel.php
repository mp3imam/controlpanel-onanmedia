<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKaryawanPersonalModel extends Model
{
    use HasFactory;
    protected $table = "data_karyawan_personal";
    protected $guarded = ['id'];
}
