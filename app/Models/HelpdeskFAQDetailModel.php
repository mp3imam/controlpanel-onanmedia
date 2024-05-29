<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HelpdeskFAQDetailModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'pgsql2';
    protected $table = 'faq_detail';
    protected $guarded = ['id'];

    public function faq()
    {
        return $this->belongsTo(HelpdeskFAQModel::class);
    }
}