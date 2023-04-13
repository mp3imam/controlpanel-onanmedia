<?php

namespace App\Controllers;

use App\Models\Muser;

class Login extends BaseController
{
    public function index()
    {
        //$data = array();
        //return $this->displaySmarty('login.php', $data);
        //return view('login');

        $this->smarty->display('login.php');
    }

    public function process()
    {
        $username = $this->request->getVar('usr');
        $password = $this->request->getVar('pwd');
        
        $data = $this->db->table('panel.tbl_user')->getWhere(['username' => $username])->getRowArray();
        //print_r($data);exit;
        if ($data) {
            $pass = $data['password'];

            if($password == myDecrypt($pass)){
                $data['isLoggedIn'] = 1;
                $this->session->set($data);
                return redirect()->to('/home');
            }else{
                $this->session->setFlashdata('msg', 'Password Anda Salah');
                return redirect()->to('/home');
            }

        } else {
            $this->session->setFlashdata('msg', 'User Tidak Ditemukan');
            return redirect()->to('/home');
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/home');
    }

    public function updatepass($username)
    {
        $builder = $this->db->table('Siswas_Users');
        $data = $builder->getWhere(['UserName' => $username])->getRowArray();
        if ($data) {
            $builder->set('Password2', password_hash("12345", PASSWORD_DEFAULT));
            $builder->where('UserName', $username);
            echo $builder->update();
        } else {
            echo "kondor";
        }
    }

    public function generatepass(){
        echo myEncrypt('12345');
    }
}
