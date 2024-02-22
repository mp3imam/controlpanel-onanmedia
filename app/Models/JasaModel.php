<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaModel extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'Jasa';
    protected $guarded = ['id'];
    public $timestamps = false;
    public $incrementing = false;
    public $keyType = 'string';

    protected $casts = [
        'id' => 'string',
    ];

    public function jasas()
    {
        return $this->hasOne(HelpdeskModel::class, 'jasaId','id');
    }

    public function productJasa()
    {
        return $this->hasOne(DaftarPricingModel::class, 'jasaId','id');
    }

    public function user()
    {
        return $this->hasOne(UserPublicModel::class, 'id','userId');
    }

    public function kategori()
    {
        return $this->hasOne(KategoriModel::class, 'id','msKategoriId');
    }

    public function subKategori()
    {
        return $this->hasOne(SubKategoriModel::class, 'id','msSubkategoriId');
    }

    public function status()
    {
        return $this->hasOne(MsStatusJasaModel::class, 'id','msStatusJasaId');
    }

    public function productDoc()
    {
        return $this->hasMany(JasaDocModel::class, 'jasaId','id');
    }

    public function productPricing()
    {
        return $this->hasMany(JasaPricingModel::class, 'jasaId','id');
    }
}
