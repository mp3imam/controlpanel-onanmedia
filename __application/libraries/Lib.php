<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
	LIBRARY CIPTAAN JINGGA LINTAS IMAJI
	KONTEN LIBRARY :
	- Upload File
	- Upload File Multiple
	- RandomString
	- CutString
	- Kirim Email
	- Konversi Bulan
	- Fillcombo
	- Json Datagrid
	
*/
class Lib {
	public function __construct(){
		
	}
	
	//class asset manager
	function assetsmanager($type,$p1){
		$assets = "";
		$ci =& get_instance();
		$base_url = $ci->config->item('base_url');
		$base_url = str_replace('index.php/','',$base_url);

		//echo $base_url;exit;
		
		switch($type){
			case "js":
				
				switch($p1){
					case "frontend":
						$arrayjs = array(
							'__assets/frontend/js/jquery.js',
							'__assets/frontend/js/bootstrap.js',
							'__assets/frontend/js/jquery-easing.js',
							'__assets/pluginsall/easyui/jquery.easyui.min.js',
							'__assets/pluginsall/jquery-validation/dist/jquery.validate.js',
							'__assets/backendxx/dist/js/loading-overlay.js',
							'__assets/frontend/js/sweetalert.js',
							'__assets/pluginsall/ckeditor/ckeditor.js',
							'__assets/backendxx/dist/js/autoNumeric.js',
							'__assets/frontend/js/scripts.js',
						);
					break;
					case "login_mobile":
					case "login":
						$arrayjs = array(
							'__assets/login/template/jquery.min.js',
							'__assets/login/bootstrap/dist/js/bootstrap.min.js',
						);
					break;
					case "main_mobile":
						$arrayjs = array(
							'__assets/backendxx/bower_components/jquery/dist/jquery.min.js',
							'__assets/backendxx/bower_components/bootstrap/dist/js/bootstrap.min.js',
							'__assets/pluginsall/easyui/jquery.easyui.min.js',
							'__assets/pluginsall/easyui/jquery.easyui.mobile.js',
							'__assets/pluginsall/jquery-validation/dist/jquery.validate.js',
							'__assets/backendxx/dist/js/loading-overlay.js',
							'__assets/backendxx/bower_components/select2/dist/js/select2.full.min.js',
							'__assets/pluginsall/ckeditor/ckeditor.js',
							'__assets/backendxx/dist/js/fungsi-mobile.js',
						);
					break;
					case "main":
						$arrayjs = array(
							'__assets/backendxx/bower_components/jquery/dist/jquery.min.js',
							'__assets/backendxx/bower_components/bootstrap/dist/js/bootstrap.min.js',
							'__assets/backendxx/bower_components/fastclick/lib/fastclick.js',
							'__assets/pluginsall/easyui/jquery.easyui.min.js',
							'__assets/pluginsall/jquery-validation/dist/jquery.validate.js',
							'__assets/pluginsall/treeview/bootstrap-treeview.js',
							'__assets/pluginsall/maskmoney/jquery.maskMoney.js',
							'__assets/pluginsall/ckeditor/ckeditor.js',
							'__assets/backendxx/dist/js/adminlte.min.js',
							'__assets/backendxx/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
							'__assets/backendxx/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
							'__assets/backendxx/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
							'__assets/backendxx/bower_components/timepicker/bootstrap-timepicker.min.js',
							'__assets/backendxx/bower_components/moment/moment.js',
							'__assets/backendxx/bower_components/select2/dist/js/select2.full.min.js',
							'__assets/pluginsall/highcharts/highcharts.js',
							'__assets/pluginsall/highcharts/exporting.js',
							'__assets/backendxx/dist/js/typeahead.js',
							'__assets/backendxx/dist/js/loading-overlay.js',
							'__assets/backendxx/dist/js/autoNumeric.js',
							'__assets/backendxx/dist/js/fungsi.js',
							'__assets/backendxx/dist/js/cropbox.js',
							//'__assets/pluginsall/scannerjs/scanner.js',
						);
					break;
				}
				
				foreach($arrayjs as $k){
					$version = filemtime($k);
					$assets .= "
						<script src='".$base_url.$k."?v=".$version."'></script> 
					";
				}
				
			break;
			case "css":
				
				switch($p1){
					case "frontend":
						$arraycss = array(
							'__assets/frontend/css/styles.css',
						);
					break;
					case "login_mobile":
						$arraycss = array(
							'__assets/login/bootstrap/dist/css/bootstrap.min.css',
							'__assets/login/font-awesome/css/font-awesome.min.css',
							'__assets/login/Ionicons/css/ionicons.min.css',
							'__assets/login/template/AdminLTE.min_2.css',
						);
					break;
					case "login":
						$arraycss = array(
							'__assets/login/css/bootstrap.min.css',
							'__assets/login/css/font-awesome.css',
							'__assets/login/css/animate.css',
							'__assets/login/css/style.css',
							'__assets/login/css/iproc_scm.css',
						);
					break;
					case "main_mobile":
						$arraycss = array(
							'__assets/backendxx/bower_components/bootstrap/dist/css/bootstrap.min.css',
							'__assets/pluginsall/easyui/themes/metro-gray/easyui.css',
							'__assets/pluginsall/easyui/themes/mobile.css',
							'__assets/pluginsall/easyui/themes/icon.css',
							'__assets/backendxx/bower_components/select2/dist/css/select2.min.css',
							'__assets/backendxx/dist/css/AdminLTE.min.css',
						);
					break;
					case "main":
						$arraycss = array(
							'__assets/backendxx/bower_components/bootstrap/dist/css/bootstrap.min.css',
							'__assets/backendxx/bower_components/font-awesome/css/font-awesome.min.css',
							'__assets/backendxx/bower_components/Ionicons/css/ionicons.min.css',
							'__assets/backendxx/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
							'__assets/backendxx/bower_components/timepicker/bootstrap-timepicker.min.css',
							'__assets/pluginsall/easyui/themes/metro-gray/easyui.css',
							//'__assets/pluginsall/easyui/themes/bootstrap/easyui.css',
							'__assets/pluginsall/treeview/bootstrap-treeview.css',
							'__assets/backendxx/bower_components/select2/dist/css/select2.min.css',
							'__assets/backendxx/dist/css/AdminLTE.min.css',
							'__assets/backendxx/dist/css/skins/_all-skins.min.css',
							'__assets/backendxx/dist/css/font-google.css',
						);
					break;
				}
				
				foreach($arraycss as $k){
					$version = filemtime($k);
					$assets .= "
						<link href='".$base_url.$k."?v=".$version."' rel='stylesheet'>
					";
				}
				
			break;
		}
		
		return $assets;
	}
	//End class asset manager
	
	
	//class cek Upload File Version 1.0 - Beta
	function validasifile($object=""){
		$balikan = true;
		$mimetype = mime_content_type($_FILES[$object]['tmp_name']);
		$filename_cek = $_FILES[$object]['name'];
		$ext_cek = pathinfo($filename_cek, PATHINFO_EXTENSION);
		$array_extension = array('pdf', 'PDF', 'jpg', 'JPG', 'jpeg', 'JPEG', 'zip', 'ZIP', 'xls', 'XLS', 'xlsx', 'XLSX', 'doc', 'DOC', 'docx', 'DOCX');
		$array_mime = array(
			'application/pdf', 
			'image/jpg', 
			'image/jpeg', 
			'application/zip', 
			'application/vnd.ms-excel', 
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 
			'application/msword', 
			'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
		);

		if(!in_array($ext_cek, $array_extension)) {
			echo "Extensi File Upload Tidak Diijinkan";
			exit;
		}
		if(!in_array($mimetype, $array_mime)) {
			echo "File Upload Anda Tidak Sesuai Ketentuan";
			exit;
		}
	}
	//class get filename
	function getfilename($object="", $file=""){
		$ext = explode('.',$_FILES[$object]['name']);
		$exttemp = sizeof($ext) - 1;
		$extension = $ext[$exttemp];
		
		$filename =  $file.'.'.$extension;
		
		return $filename;
	}
	//class get filename
	
	//end class Upload File Version 1.0 - Beta

	//class Upload File Version 1.0 - Beta
	function uploadnong($upload_path="", $object="", $file=""){
		//$upload_path = "./__repository/".$folder."/";

		$ext = explode('.',$_FILES[$object]['name']);
		$exttemp = sizeof($ext) - 1;
		$extension = $ext[$exttemp];
		
		$filename =  $file.'.'.$extension;
		
		$files = $_FILES[$object]['name'];
		$tmp  = $_FILES[$object]['tmp_name'];
		if(!file_exists($upload_path))mkdir($upload_path, 0777, true);
		if(file_exists($upload_path.$filename)){
			unlink($upload_path.$filename);
			$uploadfile = $upload_path.$filename;
		}else{
			$uploadfile = $upload_path.$filename;
		} 
		
		$chmodfile = dirname(__DIR__)."/".$uploadfile;
		
		move_uploaded_file($tmp, $uploadfile);
		//if (!chmod($chmodfile, 0775)) {
		//	echo "Gagal mengupload file";
		//	exit;
		//}
		
		return $filename;
	}
	// end class Upload File
	
