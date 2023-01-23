<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
//
class Muser extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->auth = unserialize(base64_decode($this->session->userdata('bj5d1g1t4l')));
	}

	function getdata($type = "", $balikan = "", $p1 = "", $p2 = "", $p3 = "", $p4 = "")
	{
		$array = array();
		$where  = " WHERE 1=1 ";
		$where2 = "";

		$cabang = $this->input->post('kantor_cabang');
		$key = $this->input->post('key');
		$kat = $this->input->post('kat');
		$array_pass = array(
			'no_transaksi',
			'no_dokumen',
			'no_cif',
			'nama_nasabah',
			'no_rekening',
		);

		if ($key != "" && $kat != "" && !in_array($kat, $array_pass)) {
			$where .= " AND LOWER(" . $kat . ") like '%" . strtolower(trim($key)) . "%' ";
		}

		switch ($type) {

			case "penjual":
				$sql = "
					SELECT a.*, to_char(a.created_at::timestamp with time zone, 'DD-MM-YYYY HH:MM'::text) AS tgl_daftar,
						ROW_NUMBER() OVER (ORDER BY a.user_id DESC) as rowID
					FROM public.user a
					WHERE a.tipe = '1'
				";
				break;
			case "pembeli":
				$sql = "
					SELECT a.*, to_char(a.created_at::timestamp with time zone, 'DD-MM-YYYY HH:MM'::text) AS tgl_daftar,
						ROW_NUMBER() OVER (ORDER BY a.user_id DESC) as rowID
					FROM public.user a
					WHERE a.tipe = '1'
					";
				break;
			case "detail_penjual":
				$sql = "
					SELECT a.*, ROW_NUMBER() OVER (ORDER BY a.user_id DESC) as rowID
					FROM public.user a
					WHERE a.user_id = '$p1'
					";
				break;
			case "skill_penjual":
				$user_id = $this->input->post('user_id');
				$sql = "
					SELECT a.*, ROW_NUMBER() OVER (ORDER BY a.user_id DESC) as rowID
					FROM public.user_skill a
					WHERE a.user_id = '$user_id'
					";
				break;
			case "sertifikat_penjual":
				$user_id = $this->input->post('user_id');
				$sql = "
						SELECT a.*, ROW_NUMBER() OVER (ORDER BY a.user_id DESC) as rowID
						FROM public.user_certification a
						WHERE a.user_id = '$user_id'
						";
				break;
				// End Modul User


			default:
				if ($balikan == 'get') {
					$where .= " AND A.id=" . $this->input->post('id');
				}
				$sql = "
					SELECT ROW_NUMBER() OVER (ORDER BY A.id DESC) as rowID, A.*
					FROM " . $type . " A " . $where . "
				";
				if ($balikan == 'get') return $this->db->query($sql)->row_array();
				break;
		}

		if ($balikan == 'json') {
			return $this->lib->json_grid($sql, $type);
		} elseif ($balikan == 'row_array') {
			return $this->db->query($sql)->row_array();
		} elseif ($balikan == 'result') {
			return $this->db->query($sql)->result();
		} elseif ($balikan == 'result_array') {
			return $this->db->query($sql)->result_array();
		} elseif ($balikan == 'json_encode') {
			//$data = $this->db->query($sql)->result_array(); 
			//header('Content-Type: application/json; charset=utf-8');
			return json_encode($data);
		} elseif ($balikan == 'variable') {
			return $array;
		}
	}

	function get_combo($type = "", $p1 = "", $p2 = "")
	{
		$where = "WHERE 1=1 ";
		switch ($type) {

			case "cl_status":
				$sql = "
					SELECT id, nama_status as txt
					FROM $type 
				";
				break;
			case "cl_kantor_cabang":
				$sql = "
					SELECT a.id_cb as id, a.nama as txt
					FROM $type a
					$where 
				";
				// and ( a.nama_cabang like '%Cabang%' or a.nama_cabang like '%Pusat%' )
				break;
			case "cl_type":
				$sql = "
					SELECT id, nama_type as txt
					FROM cl_type
				";
				break;
			case "cl_user_group":
				$sql = "
					SELECT id, user_group as txt
					FROM cl_user_group
					$where and id <> '4'
				";
				break;

			default:
				$txt = str_replace("cl_", "", $type);
				$sql = "
					SELECT id, $txt as txt
					FROM $type
				";
				break;
		}

		return $this->db->query($sql)->result_array();
	}

	function simpandata($table, $data, $sts_crud)
	{ //$sts_crud --> STATUS NYEE INSERT, UPDATE, DELETE
		$this->db->trans_begin();
		if (isset($data['id'])) {
			$id = $data['id'];
			unset($data['id']);
		}

		if ($sts_crud == "add") {
			$data['create_date'] = date('Y-m-d H:i:s');
			$data['create_by'] = $this->auth['nama_lengkap'];

			unset($data['id']);
		}

		if ($sts_crud == "edit") {
			$data['update_date'] = date('Y-m-d H:i:s');
			$data['update_by'] = $this->auth['nama_lengkap'];
		}

		switch ($table) {

			case "akses_sso":
				if ($sts_crud == "add" || $sts_crud == "edit") {
					$tbl_aplikasi_id = $data['tbl_aplikasi_id'];
					$tbl_aplikasi_grup_id = $data['tbl_aplikasi_grup_id'];

					$data['password'] =  $this->encryption->encrypt($data['password']);

					if (isset($data['tbl_aplikasi_id'])) {
						unset($data['tbl_aplikasi_id']);
					}
					if (isset($data['tbl_aplikasi_grup_id'])) {
						unset($data['tbl_aplikasi_grup_id']);
					}
				}

				if ($sts_crud == "add") {
					$insert = $this->db->insert('tbl_user_sso', $data);
					$id = $this->db->insert_id();

					if ($insert) {
						foreach ($tbl_aplikasi_id as $k => $v) {
							if ($v != "") {
								$arr_detail = array(
									'id' => time() . $k,
									'tbl_user_sso_id' => $id,
									'tbl_aplikasi_id' => $v,
									'tbl_aplikasi_grup_id' => $tbl_aplikasi_grup_id[$v],
								);
								$this->db->insert('tbl_user_sso_role', $arr_detail);
							}
						}
					}
				}

				if ($sts_crud == "edit") {
					$update = $this->db->update('tbl_user_sso', $data, array('id' => $id));

					if ($update) {
						$this->db->delete('tbl_user_sso_role', array('tbl_user_sso_id' => $id));
						foreach ($tbl_aplikasi_id as $k => $v) {
							if ($v != "") {
								$arr_detail = array(
									'id' => time() . $k,
									'tbl_user_sso_id' => $id,
									'tbl_aplikasi_id' => $v,
									'tbl_aplikasi_grup_id' => $tbl_aplikasi_grup_id[$v],
								);
								$this->db->insert('tbl_user_sso_role', $arr_detail);
							}
						}
					}
				}

				if ($sts_crud == "delete") {
					$this->db->delete('tbl_user_sso_role', array('tbl_user_sso_id' => $id));
					$this->db->delete('tbl_user_sso', array('id' => $id));
				}

				$sts_crud = "ablahu";
				break;

			case "user_role_group":
				$id_group = $id;
				$this->db->delete('tbl_user_prev_group', array('cl_user_group_id' => $id_group));
				if (isset($data['data'])) {
					$postdata = $data['data'];
					$row = array();
					foreach ($postdata as $v) {
						$pecah = explode("_", $v);
						$row["buat"] = 0;
						$row["baca"] = 0;
						$row["ubah"] = 0;
						$row["hapus"] = 0;

						switch ($pecah[0]) {
							case "C":
								$row["buat"] = 1;
								break;
							case "R":
								$row["baca"] = 1;
								break;
							case "U":
								$row["ubah"] = 1;
								break;
							case "D":
								$row["hapus"] = 1;
								break;
						}

						$row["tbl_menu_id"] = $pecah[1];
						$row["cl_user_group_id"] = $id_group;

						$cek_data = $this->db->get_where('tbl_user_prev_group', array('tbl_menu_id' => $pecah[1], 'cl_user_group_id' => $id_group))->row_array();
						if (!$cek_data) {
							$row['create_date'] = date('Y-m-d H:i:s');
							$row['create_by'] = $this->auth['nama_lengkap'];

							$this->db->insert('tbl_user_prev_group', $row);
						} else {
							if ($row["buat"] == 0) unset($row["buat"]);
							if ($row["baca"] == 0) unset($row["baca"]);
							if ($row["ubah"] == 0) unset($row["ubah"]);
							if ($row["hapus"] == 0) unset($row["hapus"]);

							$row['update_date'] = date('Y-m-d H:i:s');
							$row['update_by'] = $this->auth['nama_lengkap'];

							$this->db->update('tbl_user_prev_group', $row, array('tbl_menu_id' => $pecah[1], 'cl_user_group_id' => $id_group));
						}
					}
				}
				break;
			case "user_mng":
				$table = "tbl_user";
				if ($sts_crud == 'add' || $sts_crud == 'edit') {
					$data['password'] = $this->encrypt->encode($data['password']);
				}
				break;
			case "user_group":
				$table = "cl_user_group";
				break;
			case "ubah_password":
				$this->load->library("encrypt");

				$table = "tbl_user";
				$password_lama = $this->encrypt->decode($this->auth["password"]);
				if ($data["pwd_lama"] != $password_lama) {
					echo 2;
					exit;
				}

				$data["password"] = $this->encrypt->encode($data["pwd_baru"]);

				unset($data["pwd_lama"]);
				unset($data["pwd_baru"]);
				break;
		}

		switch ($sts_crud) {
			case "add":
				$insert = $this->db->insert($table, $data);
				$id = $this->db->insert_id();

				if ($insert) {
					if ($table == "tbl_foto") {
					}
				}
				break;
			case "edit":
				$update = $this->db->update($table, $data, array('id' => $id));

				if ($update) {
					if ($table == "tbl_foto") {
					}
				}
				break;
			case "delete":
				$this->db->delete($table, array('id' => $id));
				break;
		}

		if ($this->db->trans_status() == false) {
			$this->db->trans_rollback();
			return 'gagal';
		} else {
			return $this->db->trans_commit();
		}
	}

	function ambil_menu_utama()
	{
		$sql = "SELECT * FROM panel.tbl_user_menu WHERE id > 100 AND parent_id IS NULL ORDER BY urutan ASC";
		$lcmenu = $this->db->query($sql)->result();
		$res = $lcmenu;

		return $res;
	}

	function cek_submenu($id)
	{
		$lret = false;

		$sql = "SELECT count(*) AS jml FROM panel.tbl_user_menu WHERE parent_id = '$id'";
		$lcmenu = $this->db->query($sql)->result_array();

		$row = $lcmenu;
		if ($row[0]['jml'] > 0) {
			$lret = true;
		}
		return $lret;
	}

	function ambil_submenu($id)
	{
		$sql = "SELECT * FROM panel.tbl_user_menu WHERE parent_id = '$id' ORDER BY urutan ASC";
		$lcmenu = $this->db->query($sql)->result_array();

		$res = $lcmenu;
		return $res;
	}
}
