<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class User extends JINGGA_Controller
{

	function __construct()
	{
		parent::__construct();
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("If-Modified-Since: Mon, 22 Jan 2008 00:00:00 GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Cache-Control: private");
		header("Pragma: no-cache");

		$this->nsmarty->assign('acak', md5(date('H:i:s')));
		$this->temp = "backend/";
		$this->load->model('mbackend');
		$this->load->model('muser');
		$this->load->library(array('encrypt', 'lib'));

		$this->nsmarty->assign("main_css", $this->lib->assetsmanager('css', 'main'));
		$this->nsmarty->assign("main_js", $this->lib->assetsmanager('js', 'main'));
	}

	function index()
	{
		$this->load->library('user_agent');
		if ($this->agent->is_browser('Safari')) {
			echo '
				<center>
					<h2>ONANMEDIA Tidak Support Dengan Browser Safari, Harap Ganti Browser Lain</h2>
				</center';
			exit;
		}

		// print_r($this->auth);exit;

		if ($this->auth) {
			// $total_order = $this->mbackend->getdata('total_order', 'row_array');
			// $total_invoice = $this->mbackend->getdata('total_invoice', 'row_array');

			// $data = array(
			// 	'total_order' => $total_order['total'] ?? 0,
			// 	'total_invoice' => $total_invoice['total'] ?? 0,
			// );

			$data['menu'] = $this->get_menu();
			$this->nsmarty->assign("data", $data);
			$this->nsmarty->assign("halaman", "backend/halaman/profile/dashboard.html");
			$this->nsmarty->display('backend/main-backend.html');
		} else {
			$data = array(
				'test' => 'this is test!',
				'host_url' => base_url()
			);
			$this->nsmarty->assign("data", $data);
			$this->nsmarty->display('backend/main-login.html');
		}
	}

	function modul($p1 = "", $p2 = "")
	{
		if ($this->auth) {
			switch ($p1) {
				case "penjual":
					$this->nsmarty->assign("halaman", "backend/user/penjual.html");
					break;
				case "pembeli":
					$this->nsmarty->assign("halaman", "backend/user/pembeli.html");
					break;
				case "detail_penjual":
					$this->nsmarty->assign("halaman", "backend/user/detail_penjual.html");
					break;
				case "detail_pembeli":
					$this->nsmarty->assign("halaman", "backend/user/detail_pembeli.html");
					break;
			}

			if ($p2 != '') {
				if ($p1 == 'detail_penjual') {
					$data['user_penjual'] = $this->muser->getdata('detail_penjual', 'row_array', $p2);
				}
				if ($p1 == 'detail_pembeli') {
					$data['user_pembeli'] = $this->muser->getdata('detail_pembeli', 'row_array', $p2);
				}
			}
			$data['menu'] = $this->get_menu();
			$this->nsmarty->assign("data", $data);
			$this->nsmarty->display('backend/main-backend.html');
		} else {
			$this->nsmarty->display('backend/main-login.html');
		}
	}

	function get_grid($mod)
	{
		$temp = 'backend/grid_config.html';
		$sts_posting = "TRUE";
		$dua_baris_filter = "FALSE";
		$filter = $this->combo_option($mod);
		$cekmenu = $this->db->get_where('tbl_user_menu', array('ref_tbl' => $mod))->row_array();
		if ($cekmenu) {
			$id_modul = $cekmenu['id'];
			$judul = $cekmenu['nama_menu'];
		} else {
			$id_modul = 0;
			$judul = "Data Development";
		}

		$prev = $this->mbackend->getdata("previliges_menu", "row_array", $id_modul, $this->auth["cl_user_group_id"]);

		switch ($mod) {
			case "file_managerial":
			case "formulir_tabungan":
			case "pembiayaan":
			case "voucher_transaksi":

				if ($this->auth['cl_cabang_id'] == "") {
					$dua_baris_filter = "TRUE";

					$this->nsmarty->assign("cl_cabang", $this->lib->fillcombo("cl_cabang", "return"));
				} else {

					if ($mod == 'voucher_transaksi') {
						$dua_baris_filter = "TRUE";
					}
				}
				break;
			case "rekap_laporan":
				$dua_baris_filter = "TRUE";

				$this->nsmarty->assign("status_laporan", $this->lib->fillcombo("status_data_laporan_grid", "return"));
				$this->nsmarty->assign("jenis_laporan", $this->lib->fillcombo("jenis_laporan", "return"));
				break;
		}

		//echo "<pre>";
		//print_r($prev);exit;

		$this->nsmarty->assign('data_select', $filter);
		$this->nsmarty->assign('mod', $mod);
		$this->nsmarty->assign('judul', $judul);
		$this->nsmarty->assign('prev', $prev);
		$this->nsmarty->assign('sts_posting', $sts_posting);
		$this->nsmarty->assign('dua_baris_filter', $dua_baris_filter);
		if (!file_exists($this->config->item('appl') . APPPATH . 'views/' . $temp)) {
			$this->nsmarty->display('konstruksi.html');
		} else {
			$this->nsmarty->display($temp);
		}
	}

	function get_grid_report($mod)
	{
		$temp = 'backend/grid_config_report.html';

		$cekmenu = $this->db->get_where('tbl_user_menu', array('ref_tbl' => $mod))->row_array();
		if ($cekmenu) {
			$id_modul = $cekmenu['id'];
			$judul = "Laporan Data " . $cekmenu['nama_menu'];
		} else {
			$id_modul = 0;
			$judul = "Data Development";
		}

		switch ($mod) {
			case "":

				break;
		}

		$this->nsmarty->assign('mod', $mod);
		$this->nsmarty->assign('judul', $judul);
		if (!file_exists($this->config->item('appl') . APPPATH . 'views/' . $temp)) {
			$this->nsmarty->display('konstruksi.html');
		} else {
			$this->nsmarty->display($temp);
		}
	}

	function get_form($mod)
	{
		$temp = 'backend/form/' . $mod . ".html";
		$sts = $this->input->post('editstatus');

		switch ($mod) {
			case "beranda":
				$jumlah_data = $this->mbackend->getdata('dashboard_jumlah_data', 'row_array');
				$belum_proses = $this->mbackend->getdata('dashboard_belum_proses', 'row_array');
				$sudah_proses = $this->mbackend->getdata('dashboard_sudah_proses', 'row_array');
				$belum_kirim = $this->mbackend->getdata('dashboard_belum_kirim', 'row_array');
				$sudah_kirim = $this->mbackend->getdata('dashboard_sudah_kirim', 'row_array');

				$this->nsmarty->assign('jumlah_data', $jumlah_data);
				$this->nsmarty->assign('belum_proses', $belum_proses);
				$this->nsmarty->assign('sudah_proses', $sudah_proses);
				$this->nsmarty->assign('belum_kirim', $belum_kirim);
				$this->nsmarty->assign('sudah_kirim', $sudah_kirim);
				break;

			case "akses_sso":
				if ($sts == 'edit') {
					$data = $this->db->get_where('tbl_user_sso', array('id' => $this->input->post('id')))->row_array();
					$data["password"] = $this->encryption->decrypt($data["password"]);
					$this->nsmarty->assign('data', $data);
				}

				$aplikasi = $this->mbackend->getdata('aplikasi_sso_role', 'variable');

				$this->nsmarty->assign('aplikasi', $aplikasi);
				break;
			case "cabang":
				if ($sts == 'edit') {
					$data = $this->db->get_where('cl_cabang', array('id' => $this->input->post('id')))->row_array();
					$this->nsmarty->assign('data', $data);
				}
				break;
			case "form_user_role":
				$id_role = $this->input->post('id');
				$array = array();
				$dataParent = $this->mbackend->getdata('menu_parent', 'result_array');
				foreach ($dataParent as $k => $v) {
					$dataChild = $this->mbackend->getdata('menu_child', 'result_array', $v['id']);
					$dataPrev = $this->mbackend->getdata('previliges_menu', 'row_array', $v['id'], $id_role);

					$array[$k]['id'] = $v['id'];
					$array[$k]['nama_menu'] = $v['nama_menu'];
					$array[$k]['type_menu'] = $v['type_menu'];
					$array[$k]['id_prev'] = (isset($dataPrev['id']) ? $dataPrev['id'] : 0);
					$array[$k]['buat'] = (isset($dataPrev['buat']) ? $dataPrev['buat'] : 0);
					$array[$k]['baca'] = (isset($dataPrev['baca']) ? $dataPrev['baca'] : 0);
					$array[$k]['ubah'] = (isset($dataPrev['ubah']) ? $dataPrev['ubah'] : 0);
					$array[$k]['hapus'] = (isset($dataPrev['hapus']) ? $dataPrev['hapus'] : 0);
					$array[$k]['child_menu'] = array();
					$jml = 0;
					foreach ($dataChild as $y => $t) {
						$dataPrevChild = $this->mbackend->getdata('previliges_menu', 'row_array', $t['id'], $id_role);
						$array[$k]['child_menu'][$y]['id_child'] = $t['id'];
						$array[$k]['child_menu'][$y]['nama_menu_child'] = $t['nama_menu'];
						$array[$k]['child_menu'][$y]['type_menu'] = $t['type_menu'];
						$array[$k]['child_menu'][$y]['id_prev'] = (isset($dataPrevChild['id']) ? $dataPrevChild['id'] : 0);
						$array[$k]['child_menu'][$y]['buat'] = (isset($dataPrevChild['buat']) ? $dataPrevChild['buat'] : 0);
						$array[$k]['child_menu'][$y]['baca'] = (isset($dataPrevChild['baca']) ? $dataPrevChild['baca'] : 0);
						$array[$k]['child_menu'][$y]['ubah'] = (isset($dataPrevChild['ubah']) ? $dataPrevChild['ubah'] : 0);
						$array[$k]['child_menu'][$y]['hapus'] = (isset($dataPrevChild['hapus']) ? $dataPrevChild['hapus'] : 0);
						$jml++;

						if ($t['type_menu'] == 'CHC') {
							$array[$k]['child_menu'][$y]['sub_child_menu'] = array();
							$dataSubChild = $this->mbackend->getdata('menu_child_2', 'result_array', $t['id']);
							$jml_sub_child = 0;
							foreach ($dataSubChild as $x => $z) {
								$dataPrevSubChild = $this->mbackend->getdata('previliges_menu', 'row_array', $z['id'], $id_role);
								$array[$k]['child_menu'][$y]['sub_child_menu'][$x]['id_sub_child'] = $z['id'];
								$array[$k]['child_menu'][$y]['sub_child_menu'][$x]['nama_menu_sub_child'] = $z['nama_menu'];
								$array[$k]['child_menu'][$y]['sub_child_menu'][$x]['id_prev'] = (isset($dataPrevSubChild['id']) ? $dataPrevSubChild['id'] : 0);
								$array[$k]['child_menu'][$y]['sub_child_menu'][$x]['buat'] = (isset($dataPrevSubChild['buat']) ? $dataPrevSubChild['buat'] : 0);
								$array[$k]['child_menu'][$y]['sub_child_menu'][$x]['baca'] = (isset($dataPrevSubChild['baca']) ? $dataPrevSubChild['baca'] : 0);
								$array[$k]['child_menu'][$y]['sub_child_menu'][$x]['ubah'] = (isset($dataPrevSubChild['ubah']) ? $dataPrevSubChild['ubah'] : 0);
								$array[$k]['child_menu'][$y]['sub_child_menu'][$x]['hapus'] = (isset($dataPrevSubChild['hapus']) ? $dataPrevSubChild['hapus'] : 0);
								$jml_sub_child++;
							}
						}
					}
					$array[$k]['total_child'] = $jml;
				}

				$this->nsmarty->assign('role', $array);
				$this->nsmarty->assign('id_group', $id_role);
				break;
			case "user_group":
				if ($sts == 'edit') {
					$data = $this->db->get_where('cl_user_group', array('id' => $this->input->post('id')))->row_array();
					$this->nsmarty->assign('data', $data);
				}
				break;
			case "user_mng":
				if ($sts == 'edit') {
					$data = $this->db->get_where('tbl_user', array('id' => $this->input->post('id')))->row_array();
					$data["password"] = $this->encryption->decrypt($data["password"]);
					$this->nsmarty->assign('data', $data);
				}

				//$this->nsmarty->assign("cl_kantor_cabang_id", $this->lib->fillcombo("cl_kantor_cabang","return",($sts == "edit" ? $data["cl_cabang_id"] : "") ));
				$this->nsmarty->assign("cl_user_group_id", $this->lib->fillcombo("cl_user_group", "return", ($sts == "edit" ? $data["cl_user_group_id"] : "")));
				break;
			case "ubah_password":

				break;
			default:
				if ($sts == 'edit') {
					$table = $this->input->post("ts");
					$data = $this->db->get_where("tbl_" . $table, array('id' => $this->input->post('id')))->row_array();
					$this->nsmarty->assign('data', $data);
				}
				break;
		}

		if (isset($sts)) {
			$this->nsmarty->assign('sts', $sts);
		} else {
			$sts = "";
		}

		$this->nsmarty->assign('mod', $mod);
		$this->nsmarty->assign('temp', $temp);

		if (!file_exists($this->config->item('appl') . APPPATH . 'views/' . $temp)) {
			$this->nsmarty->display('konstruksi.html');
		} else {
			$this->nsmarty->display($temp);
		}
	}

	function getdisplay($type)
	{
		$temp = 'backend/app/' . $type . ".html";

		switch ($type) {

			case "upload_tools":
				$tipe = $this->input->post('tipe');
				$temp = 'backend/upload_tools/' . $tipe . ".html";

				if (!file_exists($this->config->item('appl') . APPPATH . 'views/' . $temp)) {
					$this->nsmarty->display('konstruksi.html');
				} else {
					$this->nsmarty->display($temp);
				}
				break;
			case "hapusfoto_galeri":
				$id = htmlspecialchars($this->input->post('id'), ENT_QUOTES);
				$filename = htmlspecialchars($this->input->post('filename'), ENT_QUOTES);
				$upload_path = "./__repository/gallery/";

				if (file_exists($upload_path . $filename)) {
					$this->db->delete('tbl_gallery_detail', array('tbl_gallery_id' => $id));
					unlink($upload_path . $filename);
					echo 1;
				}
				break;
			case "ceksession":
				if ($this->auth) {
					echo 1;
				} else {
					echo 2;
				}
				break;
		}


		if (!file_exists($this->config->item('appl') . APPPATH . 'views/' . $temp)) {
			$this->nsmarty->display('konstruksi.html');
		} else {
			$this->nsmarty->display($temp);
		}
	}

	function getdata($p1, $p2 = "json", $p3 = "")
	{
		echo $this->muser->getdata($p1, $p2, $p3);
	}

	function simpandata($p1 = "", $p2 = "")
	{
		//print_r($_POST);exit;

		if ($this->input->post('mod')) $p1 = $this->input->post('mod');
		$post = array();
		foreach ($_POST as $k => $v) {
			if ($this->input->post($k) != "") {
				$post[$k] = $this->input->post($k);
			} else {
				$post[$k] = null;
			}
		}

		// echo "<pre>";
		// print_r($post);exit;

		if (isset($post['editstatus'])) {
			$editstatus = $post['editstatus'];
			unset($post['editstatus']);
		} else $editstatus = $p2;

		echo $this->mbackend->simpandata($p1, $post, $editstatus);
	}

	function test()
	{
		//echo $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME']);exit;
		//$array = array('lastname', 'email', 'phone');
		//$comma_separated = implode(",", $array);
		//echo $comma_separated;

		$string = "lastname,email,phone";
		$exp = explode(',', $string);

		echo "<pre>";
		print_r($exp);
	}

	function combo_option($mod)
	{
		$opt = "";
		switch ($mod) {

			case "user_group":
				$opt .= "<option value='A.user_group'>Nama User Grup</option>";
				break;
			case "user_mng":
				$opt .= "<option value='A.username'>Username</option>";
				$opt .= "<option value='A.nama_lengkap'>Nama Lengkap</option>";
				break;
			default:
				$txt = str_replace("_", " ", $mod);
				$opt .= "<option value='A." . $mod . "'>" . strtoupper($txt) . "</option>";
				break;
		}

		return $opt;
	}

	function cetak($mod, $p1 = "", $p2 = "")
	{
		switch ($mod) {
			case "cetak_laporan_satuan":
				$data = $this->db->get_where('tbl_laporan', array('no_laporan' => $p1))->row_array();
				$data['bulan'] = $this->lib->konversi_bulan($data['bulan'], 'fullbulan');
				$data['filename_json'] = json_decode($data['filename_json'], true);

				$filename = "cetak_laporan_" . $p1;
				$temp = "backend/cetak/" . $mod . ".html";
				$this->hasil_output('pdf', $mod, $data, $filename, $temp, "A4");
				break;
			case "cetak_surat":
				$data = $this->mbackend->getdata('cetak_surat', 'variable', $p1, $p2);
				$jenis_surat = $this->db->get_where('cl_jenis_surat', array('id' => $p1))->row_array();
				$filename = str_replace(" ", "_", $jenis_surat['jenis_surat']) . "_" . $p2;
				$temp = "backend/cetak/surat_" . $p1 . ".html";
				$this->hasil_output('pdf', $mod, $data, $filename, $temp, "A4");

				//echo "<pre>";
				//print_r($data);exit;
				break;
			case "qrcode":
				$this->load->library("encrypt");
				$p1 = $this->lib->base64url_decode($p1);
				if ($p1) {
					$data = $this->mbackend->getdata('tbl_metering', 'row_array', $p1);
					$filename = $data["no_serial"];
					$this->hasil_output('pdf', $mod, $data, $filename, "A7-L");
				} else {
					echo "Invalid ID : Tutup Tab ini pada Browser Dan Generate Kembali";
				}
				break;
		}
	}

	function hasil_output($p1, $mod, $data, $filename, $temp, $ukuran = "A4")
	{
		switch ($p1) {
			case "pdf":
				$this->load->library('mlpdf');
				$pdf = $this->mlpdf->load();

				$this->nsmarty->assign('data', $data);
				$this->nsmarty->assign('mod', $mod);

				$htmlcontent = $this->nsmarty->fetch($temp);

				//echo $htmlcontent;exit;

				$spdf = new mPDF('', $ukuran, 0, '', 8, 8, 8, 0, 0, 0, 'P');
				$spdf->ignore_invalid_utf8 = true;
				// bukan sulap bukan sihir sim salabim jadi apa prok prok prok
				$spdf->allow_charset_conversion = true;     // which is already true by default
				$spdf->charset_in = 'iso-8859-1';  // set content encoding to iso
				$spdf->SetDisplayMode('fullpage');
				//$spdf->SetHTMLHeader($htmlheader);
				//$spdf->keep_table_proportions = true;
				$spdf->useSubstitutions = false;
				$spdf->simpleTables = true;


				$spdf->SetHTMLFooter('
					<div style="font-family:arial; font-size:8px; text-align:center; font-weight:bold;">
						<table width="100%" style="font-family:arial; font-size:8px;">
							<tr>
								<td width="30%" align="left">
									<i>Dicetak menggunakan aplikasi <br/> WBS Kab. Kubu Raya</i>
								</td>
								<td width="40%" align="center">
									
								</td>
								<td width="30%" align="right">
									Hal. {PAGENO}
								</td>
							</tr>
						</table>
					</div>
				');

				//$file_name = date('YmdHis');
				$spdf->SetProtection(array('print'));
				$spdf->WriteHTML($htmlcontent); // write the HTML into the PDF
				//$spdf->Output('repositories/Dokumen_LS/LS_PDF/'.$filename.'.pdf', 'F'); // save to file because we can
				//$spdf->Output('repositories/Billing/'.$filename.'.pdf', 'F');
				$spdf->Output($filename . '.pdf', 'I'); // view file	
				break;
		}
	}

	function downloadfile()
	{
		$this->load->helper('download');
		$filenya = $this->input->post("filenya");
		$log['aktivitas'] = "Download File Name <b>" . $this->input->post("namafile") . "</b> oleh " . $this->auth['nama_user'];
		$log['data_id'] = $this->input->post("id");
		$log['flag_tbl'] = "tbl_upload_file";
		$log['create_date'] = date('Y-m-d H:i:s');
		$log['create_by'] = $this->auth['nama_user'];
		$this->db->insert('tbl_log', $log);

		force_download($filenya, NULL);
	}

	function getauth()
	{
		echo "<pre>";
		print_r($this->auth);
	}

	function get_menu()
	{
		$menu = '';
		$top = $this->mbackend->ambil_menu_utama();
		foreach ($top as $rows) {
			if ($this->mbackend->cek_submenu($rows->id) == true) {
				$menu .= '<li class="dropdown">' .
					'<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">' . $rows->nama_menu . '</a>' .
					'<ul class="dropdown-menu">';
				$menu .= $this->get_submenu($rows->id);
				$menu .= '</ul>' .
					'</li>';
			} else {
				$menu .= '<li class="">' .
					'<a href="' . base_url() . $rows->url . '">' . $rows->nama_menu . '</a>' .
					'</li>';
			}
		}
		return $menu;
	}

	function get_submenu($id)
	{
		$menu = '';
		$top = $this->mbackend->ambil_submenu($id);
		foreach ($top as $rows) {
			$menu .= '<li class="">' .
				'<a href="' . base_url() . $rows['url'] . '">' . $rows['nama_menu'] . '</a>' .
				'</li>';
		}
		return $menu;
	}
}
