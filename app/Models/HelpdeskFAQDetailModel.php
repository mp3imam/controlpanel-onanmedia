<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpdeskFAQDetailModel extends Model
{
    use HasFactory;

    protected $connection = 'pgsql2';
    protected $table = 'FaqDetail';
    protected $guarded = ['id'];
    public $timestamps = false;
    public $incrementing = false;
    public $keyType = 'string';

    public function faq()
    {
        return $this->belongsTo(HelpdeskFAQModel::class, 'faqId');
    }
}