<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalUmumDetail extends Model
{
    use HasFactory;

    public function details(){
        return $this->belongsTo(JurnalUmumDetail::class, 'id', 'jurnal_umum_id');
    }
}
