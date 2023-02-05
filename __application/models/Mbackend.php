<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
//
class Mbackend extends CI_Model
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

			case "total_order":
				$sql = "
					select count(id) as total
					from tbl_order_header
					where status_data in ('DISETUJUI DIRUT', 'SUDAH DITRANSFER', 'PROSES', 'PROSES SELESAI', 'SELESAI')
					and tbl_klien_id = '" . $this->auth['id'] . "'
				";
				break;
			case "total_invoice":
				$sql = "
					select count(id) as total
					from tbl_invoice_header
					where status_data in ('DIBUAT', 'TERKIRIM', 'REQUEST KIRIM', 'PROSES KIRIM')
					and tbl_klien_id = '" . $this->auth['id'] . "'
				";
				break;

			case "order":
				$sql = "
					select ROW_NUMBER() OVER (ORDER BY a.id DESC) as rowID, 'BJSDIG-' || a.id as id, a.no_order, a.jenis_request, a.nama_layanan,
						to_char(A.order_date::timestamp with time zone, 'DD-MM-YYYY HH:MM'::text) AS tanggal_order,
						CASE
							WHEN ( a.status_data = 'DIBUAT' OR a.status_data = 'DISETUJUI DIRUT' or a.status_data = 'DISETUJUI GM' ) THEN 'PENGAJUAN INTERNAL'
							WHEN ( a.status_data = 'SUDAH DITRANSFER' OR a.status_data = 'PROSES' or a.status_data = 'PROSES SELESAI' ) THEN 'PROSES PENGERJAAN'
							WHEN ( a.status_data = 'SELESAI' ) THEN 'SELESAI PENGERJAAN'
							WHEN ( a.status_data = 'SUDAH INVOICE' or a.status_data = 'PROSES KIRIM INVOICE' ) THEN 'PROSES INVOICE'
							WHEN ( a.status_data = 'CANCEL' or a.status_data = 'CANCEL COST' ) THEN 'DIBATALKAN'
							WHEN ( a.status_data = 'SUDAH BAYAR' ) THEN 'SELESAI'
							WHEN ( a.status_data = 'DITOLAK GM' or a.status_data = 'DITOLAK DIRUT' ) THEN 'PENGAJUAN DITOLAK'
							ELSE 'TIDAK ADA STATUS'
						END AS status_data
					from bjsdigital.vw_order_header a
					$where and a.tbl_klien_id = '" . $this->auth['id'] . "'					
				";
				break;


			case "aplikasi_sso":
				$sql = "
					select b.nama as nama_aplikasi, b.url, b.logo, c.nama as nama_grup, 
						c.id_user_group, d.*
					from tbl_user_sso_role a
					left join tbl_aplikasi b on b.id = a.tbl_aplikasi_id
					left join tbl_aplikasi_grup c on c.id = a.tbl_aplikasi_grup_id
					left join tbl_user_sso d on d.id = a.tbl_user_sso_id
					where a.tbl_user_sso_id = '" . $p1 . "'
				";
				$data = $this->db->query($sql)->result_array();
				if ($data) {
					foreach ($data as $k => $v) {
						$session['id'] = $v['id'];
						$session['username'] = $v['username'];
						$session['password'] = "";
						$session['nama_lengkap'] = $v['nama_lengkap'];
						$session['cl_user_group_id'] = $v['id_user_group'];
						$session['user_group'] = $v['nama_grup'];
						$session['from'] = "SSOHIKP";

						$data[$k]['link'] = $v['url'] . "?code=" . base64_encode(json_encode($session));
						//$data[$k]['decode'] = $session;
					}
				}

				$array = $data;
				break;
			case "data_login_sso":
				$sql = "
					SELECT a.*
					FROM tbl_user_sso a
					WHERE a.username = '" . $p1 . "'
				";
				break;
			case "data_login":
				$sql = "
					SELECT A.*, B.user_group
					FROM tbl_user A
					LEFT JOIN cl_user_group B ON B.id = A.cl_user_group_id
					WHERE A.username = '" . $p1 . "' ORDER BY A.id DESC
				";
				break;

			case "aplikasi_sso_role":
				$id = $this->input->post('id') ?? "0";

				$sql = "
					select a.id, a.nama
					from tbl_aplikasi a
				";
				$data = $this->db->query($sql)->result_array();

				foreach ($data as $k => $v) {
					$sdetail = "
						select a.id, a.nama as nama_grup
						from tbl_aplikasi_grup a
						where a.tbl_aplikasi_id = ?
					";
					$detail = $this->db->query($sdetail, [$v['id']])->result_array();
					$data[$k]['grup'] = $detail;

					$srole = "
						select a.tbl_aplikasi_grup_id
						from tbl_user_sso_role a
						where a.tbl_user_sso_id = ? and a.tbl_aplikasi_id = ?
					";
					$role = $this->db->query($srole, [$id, $v['id']])->row_array();
					$data[$k]['role'] = $role['tbl_aplikasi_grup_id'] ?? "";
				}

				$array = $data;
				break;
			case "akses_sso":
				$sql = "
					SELECT a.*
					FROM tbl_user_sso a
					$where 
				";
				break;
			case "tbl_user":
				$sql = "
					SELECT A.*, B.user_group
					FROM tbl_user A
					LEFT JOIN cl_user_group B ON B.id = A.cl_user_group_id
					$where 
				";

				// and cl_user_group_id <> '4'
				break;
			case "menu":
				$sql = "
					SELECT a.tbl_menu_id, b.nama_menu, b.type_menu, b.icon_menu, b.url, b.ref_tbl
						FROM tbl_user_prev_group a
					LEFT JOIN tbl_user_menu b ON a.tbl_menu_id = b.id 
					WHERE a.cl_user_group_id=" . $this->auth['cl_user_group_id'] . " 
					AND (b.type_menu='P' OR b.type_menu='PC') AND b.status='1'
					ORDER BY b.urutan ASC
				";

				$parent = $this->db->query($sql)->result_array();
				$menu = array();
				foreach ($parent as $v) {
					$menu[$v['tbl_menu_id']] = array();
					$menu[$v['tbl_menu_id']]['parent'] = $v['nama_menu'];
					$menu[$v['tbl_menu_id']]['icon_menu'] = $v['icon_menu'];
					$menu[$v['tbl_menu_id']]['url'] = $v['url'];
					$menu[$v['tbl_menu_id']]['type_menu'] = $v['type_menu'];
					$menu[$v['tbl_menu_id']]['judul_kecil'] = $v['ref_tbl'];
					$menu[$v['tbl_menu_id']]['child'] = array();
					$sql = "
						SELECT a.tbl_menu_id, b.nama_menu, b.url, b.icon_menu , b.type_menu, b.ref_tbl
							FROM tbl_user_prev_group a
						LEFT JOIN tbl_user_menu b ON a.tbl_menu_id = b.id 
						WHERE a.cl_user_group_id=" . $this->auth['cl_user_group_id'] . " 
						AND (b.type_menu = 'C' OR b.type_menu = 'CHC') 
						AND b.status='1' AND b.parent_id=" . $v['tbl_menu_id'] . " 
						ORDER BY b.urutan ASC
						";
					$child = $this->db->query($sql)->result_array();
					foreach ($child as $x) {
						$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']] = array();
						$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['menu'] = $x['nama_menu'];
						$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['type_menu'] = $x['type_menu'];
						$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['url'] = $x['url'];
						$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['icon_menu'] = $x['icon_menu'];
						$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['judul_kecil'] = $x['ref_tbl'];

						if ($x['type_menu'] == 'CHC') {
							$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['sub_child'] = array();
							$sqlSubChild = "
								SELECT a.tbl_menu_id, b.nama_menu, b.url, b.icon_menu , b.type_menu, b.ref_tbl
									FROM tbl_user_prev_group a
								LEFT JOIN tbl_user_menu b ON a.tbl_menu_id = b.id 
								WHERE a.cl_user_group_id=" . $this->auth['cl_user_group_id'] . " 
								AND b.type_menu = 'CC'
								AND b.parent_id_2 = " . $x['tbl_menu_id'] . "
								AND b.status='1' 
								ORDER BY b.urutan ASC
							";
							$SubChild = $this->db->query($sqlSubChild)->result_array();
							foreach ($SubChild as $z) {
								$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['sub_child'][$z['tbl_menu_id']]['sub_menu'] = $z['nama_menu'];
								$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['sub_child'][$z['tbl_menu_id']]['type_menu'] = $z['type_menu'];
								$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['sub_child'][$z['tbl_menu_id']]['url'] = $z['url'];
								$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['sub_child'][$z['tbl_menu_id']]['icon_menu'] = $z['icon_menu'];
							}
						}
					}
				}

				/*
				echo "<pre>";
				print_r($menu);exit;
				//*/

				$array = $menu;
				break;

			case "menu_parent":
				$sql = "
					SELECT A.*
					FROM tbl_user_menu A
					WHERE (A.type_menu = 'P' OR A.type_menu = 'PC') AND A.status = '1'
					ORDER BY A.urutan ASC
				";
				break;
			case "menu_child":
				$sql = "
					SELECT A.*
					FROM tbl_user_menu A
					WHERE (A.type_menu = 'C') AND A.parent_id = '" . $p1 . "' AND A.status = '1'
					ORDER BY A.urutan ASC
				";
				break;
			case "menu_child_2":
				$sql = "
					SELECT A.*
					FROM tbl_user_menu A
					WHERE A.type_menu = 'CC' AND A.parent_id_2 = '" . $p1 . "' AND A.status = '1'
					ORDER BY A.urutan ASC
				";
				break;
			case "previliges_menu":
				$sql = "
					SELECT A.*
					FROM tbl_user_prev_group A
					WHERE A.tbl_menu_id = '" . $p1 . "' AND A.cl_user_group_id = '" . $p2 . "'
				";
				break;
				// End Modul User Management


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
		$sql = "SELECT * FROM panel.tbl_user_menu WHERE (type_menu = '' OR type_menu = 'PC') AND parent_id IS NULL ORDER BY urutan ASC";
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
		$sql = "SELECT * FROM panel.tbl_user_menu WHERE type_menu = 'C' AND parent_id = '$id' ORDER BY urutan ASC";
		$lcmenu = $this->db->query($sql)->result_array();

		$res = $lcmenu;
		return $res;
	}
}