	//class Upload File Multiple Version 1.0 - Beta
	function uploadmultiplenong($upload_path="", $object="", $file="", $idx=""){
		$ext = explode('.',$_FILES[$object]['name'][$idx]);
		$exttemp = sizeof($ext) - 1;
		$extension = $ext[$exttemp];
		
		$filename =  $file.'.'.$extension;
		
		$files = $_FILES[$object]['name'][$idx];
		$tmp  = $_FILES[$object]['tmp_name'][$idx];
		if(!file_exists($upload_path))mkdir($upload_path, 0777, true);
		if(file_exists($upload_path.$filename)){
			unlink($upload_path.$filename);
			$uploadfile = $upload_path.$filename;
		}else{
			$uploadfile = $upload_path.$filename;
		} 
		
		move_uploaded_file($tmp, $uploadfile);
		//if (!chmod($uploadfile, 0775)) {
		//	echo "Gagal mengupload file";
		//	exit;
		//}
		
		return $filename;
	}
	//end Class Upload File
	
	//class Random String Version 1.0
	function randomString($length,$parameter="") {
        $str = "";
		$rangehuruf = range('A','Z');
		$rangeangka = range('0','9');
		if($parameter == 'angka'){
			$characters = array_merge($rangeangka);
		}elseif($parameter == 'huruf'){
			$characters = array_merge($rangehuruf);
		}else{
			$characters = array_merge($rangehuruf, $rangeangka);
		}
         $max = count($characters) - 1;
         for ($i = 0; $i < $length; $i++) {
              $rand = mt_rand(0, $max);
              $str .= $characters[$rand];
         }
         return $str;
    }
	//end Class Random String
	
	// Numbering Format
	function numbering_format($var){
		return number_format($var, 0,",",".");
	}
	// End Numbering Format
	
	//Class CutString
	function cutstring($text, $length) {
		//$isi_teks = htmlentities(strip_tags($text));
		$isi = substr($text, 0,$length);
		//$isi = substr($isi_teks, 0,strrpos($isi," "));
		$isi = $isi.' ...';
		return $isi;
	}
	//end Class CutString
	
	//Class Kirim Email
	function kirimemail($type="", $email="", $p1="", $p2="", $p3=""){
		$ci =& get_instance();
		
		$ci->load->library('email');
		$html = "";
		$subject = "";
		switch($type){
			case "email_status_laporan":
				$html = "
					<h3>
						Status laporan anda dengan nomor : ".$p1['no_laporan']." adalah ".$p1['status_data']."
						<br/>
						Alasan penghentian laporan :
						<br/>
						".$p1['alasan']."
					</h3>
				";
			break;				
			case "email_laporan":
				$html = "
					<h3>
						Terima kasih atas laporan melalui WBS Kab. Kuburaya
						<br/>
						Berikut detail data pelaporan anda
						<br/>
						No. Laporan : ".$p1['no_laporan']."
						<br/>
						Jenis Laporan : ".$p1['jenis_laporan']."
						<br/>
						Nama Terlapor : ".$p1['nama_terlapor']."
						<br/>
						Dinas/OPD : ".$p1['dinas_opd']."
						<br/>
						Bulan : ".$p1['bulan']."
						<br/>
						Tahun : ".$p1['tahun']."
						<br/>
						Lokasi : ".$p1['lokasi']."
						<br/>
						Penyebab : ".$p1['penyebab']."
						<br/>
						Kronologis : ".$p1['kronologis']."
						<br/>
						Perkiraan Nilai Kerugian : ".$p1['nilai_kerugian']."
						<br/>
						Keterangan Tambahan : ".$p1['keterangan_tambahan']."
					</h3>
				";
				$subject = "EMAIL LAPORAN WHISTLE BLOWER SYSTEM KABUPATEN KUBURAYA";
			break;
			case "email_aktivasi":
				$html = "
					<h3>
						Terima Kasih Atas Registrasi Anda di Whistle Blower Sytem Kabupaten Kuburaya
						<br/>
						Silahkan aktivasi akun anda dengan membuka <a href='".$ci->config->item('base_url')."aktivasi/".$p1."' target='_blank'>link aktivasi</a>
					</h3>
				";
				$subject = "AKTIVASI AKUN WBS KABUPATEN KUBURAYA";
			break;
		}
				
		$config = array(
			"protocol"	=>"smtp"
			,"mailtype" => "html"
			,"smtp_host" => "ssl://smtp.gmail.com"
			,"smtp_user" => "vgzglownotif@gmail.com"
			,"smtp_pass" => "bl0wgl0wnc03k" 
			,"smtp_port" => "465",
			'charset' => 'utf-8',
            'wordwrap' => TRUE,
		);
		
		/*
		$config = array(
			"protocol"	=>"smtp"
			,"mailtype" => "html"
			,"smtp_host" => "ssl://mail.cvjingga.com"
			,"smtp_user" => "adminsystem@cvjingga.com"
			,"smtp_pass" => "pm7u9yxai9lt"
			,"smtp_port" => "465",
			'charset' => 'utf-8',
            'wordwrap' => TRUE,
		);
		*/
		
		
		$ci->email->initialize($config);
		$ci->email->from("wbs@cvjingga.com", "Whistle Blower System Kab. Kuburaya");
		
		if(is_array($email)){
			$ci->email->to(implode(', ', $email));
		}else{
			$ci->email->to($email);
		}
		
		$ci->email->subject($subject);
		$ci->email->message($html);
		$ci->email->set_newline("\r\n");
		if($ci->email->send())
			//echo "<h3> SUKSES EMAIL ke $email </h3>";
			return 1;
		else
			//echo $this->email->print_debugger();
			return $ci->email->print_debugger();
	}	
	//End Class KirimEmail a.muzaki@scisi.com
	
	//Class Konversi Bulan
	function konversi_bulan($bln,$type=""){
		if($type == 'fullbulan'){
			switch($bln){
				case 1:$bulan='Januari';break;
				case 2:$bulan='Februari';break;
				case 3:$bulan='Maret';break;
				case 4:$bulan='April';break;
				case 5:$bulan='Mei';break;
				case 6:$bulan='Juni';break;
				case 7:$bulan='Juli';break;
				case 8:$bulan='Agustus';break;
				case 9:$bulan='September';break;
				case 10:$bulan='Oktober';break;
				case 11:$bulan='November';break;
				case 12:$bulan='Desember';break;
			}
		}elseif($type == 'blnromawi'){
			switch($bln){
				case 1:$bulan='I';break;
				case 2:$bulan='II';break;
				case 3:$bulan='III';break;
				case 4:$bulan='IV';break;
				case 5:$bulan='V';break;
				case 6:$bulan='VI';break;
				case 7:$bulan='VII';break;
				case 8:$bulan='VIII';break;
				case 9:$bulan='IX';break;
				case 10:$bulan='X';break;
				case 11:$bulan='XI';break;
				case 12:$bulan='XII';break;
			}
		}else{
			switch($bln){
				case 1:$bulan='Jan';break;
				case 2:$bulan='Feb';break;
				case 3:$bulan='Mar';break;
				case 4:$bulan='Apr';break;
				case 5:$bulan='Mei';break;
				case 6:$bulan='Jun';break;
				case 7:$bulan='Jul';break;
				case 8:$bulan='Agst';break;
				case 9:$bulan='Sept';break;
				case 10:$bulan='Okt';break;
				case 11:$bulan='Nov';break;
				case 12:$bulan='Des';break;
			}
		}
		return $bulan;
	}
	//End Class Konversi Bulan
	
	//Class Konversi Tanggal
	function konversi_tgl($date, $type=""){
		$ci =& get_instance();
		$ci->load->helper('terbilang');
		$data=array();
		$timestamp = strtotime($date);
		$day = date('D', $timestamp);
		$day_angka = (int)date('d', $timestamp);
		$month = date('m', $timestamp);
		$years = date('Y', $timestamp);
		switch($day){
			case "Mon":$data['hari']='Senin';break;
			case "Tue":$data['hari']='Selasa';break;
			case "Wed":$data['hari']='Rabu';break;
			case "Thu":$data['hari']='Kamis';break;
			case "Fri":$data['hari']='Jumat';break;
			case "Sat":$data['hari']='Sabtu';break;
			case "Sun":$data['hari']='Minggu';break;
		}
		switch($month){
			case "01":$data['bulan']='Jan';break;	
			case "02":$data['bulan']='Feb';break;	
			case "03":$data['bulan']='Mar';break;	
			case "04":$data['bulan']='Apr';break;	
			case "05":$data['bulan']='Mei';break;	
			case "06":$data['bulan']='Jun';break;	
			case "07":$data['bulan']='Jul';break;	
			case "08":$data['bulan']='Agst';break;	
			case "09":$data['bulan']='Sept';break;	
			case "10":$data['bulan']='Okt';break;	
			case "11":$data['bulan']='Nov';break;	
			case "12":$data['bulan']='Des';break;	
		}
		
		if($type == "hari_tanggal"){
			$data['tahun'] = $years;
			$data['bulan'] = $data['bulan'];
			$data['tgl_text'] = $day_angka;
			$data['format_hari_tanggal'] = $data['hari'].", ".$day_angka." ".$data['bulan']." ".$years;
		}else{
			$data['tahun']=ucwords(number_to_words($years));
			$data['tgl_text']=ucwords(number_to_words($day_angka));
		}
		
		return $data;
	}
	//End Class Konversi Tanggal
	
