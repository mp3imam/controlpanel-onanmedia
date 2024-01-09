<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpdeskFileDetailModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'HelpDeskChatFile';
    protected $guarded = ['id'];
    public $incrementing = false;
    protected $keyType = 'string';

    public function file()
    {
        return $this->belongsTo(HelpdeskDetailModel::class, 'id');
    }

}
