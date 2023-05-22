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

            case "onan_transaksi_jasa":
                $idx_order = service('request')->getPost('idx_order');
				if($idx_order){
					$where .= "
						and a.\"orderId\" = '".$idx_order."'
					";
				}

                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.\"createdAt\" DESC) as rowID, a.*,
                        b.nama as jasa
                    from public.\"OrderJasa\" a
                    left join public.\"Jasa\" b on b.id = a.\"jasaId\"
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

                if(isset($search) && $search != ""){
                    $where .= " AND ( 
                        LOWER( upper(a.penawaran) ) like '%".strtolower(trim($search))."%' 
                    )";
                }

                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.\"createdAt\" DESC) as rowID, a.*,
                        b.name as penjual, c.name as pembeli, d.nama as aktifitas
                    from public.\"Order\" a
                    left join public.\"User\" b on b.id = a.\"userIdPenjual\"
                    left join public.\"User\" c on c.id = a.\"userIdPembeli\"
                    left join public.\"MsAktifitas\" d on d.id = a.\"msAktifitasId\"
                    $where
                ";
            break;

            case "onan_tender_peserta":
                $idx_tender = service('request')->getPost('idx_tender');
				if($idx_tender){
					$where .= "
						and a.\"tenderId\" = '".$idx_tender."'
					";
				}

                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.\"createdAt\" DESC) as rowID, a.*,
                        b.name as namauser
                    from public.\"TenderPeserta\" a
                    left join public.\"User\" b on b.id = a.\"userId\"
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

                if(isset($search) && $search != ""){
                    $where .= " AND (
                        LOWER(upper(a.kategori)) LIKE '%" . strtolower(trim($search)) . "%'
                    )";
                }    

                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.\"createdAt\" DESC) as rowID, a.*,
                        b.name as namauser, c.nama as merchant, d.nama as posting
                    from public.\"Tender\" a
                    left join public.\"User\" b on b.id = a.\"userId\"
                    left join public.\"MsMerchantLevel\" c on c.id = a.\"msMerchantLevelId\"
                    left join public.\"MsPostingTender\" d on d.id = a.\"msPostingTenderId\"
                    $where
                ";    
            break;

            case "onan_produk_jasa":
                $id = service('request')->getPost('id');
				if($id){
					$where .= "
						and a.id = '".$id."'
					";    
				}    

                if(isset($search) && $search != ""){
                    $where .= " AND (
                        LOWER(upper(a.nama)) LIKE '%" . strtolower(trim($search)) . "%'
                    )";
                }    

                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.\"createdAt\" DESC) as rowID, a.*,
                        b.nama as subkategori, c.nama as kategori, d.name as namauser, e.nama as statusjasa
                    from public.\"Jasa\" a
                    left join public.\"MsSubkategori\" b on b.id = a.\"msSubkategoriId\"
                    left join public.\"MsKategori\" c on c.id = a.\"msKategoriId\"
                    left join public.\"User\" d on d.id = a.\"userId\"
                    left join public.\"MsStatusJasa\" e on e.id = a.\"msStatusJasaId\"
                    $where
                ";    
            break;

            case "onan_produk_jasa_pricing":
                $idx_jasa = service('request')->getPost('idx_jasa');
				if($idx_jasa){
					$where .= "
						and a.\"jasaId\" = '".$idx_jasa."'
					";
				}

                $sql = "
                    SELECT ROW_NUMBER() OVER (ORDER BY a.\"createdAt\" DESC) as rowID, a.*,
                        b.nama as jasaid
                    from public.\"JasaPricing\" a
                    left join public.\"Jasa\" b on b.id = a.\"jasaId\"
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