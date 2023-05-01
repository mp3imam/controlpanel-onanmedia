<?php

namespace App\Controllers;

use CodeIgniter\Database\BaseConnection;
use App\Models\Mmaster;

class Master extends BaseController
{
    private $viewDir = 'onan/';
    protected $onanModel;

    function __construct()
    {
        $this->Mmaster = new Mmaster();
        $this->db = \Config\Database::connect();
    }


    public function index()
    {
        // $this->smarty->display('main-backend.php');
    }

    function get_form($mod){
		$temp='master/form/form_'.$mod.".php";
		$sts = $this->request->getPost('editstatus');
		if(isset($sts)){
			$this->smarty->assign('sts',$sts);
		}else{
			$sts = "";
		}

        switch($mod){
            case "bahasa":
                if($sts=='edit'){
                    $data = $this->Mmaster->getdata('bahasa', 'row_array');
                    $this->smarty->assign('data',$data);
                }
            break;
        }

        $this->smarty->assign('mod',$mod);
		$this->smarty->assign('temp',$temp);
		
		if(!file_exists(VIEWPATH.$temp)){$this->smarty->display('konstruksi.php');}
		else{$this->smarty->display($temp);}
    }

    function get_grid($mod){
        $temp = 'master/grid_config.php';
        $tombol_std = "true";
        $filter = $this->combo_option($mod);
        $cekmenu = $this->db->table('panel.tbl_user_menu')->getWhere(['ref_tbl' => $mod])->getRowArray();

        switch($mod){
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

    function get_data_grid($type){
        echo $this->Mmaster->getdata($type, 'json_grid');
    }

    function simpandata($p1="",$p2=""){
		//echo "<pre>";
		//print_r($_POST); exit;
		
		$post = array();
        foreach($_POST as $k=>$v){
			if($this->request->getPost($k)!=""){
				$post[$k] = $this->request->getPost($k);
				//$post[$k] = htmlspecialchars($post[$k], ENT_QUOTES);
				//$post[$k] = str_replace('"','&acute;&acute;', $post[$k]);
				//$post[$k] = str_replace("'","&acute;", $post[$k]);
			}else{
				$post[$k] = null;
			}
		}
		
		// echo "<pre>";
		// print_r($post); 
		// exit;
		
		if(isset($post['editstatus'])){$editstatus = $post['editstatus'];unset($post['editstatus']);}
		else $editstatus = $p2;

        $simpannya = $this->Mmaster->simpandata($p1, $post, $editstatus); 
		
        $respon = array(
            "respons" => $simpannya
        );

		return service('response')->setJSON($respon);
	}

    function combo_option($mod){
		$opt="";
		switch($mod){
			case "bahasa":
				$opt .="<option value='a.nama'>Nama Bahasa</option>";
			break;
			
			default:
				$txt = str_replace("_", " ", $mod);
				$opt .="<option value='A.".$mod."'>".strtoupper($txt)."</option>";
			break;
		}

		return $opt;
	}

}
