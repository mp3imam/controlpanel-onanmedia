<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpdeskFAQModel extends Model
{
    use HasFactory;

    protected $connection = 'pgsql2';
    protected $table = 'Faq';
    protected $guarded = ['id'];
    public $timestamps = false;
    public $incrementing = false;
    public $keyType = 'string';

    public function detail()
    {
        return $this->hasOne(HelpdeskFAQDetailModel::class, 'faqId', 'id');
    }

    public function details()
    {
        return $this->hasMany(HelpdeskFAQDetailModel::class, 'faqId', 'id');
    }
}