<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipePajakModel extends Model
{
    use HasFactory;
    protected $table ='tipe_pajak';
    protected $guarded = ['id'];
}
