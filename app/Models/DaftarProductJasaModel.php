<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarProductJasaModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'Jasa';
    public $incrementing = false;
    protected $keyType = 'string';
}
