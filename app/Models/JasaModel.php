<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'Jasa';

    public $incrementing = false;
    public $keyType = 'string';

    protected $casts = [
        'id' => 'string',
    ];

    public function jasas()
    {
        return $this->hasOne(HelpdeskModel::class, 'jasa_id');
    }

}