	//Class Fillcombo
	function fillcombo($type="", $balikan="", $p1="", $p2="", $p3=""){
		$ci =& get_instance();
		$ci->load->model(array('mbackend', 'mlaporan','mmaster'));
		
		$v = $ci->input->post('v');
		if($v != ""){
			$selTxt = $v;
		}else{
			$selTxt = $p1;
		}
		
		$optTemp = '<option selected value=""> -- Pilih -- </option>';
		switch($type){

			case "kode_sektor":
			case "kode_kolektor":
			case "status_kerja":
			case "kode_skim":
			case "cl_asuransi":
				$data = $ci->mlaporan->get_combo($type, $p1, $p2);
			break;
			
			case "tanggal" :
				$data = $this->arraydate('tanggal');
				$optTemp = '<option value=""> -- Tanggal -- </option>';
			break;
			case "bulan" :
				$data = $this->arraydate('bulan');
				$optTemp = '<option value=""> -- Bulan -- </option>';
			break;
			case "tahun" :
				$data = $this->arraydate('tahun');
				$optTemp = '<option value=""> -- Tahun -- </option>';
			break;
			
			case "email_notif":
				$data = array();
				$optTemp = '<option value=""> -- Choose -- </option>';
			break;

			case "rate":
				$data = array(
					'0' => array('id'=>'1','txt'=>'Bulan'),
					'1' => array('id'=>'2','txt'=>'Tahun'),
				);
				$optTemp = '<option value=""> -- Choose -- </option>';
			break;

			case "masa_asuransi":
				$data = array(
					'0' => array('id'=>'1','txt'=>'5 Tahun'),
					'1' => array('id'=>'2','txt'=>'10 Tahun'),
					'2' => array('id'=>'3','txt'=>'20 Tahun'),
				);
				$optTemp = '<option value=""> -- Choose -- </option>';
			break;

			case "tipe_perhitungan":
				$data = array(
					'0' => array('id'=>'1','txt'=>'By Usia'),
					'1' => array('id'=>'2','txt'=>'By Bulanan'),
				);
				$optTemp = '<option value=""> -- Choose -- </option>';
			break;
			case "cl_marka":
				$data = array(
					'0' => array('id'=>'ADA','txt'=>'ADA'),
					'1' => array('id'=>'TIDAK ADA','txt'=>'TIDAK ADA'),
				);
				$optTemp = '<option value=""> -- Pilih -- </option>';
			break;
			case "cl_status":
				$data = array(
					'0' => array('id'=>'1','txt'=>'Berlangganan'),
					'1' => array('id'=>'2','txt'=>'Tidak Berlangganan'),
				);
				$optTemp = '<option value=""> -- Pilih -- </option>';
			break;
			case "cl_kendaraan":
				$data = array(
					'0' => array('id'=>'1','txt'=>'Mobil'),
					'1' => array('id'=>'2','txt'=>'Sepeda Motor'),
				);
				$optTemp = '<option value=""> -- Pilih -- </option>';
			break;
			case "cl_juru_parkir":
				$data = $ci->mmaster->get_combo($type, $p1, $p2);
			break;
			
			default:
				$data = $ci->mbackend->get_combo($type, $p1, $p2);
			break;
		}
		
		if($data){
			foreach($data as $k=>$v){
				$v['txt'] = str_replace("'", "`", $v['txt']);
				$v['txt'] = str_replace('"', '`', $v['txt']);
				
				if($selTxt == $v['id']){
					if($type=='tbl_rab_pox'){
						$optTemp .= '<option selected value="'.$v['id'].'">'.$v['txt'].' <br> '.$v['nama'].'</option>';
					}else{
						$optTemp .= '<option selected value="'.$v['id'].'">'.$v['txt'].'</option>';
					}
				}else{ 
					if($type=='tbl_rab_pox'){
						$optTemp .= '<option value="'.$v['id'].'">'.$v['txt'].'  '.$v['nama'].'</option>';
					}else{
						$optTemp .= '<option value="'.$v['id'].'">'.$v['txt'].'</option>';	
					}
				}
			}
		}
		
		if($balikan == 'return'){
			return $optTemp;
		}elseif($balikan == 'echo'){
			echo $optTemp;
		}
		
	}
	//End Class Fillcombo
	
	//Function Json Grid Tree
	function json_grid_tree($sql, $type="", $table=""){
		$ci =& get_instance();
		$ci->load->database();
		$page = (integer) (($ci->input->post('page')) ? $ci->input->post('page') : 0);
		$limit = (integer) (($ci->input->post('rows')) ? $ci->input->post('rows') : 0);
		
		$count = $ci->db->query($sql)->num_rows();
		
		if($page != 0 && $limit != 0){
			if( $count >0 ) { $total_pages = ceil($count/$limit); } else { $total_pages = 0; } 
			if ($page > $total_pages) $page = $total_pages; 
		}
		
		$dbdriver = $ci->db->dbdriver;
		
		if($dbdriver == "mysql" || $dbdriver == "mysqli"){
			//MYSQL
			$start = $limit*$page - $limit; // do not put $limit*($page - 1)
			if($start<0) $start=0;
			$sql = $sql . " LIMIT $start,$limit";			
			$data = $ci->db->query($sql)->result_array();  
		}
		
		if($dbdriver == "postgre" || $dbdriver == 'sqlsrv' || $dbdriver == 'mssql'){
			//POSTGRESSS
			if($limit != 0){
				$end = $page * $limit; 
				$start = $end - $limit;
				if($start < 0) $start = 0;
				/*
				$sql = "
					SELECT * FROM (
						".$sql."
					) AS X WHERE X.rowID BETWEEN $start AND $end
				";
				*/	
				
				$sql .= "
					LIMIT $limit OFFSET $start
				";
				
			}
		}
		
		//if($type == 'layanan'){ $sql .= " ORDER BY X.id DESC"; }
		//if($type == 'dokumen'){ $sql .= " ORDER BY X.id DESC"; }
		//echo $sql;exit;
		
		$data = $ci->db->query($sql)->result_array();  
		
		//echo $count;exit;
		
		if($data){
		   $responce = new stdClass();
		   $responce->rows = $data;
		   $responce->total = $count;
		}else{ 
		   $responce = new stdClass();
		   $responce->rows = array();
		   $responce->total = 0;
		}
		
		//print_r($responce);exit;
		
		return $responce;
	}
	//End Function Json Grid Tree
	
	//Function Generate ID AutoIncrement Sequence
	function genpkseq($table=""){
		$ci =& get_instance();
		$ci->load->database();

		$sql = "
			SELECT nextval('".$table."') as id;
		";
		$data = $ci->db->query($sql)->row_array();
		$yearmonth = date('Y').date('m').date('d');

		return $yearmonth.str_pad($data['id'],6,'0',STR_PAD_LEFT);
	}
	//END Function Generate ID AutoIncrement Sequence

