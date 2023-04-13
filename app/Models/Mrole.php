<?php

namespace App\Models;

use CodeIgniter\Model;

class Mrole extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Siswas_Roles';
    protected $primaryKey       = 'RoleId';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['RoleId', 'RoleName', 'Description'];

    // Validation
    protected $validationRules      = ['RoleId' => 'required', 'RoleName' => 'required', 'Description' => 'required'];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    function generateRoleId($data)
    {
        $data[$this->primaryKey] = uniqid();
        return  $data;
    }

    // function updateData($data)
    // {
    //     return $this->db->table($this->table)->update($data, [$this->pKey => $data[$this->pKey]]);
    // }

    // function createData($data)
    // {
    //     return $this->db->table($this->table)->insert($data);
    // }
}
