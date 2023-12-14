<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PagesRoleModel extends Model
{
    use HasFactory;
    protected $table = 'role_has_permissions';
    protected $guarded = ['role_id'];
    public $timestamps = false;

    public function pages()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function rolePage()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }

}
