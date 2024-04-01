<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekerjaanModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'MsPekerjaan';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function divisi()
    {
        return $this->belongsTo(DataKaryawanModel::class, 'pekerjaan_id');
    }
}
