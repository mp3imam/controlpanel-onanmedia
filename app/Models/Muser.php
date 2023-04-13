<?php

namespace App\Models;

use CodeIgniter\Model;

class Muser extends Model
{
	protected $DBGroup          = 'default';
	protected $table            = 'Siswas_Users';
	protected $primaryKey       = 'UserId';
	protected $useAutoIncrement = false;
	protected $insertID         = 0;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	// protected $protectFields    = true;
	protected $allowedFields    = ['UserName', 'FullName', 'Email', 'PhoneNumber', 'Roles', 'Password2', 'IsActive', 'LastLoginDate', 'MarketId'];
	protected $useTimestamps = true;
	protected $createdField  = 'CreateDate';
	protected $updatedField  = 'Modified';

	// Validation
	protected $validationRules      = [
		'UserName' => 'required',
		'FullName' => 'required',
		'Email' => 'required|valid_email',
		'PhoneNumber' => 'required',
		'Roles' => 'required',
		'Password2' => 'required',
	];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks = true;
	protected $beforeInsert   = ['hashPassword'];
	protected $afterInsert    = [];
	protected $beforeUpdate   = ['hashPassword'];
	protected $afterUpdate    = [];
	protected $beforeFind     = [];
	protected $afterFind      = [];
	protected $beforeDelete   = [];
	protected $afterDelete    = [];

	protected function hashPassword(array $data)
	{
		$isNew = isset($data['id']) ? false : true;
		if (!isset($data['data']['Password2'])) {
			return $data;
		}

		if (!isset($data['data']['UserId'])) {
			$data['data']['UserId'] = uniqid();
		}

		if (isset($data['data']['Roles'])) {
			$data['data']['Roles'] = implode(',', $data['data']['Roles']);
		}

		$doHash = true;
		if (!$isNew) {
			if ($data['data']['Password2'] == 'tidak berubah') {
				$doHash = false;
				unset($data['data']['Password2']);
			}
		}

		if ($doHash)  $data['data']['Password2'] = password_hash($data['data']['Password2'], PASSWORD_DEFAULT);

		$data['data']['IsApproved'] = 1;
		// echo '<pre>';
		// print_r($data);
		// exit;
		return $data;
	}

	public function setLastLogin($userId)
	{
		$this->update($userId, ['LastLoginDate' => date('Y-m-d H:i:s')]);
	}
}
