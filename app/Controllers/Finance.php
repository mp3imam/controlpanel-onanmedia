<?php

namespace App\Controllers;

use CodeIgniter\Database\BaseConnection;
use App\Models\Mfinance;

class Finance extends BaseController
{
    private $viewDir = 'finance/';
    protected $financeModel;

    function __construct()
    {
        $this->Mmaster = new Mmaster();
        $this->db = \Config\Database::connect();
    }


    public function index()
    {
        // $this->smarty->display('main-backend.php');
    }

    function get_form($mod)
    {
        $temp = 'finance/form/form_' . $mod . ".php";
        $sts = $this->request->getPost('editstatus');
        if (isset($sts)) {
            $this->smarty->assign('sts', $sts);
        } else {
            $sts = "";
        }

        switch ($mod) {

            case "pendidikan":
                if ($sts == 'edit') {
                    $data = $this->Mmaster->getdata('pendidikan', 'row_array');
                    $this->smarty->assign('data', $data);
                }
            break;
        }

        $this->smarty->assign('mod', $mod);
        $this->smarty->assign('temp', $temp);

        if (!file_exists(VIEWPATH . $temp)) {
            $this->smarty->display('konstruksi.php');
        } else {
            $this->smarty->display($temp);
        }
    }

    function get_grid($mod)
    {
        $temp = 'master/grid_config.php';
        $tombol_std = "true";
        $filter = $this->combo_option($mod);
        $cekmenu = $this->db->table('panel.tbl_user_menu')->getWhere(['ref_tbl' => $mod])->getRowArray();

        switch ($mod) {
            case "master":

            break;

            default:

            break;
        }

        $this->smarty->assign('judulbesar', $cekmenu['keterangan'] ?? null);
        $this->smarty->assign("table", $mod);
        $this->smarty->assign("mod", $mod);
        $this->smarty->assign("tombol_std", $tombol_std);
        $this->smarty->assign("filter", $filter);
        $this->smarty->display($temp);
    }

    function get_data_grid($type)
    {
        echo $this->Mmaster->getdata($type, 'json_grid');
    }

    function simpandata($p1 = "", $p2 = "")
    {
        //echo "<pre>";
        //print_r($_POST); exit;

        $post = array();
        foreach ($_POST as $k => $v) {
            if ($this->request->getPost($k) != "") {
                $post[$k] = $this->request->getPost($k);
            } else {
                $post[$k] = null;
            }
        }

        // echo "<pre>";
        // print_r($post); 
        // exit;

        if (isset($post['editstatus'])) {
            $editstatus = $post['editstatus'];
            unset($post['editstatus']);
        } else $editstatus = $p2;

        $simpannya = $this->Mmaster->simpandata($p1, $post, $editstatus);

        $respon = array(
            "respons" => $simpannya
        );

        return service('response')->setJSON($respon);
    }

    function getcombo($type="", $balikan="", $p1="", $p2="", $p3=""){
        $v = $this->request->getPost('v');
		if($v != ""){
			$selTxt = $v;
		}else{
			$selTxt = $p1;
		}

        $optTemp = '<option selected value=""> -- Pilih -- </option>';
        switch($type){

            case "kategori":
                $data = $this->Mmaster->getdata('kategori_combo', 'result_array');
            break;

            // case "filter_status_rab_user":
			// 	$optTemp = '<option selected value="">Filter Kirim User</option>';
			// 	$data = array(
			// 		'0' => array('id'=>'0','txt'=>'BELUM DIKIRIM USER'),
			// 		'1' => array('id'=>'1','txt'=>'SUDAH DIKIRIM USER'),
			// 	);
			// break;
            // case "tanggal" :
			// 	$data = $this->arraydate('tanggal');
			// 	$optTemp = '<option value=""> -- Tanggal -- </option>';
			// break;
			// case "bulan" :
			// 	$data = $this->arraydate('bulan');
			// 	$optTemp = '<option value=""> -- Bulan -- </option>';
			// break;
			// case "tahun" :
			// 	$data = $this->arraydate('tahun');
			// 	$optTemp = '<option value=""> -- Tahun -- </option>';
			// break;
        }

        if($data){
			foreach($data as $k=>$v){
				$v['txt'] = str_replace("'", "`", $v['txt']);
				$v['txt'] = str_replace('"', '`', $v['txt']);
				
				if($selTxt == $v['id']){
					$optTemp .= '<option selected value="'.$v['id'].'">'.$v['txt'].'</option>';
				}else{ 
					$optTemp .= '<option value="'.$v['id'].'">'.$v['txt'].'</option>';	
				}
			}
		}
		
		if($balikan == 'return'){
			return $optTemp;
		}elseif($balikan == 'echo'){
			echo $optTemp;
		}
    }

    function combo_option($mod)
    {
        $opt = "";
        switch ($mod) {
            case "pendidikan":
                $opt .= "<option value='a.nama'>Nama Pendidikan</option>";
            break;

            default:
                $txt = str_replace("_", " ", $mod);
                $opt .= "<option value='A." . $mod . "'>" . strtoupper($txt) . "</option>";
                break;
        }

        return $opt;
    }

//     public function search()
// {
//     $model = new Data_model();

//     $keyword = $this->request->getPost('search');
//     $data = $model->searchData($keyword);

//     $response = [
//         'total' => count($data),
//         'rows' => $data,
//     ];

//     return $this->response->setJSON($response);
// }

    

}
