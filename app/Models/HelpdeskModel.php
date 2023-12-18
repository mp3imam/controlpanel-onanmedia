<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpdeskModel extends Model
{
    use HasFactory;
    protected $table = 'helpdesks';
    protected $guarded = ['id'];

    public function jasas()
    {
        return $this->belongsTo(JasaModel::class, 'id');
    }

    public function keluhan_user()
    {
        return $this->belongsTo(UserPublicModel::class, 'user_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(HelpdeskStatusModel::class, 'status_helpdesk', 'id');
    }
}
