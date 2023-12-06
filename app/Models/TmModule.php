<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmModule extends Model
{
    use HasFactory;
    protected $table = 'tm_module';
    protected $guarded = ['id'];
    protected $primaryKey = 'module_id';
}
