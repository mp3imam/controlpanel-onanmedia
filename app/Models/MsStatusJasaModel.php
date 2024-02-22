<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsStatusJasaModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'MsStatusJasa';
    protected $guarded = ['id'];
    public $timestamps = false;
    public $incrementing = false;
    public $keyType = 'string';

    public function jasa()
    {
        return $this->belongsTo(JasaModel::class, 'msStatusJasaId');
    }
}
