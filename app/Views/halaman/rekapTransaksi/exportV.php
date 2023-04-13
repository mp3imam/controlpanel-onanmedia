<style>
  .text-right {
    text-align: right;
  }

  .text-center {
    text-align: center;
  }

  .font-bold {
    font-weight: bold;
  }

  thead {
    background-color: #333;
    color: white;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 2%;
  }
</style>
<div>
  <h1 class="text-center font-bold">LAPORAN TRANSAKSI PASAR LELANG KOMODITAS</h1>
  <br>
  <h3>Penyelenggara : <?= $pasar['pasar_name'] ?> </h3>
  <h3>Tanggal Lelang : <?= dateFormat($_GET['startDate'] ?? null) . ' - ' . dateFormat($_GET['endDate'] ?? null) ?> </h3>
  <table width="100%" cellpadding="0" cellspacing="0" class="tabel_data" style="border-collapse:collapse;border-bottom: 3px solid black;">
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
          <td width="5%"><?= $no ?></td>
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
</div>