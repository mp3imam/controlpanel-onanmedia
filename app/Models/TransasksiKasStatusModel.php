<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransasksiKasStatusModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $table = 'ms_transasksi_kas_status';
    protected $guarded = ['id'];

    public function status()
    {
        return $this->belongsTo(MasterBankCashModel::class, 'id');
    }
}
