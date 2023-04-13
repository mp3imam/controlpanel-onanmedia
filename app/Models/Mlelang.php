<?php

namespace App\Models;

use CodeIgniter\Model;

class Mlelang extends Model
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
			a.SellerNoAgt,
			a.LastBuyerNoAgt,
			b.MemberName as BuyerName,
			a.SellerId,
			s.MemberName as SellerName,
			a.SettlementPlace,
			a.ModifiedDate'
			)
			->join('app_Contract c', 'a.ContractId= c.ContractId')
			->join('PasarLelang_Member b', 'b.MemberId = a.DealBuyerId', 'left')
			->join('PasarLelang_Member s', 's.MemberId = a.SellerId', 'left')
			->orderBy('a.DealDate')
			->where($params);
	}
}
