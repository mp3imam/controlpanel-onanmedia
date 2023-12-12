<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'Account';
    protected $guarded = ['id'];
    public $timestamps = false;
}
