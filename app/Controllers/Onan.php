<?php

namespace App\Controllers;

use App\Models\Monan;

class Onan extends BaseController
{
    private $viewDir = 'onan/';
    protected $onanModel;

    function __construct()
    {
        $this->Monan = new Monan();
    }


    public function index()
    {
        // $this->smarty->display('main-backend.php');
    }

    function get_grid($mod){
        $temp = 'onan/grid_config.php';
        $tombol_std = "true";
        //$filter = $this->combo_option($mod);
        $cekmenu = $this->db->table('panel.tbl_user_menu')->getWhere(['ref_tbl' => $mod])->getRowArray();

        switch($mod){
            case "onan_user":
                
            break;

            default:
                
            break;
        }  

        $this->smarty->assign('judulbesar', $cekmenu['keterangan'] ?? null);
        $this->smarty->assign("table", $mod);
        $this->smarty->assign("mod", $mod);
        $this->smarty->assign("tombol_std", $tombol_std);
        //$this->smarty->assign("filter", $filter);
        $this->smarty->display($temp);
    }

    function get_data_grid($type){
        echo $this->Monan->getdata($type, 'json_grid');
    }

    function getdisplay($type){
        switch($type){
            case "user_detail":
                $temp = 'onan/form/form_user_detail.php';
                $id = $this->request->getPost('id');

                $user = $this->Monan->getdata('onan_user', 'row_array');

                $this->smarty->assign("mod", 'onan_user');
                $this->smarty->assign("user", $user);
                $this->smarty->assign("id", $id);
                $this->smarty->display($temp);
            break;
        }
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

        $simpannya = $this->Monan->simpandata($p1, $post, $editstatus);

        $respon = array(
            "respons" => $simpannya
        );

        return service('response')->setJSON($respon);
    }

}
