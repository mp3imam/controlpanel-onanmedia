<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpdeskStatusModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'MsHelpDeskStatus';
    protected $guarded = ['id'];

    public function statuses()
    {
        return $this->hasOne(HelpdeskModel::class, 'id');
    }
}
