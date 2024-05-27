<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderJasaModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'OrderJasa';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function helpDesk()
    {
        return $this->hasOne(HelpdeskModel::class, 'orderId');
    }

    public function order()
    {
        return $this->hasOne(OrderModel::class, 'id', 'orderId');
    }

    public function jasa()
    {
        return $this->hasOne(JasaModel::class, 'jasaId');
    }
}
