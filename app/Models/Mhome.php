<?php

namespace App\Models;

use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Model;

class Mhome extends Model{

    protected $db;
    function initialize()
    {
        $this->db = \Config\Database::connect();
    }

    function getdata($type="", $balikan="", $p1="", $p2=""){
        $array = array();

        switch($type){
            case "getmenu":
                $sql = "
					SELECT a.tbl_menu_id, b.nama_menu, b.type_menu, b.icon_menu, b.url, b.ref_tbl
						FROM panel.tbl_user_prev_group a
					LEFT JOIN panel.tbl_user_menu b ON a.tbl_menu_id = b.id 
					WHERE a.cl_user_group_id = '".$p1."' 
					AND (b.type_menu='P' OR b.type_menu='PC') AND b.status='1'
					ORDER BY b.urutan ASC
				";

                $parent = $this->db->query($sql)->getResultArray();
                $menu = array();
				foreach($parent as $v){
					$menu[$v['tbl_menu_id']]=array();
					$menu[$v['tbl_menu_id']]['parent']=$v['nama_menu'];
					$menu[$v['tbl_menu_id']]['icon_menu']=$v['icon_menu'];
					$menu[$v['tbl_menu_id']]['url']=$v['url'];
					$menu[$v['tbl_menu_id']]['type_menu']=$v['type_menu'];
					$menu[$v['tbl_menu_id']]['judul_kecil']=$v['ref_tbl'];
					$menu[$v['tbl_menu_id']]['child']=array();
					$sql="
						SELECT a.tbl_menu_id, b.nama_menu, b.url, b.icon_menu , b.type_menu, b.ref_tbl
							FROM panel.tbl_user_prev_group a
						LEFT JOIN panel.tbl_user_menu b ON a.tbl_menu_id = b.id 
						WHERE a.cl_user_group_id = '".$p1."' 
						AND (b.type_menu = 'C' OR b.type_menu = 'CHC') 
						AND b.status='1' AND b.parent_id=".$v['tbl_menu_id']." 
						ORDER BY b.urutan ASC
						";
					$child = $this->db->query($sql)->getResultArray();
					foreach($child as $x){
						$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]=array();
						$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['menu']=$x['nama_menu'];
						$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['type_menu']=$x['type_menu'];
						$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['url']=$x['url'];
						$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['icon_menu']=$x['icon_menu'];
						$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['judul_kecil']=$x['ref_tbl'];
						
						if($x['type_menu'] == 'CHC'){
							$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['sub_child'] = array();
							$sqlSubChild="
								SELECT a.tbl_menu_id, b.nama_menu, b.url, b.icon_menu , b.type_menu, b.ref_tbl
									FROM panel.tbl_user_prev_group a
								LEFT JOIN panel.tbl_user_menu b ON a.tbl_menu_id = b.id 
								WHERE a.cl_user_group_id = '".$p1."' 
								AND b.type_menu = 'CC'
								AND b.parent_id_2 = ".$x['tbl_menu_id']."
								AND b.status='1' 
								ORDER BY b.urutan ASC
							";
							$SubChild = $this->db->query($sqlSubChild)->getResultArray();
							foreach($SubChild as $z){
								$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['sub_child'][$z['tbl_menu_id']]['sub_menu'] = $z['nama_menu'];
								$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['sub_child'][$z['tbl_menu_id']]['type_menu'] = $z['type_menu'];
								$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['sub_child'][$z['tbl_menu_id']]['url'] = $z['url'];
								$menu[$v['tbl_menu_id']]['child'][$x['tbl_menu_id']]['sub_child'][$z['tbl_menu_id']]['icon_menu'] = $z['icon_menu'];
							}
						}
						
					}
				}

                $array = $menu;
            break;
            case "PasarLelang_Spv_GetLast5All":
                $sql = "
                    SELECT	top(5)			
                            CAST(a.DealDate AS DATE) AS LelangDate,
                            p.pasar_id,
                            p.pasar_name,
                            MAX(a.Participant) as Participant,			
                            SUM(ISNULL(a.HighBidValue,0)) AS AuctionTotal,
                            COUNT(a.AuctionId) AS AuctionCount
                    FROM	PasarLelang_AuctionHistory a
                            INNER JOIN master_pasar p ON a.MarketId = p.pasar_id
                    GROUP	BY CAST(a.DealDate AS DATE),
                            p.pasar_id,
                            p.pasar_name
                    ORDER	BY CAST(a.DealDate AS DATE) DESC
                ";
            break;
        }

        if($balikan == 'json'){
			
		}elseif($balikan == 'row_array'){
			return $this->db->query($sql)->getRowArray();
		}elseif($balikan == 'result'){
			return $this->db->query($sql)->getResult();
		}elseif($balikan == 'result_array'){
			return $this->db->query($sql)->getResultArray();
		}elseif($balikan == 'json_encode'){
			
		}elseif($balikan == 'variable'){
			return $array;
		}

    }
}