<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiKasFileModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $connection = 'pgsql';
    protected $table = 'transaksi_kas_file';
    protected $guarded = ['id'];

    public function file()
    {
        return $this->belongsTo(MasterBankCashModel::class, 'id');
    }

}
