<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKeahlianModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'UserKeahlian';

    public $incrementing = false;
    protected $keyType = 'string';
}
