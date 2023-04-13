<?php

namespace App\Controllers;

use App\Models\Mhome;

class Home extends BaseController
{
    private $viewDir = 'home/';
    protected $masterModel;
    protected $penyelenggaraanLelangModel;
    function __construct()
    {
        $this->Mhome = new Mhome();
    }


    public function index()
    {
        $this->smarty->display('main-backend.php');
    }
}
