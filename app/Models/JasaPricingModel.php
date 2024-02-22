<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaPricingModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'JasaPricing';
    protected $guarded = ['id'];
    public $timestamps = false;
    public $incrementing = false;
    public $keyType = 'string';

    public function jasas()
    {
        return $this->belongsTo(JasaModel::class, 'jasaId');
    }

}
