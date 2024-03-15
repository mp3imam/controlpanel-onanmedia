<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterCoaModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $table = 'cl_coa';
    protected $guarded = ['id'];
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    public function relasi_kdrek1(){
        return $this->belongsTo(MasterCoaModel::class, 'kdrek1','kdrek1')->whereType('H');
    }

    public function relasi_kdrek2() {
        return $this->hasOne(MasterCoaModel::class, 'kdrek2','kdrek2')->where('type', 'S');
    }

    public function relasi_kdrek3() {
        return $this->hasOne(MasterCoaModel::class, 'kdrek3','kdrek3')->where('type', 'C');
    }

    public static function getMaxIdRecord()
    {
        return self::select('*')
        ->orderBy(DB::raw('CAST(id AS INTEGER)'), 'DESC')
        ->limit(1)
        ->get();
    }

    public function coa_belanja(){
        return $this->belongsTo(MasterBankCashModel::class, 'bank_id');
    }

    public function coa_kas_saldo(){
        return $this->belongsTo(MasterBankCashModel::class);
    }

    public function coa_kas_kembali(){
        return $this->belongsTo(MasterReturnBankCashModel::class);
    }

    public function coa_jurnal_umum(){
        return $this->belongsTo(MasterJurnal::class, 'bank_id');
    }

    public function coa_jurnal(){
        return $this->belongsTo(JurnalUmumDetail::class, 'account_id');
    }

}
