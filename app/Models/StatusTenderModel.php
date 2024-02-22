<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTenderModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'MsStatusTender';
    public $incrementing = false;
    protected $keyType = 'string';

    public function tender()
    {
        return $this->belongsTo(DaftarTenderModel::class, 'msStatusTenderId','id');
    }

}
