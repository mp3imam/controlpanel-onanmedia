<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPricingModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'JasaPricing';
    public $incrementing = false;
    protected $keyType = 'string';

    public function jasas()
    {
        return $this->belongsTo(JasaModel::class, 'jasaId');
    }
}
