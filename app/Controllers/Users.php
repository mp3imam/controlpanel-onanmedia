<?php

namespace App\Controllers;

use App\Models\Mmaster;
use App\Models\Mrole;
use App\Models\Muser; // Utk Models Silahakan bikin masing2 per modul ya

class Users extends BaseController
{
	protected $muser;
	private $viewDir = 'users/';
	protected $post;
	public function __construct()
	{
		$this->model = new Muser();
		$this->masterModel = new Mmaster();
		$this->request = \Config\Services::request();
		$this->post = $this->request->getPost(NULL);
	}

	public function index()
	{
		$data = [
			'userAll' => $this->model->findAll(),
			'module' => $this->viewDir . 'usersV',
			'pageHeader' => [
				'title' => 'Users',
				'breadcums' => ['Home', 'Users'],
			]
		];
		return view('main-backend', $data);
	}

	public function detail()
	{
		$userId = $this->get['id'];
		$userId = myDecrypt($userId);
		$user = $this->model->find($userId);
		if ($user['MarketId'] != '') {
			$user['market'] = $this->masterModel->getPasar(['pasar_id' => $user['MarketId']])->getRowArray();
		}
		$data = [
			'module' => $this->viewDir . 'detailV',
			'user' => $user,
			'isReadOnly' => true,
			'pageHeader' => [
				'title' => 'Users',
				'breadcums' => ['Home', 'Users', 'Detail'],
			]
		];

		return view('main-backend', $data);
	}

	public function create()
	{
		$roleModel = new Mrole();
		$data = [
			'pasars' => $this->masterModel->getPasar()->getResultArray(),
			'module' => $this->viewDir . 'formV',
			'roles' => $roleModel->find(),
			'isNew' => true,
			'pageHeader' => [
				'title' => 'Users',
				'breadcums' => ['Home', 'Users', 'Add User'],
			]
		];
		return view('main-backend', $data);
	}

	public function update()
	{
		$userId = myDecrypt($this->get['id']);
		$roleModel = new Mrole();
		$user = $this->model->find($userId);
		$data = [
			'module' => $this->viewDir . 'formV',
			'pasars' => $this->masterModel->getPasar()->getResultArray(),
			'roles' => $roleModel->find(),
			'user' => $user,
			'isNew' => false,
			'pageHeader' => [
				'title' => 'Users',
				'breadcums' => ['Home', 'Users', 'Edit User'],
			]
		];
		return view('main-backend', $data);
	}



	public function simpan()
	{
		$post = $this->post;
		$this->model->transStart();
		$res = $this->model->save($post);
		$this->model->transComplete();
		if ($res === false) {
			$err = $this->model->errors();
		}
		return redirect()->to('users');
	}

	public function delete()
	{
		$userId = myDecrypt($this->get['id']);
		$res = $this->model->delete($userId);
		return redirect()->to('users');
	}
}
