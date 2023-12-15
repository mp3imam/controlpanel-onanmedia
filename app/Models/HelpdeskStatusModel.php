<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpdeskStatusModel extends Model
{
    use HasFactory;
    protected $table = 'helpdesk_statuses';
    protected $guarded = ['id'];

}
