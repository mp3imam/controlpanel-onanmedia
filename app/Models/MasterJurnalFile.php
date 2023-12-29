<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterJurnalFile extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $table = 'file_jurnal';
    protected $guarded = ['id'];

    public function jurnal_file(){
        return $this->belongsTo(MasterJurnal::class, 'id', 'jurnal_umum_id');
    }
}
