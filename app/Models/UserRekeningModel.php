<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRekeningModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'UserRekening';
    public $incrementing = false;
    protected $keyType = 'string';
}
