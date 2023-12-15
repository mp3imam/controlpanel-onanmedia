<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpdeskModel extends Model
{
    use HasFactory;
    protected $table = 'helpdesks';
    protected $guarded = ['id'];
}