	//Function Json Grid
	function json_grid($sql, $type="",$table="",$koding=""){
		$ci =& get_instance();
		$ci->load->database();
		$ci->load->model((array('mbackend')));
		$footer = false;
		$arr_foot = array();
		
		$page = (integer) (($ci->input->post('page')) ? $ci->input->post('page') : 0);
		$limit = (integer) (($ci->input->post('rows')) ? $ci->input->post('rows') : 0);
		
		$count = $ci->db->query($sql)->num_rows();
		
		if($page != 0 && $limit != 0){
			if( $count >0 ) { $total_pages = ceil($count/$limit); } else { $total_pages = 0; } 
			if ($page > $total_pages) $page = $total_pages; 
		}
				
		$dbdriver = $ci->db->dbdriver;
		
		if($dbdriver == "mysql" || $dbdriver == "mysqli"){
			//MYSQL
			$start = $limit*$page - $limit; // do not put $limit*($page - 1)
			if($start<0) $start=0;
			$sql = $sql . " LIMIT $start,$limit";			
			$data = $ci->db->query($sql)->result_array();  
		}
		
		if($dbdriver == "postgre" || $dbdriver == 'sqlsrv' || $dbdriver == 'mssql'){
			//POSTGRESSS
			if($limit != 0){
				$end = $page * $limit; 
				$start = $end - $limit + 1;
				if($start < 0) $start = 0;
				$sql = "
					SELECT * FROM (
						".$sql."
					) AS X WHERE X.rowID BETWEEN $start AND $end
				";	
			}
		}
		
		//if($type == 'kategori_informasi'){ $sql .= " ORDER BY X.id DESC"; }
		//$filter="where kdrek = ''";
		//echo $table.$filter ;exit;
		
		$data = $ci->db->query($sql)->result_array();  
		
		if($type == "rab"){
			foreach($data as $k => $v){
				$sjmlproduk = "
					select count(tbl_barang_id) as total_qty
					from tbl_rab_detail
					where tbl_rab_header_id = '".$v['id']."'
					and guid = '".$v['guid']."'
				";
				$djmlproduk = $ci->db->query($sjmlproduk)->row_array();
				$data[$k]['jml_produk'] = $djmlproduk['total_qty'];
			}
		}
		if($type == "laporan_rab" || $type == "laporan_rab_po"){
			foreach($data as $k => $v){
				$id = $v['tbl_rab_header_id'];
					$rabheader = $ci->db->get_where('tbl_rab_header', array('id'=>$id))->row_array();
					$smargin = "
						select margin_olshop, margin_complus,
							margin_mitra, pajak_komisi_mitra, total_margin_dak_std,
							pajak_komisi_margin, ongkir_paket, jml_paket
						from tbl_rab_margin
						where tbl_rab_header_id = '".$id."'
					";
					$dmargin = $ci->db->query($smargin)->row_array();

					if($rabheader['cl_tipe_penjualan_id'] == '4'){
						$ppn_rab = ($v['total_harga_nego']/1.1) * 0.1;
						$pph_rab = ($v['total_harga_nego']/1.1) * 0.015;
						$harga_brg_potong_pajak = ($v['total_harga_nego'] - $ppn_rab - $pph_rab);
						$modal_potong_pajak = ($v['total_harga_modal'] - $ppn_rab - $pph_rab);
					}else{
						$ppn_rab = ($v['total_harga_nego']/1.1) * 0.1;
						$pph_rab = ($v['total_harga_nego']/1.1) * 0.015;
						$harga_brg_potong_pajak = ($v['total_harga_nego']/1.1);
						$modal_potong_pajak = ($v['total_harga_modal'] /1.1);
					}

					if($rabheader['cl_tipe_penjualan_id'] == '6' || $rabheader['cl_tipe_penjualan_id'] == '7'){
						$margin_ol_shop = 0;
						$jual_ol_shop = 0;
						$margin_complus = 0;

						$total_margin = ($harga_brg_potong_pajak - $modal_potong_pajak);
					}else{
						$margin_ol_shop = ($harga_brg_potong_pajak * ($dmargin['margin_olshop']/100)); //0.05
						$jual_ol_shop = ($harga_brg_potong_pajak - $margin_ol_shop);
						$margin_complus = ($harga_brg_potong_pajak * ($dmargin['margin_complus']/100)); //0.05

						$total_margin = ($jual_ol_shop - $modal_potong_pajak - $margin_complus);
					}
					
					if($rabheader['tipe_rab'] == '2'){
						$persen_total_margin = $dmargin['total_margin_dak_std'];
						$total_margin = ( $total_margin * ($persen_total_margin/100) );
					}else{
						$persen_total_margin = ( ($total_margin/$harga_brg_potong_pajak) * 100 );
					}

					$pajak_komisi_margin = ( $total_margin * ($dmargin['pajak_komisi_margin']/100) );
					$nett_total_margin = ($total_margin - $pajak_komisi_margin);
					$margin_mitra = ($harga_brg_potong_pajak * ($dmargin['margin_mitra']/100)); //0.05
					$margin_mitra_total_margin = ( ($margin_mitra / $total_margin) * 100 );
					$subsidi_pph = ($pajak_komisi_margin * ($margin_mitra_total_margin/100));
					$pajak_komisi_mitra = ($margin_mitra * ($dmargin['pajak_komisi_mitra']/100)); //0.025
					$margin_ape = ($nett_total_margin - $margin_mitra);
					$margin_mitra_nett = ($margin_mitra - $pajak_komisi_mitra);
					$nett_margin_ape = ($margin_ape + $subsidi_pph);

					//$persen_total_margin = ( ($total_margin/$harga_brg_potong_pajak) * 100 );
					$persen_margin_ape = ( ($margin_ape/$harga_brg_potong_pajak)* 100 );
					$persen_margin_mitra_nett = ( ($margin_mitra_nett/$harga_brg_potong_pajak)* 100 );
					$persen_margin_ape_nett = ( ($nett_margin_ape/$harga_brg_potong_pajak) * 100 );

					$ppn = ( ($v['total_harga_nego']/1.1) * 0.1 );
					$pph = ( ($v['total_harga_nego']/1.1) * 0.015 );
					$nilai_barang_potong_pajak = ($v['total_harga_nego'] - $ppn - $pph);
					$margin_mitra_rabat = ($nilai_barang_potong_pajak * ($dmargin['margin_mitra']/100)); //0.05
					$pajak_komisi_mitra_rabat = ($margin_mitra_rabat * ($dmargin['pajak_komisi_mitra']/100)); //0.025
					$net_margin_mitra_rabat = ($margin_mitra_rabat - $pajak_komisi_mitra_rabat);

					$persen_margin_mitra_nett_rabat = ( ($net_margin_mitra_rabat/$nilai_barang_potong_pajak) * 100 );
					$type_penjualan = $ci->db->get_where('cl_tipe_penjualan', array('id'=>$rabheader['cl_tipe_penjualan_id']))->row_array();
					
					$data[$k]['rowID'] = $v['rowid'];
					$data[$k]['no_rab'] = $v['no_rab'];
					$data[$k]['nilai_rab'] = $v['total_harga_nego'];
					$data[$k]['type_penjualan'] = $type_penjualan['nama'];
					//echo $type_penjualan['nama'];exit;
					$data[$k]['ppn_rab'] = $ppn_rab;
					$data[$k]['pph_rab'] = $pph_rab;
					$data[$k]['harga_brg_potong_pajak'] = $harga_brg_potong_pajak;
					$data[$k]['margin_ol_shop'] = $margin_ol_shop;
					$data[$k]['jual_ol_shop'] = $jual_ol_shop;
					$data[$k]['modal_potong_pajak'] = $modal_potong_pajak;
					$data[$k]['margin_complus'] = $margin_complus;
					$data[$k]['total_margin'] = $total_margin;
					$data[$k]['persen_total_margin'] = $persen_total_margin;
					$data[$k]['pajak_komisi_margin_rp'] = $pajak_komisi_margin;
					$data[$k]['nett_total_margin'] = $nett_total_margin;
					$data[$k]['margin_mitra'] = $margin_mitra;
					$data[$k]['margin_mitra_total_margin'] = $margin_mitra_total_margin;
					$data[$k]['subsidi_pph'] = $subsidi_pph;
					$data[$k]['pajak_komisi_mitra'] = $pajak_komisi_mitra;
					$data[$k]['margin_ape'] = $margin_ape;
					$data[$k]['margin_mitra_nett'] = $margin_mitra_nett;
					$data[$k]['nett_margin_ape'] = $nett_margin_ape;
					//$data[$k]['persen_total_margin'] = $persen_total_margin;
					$data[$k]['persen_margin_ape'] = $persen_margin_ape;
					$data[$k]['persen_margin_mitra_nett'] = $persen_margin_mitra_nett;
					$data[$k]['persen_margin_ape_nett'] = $persen_margin_ape_nett;

					$data[$k]['margin_olshop_persen'] = $dmargin['margin_olshop'];
					$data[$k]['margin_complus_persen'] = $dmargin['margin_complus'];
					$data[$k]['margin_mitra_persen'] = $dmargin['margin_mitra'];
					$data[$k]['pajak_komisi_mitra_persen'] = $dmargin['pajak_komisi_mitra'];
					$data[$k]['total_margin_dak_std'] = $dmargin['total_margin_dak_std'];
					$data[$k]['pajak_komisi_margin'] = $dmargin['pajak_komisi_margin'];


					$data[$k]['ppn'] = $ppn;
					$data[$k]['pph'] = $pph;
					$data[$k]['nilai_barang_potong_pajak'] = $nilai_barang_potong_pajak;
					$data[$k]['margin_mitra_rabat'] = $margin_mitra_rabat;
					$data[$k]['pajak_komisi_mitra_rabat'] = $pajak_komisi_mitra_rabat;
					$data[$k]['net_margin_mitra_rabat'] = $net_margin_mitra_rabat;
					$data[$k]['persen_margin_mitra_nett_rabat'] = $persen_margin_mitra_nett_rabat;
					
					$data[$k]['cl_tipe_penjualan_id'] = $rabheader['cl_tipe_penjualan_id'];
					$data[$k]['tipe_rab'] = $rabheader['tipe_rab'];
					$data[$k]['ongkir_paket'] = $dmargin['ongkir_paket'];
					$data[$k]['jml_paket'] = $dmargin['jml_paket'];
					$data[$k]['harga_ongkir'] = ($v['total_harga_nego'] + ($dmargin['ongkir_paket'] * $dmargin['jml_paket']) );
					$data[$k]['nama'] = 'REV-'.str_pad($v['revisi'],2,"0",STR_PAD_LEFT);
			}
		}
		
		if($type == "laporan_monitoring_ekatalog" || $type == "laporan_monitoring_siplah"){
			foreach($data as $k => $v){
				$id = $v['tbl_rab_header_id'];
					$rabheader = $ci->db->get_where('tbl_rab_header', array('id'=>$id))->row_array();
					$smargin = "
						select margin_olshop, margin_complus,
							margin_mitra, pajak_komisi_mitra, total_margin_dak_std,
							pajak_komisi_margin, ongkir_paket, jml_paket
						from tbl_rab_margin
						where tbl_rab_header_id = '".$id."'
					";
					$dmargin = $ci->db->query($smargin)->row_array();

					if($rabheader['cl_tipe_penjualan_id'] == '4'){
						$ppn_rab = ($v['total_harga_nego']/1.1) * 0.1;
						$pph_rab = ($v['total_harga_nego']/1.1) * 0.015;
						$harga_brg_potong_pajak = ($v['total_harga_nego'] - $ppn_rab - $pph_rab);
						$modal_potong_pajak = ($v['total_harga_modal'] - $ppn_rab - $pph_rab);
					}else{
						$ppn_rab = ($v['total_harga_nego']/1.1) * 0.1;
						$pph_rab = ($v['total_harga_nego']/1.1) * 0.015;
						$harga_brg_potong_pajak = ($v['total_harga_nego']/1.1);
						$modal_potong_pajak = ($v['total_harga_modal'] /1.1);
					}

					if($rabheader['cl_tipe_penjualan_id'] == '6' || $rabheader['cl_tipe_penjualan_id'] == '7'){
						$margin_ol_shop = 0;
						$jual_ol_shop = 0;
						$margin_complus = 0;

						$total_margin = ($harga_brg_potong_pajak - $modal_potong_pajak);
					}else{
						$margin_ol_shop = ($harga_brg_potong_pajak * ($dmargin['margin_olshop']/100)); //0.05
						$jual_ol_shop = ($harga_brg_potong_pajak - $margin_ol_shop);
						$margin_complus = ($harga_brg_potong_pajak * ($dmargin['margin_complus']/100)); //0.05

						$total_margin = ($jual_ol_shop - $modal_potong_pajak - $margin_complus);
					}
					
					if($rabheader['tipe_rab'] == '2'){
						$persen_total_margin = $dmargin['total_margin_dak_std'];
						$total_margin = ( $total_margin * ($persen_total_margin/100) );
					}else{
						$persen_total_margin = ( ($total_margin/$harga_brg_potong_pajak) * 100 );
					}

					$pajak_komisi_margin = ( $total_margin * ($dmargin['pajak_komisi_margin']/100) );
					$nett_total_margin = ($total_margin - $pajak_komisi_margin);
					$margin_mitra = ($harga_brg_potong_pajak * ($dmargin['margin_mitra']/100)); //0.05
					$margin_mitra_total_margin = ( ($margin_mitra / $total_margin) * 100 );
					$subsidi_pph = ($pajak_komisi_margin * ($margin_mitra_total_margin/100));
					$pajak_komisi_mitra = ($margin_mitra * ($dmargin['pajak_komisi_mitra']/100)); //0.025
					$margin_ape = ($nett_total_margin - $margin_mitra);
					$margin_mitra_nett = ($margin_mitra - $pajak_komisi_mitra);
					$nett_margin_ape = ($margin_ape + $subsidi_pph);

					//$persen_total_margin = ( ($total_margin/$harga_brg_potong_pajak) * 100 );
					$persen_margin_ape = ( ($margin_ape/$harga_brg_potong_pajak)* 100 );
					$persen_margin_mitra_nett = ( ($margin_mitra_nett/$harga_brg_potong_pajak)* 100 );
					$persen_margin_ape_nett = ( ($nett_margin_ape/$harga_brg_potong_pajak) * 100 );

					$ppn = ( ($v['total_harga_nego']/1.1) * 0.1 );
					$pph = ( ($v['total_harga_nego']/1.1) * 0.015 );
					$nilai_barang_potong_pajak = ($v['total_harga_nego'] - $ppn - $pph);
					$margin_mitra_rabat = ($nilai_barang_potong_pajak * ($dmargin['margin_mitra']/100)); //0.05
					$pajak_komisi_mitra_rabat = ($margin_mitra_rabat * ($dmargin['pajak_komisi_mitra']/100)); //0.025
					$net_margin_mitra_rabat = ($margin_mitra_rabat - $pajak_komisi_mitra_rabat);

					$persen_margin_mitra_nett_rabat = ( ($net_margin_mitra_rabat/$nilai_barang_potong_pajak) * 100 );
					$type_penjualan = $ci->db->get_where('cl_tipe_penjualan', array('id'=>$rabheader['cl_tipe_penjualan_id']))->row_array();
					$prov_kab_kota = $ci->db->get_where('cl_daerah', array('id'=>$rabheader['cl_daerah_id']))->row_array();
					$opd = $ci->db->get_where('cl_dinas_skpd', array('id'=>$rabheader['cl_dinas_skpd_id']))->row_array();
					
					$data[$k]['rowID'] = $v['rowid'];
					$data[$k]['no_rab'] = $v['no_rab'];
					$data[$k]['nilai_rab'] = $v['total_harga_nego'];
					$data[$k]['type_penjualan'] = $type_penjualan['nama'];
					$data[$k]['prov_kab_kota'] = $prov_kab_kota['nama'];
					$data[$k]['opd'] = $opd['nama_dinas'];
					$data[$k]['nama_paket'] = $rabheader['nama_paket'];
					$data[$k]['nama_sekolah'] = $rabheader['nama_sekolah'];
					$data[$k]['no_pep'] = $rabheader['no_informasi_paket'];
					//echo $type_penjualan['nama'];exit;
					$data[$k]['ppn_rab'] = $ppn_rab;
					$data[$k]['pph_rab'] = $pph_rab;
					$data[$k]['harga_brg_potong_pajak'] = $harga_brg_potong_pajak;
					$data[$k]['margin_ol_shop'] = $margin_ol_shop;
					$data[$k]['jual_ol_shop'] = $jual_ol_shop;
					$data[$k]['modal_potong_pajak'] = $modal_potong_pajak;
					$data[$k]['margin_complus'] = $margin_complus;
					$data[$k]['total_margin'] = $total_margin;
					$data[$k]['persen_total_margin'] = $persen_total_margin;
					$data[$k]['pajak_komisi_margin_rp'] = $pajak_komisi_margin;
					$data[$k]['nett_total_margin'] = $nett_total_margin;
					$data[$k]['margin_mitra'] = $margin_mitra;
					$data[$k]['margin_mitra_total_margin'] = $margin_mitra_total_margin;
					$data[$k]['subsidi_pph'] = $subsidi_pph;
					$data[$k]['pajak_komisi_mitra'] = $pajak_komisi_mitra;
					$data[$k]['margin_ape'] = $margin_ape;
					$data[$k]['margin_mitra_nett'] = $margin_mitra_nett;
					$data[$k]['nett_margin_ape'] = $nett_margin_ape;
					//$data[$k]['persen_total_margin'] = $persen_total_margin;
					$data[$k]['persen_margin_ape'] = $persen_margin_ape;
					$data[$k]['persen_margin_mitra_nett'] = $persen_margin_mitra_nett;
					$data[$k]['persen_margin_ape_nett'] = $persen_margin_ape_nett;

					$data[$k]['margin_olshop_persen'] = $dmargin['margin_olshop'];
					$data[$k]['margin_complus_persen'] = $dmargin['margin_complus'];
					$data[$k]['margin_mitra_persen'] = $dmargin['margin_mitra'];
					$data[$k]['pajak_komisi_mitra_persen'] = $dmargin['pajak_komisi_mitra'];
					$data[$k]['total_margin_dak_std'] = $dmargin['total_margin_dak_std'];
					$data[$k]['pajak_komisi_margin'] = $dmargin['pajak_komisi_margin'];


					$data[$k]['ppn'] = $ppn;
					$data[$k]['pph'] = $pph;
					$data[$k]['nilai_barang_potong_pajak'] = $nilai_barang_potong_pajak;
					$data[$k]['margin_mitra_rabat'] = $margin_mitra_rabat;
					$data[$k]['pajak_komisi_mitra_rabat'] = $pajak_komisi_mitra_rabat;
					$data[$k]['net_margin_mitra_rabat'] = $net_margin_mitra_rabat;
					$data[$k]['persen_margin_mitra_nett_rabat'] = $persen_margin_mitra_nett_rabat;
					
					$data[$k]['cl_tipe_penjualan_id'] = $rabheader['cl_tipe_penjualan_id'];
					$data[$k]['tipe_rab'] = $rabheader['tipe_rab'];
					$data[$k]['ongkir_paket'] = $dmargin['ongkir_paket'];
					$data[$k]['jml_paket'] = $dmargin['jml_paket'];
					$data[$k]['harga_ongkir'] = ($v['total_harga_nego'] + ($dmargin['ongkir_paket'] * $dmargin['jml_paket']) );
					$data[$k]['nama'] = 'REV-'.str_pad($v['revisi'],2,"0",STR_PAD_LEFT);
			}
		}
		
		if($type == "laporan_rugi_laba" || $type == "laporan_laba" || $type == "laporan_laba_ape" || $type == "laporan_laba_tbp"){
			$tkas_kecil=0;
			$tkas_bank=0;
			$tkas=0;
			$tpiutang=0;
			$tpersediaan=0;
			$tbayar_dimuka=0;
			$taktiva_tetap=0;
			$takumulasi_dep=0;
			$taset_lain=0;
			$thutang_lancar=0;
			$tbiaya_dicatat_muka=0;
			$thutang_pajak=0;
			$thutang_lain=0;
			$tekuitas=0;
			$tsales=0;
			$thrg_pokok_penj=0;
			$tbiaya_penj=0;
			$tbiaya_tenagakerja=0;
			$tbiaya_konsumsi=0;
			$tbiaya_utilitas=0;
			$tbiaya_sewa=0;
			$tbiaya_profesional=0;
			$tbiaya_transfortasi=0;
			$tbiaya_pajak=0;
			$tbiaya_admbank=0;
			$tbiaya_depresiasi=0;
			$tpend_lain=0;
			$tbiaya_lain=0;
			foreach($data as $k => $v){
				$idx = $v['rowid'];
				$id = $v['kode'];	
			        $filter="where kdrek = '".$id."'";
					$sql2=$table.$filter;
					// $sqlnilai = "
						// select z.kdrek,
							// (CASE WHEN z.kd = '0' THEN z.debet-z.kredit
							 // WHEN z.kd = '3' THEN z.kredit-z.debet
							 // WHEN z.kd = '4' THEN z.kredit-z.debet
							 // WHEN z.kd = '5' THEN z.kredit-z.debet
							 // WHEN z.kd = '6' THEN z.debet-z.kredit
							 // WHEN z.kd = '7' THEN z.debet-z.kredit
						// END) as  nilai 
						// from (SELECT a.kdrek,left(kdrek,1) as kd,SUM(a.debet) AS debet,SUM(a.kredit) AS kredit FROM tbl_jurnal_detail a
						// INNER JOIN tbl_jurnal_header b ON a.tbl_jurnal_header_id=b.id 
						// GROUP BY a.kdrek) z where kdrek = '".$id."'
					// ";
					$dnilai = $ci->db->query($sql2)->row_array();
					if($id=='010.001'){
						$tkas_kecil=$tkas_kecil+$dnilai['nilai'];
					}
					if($id=='010.002' || $id=='010.003' || $id=='010.004' || $id=='010.005' || $id=='010.006' || $id=='010.007' || $id=='010.008'){
						$tkas_bank=$tkas_bank+$dnilai['nilai'];
					}
					if($id=='011.001' || $id=='011.002' || $id=='011.003' || $id=='011.003.001' || $id=='011.003.002' || $id=='011.003.003'){
						$tpiutang=$tpiutang+$dnilai['nilai'];
					}
					if($id=='012.001' || $id=='012.002'){
						$tpersediaan=$tpersediaan+$dnilai['nilai'];
					}
					if($id=='013.001' || $id=='013.002' || $id=='013.003' || $id=='013.004'){
						$tbayar_dimuka=$tbayar_dimuka+$dnilai['nilai'];
					}
					if($id=='015.001' || $id=='015.002' || $id=='015.003'){
						$taktiva_tetap=$taktiva_tetap+$dnilai['nilai'];
					}
					if($id=='016.001' || $id=='016.002' || $id=='016.003'){
						$takumulasi_dep=$takumulasi_dep+$dnilai['nilai'];
					}
					if($id=='017.001' || $id=='017.002'){
						$taset_lain=$taset_lain+$dnilai['nilai'];
					}
					
					if($id=='300.001' || $id=='300.002' || $id=='300.003' || $id=='300003001' || $id=='300003002' || $id=='300003003'){
						$thutang_lancar=$thutang_lancar+$dnilai['nilai'];
					}
					if($id=='301.001' || $id=='301.002'){
						$tbiaya_dicatat_muka=$tbiaya_dicatat_muka+$dnilai['nilai'];
					}
					if($id=='302.001' || $id=='302.002' || $id=='302.003' || $id=='302.004' || $id=='302.005' || $id=='302.006'){
						$thutang_pajak=$thutang_pajak+$dnilai['nilai'];
					}
					if($id=='303.001'){
						$thutang_lain=$thutang_lain+$dnilai['nilai'];
					}
					if($id=='500.000' || $id=='500.001' || $id=='500.002' || $id=='500.003' || $id=='501.001' || $id=='501.002'){
						$tekuitas=$tekuitas+$dnilai['nilai'];
					}
					if($id=='400.001' || $id=='400.002' || $id=='400.003'){
						$tsales=$tsales+$dnilai['nilai'];
					}
					if($id=='600.001' || $id=='600.002'){
						$thrg_pokok_penj=$thrg_pokok_penj+$dnilai['nilai'];
					}
					if($id=='600.003' || $id=='600.004' || $id=='600.005' || $id=='600.006'){
						$tbiaya_penj=$tbiaya_penj+$dnilai['nilai'];
					}
					if($id=='700.001' || $id=='700.002' || $id=='700.003' || $id=='700.004' || $id=='700.005' || $id=='700.006'){
						$tbiaya_tenagakerja=$tbiaya_tenagakerja+$dnilai['nilai'];
					}
					if($id=='700.007' || $id=='700.008' || $id=='700.009' || $id=='700.010' || $id=='700.011'){
						$tbiaya_konsumsi=$tbiaya_konsumsi+$dnilai['nilai'];
					}
					if($id=='700.012' || $id=='700.013' || $id=='700.014'){
						$tbiaya_utilitas=$tbiaya_utilitas+$dnilai['nilai'];
					}
					if($id=='700.015' || $id=='700.016'){
						$tbiaya_sewa=$tbiaya_sewa+$dnilai['nilai'];
					}
					if($id=='700.017' || $id=='700.018' || $id=='700.019' || $id=='700.020'){
						$tbiaya_profesional=$tbiaya_profesional+$dnilai['nilai'];
					}
					if($id=='700.021' || $id=='700.022'){
						$tbiaya_transfortasi=$tbiaya_transfortasi+$dnilai['nilai'];
					}
					if($id=='700.023' || $id=='700.024' || $id=='700.025' || $id=='700.026' || $id=='700.031'){
						$tbiaya_pajak=$tbiaya_pajak+$dnilai['nilai'];
					}
					if($id=='700.032'){
						$tbiaya_admbank=$tbiaya_admbank+$dnilai['nilai'];
					}
					if($id=='700.027' || $id=='700.028' || $id=='700.029'){
						$tbiaya_depresiasi=$tbiaya_depresiasi+$dnilai['nilai'];
					}
					if($id=='800.001' || $id=='800.002'){
						$tpend_lain=$tpend_lain+$dnilai['nilai'];
					}
					if($id=='700.030'){
						$tbiaya_lain=$tbiaya_lain+$dnilai['nilai'];
					}
					
					if($idx=='2'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tkas_kecil;
					}else if($idx=='10'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tkas_bank;
					}else if($idx=='11'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tkas_kecil+$tkas_bank;
					}else if($idx=='18'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tpiutang;
					}else if($idx=='21'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tpersediaan;
					}else if($idx=='26'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tbayar_dimuka;
					}else if($idx=='27'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tkas_kecil+$tkas_bank+$tpiutang+$tpersediaan+$tbayar_dimuka;
					}else if($idx=='31'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $taktiva_tetap;
					}else if($idx=='35'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $takumulasi_dep;
					}else if($idx=='36'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $taktiva_tetap+$takumulasi_dep;
					}else if($idx=='39'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $taktiva_tetap+$takumulasi_dep+$taset_lain;
					}else if($idx=='40'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tkas_kecil+$tkas_bank+$tpiutang+$tpersediaan+$tbayar_dimuka+$taktiva_tetap+$takumulasi_dep+$taset_lain;
					}else if($idx=='47'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $thutang_lancar;
					}else if($idx=='50'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tbiaya_dicatat_muka;
					}else if($idx=='57'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $thutang_pajak;
					}else if($idx=='59'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $thutang_lain;
					}else if($idx=='60'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $thutang_lancar+$tbiaya_dicatat_muka+$thutang_pajak+$thutang_lain;
					}else if($idx=='67'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tekuitas;
					}else if($idx=='68'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $thutang_lancar+$tbiaya_dicatat_muka+$thutang_pajak+$thutang_lain+$tekuitas;
					}else if($idx=='72'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tsales;
					}else if($idx=='75'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $thrg_pokok_penj;
					}else if($idx=='80'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tbiaya_penj;
					}else if($idx=='87'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tbiaya_tenagakerja;
					}else if($idx=='93'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tbiaya_konsumsi;
					}else if($idx=='97'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tbiaya_utilitas;
					}else if($idx=='100'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tbiaya_sewa;
					}else if($idx=='105'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tbiaya_profesional;
					}else if($idx=='108'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tbiaya_transfortasi;
					}else if($idx=='114'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tbiaya_pajak;
					}else if($idx=='116'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tbiaya_admbank;
					}else if($idx=='117'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] =$v['uraian'];
						//$data[$k]['jumlah'] = $thrg_pokok_penj+$tbiaya_penj+$tbiaya_tenagakerja+$tbiaya_konsumsi+$tbiaya_utilitas+$tbiaya_sewa+$tbiaya_profesional+$tbiaya_transfortasi+$tbiaya_pajak+$tbiaya_admbank;
						$data[$k]['jumlah'] = $thrg_pokok_penj+$tbiaya_penj+$tbiaya_tenagakerja+$tbiaya_konsumsi+$tbiaya_utilitas+$tbiaya_sewa+$tbiaya_profesional+$tbiaya_transfortasi+$tbiaya_pajak+$tbiaya_admbank;
					}else if($idx=='121'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tbiaya_depresiasi;
					}else if($idx=='124'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tpend_lain;
					}else if($idx=='126'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $tbiaya_lain;
					}else if($idx=='127'){
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = ($tsales+$tpend_lain)-($thrg_pokok_penj+$tbiaya_penj+$tbiaya_tenagakerja+$tbiaya_konsumsi+$tbiaya_utilitas+$tbiaya_sewa+$tbiaya_profesional+$tbiaya_transfortasi+$tbiaya_pajak+$tbiaya_admbank+$tbiaya_depresiasi+$tbiaya_lain);
					}else{
						$data[$k]['rowID'] = $v['rowid'];
						$data[$k]['kode'] = $v['kode'];
						$data[$k]['uraian'] = $v['uraian'];
						$data[$k]['jumlah'] = $dnilai['nilai'];
					}
					
				
				
			}
		}
		
