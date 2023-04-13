<?php

namespace App\Models;

use CodeIgniter\Model;

class Mmaster extends Model
{
    public function getPasar($where = [])
    {
        return $this->db->table('master_pasar')
            ->orderBy('pasar_name')
            ->getWhere($where);
    }

    public function getCommodity($where = [])
    {
        return $this->db->table('PasarLelang_AuctionHistory')->distinct()->select('CommodityName')->orderBy('CommodityName')->getWhere($where)->getResultArray();
    }

    public function getJenisDagang($where = [])
    {
        return $this->db->table('PasarLelang_AuctionHistory')->distinct()->select('TypeOfTrade')->orderBy('TypeOfTrade')->getWhere($where)->getResultArray();
    }

    public function getUser($where = [])
    {
        return $this->db->table('Siswas_Users')->getWhere($where);
    }
}
