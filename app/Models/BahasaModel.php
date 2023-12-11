<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahasaModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'MsBahasa';
    protected $guarded = ['id'];
    public $timestamps = false;
}
