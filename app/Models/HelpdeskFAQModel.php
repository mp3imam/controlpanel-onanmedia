<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HelpdeskFAQModel extends Model
{
    use HasFactory;

    protected $connection = 'pgsql2';
    protected $table = 'faq';
    protected $guarded = ['id'];

    public function detail()
    {
        return $this->hasOne(HelpdeskFAQDetailModel::class, 'faq_id');
    }

    public function details()
    {
        return $this->hasMany(HelpdeskFAQDetailModel::class, 'faq_id');
    }
}