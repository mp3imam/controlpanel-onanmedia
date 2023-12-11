<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPendidikanModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'UserEdukasi';

    public $incrementing = false;
    protected $keyType = 'string';
}
