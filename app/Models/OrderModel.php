<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'Order';

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
