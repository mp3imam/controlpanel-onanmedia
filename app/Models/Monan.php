<?php

namespace App\Models;

use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Model;

class Monan extends Model{

    protected $db;
    function initialize()
    {
        $this->db = \Config\Database::connect();
    }

    function getdata($type="", $balikan="", $p1="", $p2=""){
        $array = array();
        $where = " where 1=1 ";

        switch($type){
            case "onan_user":
                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.id DESC) as rowID, a.*
                    from public.\"User\" a
                ";
            break;

            default:
                
            break;
        }

        if($balikan == 'json_grid'){
			return json_grid($sql,$type);
		}elseif($balikan == 'row_array'){
			return $this->db->query($sql)->getRowArray();
		}elseif($balikan == 'result'){
			return $this->db->query($sql)->getResult();
		}elseif($balikan == 'result_array'){
			return $this->db->query($sql)->getResultArray();
		}elseif($balikan == 'json_encode'){
			$data = $this->db->query($sql)->getResultArray();
			//return json_encode($data);
            return service('response')->setJSON($data);
		}elseif($balikan == 'variable'){
			return $array;
		}
    }

}