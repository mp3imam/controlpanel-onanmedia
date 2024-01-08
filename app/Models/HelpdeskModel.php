<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpdeskModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'HelpDesk';
    protected $guarded = ['id'];

    public function jasas()
    {
        return $this->belongsTo(JasaModel::class, 'jasaId');
    }

    public function orders()
    {
        return $this->belongsTo(OrderModel::class, 'jasaId');
    }

    public function keluhan_user()
    {
        return $this->belongsTo(UserPublicModel::class, 'userId');
    }

    public function adminOnan()
    {
        return $this->belongsTo(UserPublicModel::class, 'adminId');
    }

    public function statuses()
    {
        return $this->belongsTo(HelpdeskStatusModel::class, 'helpdeskStatusId', 'id');
    }
}
