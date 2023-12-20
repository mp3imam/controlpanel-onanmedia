<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPublicModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'User';

    public $incrementing = false;
    protected $guarded = ['id'];
    public $timestamps = false;
    public $keyType = 'string';

    protected $casts = [
        'id' => 'string',
    ];


    public function keluhan_user()
    {
        return $this->hasOne(HelpdeskModel::class, 'user_id', 'id');
    }

    public function users_bank_cash(){
        return $this->belongsTo(MasterBankCashModel::class, 'id');
    }

}
