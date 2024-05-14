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
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function jasas()
    {
        return $this->belongsTo(JasaModel::class, 'jasaId');
    }

    public function user_public()
    {
        return $this->belongsTo(UserPublicModel::class, 'userId');
    }

    public function detail()
    {
        return $this->hasMany(HelpdeskDetailModel::class, 'helpdeskId');
    }

    public function file()
    {
        return $this->hasMany(HelpdeskFileModel::class, 'helpDeskId');
    }

    public function order()
    {
        return $this->belongsTo(OrderModel::class, 'orderId');
    }

    public function orderJasa()
    {
        return $this->belongsTo(OrderJasaModel::class, 'orderId');
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