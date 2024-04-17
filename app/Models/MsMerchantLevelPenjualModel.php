<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsMerchantLevelPenjualModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'MsMerchantLevelPenjual';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name'
    ];

    public function tender()
    {
        return $this->belongsTo(DaftarTenderModel::class);
    }
}