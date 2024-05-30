<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalUmumDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function details()
    {
        return $this->belongsTo(MasterJurnal::class, 'id', 'jurnal_umum_id');
    }

    public function jurnal_banks()
    {
        return $this->hasOne(BankModel::class, 'id', 'account_id');
    }

    public function coa_jurnal()
    {
        return $this->hasOne(MasterCoaModel::class, 'id', 'account_id');
    }

    public function jurnal_banks_public()
    {
        return $this->hasOne(BankUserPublicModel::class, 'id', 'account_id');
    }
}