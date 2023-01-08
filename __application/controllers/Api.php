<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api extends  JINGGA_Controller
{
	protected $post;
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('jwt_lib'));
	}

	function login()
	{
		$username = $this->getPost('username');
		$password = $this->getPost('password');
		$jukir = $this->db->get_where('tbl_juru_parkir', ['username' => $username])->row_array();

		$success = true;
		$msg = 'ok';
		if (!$jukir) {
			$success = false;
			$msg = 'Username / Password salah!';
			return $this->response(['success' => $success, 'msg' => $msg]);
		}

		// if ($password == $this->encryption->decrypt($jukir['password'])) {
		if ($password == $this->encryption->decrypt($jukir['password'])) {
			$success = false;
			$msg = 'Username / Password salah!';
			return $this->response(['success' => $success, 'msg' => $msg]);
		}

		$payload = [
			'nama' => $jukir['nama'],
			'id' => $jukir['id']
		];
		$token = $this->jwt_lib->createToken($payload);
		return $this->response(['token' => $token]);
	}

	function defaultPass()
	{
		$pass = 'simponi123';
		$hash = myHash($pass);
		return $this->response($hash);
	}

	function get()
	{
		$sql = "SELECT * ";
	}

	function cek_nopol()
	{
		$kode_depan = $this->getPost('kode_depan');
		$kode_tengah = $this->getPost('kode_tengah');
		$kode_belakang = $this->getPost('kode_belakang');

		$filter = ['kode_depan' => $kode_depan, 'kode_tengah' => $kode_tengah, 'kode_belakang' => $kode_belakang];

		$msKendaraan =  $this->db->get_where('tbl_data_kendaraan', $filter)->row_array();

		if (!empty($msKendaraan)) {
			$nextAct = 'checkin';
			$lastParkir = $this->db
				->where('tbl_data_kendaraan_id', $msKendaraan['id'])
				->where('tgl_parkir_keluar', NULL)
				->get('tbl_transaksi_parkir', 1)->row_array();

			if ($lastParkir) $nextAct = 'checkout';
			$msKendaraan['nextAct'] = $nextAct;
			$msKendaraan['parkir_id'] = $lastParkir['id'] ?? '';
			$msKendaraan['tgl_masuk'] = $lastParkir['tgl_parkir_masuk'] ?? '';
			$msKendaraan['tgl_keluar'] = $lastParkir['tgl_parkir_keluar'] ?? '';
		}

		// $msKendaraan['parkir'] = $lastParkir;
		return $this->response($msKendaraan);
	}

	function parkir()
	{
		$kode_depan = $this->getPost('kode_depan');
		$kode_tengah = $this->getPost('kode_tengah');
		$kode_belakang = $this->getPost('kode_belakang');
		$isExists = $this->getPost('isExists');
		$idKendaraan = $this->getPost('idKendaraan');
		$jukir = $this->getPost('jukir');
		$idParkir = $this->getPost('idParkir');
		$act = $this->getPost('act');
		$masterOk = true;

		$this->db->trans_start();
		if ($act == 'checkin') {
			if ($isExists == 0) {
				$master = [
					'kode_depan' => $kode_depan,
					'kode_tengah' => $kode_tengah,
					'kode_belakang' => $kode_belakang,
					'nama' => '',
					'nama_stnk_bpkb' => '',
					'is_berlangganan' => 0,
					'jns_kendaraan' => '',
					'create_by' => 'Mobile App'
				];
				$masterOk = $this->addMasterKendaraan($master);
			}
			if ($masterOk) {
				$transaksi = [
					'tbl_data_kendaraan_id' => $idKendaraan,
					// 'tbl_titik_parkir_id' => '',
					'tbl_juru_parkir_id' => $jukir,
					'tgl_parkir_masuk' => date('Y-m-d H:i:s'),
					'create_date' => date('Y-m-d H:i:s'),
					'create_by' => 'Mobile App'
				];
				$this->checkinParkir($transaksi);
			}
		}


		if ($act == 'checkout') {
			$this->checkoutParkir($idParkir);
		}

		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return $this->response(['code' => 0, 'errors' => 'Gagal'], 400);
		} else {
			$this->db->trans_commit();
			return $this->response(['success' => true, 'msg' => 'ok']);
		}
	}

	function addMasterKendaraan($data)
	{
		return $this->db->insert('tbl_data_kendaraan', $data);
	}

	function checkinParkir($data)
	{
		return $this->db->insert('tbl_transaksi_parkir', $data);
	}

	function checkoutParkir($idParkir)
	{
		return $this->db->update('tbl_transaksi_parkir', [
			'tgl_parkir_keluar' => date('Y-m-d H:i:s'),
			'update_date' => date('Y-m-d H:i:s'),
			'update_by' => 'Mobile App'
		], ['id' => $idParkir]);
	}
}
