<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'Jasa';
    protected $guarded = ['id'];
    public $timestamps = false;
    public $incrementing = false;
    public $keyType = 'string';

    protected $casts = [
        'id' => 'string',
    ];

    public function jasas()
    {
        return $this->hasOne(HelpdeskModel::class, 'jasaId','id');
    }

}
