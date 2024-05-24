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
        return $this->hasOne(HelpdeskModel::class, 'userId', 'id');
    }

    public function adminOnan()
    {
        return $this->hasOne(HelpdeskModel::class, 'adminId', 'id');
    }

    public function users_bank_cash()
    {
        return $this->belongsTo(MasterBankCashModel::class, 'id');
    }

    public function users_chat()
    {
        return $this->hasOne(HelpdeskDetailModel::class, 'id', 'userId');
    }

    public function user_public()
    {
        return $this->hasOne(HelpdeskModel::class, 'userId', 'id');
    }

    public function jasa()
    {
        return $this->belongsTo(JasaModel::class, 'userId', 'id');
    }

    public function tender()
    {
        return $this->belongsTo(DaftarTenderModel::class, 'userId', 'id');
    }

    public function rekening()
    {
        return $this->hasMany(UserRekeningModel::class, 'userId');
    }

    public function scopePenjualRekening($q)
    {
        return $q->whereHas('rekening', function ($q) {
            $q->where(function ($q) {
                $q->where('isMain', 1)
                    ->orWhere('isMain', 0);
            });
        });
    }
}
