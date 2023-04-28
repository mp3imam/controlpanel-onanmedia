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

        switch($mod){
            case "onan_user":
                $this->smarty->assign('judulbesar', "Data User Onanmedia");
            break;

            default:
                
            break;
        }

        $this->smarty->assign("table", $mod);
        $this->smarty->assign("mod", $mod);
        $this->smarty->display($temp);
    }

    function get_data_grid($type){
        echo $this->Monan->getdata($type, 'json_grid');
    }


}
