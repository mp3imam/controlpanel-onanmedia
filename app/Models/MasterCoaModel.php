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

    public static function getMaxIdRecord()
    {
        return self::select('*')
        ->orderBy(DB::raw('CAST(id AS INTEGER)'), 'DESC')
        ->limit(1)
        ->get();
    }
}