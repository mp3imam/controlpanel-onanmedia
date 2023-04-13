<table class="table table-dark datatable-fixed-both hide-sort" width="100%">
  <thead>
    <tr>
      <th style="width:50px;">No</th>
      <th>Tanggal</th>
      <th>Sesi</th>
      <th>Produk</th>
      <th>Keterangan</th>
      <th>Kode</th>
      <th>Jenis</th>
      <th>Vol</th>
      <th>Uom</th>
      <th>Uang</th>
      <th>Buka</th>
      <th>Naik</th>
      <th>Tertinggi</th>
      <th>Harga/Uom</th>
      <th>Bid</th>
      <th>Last Bid</th>
      <th>Status</th>
      <th style="width:20px;">#</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($lelangs as $key => $lelang) {
      $no = $key + 1;
      $cryptedLelangId = myEncrypt($lelang['AuctionId']);
      $cryptedMarketId = myEncrypt($pasar['pasar_id']);
    ?>
      <tr>
        <td class="text-center"><?= $no ?></td>
        <td class="text-center"><?= dateFormat($lelang['LastBidTime']) ?></td>
        <td class="text-center"><?= timeFormat($lelang['LastBidSessionTimeStart']) ?? '00:00:00' ?></td>
        <td><?= $lelang['ContractId'] ?></td>
        <td><?= $lelang['CommodityName'] ?></td>
        <td><?= $lelang['AuctionNo'] ?></td>
        <td><?= getTypeOfTrade($lelang['TypeOfTrade']) ?></td>
        <td><?= inttomoney($lelang['CommoditySize']) ?></td>
        <td class="text-center"><?= $lelang['UOM'] ?></td>
        <td class="text-center"><?= $lelang['Currency'] ?></td>
        <td class="text-right"><?= inttomoney($lelang['InitialValue']) ?></td>
        <td class="text-right"><?= inttomoney($lelang['IncreaseInValue']) ?></td>
        <td class="text-right"><?= inttomoney($lelang['HighBidValue']) ?></td>
        <td class="text-right"><?= inttomoney($lelang['UnitPrice']) ?></td>
        <td class="text-right"><?= inttomoney($lelang['BidCount']) ?></td>
        <td class="text-center"><?= timeFormat($lelang['LastBidTime']) ?></td>
        <td class="text-center"><?= $lelang['StateStatus'] ?></td>
        <td class="text-center" style="padding:2px 3px;">
          <a href="<?= site_url('Lelang/detail?market=' . $cryptedMarketId . '&lelang=' . $cryptedLelangId . '&live=' . $live) ?>" class="btn btn-table btn-trans" style="padding:1px 3px"><i class="icon-pulse2"></i></a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>