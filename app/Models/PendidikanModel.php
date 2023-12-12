<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'MsTingkatEdukasi';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function scopeActive($q){
        $q->where('MsTingkatEdukasi.status', 1);
    }

}
