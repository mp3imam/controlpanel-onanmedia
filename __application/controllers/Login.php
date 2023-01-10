<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('encryption', 'lib'));
		$this->load->model('mbackend');
	}

	public function index()
	{
		$this->nsmarty->assign("main_css", $this->lib->assetsmanager('css', 'login'));
		$this->nsmarty->display('backend/main-login.html');
	}

	// function loginnya()
	// {
	// 	$user = $this->db->escape_str($this->input->post('user', true));
	// 	$pass = $this->db->escape_str($this->input->post('pwd', true));

	// 	$error = false;
	// 	if ($user && $pass) {
	// 		$curl = curl_init();

	// 		$postnya = array(
	// 			'username' => $user,
	// 			'password' => $pass,
	// 		);

	// 		curl_setopt_array($curl, array(
	// 			// CURLOPT_URL => 'http://210.247.248.70/bjs-digital-backend/login',
	// 			CURLOPT_URL => 'http://localhost:50/controlpanel-onanmedia/index.php/login/testing',
	// 			CURLOPT_RETURNTRANSFER => true,
	// 			CURLOPT_ENCODING => '',
	// 			CURLOPT_MAXREDIRS => 10,
	// 			CURLOPT_TIMEOUT => 0,
	// 			CURLOPT_FOLLOWLOCATION => true,
	// 			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	// 			CURLOPT_CUSTOMREQUEST => 'POST',
	// 			CURLOPT_POSTFIELDS => json_encode($postnya),
	// 			CURLOPT_HTTPHEADER => array(
	// 				'Authorization: Bearer YmpzYXBwczE6RTUjeHdBd2F2dnhVeEh2SFdua1hHayV0WmlBbUx4a14jJlY1WjVCR2lRTFJRQTQmXnI=',
	// 				'Content-Type: application/json'
	// 			),
	// 		));

	// 		$response = curl_exec($curl);

	// 		curl_close($curl);

	// 		$cekuser = json_decode($response, true);

	// 		if (isset($cekuser['errors'])) {
	// 			$error = true;
	// 			$this->session->set_flashdata('error', 'User / Password Salah');
	// 		} else {

	// 			if (isset($cekuser['data'])) {

	// 				$klien = $this->db->get_where('panel.tbl_user', array('id' => $cekuser['data']['id']))->row_array();
	// 				if ($klien) {
	// 					$this->session->set_userdata('bj5d1g1t4l', base64_encode(serialize($klien)));
	// 				} else {
	// 					$error = true;
	// 					$this->session->set_flashdata('error', 'Data Klien Tidak Ditemukan');
	// 				}
	// 			} else {
	// 				$error = true;
	// 				$this->session->set_flashdata('error', 'Data Anda Tidak Ditemukan');
	// 			}
	// 		}
	// 	} else {
	// 		$error = true;
	// 		$this->session->set_flashdata('error', 'Isi User Dan Password');
	// 	}

	// 	header("Location: " . $this->host . "xboxend");
	// 	// echo json_encode($cekuser);
	// }

	function loginnya()
	{
		$user = $this->db->escape_str($this->input->post('user', true));
		$pass = $this->db->escape_str($this->input->post('pwd', true));

		$error = false;

		$password = $this->get_password($user);
		if ($user && $pass) {
			if (password_verify($pass, $password['password'])) {
				$this->session->set_userdata('bj5d1g1t4l', base64_encode(serialize($password)));
			} else {
				$error = true;
				$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
			}
			// $curl = curl_init();

			// $postnya = array(
			// 	'username' => $user,
			// 	'password' => $pass,
			// );

			// curl_setopt_array($curl, array(
			// 	// CURLOPT_URL => 'http://210.247.248.70/bjs-digital-backend/login',
			// 	CURLOPT_URL => 'http://localhost:50/controlpanel-onanmedia/index.php/login/testing',
			// 	CURLOPT_RETURNTRANSFER => true,
			// 	CURLOPT_ENCODING => '',
			// 	CURLOPT_MAXREDIRS => 10,
			// 	CURLOPT_TIMEOUT => 0,
			// 	CURLOPT_FOLLOWLOCATION => true,
			// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			// 	CURLOPT_CUSTOMREQUEST => 'POST',
			// 	CURLOPT_POSTFIELDS => json_encode($postnya),
			// 	CURLOPT_HTTPHEADER => array(
			// 		'Authorization: Bearer YmpzYXBwczE6RTUjeHdBd2F2dnhVeEh2SFdua1hHayV0WmlBbUx4a14jJlY1WjVCR2lRTFJRQTQmXnI=',
			// 		'Content-Type: application/json'
			// 	),
			// ));

			// $response = curl_exec($curl);

			// curl_close($curl);

			// $cekuser = json_decode($response, true);

			// if (isset($cekuser['errors'])) {
			// 	$error = true;
			// 	$this->session->set_flashdata('error', 'User / Password Salah');
			// } else {

			// 	if (isset($cekuser['data'])) {

			// 		$klien = $this->db->get_where('panel.tbl_user', array('id' => $cekuser['data']['id']))->row_array();
			// 		if ($klien) {
			// 			$this->session->set_userdata('bj5d1g1t4l', base64_encode(serialize($klien)));
			// 		} else {
			// 			$error = true;
			// 			$this->session->set_flashdata('error', 'Data Klien Tidak Ditemukan');
			// 		}
			// 	} else {
			// 		$error = true;
			// 		$this->session->set_flashdata('error', 'Data Anda Tidak Ditemukan');
			// 	}
			// }
		} else {
			$error = true;
			$this->session->set_flashdata('error', 'Isi User Dan Password');
		}

		header("Location: " . $this->host . "xboxend");
	}

	function logoutnya()
	{
		$this->session->unset_userdata('bj5d1g1t4l', 'limit');
		$this->session->sess_destroy();
		header("Location: " . $this->host . "xboxend");
	}

	function loginsso()
	{
		$user = $this->db->escape_str($this->input->post('usersso'));
		$pass = $this->db->escape_str($this->input->post('pwdsso'));

		$error = false;
		if ($user && $pass) {
			$cek_user = $this->mbackend->getdata('data_login_sso', 'row_array', $user);

			if (count($cek_user) > 0) {
				if ($pass == $this->encryption->decrypt($cek_user['password'])) {
					$this->session->set_userdata('hikpsso_fr0nt3nd', base64_encode(serialize($cek_user)));
				} else {
					$error = true;
					$this->session->set_flashdata('error', 'Password Tidak Benar');
				}
			} else {
				$this->session->set_flashdata('error', 'User Tidak Terdaftar');
			}
		} else {
			$error = true;
			$this->session->set_flashdata('error', 'Isi User Dan Password');
		}

		header("Location: " . $this->host . "ssofrontend");
	}
	function logoutsso()
	{
		$this->session->unset_userdata('hikpsso_fr0nt3nd', 'limit');
		//$this->session->sess_destroy();
		header("Location: " . $this->host . "ssofrontend");
	}


	function test2()
	{
		$this->auth = unserialize(base64_decode($this->session->userdata('hikpsso_b4ckend')));

		echo "<pre>";
		print_r($this->auth);
		exit;
	}

	function passwordnya()
	{
		//error_reporting(0);
		$this->load->library('enkripsi');

		$str = "12345";
		$enkrip = $this->enkripsi->paramEncrypt($str);
		$balikin = $this->enkripsi->paramDecrypt($enkrip);
		echo $enkrip . "<br>" . $balikin;
		//echo "<br/>".$this->encryption->decrypt($this->encryption->encrypt($str));

		//echo password_hash($str, PASSWORD_BCRYPT);
	}

	function testing()
	{
		// $user = $this->db->escape_str($this->input->post('user', true));
		// $pass = $this->db->escape_str($this->input->post('pwd', true));

		// $user = $this->input->post('user', true);
		// $pass = $this->input->post('pwd', true);

		$data = array(
			'data' => array(
				'id' => '88',
				'nama' => 'admin'
			),
			'test' => 'ini tes 1',
			'test 2' => 'ini tes 2',
			// 'user' => $user,
			// 'pwd' => $pass
		);

		echo json_encode($data);
	}

	function register_app()
	{
		$user = $this->input->post('user', true);
		$pass = $this->input->post('pwd', true);

		echo password_hash($pass, PASSWORD_DEFAULT);
	}

	function get_password($username)
	{
		$data = $this->db->get_where('panel.tbl_user', ['username' => $username])->row_array();
		return $data;
	}
}
