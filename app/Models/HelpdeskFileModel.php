<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpdeskFileModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'HelpDeskChatFileContent';
    protected $guarded = ['id'];
    public $incrementing = false;
    protected $keyType = 'string';

    public function file()
    {
        return $this->belongsTo(HelpdeskModel::class, 'id');
    }

}
