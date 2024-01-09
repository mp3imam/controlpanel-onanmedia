<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'Order';
    public $incrementing = false;
    protected $keyType = 'string';

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function penjual(){
        return $this->belongsTo(UserPublicModel::class, 'userIdPembeli', 'id');
    }

    public function pembeli(){
        return $this->belongsTo(UserPublicModel::class, 'userIdPembeli', 'id');
    }

    public function HelpDesk(){
        return $this->hasOne(HelpdeskModel::class, 'orderId', 'id');
    }

    public function orderJasa(){
        return $this->hasOne(OrderJasaModel::class, 'orderId', 'id');
    }
}
