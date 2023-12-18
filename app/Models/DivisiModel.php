<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisiModel extends Model
{
    use HasFactory;
    protected $table = 'MsDivisi';

    public function divisis(){
        return $this->hasOne(TblDataKaryawan::class, 'id');
    }

}
