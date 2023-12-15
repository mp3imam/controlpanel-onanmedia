<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpdeskFileDetailModel extends Model
{
    use HasFactory;
    protected $table = 'helpdesk_file_details';
    protected $guarded = ['id'];

}
