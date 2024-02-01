<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanModel extends Model
{
    use HasFactory;
    protected $table = 'ms_satuan';
    protected $guarded = ['id'];

    public function satuan_barang(){
        return $this->hasOne(MasterKasBelanjaDetail::class, 'satuan_id');
    }

}
