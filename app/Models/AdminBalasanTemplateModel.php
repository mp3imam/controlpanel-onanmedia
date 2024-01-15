<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBalasanTemplateModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'AdminPengaturanTemplateBalasan';
    protected $guarded = ['id'];
    public $timestamps = false;
    public $incrementing = false;
    public $keyType = 'string';
}
