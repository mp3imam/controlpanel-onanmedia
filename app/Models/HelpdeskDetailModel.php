<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpdeskDetailModel extends Model
{
    use HasFactory;
    protected $table = 'helpdesk_detail';
    protected $guarded = ['id'];
}
