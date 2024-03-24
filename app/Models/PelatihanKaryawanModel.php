<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelatihanKaryawanModel extends Model
{
    use HasFactory;
    protected $table = 'karyawan_pelatihan';
    protected $guarded = ['id'];
}
