<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $table = "ms_bank";
    protected $guarded = ['id'];

    public function banks(){
        return $this->belongsTo(MasterBankCashModel::class, 'bank_id');
    }

    public function jurnal_banks(){
        return $this->belongsTo(MasterJurnal::class, 'id');
    }

    public function banks_belanja(){
        return $this->belongsTo(MasterKasBelanja::class, 'id');
    }

}
