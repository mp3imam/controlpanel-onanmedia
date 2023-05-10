<?php

namespace App\Models;

use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Model;

class Mmaster extends Model{

    protected $db;
    function initialize()
    {
        $this->db = \Config\Database::connect();
    }

    function getdata($type="", $balikan="", $p1="", $p2=""){
        $array = array();
        $where = " where 1=1 ";

        switch($type){
            case "bahasa":
                $id = service('request')->getPost('id');
				if($id){
					$where .= "
						and a.id = '".$id."'
					";
				}

                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.id DESC) as rowID, a.*
                    from public.\"MsBahasa\" a
                    $where and a.\"isAktif\" = 1
                ";
            break;

            case "kategori":
                $id = service('request')->getPost('id');
                if($id){
                    $where .= "
                    and a.id = '".$id."'
                    ";
                }

                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.id DESC) as rowID, a.*
                    from public.\"MsKategori\" a
                    $where and a.\"isAktif\" = 1
                ";
            break;

            case "subkategori":
                $id = service('request')->getPost('id');
                if ($id) {
                    $where .= "
                    and a.id = '".$id."'
                    ";
                }

                $sql = "
                    SELECT
                        ROW_NUMBER() OVER (ORDER BY a.id DESC) AS rowID,
                        a.*,
                        b.nama AS kategori_nama
                    FROM public.\"MsSubkategori\" a
                    LEFT JOIN public.\"MsKategori\" b ON a.\"msKategoriId\" = b.id
                    $where AND a.\"isAktif\" = 1
                ";
            break;

            case "pekerjaan":
                $id = service('request')->getPost('id');
                if($id){
                    $where .= "
                    and a.id = '".$id."'
                    ";
                }

                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.id DESC) as rowID, a.*
                    from public.\"MsPekerjaan\" a
                    $where and a.\"status\" = 1
                ";
            break;

            case "pendidikan":
                $id = service('request')->getPost('id');
                if ($id) {
                    $where .= "
                    and a.id = '".$id."'
                    ";
                }

                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.id DESC) as rowID, a.*
                    from public.\"MsTingkatEdukasi\" a
                    $where and a.\"status\" = 1
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

    function simpandata($table,$data,$sts_crud){ //$sts_crud --> STATUS NYEE INSERT, UPDATE, DELETE
		$this->db->transStart();
		if(isset($data['id'])){
			$id = $data['id'];
			unset($data['id']);
		}
		
		if($sts_crud == "add"){
			unset($data['id']);
		}

        switch($table){
			case "bahasa":
                $table = 'public."MsBahasa"';
                if($sts_crud == "add"){
                    $id = genpkseq('panel.all_master_id_seq');

                    $data['id'] = $id;
                    $data['isAktif'] = 1;

                    $insert = $this->db->table($table)->insert($data);
                }
                if($sts_crud == "edit"){
                    $update = $this->db->table($table)->where('id', $id)->update($data);
                    //$this->db->update($table, $data, array('id' => $id) );	
                }

                if($sts_crud == "delete"){
                    $data['isAktif'] = 0;
                    $delete = $this->db->table($table)->where('id', $id)->update($data);
                }
            break;

            case "kategori":
                $table = 'public."MsKategori"';
                if ($sts_crud == "add") {
                    $id = genpkseq('panel.all_master_id_seq');

                    $data['id'] = $id;
                    $data['isAktif'] = 1;

                    $insert = $this->db->table($table)->insert($data);
                }

                if($sts_crud == "edit"){
                    $update = $this->db->table($table)->where('id', $id)->update($data);
                }

                if ($sts_crud == "delete") {
                    $data['isAktif'] = 0;
                    $delete = $this->db->table($table)->where('id', $id)->update($data);
                }

                break;

            case "subkategori":
                $table = 'public."MsSubkategori"';
                if ($sts_crud == "add") {
                    $id = genpkseq('panel.all_master_id_seq');
    
                    $data['id'] = $id;
                    $data['isAktif'] = 1;
    
                    $insert = $this->db->table($table)->insert($data);
                }
    
                if($sts_crud == "edit"){
                    $update = $this->db->table($table)->where('id', $id)->update($data);
                }
    
                if ($sts_crud == "delete") {
                    $data['isAktif'] = 0;
                    $delete = $this->db->table($table)->where('id', $id)->update($data);
                }
    
                break;

            case "pekerjaan":
                $table = 'public."MsPekerjaan"';
                if ($sts_crud == "add") {
                    $id = genpkseq('panel.all_master_id_seq');
        
                    $data['id'] = $id;
                    $data['status'] = 1;
        
                    $insert = $this->db->table($table)->insert($data);
                }
        
                if($sts_crud == "edit"){
                    $update = $this->db->table($table)->where('id', $id)->update($data);
                }
        
                if ($sts_crud == "delete") {
                    $data['status'] = 0;
                    $delete = $this->db->table($table)->where('id', $id)->update($data);
                }
        
            break;

            case "pendidikan":
                $table = 'public.MsTingkatEdukasi';
                if ($sts_crud == "add") {
                    $id = genpkseq('panel.all_master_id_seq');

                    $data['id'] = $id;
                    $data['status'] = 1;

                    $insert = $this->db->table($table)->insert($data);
                }

                if ($sts_crud == "edit") {
                    $update = $this->db->table($table)->where('id', $id)->update($data);
                }

                if ($sts_crud == "delete") {
                    $data['status'] = 0;
                    $delete = $this->db->table($table)->where('id', $id)->update($data);
                }
            break;
        }

        if($this->db->transStatus() === false){
			$this->db->transRollback();
			return 'gagal';
		}else{
			$this->db->transCommit();
            return "1";
		}

    }

}