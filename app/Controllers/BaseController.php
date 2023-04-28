<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Smarty;
use App\Models\Mhome;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['general'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        // E.g.: $this->session = \Config\Services::session();

        $this->session = \Config\Services::session();
        $this->db      = \Config\Database::connect();
        $this->get = $this->request->getGet(NULL);
        $this->post = $this->request->getPost(NULL);
        $this->initSmarty();
        $this->buildMenu();
    }

    private function buildMenu()
    {
        $mhome = new Mhome();
        $menus = $mhome->getdata('getmenu', 'variable', ($_SESSION['cl_user_group_id'] ?? '0') );

        // echo "<pre>"; print_r($menus);exit;

        $this->smarty->assign('menu', $menus);
    }

    private function initSmarty(){
        $configDirs = \Config\SmartyConfig::$configDirs;
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir($configDirs['templateDir']);
        $this->smarty->setCompileDir($configDirs['compileDir']);
        $this->smarty->setCacheDir($configDirs['cacheDir']);
        $this->smarty->setConfigDir($configDirs['configDir']);

        if($this->session->get('isLoggedIn')){
            $this->smarty->assign('maincss', assetCss('main'));
            $this->smarty->assign('mainjs', assetJs('main'));
        }else{
            $this->smarty->assign('maincss', assetCss('login'));
            $this->smarty->assign('mainjs', assetJs('login'));
        }
        
        $this->smarty->assign('acak', md5(date('H:i:s')) );
        $this->smarty->assign('session', $this->session->get());
        $this->smarty->assign('baseurl', getenv('app.baseURL'));
    }
    
    protected function displaySmarty($viewPath, $data = []){
        $this->smarty->assign('data', $data);
        $this->smarty->assign('flashData', $this->session->getFlashData());
        $this->smarty->assign('session', $this->session->get());
        $this->smarty->display($viewPath);
    }

}
