<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarTenderModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'Tender';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $casts = [
        'id' => 'string',
    ];

    public function user()
    {
        return $this->hasOne(UserPublicModel::class, 'id', 'userId');
    }

    public function status()
    {
        return $this->hasOne(StatusTenderModel::class, 'id', 'msStatusTenderId');
    }

    public function level_tender()
    {
        return $this->hasOne(MsMerchantLevelModel::class, 'id', 'msMerchantLevelId');
    }
}
