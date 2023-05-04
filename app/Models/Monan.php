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
            case "onan_user_alamat":
                $idx_usr = service('request')->getPost('idx_usr');
				if($idx_usr){
					$where .= "
						and a.\"userId\" = '".$idx_usr."'
					";
				}

                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.\"createdAt\" DESC) as rowID, a.*
                    from public.\"UserAlamat\" a
                    $where
                ";
            break;

            case "onan_user_bahasa":
                $idx_usr = service('request')->getPost('idx_usr');
				if($idx_usr){
					$where .= "
						and a.\"userId\" = '".$idx_usr."'
					";
				}

                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.\"createdAt\" DESC) as rowID, a.*,
                        b.nama as bahasa
                    from public.\"UserBahasa\" a
                    left join public.\"MsBahasa\" b on b.id = a.\"msBahasaId\"
                    $where
                ";
            break;
            case "onan_user_pendidikan":
                $idx_usr = service('request')->getPost('idx_usr');
				if($idx_usr){
					$where .= "
						and a.\"userId\" = '".$idx_usr."'
					";
				}

                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.\"createdAt\" DESC) as rowID, a.*,
                        b.nama as negara, c.nama as tingkat
                    from public.\"UserEdukasi\" a
                    left join public.\"MsNegara\" b on b.id = a.\"msNegaraId\"
                    left join public.\"MsTingkatEdukasi\" c on c.id = a.\"msTingkatEdukasiId\"
                    $where
                ";
            break;
            case "onan_user_keahlian":
                $idx_usr = service('request')->getPost('idx_usr');
				if($idx_usr){
					$where .= "
						and a.\"userId\" = '".$idx_usr."'
					";
				}

                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.\"createdAt\" DESC) as rowID, a.*
                    from public.\"UserKeahlian\" a
                    $where
                ";
            break;
            case "onan_user_produk":
                $idx_usr = service('request')->getPost('idx_usr');
				if($idx_usr){
					$where .= "
						and a.\"userId\" = '".$idx_usr."'
					";
				}

                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.\"createdAt\" DESC) as rowID, a.*,
                        b.nama as subkategori, c.nama as kategori
                    from public.\"Jasa\" a
                    left join public.\"MsSubkategori\" b on b.id = a.\"msSubkategoriId\"
                    left join public.\"MsKategori\" c on c.id = a.\"msKategoriId\"
                    $where
                ";
            break;
            case "onan_user":
                $id = service('request')->getPost('id');
				if($id){
					$where .= "
						and a.id = '".$id."'
					";
				}

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