<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPublicModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'User';

    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = ['id'];
    public $timestamps = false;

}
