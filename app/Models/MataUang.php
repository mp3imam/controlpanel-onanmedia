<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataUang extends Model
{
    use HasFactory;
    protected $connection = "pgsql";
    protected $table = "mata_uangs";
}
