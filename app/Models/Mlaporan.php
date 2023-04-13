<?php

namespace App\Models;

use CodeIgniter\Model;

class Mlaporan extends Model
{
	function getAllAuction($params = [])
	{
		return $this->db->table('PasarLelang_AuctionHistory a')
			->select('a.AuctionId,
			a.AuctionNo,
			a.LastBidSessionTimeStart,
			a.LastBidSessionTimeEnd,
			a.ContractId,
			a.CommodityName,
			c.TypeOfTrade,
			a.CommoditySize,
			a.UOM,
			ISNULL(a.HighBidValue,a.InitialValue) AS UnitPrice,
			a.InitialValue,
			a.Currency,
			a.IncreaseInValue,
			a.HighBidValue,
			a.BidCount,
			a.DealDate AS LastBidTime,
			a.State,
			a.StateStatus,
			a.DealBuyerId as BuyerId,
			b.MemberName as BuyerName,
			a.SellerId,
			s.MemberName as SellerName,
			a.SettlementPlace')
			->join('app_Contract c', 'a.ContractId= c.ContractId')
			->join('PasarLelang_Member b', 'b.MemberId = a.DealBuyerId', 'left')
			->join('PasarLelang_Member s', 's.MemberId = a.SellerId', 'left')
			->orderBy('a.DealDate')
			->where($params);
	}

	function getSummaryPLK($marketId)
	{
		$sql = "WITH tbl_pembeli as (
		select count(*) as total, tgl_lelang 
			from laporan_plk_pembeli a 
			where market_id = :marketId:
			group by tgl_lelang 
		),
		tbl_penjual as (
		select count(*) as total, tgl_lelang
			from laporan_plk_penjual a 
			where market_id = :marketId:
			group by tgl_lelang  
		), 
		tbl_plk as (
			select a.tgl_lelang, count(*) as total_lelang, sum(harga_satuan * volume ) as total_uang
			from laporan_plk a
			where a.market_id = :marketId:
			group by a.tgl_lelang)

		select a.*
		, isnull(b.total,0) as total_penjual, isnull(c.total,0) as total_pembeli
		, d.pasar_name, d.pasar_id
		from tbl_plk a
		left join tbl_penjual b on a.tgl_lelang = b.tgl_lelang
		left join tbl_pembeli c on a.tgl_lelang = c.tgl_lelang 
		left join master_pasar d on :marketId: = d.pasar_id
		";

		return $this->db->query($sql, ['marketId' => $marketId])->getResultArray();
	}

	function getDetailPLK($where = [])
	{
		return $this->db->table('laporan_plk a')
		->select('a.*, b.pasar_name')
		->join('master_pasar b', 'a.market_id = b.pasar_id', 'left')
			->orderBy('tgl_lelang')
			->getWhere($where);
	}

	function getDetailPembeliPLK($where = [])
	{
		return $this->db->table('laporan_plk_pembeli a')
			->orderBy('tgl_lelang')
			->getWhere($where);
	}

	function getDetailPenjualPLK($where = [])
	{
		return $this->db->table('laporan_plk_penjual a')
			->orderBy('tgl_lelang')
			->getWhere($where);
	}
	
	function getSummarysms($pasarId='',$startDate='',$endDate='')
	{
		$sql = "SELECT MONTH(tgl_lelang) as bulan,sum(nilai_realisasi) as nilai_realisasi,
				CASE 
						WHEN MONTH(tgl_lelang) = 1 THEN 'Januari'
						WHEN MONTH(tgl_lelang) = 2 THEN 'Februari'
						WHEN MONTH(tgl_lelang) = 3 THEN 'Maret'
						WHEN MONTH(tgl_lelang) = 4 THEN 'April'
						WHEN MONTH(tgl_lelang) = 5 THEN 'Mei'
						WHEN MONTH(tgl_lelang) = 6 THEN 'Juni'
						WHEN MONTH(tgl_lelang) = 7 THEN 'Juli'
						WHEN MONTH(tgl_lelang) = 8 THEN 'Agustus'
						WHEN MONTH(tgl_lelang) = 9 THEN 'September'
						WHEN MONTH(tgl_lelang) = 10 THEN 'Oktober'
						WHEN MONTH(tgl_lelang) = 11 THEN 'November'						
						ELSE 'Desembber'
					END AS bln 
				FROM laporan_plk
				where market_id ='".$pasarId."' and tgl_lelang >='".$startDate."' and tgl_lelang <='".$endDate."'  group by MONTH(tgl_lelang)";

		return $this->db->query($sql)->getResultArray();
	}
	function getSummarysmsPeserta($pasarId='',$startDate='',$endDate='')
	{
		$sql = "SELECT DISTINCT penjual_no,penjual_nama				
				FROM laporan_plk
				where market_id ='".$pasarId."' and tgl_lelang >='".$startDate."' and tgl_lelang <='".$endDate."'";

		return $this->db->query($sql)->getResultArray();
	}
}
