<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryFileUploadHelpdesk extends Model
{
    use HasFactory;

    protected $table = 'temp_upload';
    protected $guarded = ['id'];

}
