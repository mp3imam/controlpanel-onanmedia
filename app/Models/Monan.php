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
        $search = service('request')->getPost('search');

        switch($type){

            case "onan_produk_jasa":
                $id = service('request')->getPost('id');
				if($id){
					$where .= "
						and a.id = '".$id."'
					";
				}

                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.\"createdAt\" DESC) as rowID, a.*,
                        b.name as penjual, c.nama as kategori, d.nama as subkategori, e.nama as statusjasa,
                        to_char(a.\"createdAt\"::timestamp with time zone, 'DD-MM-YYYY'::text) AS tanggal_posting
                    from public.\"Jasa\" a
                    left join public.\"User\" b on b.id = a.\"userId\"
                    left join public.\"MsKategori\" c on c.id = a.\"msKategoriId\"
                    left join public.\"MsSubkategori\" d on d.id = a.\"msSubkategoriId\"
                    left join public.\"MsStatusJasa\" e on e.id = a.\"msStatusJasaId\"
                    $where
                ";
            break;
            
            case "onan_tender":
                $id = service('request')->getPost('id');
				if($id){
					$where .= "
						and a.id = '".$id."'
					";
				}

                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.\"createdAt\" DESC) as rowID, a.*,
                        b.name as penjual,
                        to_char(a.\"createdAt\"::timestamp with time zone, 'DD-MM-YYYY'::text) AS tanggal_posting
                    from public.\"Tender\" a
                    left join public.\"User\" b on b.id = a.\"userId\"
                    $where
                ";
            break;
            
            case "onan_transaksi":
                $id = service('request')->getPost('id');
				if($id){
					$where .= "
						and a.id = '".$id."'
					";
				}


                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.\"createdAt\" DESC) as rowID, a.*,
                        b.nama as aktivitas, c.name as penjual, d.name as pembeli,
                        to_char(a.\"createdAt\"::timestamp with time zone, 'DD-MM-YYYY'::text) AS tanggal_order
                    from public.\"Order\" a
                    left join public.\"MsAktifitas\" b on b.id = a.\"msAktifitasId\"
                    left join public.\"User\" c on c.id = a.\"userIdPenjual\"
                    left join public.\"User\" d on d.id = a.\"userIdPembeli\"
                    $where
                ";
            break;

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

                if(isset($search) && $search != ""){
                    $where .= " AND ( 
                        LOWER( upper(a.name) ) like '%".strtolower(trim($search))."%' 
                        OR LOWER( upper(a.phone) ) like '%".strtolower(trim($search))."%' 
                        OR LOWER( upper(a.email) ) like '%".strtolower(trim($search))."%' 
                        OR LOWER( upper(a.username) ) like '%".strtolower(trim($search))."%' 
                    )";
                }

                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.id DESC) as rowID, a.*
                    from public.\"User\" a
                    $where
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
            case "onanuser_aktifkan":
                $table = 'public.User';
                $update = $this->db->table($table)->where('id', $id)->update(['status'=>1]);
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