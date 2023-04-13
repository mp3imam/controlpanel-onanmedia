<?php

namespace App\Models;

use CodeIgniter\Model;

class MpenyelenggaraLelang extends Model
{
    function getResumeLelang($params)
    {
        return $this->db->query('EXEC PasarLelang_Spv_GetResumeLelang @date1=:startDate:, @date2=:endDate:, @MarketId=:pasarId:', $params)->getRowArray();
    }

    function getResumeSeller($params)
    {
        return $this->db->query('EXEC PasarLelang_Spv_GetResumeSeller @date1=:startDate:, @date2=:endDate:, @MarketId=:pasarId:', $params)->getResultArray();
    }

    function getResumeBuyer($params)
    {
        return $this->db->query('EXEC PasarLelang_Spv_GetResumeBuyer @date1=:startDate:, @date2=:endDate:, @MarketId=:pasarId:', $params)->getResultArray();
    }

    function getLast5Lelang($params)
    {
        return $this->db->query('EXEC PasarLelang_Spv_GetLast5All @MarketId=:pasarId:', $params)->getResultArray();
    }

    function getMonthlyAuction($params)
    {
        return $this->db->query('EXEC PasarLelang_Spv_GetAuctionTotalMonthly @MarketId=:pasarId:, @Year=:year:', $params)->getResultArray();
    }

    function getTop10Komoditi($params)
    {

        return $this->db->query('EXEC PasarLelang_Spv_GetProducsTop10 @MarketId=:pasarId:, @Year=:year:', $params)->getResultArray();
    }

    function getActionTotalPerMarket($params)
    {

        return $this->db->query('EXEC PasarLelang_Spv_GetAuctionTotalPerMarket @Month=:month:, @Year=:year:', $params)->getResultArray();
    }

    function getActionTotalPerKomoditi($params)
    {
        return $this->db->query('EXEC PasarLelang_Spv_GetAuctionTotalPerCommodity @Month=:month:, @Year=:year:, @MarketId=:pasarId:', $params)->getResultArray();
    }
}
