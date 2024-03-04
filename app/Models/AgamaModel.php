<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgamaModel extends Model
{
    use HasFactory;
    protected $table = 'agama';
    protected $guarded = ['id'];

    public function data_karyawan(){
        return $this->belongsTo(DataKaryawanModel::class, 'id');
    }
}