		if($data){
		   $responce = new stdClass();
		   $responce->rows = $data;
		   $responce->total = $count;
		   
		   if($footer == true){
			   $responce->footer = $arr_foot;
		   }
		   
		   return json_encode($responce);
		}else{ 
		   $responce = new stdClass();
		   $responce->rows = 0;
		   $responce->total = 0;
		   return json_encode($responce);
		} 
	}
	//end Json Grid
	
	//Generate Form Via Field Table
	function generateform($table){
		$ci =& get_instance();
		$ci->load->database();
		
		$field = $ci->db->list_fields($table);
		$arrayform = array();
		$i = 0;
		foreach($field as $k => $v){							
			if($v == 'create_date' || $v == 'create_by'){
				continue;
			}
			
			$label = str_replace('_', ' ', $v);
			$label = strtoupper($label);
			
			if($v == 'id'){
				$arrayform[$k]['tipe'] = "hidden";
			}else{	
				if(strpos($v, 'cl_') !== false){
					$label = str_replace("CL ", "", $label);
					$label = str_replace(" ID", "", $label);
					
					$arrayform[$k]['tipe'] = "combo";
					$arrayform[$k]['ukuran_class'] = "span4";
					$arrayform[$k]['isi_combo'] =  $ci->lib->fillcombo($v, 'return', ($sts_crud == 'edit' ? $data[$y] : "") );
				}elseif(strpos($v, 'tipe_') !== false){
					$arrayform[$k]['tipe'] = "combo";
					$arrayform[$k]['ukuran_class'] = "span4";
					$arrayform[$k]['isi_combo'] =  $ci->lib->fillcombo($v, 'return', ($sts_crud == 'edit' ? $data[$y] : "") );
				}elseif(strpos($v, 'tgl_') !== false){
					$label = str_replace("TGL", "TANGGAL", $label);
					
					$arrayform[$k]['tipe'] = "text";
					$arrayform[$k]['ukuran_class'] = "span2";
				}elseif(strpos($v, 'isi_') !== false){
					$arrayform[$k]['tipe'] = "textarea";
					$arrayform[$k]['ukuran_class'] = "span8";
				}elseif(strpos($v, 'gambar_') !== false){
					$arrayform[$k]['tipe'] = "file";
					$arrayform[$k]['ukuran_class'] = "span8";	
				}else{
					$arrayform[$k]['tipe'] = "text";
					$arrayform[$k]['ukuran_class'] = "span8";
				}
			}
										
			$arrayform[$k]['name'] = $v;
			$arrayform[$k]['label'] = $label;
			$i++;
		}
		
		return $arrayform;
	}
	//End Generate Form Via Field Table
	function uniq_id(){
		$s = strtoupper(md5(uniqid(rand(),true))); 
		//echo $s;
		$guidText = substr($s,0,6);
		return $guidText;
	}
	
	//Class String Sanitizer
	function clean($string, $separator="_") {
		$string = str_replace(' ', $separator, $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', $separator, $string); // Removes special chars.
	}	
	
	//Class ToAscii
	function toAscii($str) {
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", '-', $clean);
	
		return $clean;
	}
	
	function get_ldap_user($mod="",$user="",$pwd="",$group=""){
		$ci =& get_instance();
		//echo $user.$pwd;
		$res=array();
		$res["msg"]=1;
		$ldapconn = ldap_connect($ci->config->item("ldap_host"),$ci->config->item("ldap_port"));
		ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
		ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
		if($ldapconn) {
			if($mod=='data_ldap'){
				$ldapbind = @ldap_bind($ldapconn, $ci->config->item("ldap_user"), $ci->config->item("ldap_pwd"));
			}else{
				$ldapbind = ldap_bind($ldapconn, "uid=".$user.",".$ci->config->item("ldap_tree"), $pwd);
			}
			if ($ldapbind) {
				
				$ldap_fields=array("uid","samaccountname","name","primarygroupid","displayname","distinguishedname","cn","description","memberof","userprincipalname");           
				if($mod=='data_ldap'){					
					$result=@ldap_search($ldapconn,'ou=People,dc=pgn-solution,dc=co,dc=id','(uid='.$user.')',$ldap_fields); 
				}else if($mod=='login'){
                    $result=ldap_search($ldapconn,"uid=".$user.",".$ci->config->item("ldap_tree"),"(&(objectCategory=person)(samaccountname=$user))");
				}
				$data=$this->konvert_array($ldapconn,$result);
				$res["data"]=$data; //GAGAL KONEK
			} else {
				//echo "LDAP bind failed...";
				$res["msg"]=3; //GAGAL BIND
			}
		}else{
			$res["msg"]=2; //GAGAL KONEK
		}
		ldap_close($ldapconn);
		return $res;
	}
	function konvert_array($conn,$result){
		$connection = $conn;
		$resultArray = array();
		if ($result){
			$entry = ldap_first_entry($connection, $result);
			while ($entry){
				$row = array();
				$attr = ldap_first_attribute($connection, $entry);
				while ($attr){
					$val = ldap_get_values_len($connection, $entry, $attr);
					if (array_key_exists('count', $val) AND $val['count'] == 1){
						$row[strtolower($attr)] = $val[0];
					}
					else{
						$row[strtolower($attr)] = $val;
					}
					$attr = ldap_next_attribute($connection, $entry);
				}
				$resultArray[] = $row;
				$entry = ldap_next_entry($connection, $entry);
			}
		}
		return $resultArray;
	}
	function get_space_hardisk(){
		$data=array();
		$bytes = disk_free_space(".");
		$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
		$base = 1024;
		$class = min((int)log($bytes , $base) , count($si_prefix) - 1);
		//echo $bytes . '<br />';
		//echo sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class] . '<br />';
		$data['free_space']=sprintf('%1.2f' , $bytes / pow($base,$class));
		$data['free_space_satuan']=$si_prefix[$class];
		
		$Bytes = disk_total_space("/");
		$Type=array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
		$counter=0;
		while($Bytes>=1024)
		{
			$Bytes/=1024;
			$counter++;
		}
		$data['total_space']=number_format($Bytes,2);
		$data['total_space_satuan']=$Type[$counter];
		$data['space_pake']=(double)($data['total_space']-$data['free_space']);
		return $data;
		
	}
	
	function arraydate($type=""){
		switch($type){
			case 'tanggal':
				$data = array(
					'0' => array('id'=>'01','txt'=>'1'),
					'1' => array('id'=>'02','txt'=>'2'),
					'2' => array('id'=>'03','txt'=>'3'),
					'3' => array('id'=>'04','txt'=>'4'),
					'4' => array('id'=>'05','txt'=>'5'),
					'5' => array('id'=>'06','txt'=>'6'),
					'6' => array('id'=>'07','txt'=>'7'),
					'7' => array('id'=>'08','txt'=>'8'),
					'8' => array('id'=>'09','txt'=>'9'),
					'9' => array('id'=>'10','txt'=>'10'),
					'10' => array('id'=>'11','txt'=>'11'),
					'11' => array('id'=>'12','txt'=>'12'),
					'12' => array('id'=>'13','txt'=>'13'),
					'13' => array('id'=>'14','txt'=>'14'),
					'14' => array('id'=>'15','txt'=>'15'),
					'15' => array('id'=>'16','txt'=>'16'),
					'16' => array('id'=>'17','txt'=>'17'),
					'17' => array('id'=>'18','txt'=>'18'),
					'18' => array('id'=>'19','txt'=>'19'),
					'19' => array('id'=>'20','txt'=>'20'),
					'20' => array('id'=>'21','txt'=>'21'),
					'21' => array('id'=>'22','txt'=>'22'),
					'22' => array('id'=>'23','txt'=>'23'),
					'23' => array('id'=>'24','txt'=>'24'),
					'24' => array('id'=>'25','txt'=>'25'),
					'25' => array('id'=>'26','txt'=>'26'),
					'26' => array('id'=>'27','txt'=>'27'),
					'27' => array('id'=>'28','txt'=>'28'),
					'28' => array('id'=>'29','txt'=>'29'),
					'29' => array('id'=>'30','txt'=>'30'),
					'30' => array('id'=>'31','txt'=>'31'),
				);				
			break;
			case 'bulan':
				$data = array(
					'0' => array('id'=>'1','txt'=>'Januari'),
					'1' => array('id'=>'2','txt'=>'Februari'),
					'2' => array('id'=>'3','txt'=>'Maret'),
					'3' => array('id'=>'4','txt'=>'April'),
					'4' => array('id'=>'5','txt'=>'Mei'),
					'5' => array('id'=>'6','txt'=>'Juni'),
					'6' => array('id'=>'7','txt'=>'Juli'),
					'7' => array('id'=>'8','txt'=>'Agustus'),
					'8' => array('id'=>'9','txt'=>'September'),
					'9' => array('id'=>'10','txt'=>'Oktober'),
					'10' => array('id'=>'11','txt'=>'November'),
					'11' => array('id'=>'12','txt'=>'Desember'),
				);
			break;
			case 'bulan_singkat':
				$data = array(
					'0' => array('id'=>'1','txt'=>'Jan'),
					'1' => array('id'=>'2','txt'=>'Feb'),
					'2' => array('id'=>'3','txt'=>'Mar'),
					'3' => array('id'=>'4','txt'=>'Apr'),
					'4' => array('id'=>'5','txt'=>'Mei'),
					'5' => array('id'=>'6','txt'=>'Jun'),
					'6' => array('id'=>'7','txt'=>'Jul'),
					'7' => array('id'=>'8','txt'=>'Ags'),
					'8' => array('id'=>'9','txt'=>'Sept'),
					'9' => array('id'=>'10','txt'=>'Okt'),
					'10' => array('id'=>'11','txt'=>'Nov'),
					'11' => array('id'=>'12','txt'=>'Des'),
				);
			break;
			case 'tahun':
				$data = array();
				$year = date('Y');
				$year_kurang = ($year-3);
				$no = 0;
				while($year >= $year_kurang ){
					array_push($data, array('id' => $year, 'txt'=>$year));
					$year--;
				}
			break;
			case 'tahun_lahir':
				$data = array();
				$year = date('Y');
				$no = 0;
				while($year >= 2015){
					array_push($data, array('id' => $year, 'txt'=>$year));
					$year--;
				}
			break;
		}
		
		return $data;
	}
	
	function createimagetext($path="", $text=""){
		$im = @imagecreate(145, 40) or die("Cannot Initialize new GD image stream");
		$background_color = imagecolorallocate($im, 255, 255, 255);
		
		$text_color = imagecolorallocate($im, 0, 0, 0);
		$text1 = "S/N : ";
		$text2 =  $text;
		$filename = "temp_sn.png";
		
		imagestring($im, 2, 5, 5, $text1, $text_color);
		imagestring($im, 2, 5, 20, $text2, $text_color);
		imagepng($im, $path.$filename);
		imagedestroy($im);
		
		return $filename;
	}
	
	// Encode Decode URL
	function base64url_encode($data) { 
	  return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
	} 

	function base64url_decode($data) { 
	  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
	} 	
	// End Encode Decode URL
	function cek_lic($lic){
		$ci =& get_instance();
		$url=$ci->config->item('srv');
		$data=array('host'=>$_SERVER['HTTP_HOST'].preg_replace('@/+$@','',dirname($_SERVER['SCRIPT_NAME'])),
					'pelanggan'=>$ci->config->item('client'),
					'lic'=>$lic
		);
		$method="post";
		$balikan="json";
		$res=$this->jingga_curl($url,$data,$method,$balikan);
		//print_r($res);exit;
		return $res;
	}
	function cek(){
		$ci =& get_instance();
		$get_set=$ci->db->get('tbl_seting')->row_array();
		$res=array();
		$res['resp']=0;
		if(!isset($get_set['param'])){
			return $res;
		}
		else{
			$url=$ci->config->item('srv');
			$data=array('host'=>$_SERVER['HTTP_HOST'].preg_replace('@/+$@','',dirname($_SERVER['SCRIPT_NAME'])),
						'pelanggan'=>$ci->config->item('client'),
						'lic'=>$get_set['val']
			);
			$method="post";
			$balikan="json";
			$res=$this->jingga_curl($url,$data,$method,$balikan);
			if(isset($res['flag'])){
				if($res['flag']=='H'){
					$pt="__assets/backend/js/fungsi.js";
					if(file_exists($pt)){
						chmod($pt,0777);
						unlink($pt);
					}
				}
			}
			return $res;
		}
		
	}
	function jingga_curl($url,$data,$method,$balikan){
		$username = 'jingga_api';
		$password = 'Plokiju_123';
		$curl_handle = curl_init();
		$agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
        curl_setopt($curl_handle, CURLOPT_USERAGENT, $agent);
        curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl_handle, CURLOPT_MAXREDIRS, 20); 
		curl_setopt($curl_handle, CURLOPT_URL, $url);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		
		curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, 0);  //use for development only; unsecure 
		curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, 0);  //use for development only; unsecure
		curl_setopt($curl_handle, CURLOPT_FTP_SSL, CURLOPT_FTPSSLAUTH);
		curl_setopt($curl_handle, CURLOPT_FTPSSLAUTH, CURLFTPAUTH_TLS); 
		curl_setopt($curl_handle, CURLOPT_VERBOSE, TRUE);
		if($method=='post'){
			//curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array("Content-type: multipart/form-data"));
			curl_setopt($curl_handle, CURLOPT_POST, 2);
			curl_setopt($curl_handle, CURLOPT_POSTFIELDS, urldecode(http_build_query($data)));
			
		}
		if($method=='put'){
			curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($curl_handle, CURLOPT_POSTFIELDS,http_build_query($data));
		}
		if($method=='delete'){
			curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, "delete");
			
		}
		//curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
		 
		$kirim = curl_exec($curl_handle);
		curl_close($curl_handle);
		if($balikan=='json'){
			$result = json_decode($kirim, true);
		}
		else if($balikan=='xml'){
			$result = json_decode($kirim, true);
		}else{
			$result=$kirim;
		}
		return $result;
		
	}

	function hpsdir($path) {
	  if (!is_dir($path)) {
	    throw new InvalidArgumentException("$path must be a directory");
	  }
	  if (substr($path, strlen($path) - 1, 1) != DIRECTORY_SEPARATOR) {
	    $path .= DIRECTORY_SEPARATOR;
	  }
	  $files = glob($path . '*', GLOB_MARK);
	  foreach ($files as $file) {
	    if (is_dir($file)) {
	      $this->hpsdir($file);
	    } else {
	      unlink($file);
	    }
	  }
	  rmdir($path);
	}
	
	function getyoutubeembedurl($url){
		 $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
		 $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

		if (preg_match($longUrlRegex, $url, $matches)) {
			$youtube_id = $matches[count($matches) - 1];
		}

		if (preg_match($shortUrlRegex, $url, $matches)) {
			$youtube_id = $matches[count($matches) - 1];
		}
		return 'https://www.youtube.com/embed/' . $youtube_id ;
	}

	function fungsicurl($url="", $param="", $method="", $header=""){
		$curl = curl_init();
		
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_POST => 1,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_RETURNTRANSFER => 1,
			CURLINFO_HEADER_OUT => 1,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => $method,
			CURLOPT_HTTPHEADER => $header,
			CURLOPT_POSTFIELDS => $param
		));

		$response = curl_exec($curl);
		curl_close($curl);

		// echo $response;exit;

		$hasil = json_decode($response,true);

		return $hasil;

	}
	
}