<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpdeskDetailModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'HelpDeskChat';
    protected $guarded = ['id'];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function detail()
    {
        return $this->belongsTo(HelpdeskModel::class, 'id');
    }

    public function file_details()
    {
        return $this->hasMany(HelpdeskFileDetailModel::class, 'helpdeskChatId','id');
    }

    public function userPublic()
    {
        return $this->belongsTo(UserPublicModel::class, 'userId');
    }

}
