<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClcoaModel extends Model
{
    use HasFactory;
    protected $table = 'cl_coa';

    public function kas_details(){
        return $this->belongsTo(TransaksiKasDetail::class);
    }

}
