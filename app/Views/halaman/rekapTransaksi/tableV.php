<table class="table multi-header table-dark datatable-fixed-both hide-sort" width="100%">
  <thead>
    <tr>
      <th rowspan="2">NO</th>
      <th colspan="4">PESERTA</th>
      <th colspan="6">TRANSAKSI</th>
      <th rowspan="2">UPDATE</th>
    </tr>
    <tr>
      <th>NO. PENJUAL</th>
      <th>NAMA PENJUAL</th>
      <th>NO. PEMBELI</th>
      <th>NAMA PEMBELI</th>
      <th>KOMODITAS</th>
      <th>JENIS LELANG</th>
      <th>KONTRAK<br></th>
      <th>VOLUME</th>
      <th>HARGA</th>
      <th>NILAI TRANSAKSI</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $totalAll = 0;
    foreach ($lelangs as $key => $lelang) {
      $no = $key + 1;
      $total = $lelang['UnitPrice'] * $lelang['CommoditySize'];
      $totalAll = $totalAll + $total;
    ?>
      <tr>
        <td><?= $no ?></td>
        <td><?= $lelang['SellerNoAgt'] ?></td>
        <td><?= $lelang['SellerName'] ?></td>
        <td><?= $lelang['LastBuyerNoAgt'] ?></td>
        <td><?= $lelang['BuyerName'] ?></td>
        <td><?= $lelang['CommodityName'] ?></td>
        <td><?= getTypeOfTrade($lelang['TypeOfTrade']) ?></td>
        <td><?= $lelang['ContractId'] ?></td>
        <td class="text-right"><?= "{$lelang['CommoditySize']} {$lelang['UOM']}" ?></td>
        <td class="text-right"><?= inttomoney($lelang['UnitPrice']) . ' / ' . $lelang['UOM'] ?></td>
        <td class="text-right"><?= inttomoney($total)  ?></td>
        <td><?= dateTimeFormat($lelang['ModifiedDate']) ?></td>
      </tr>
    <?php } ?>

  </tbody>
</table>