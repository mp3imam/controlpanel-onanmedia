<?= view('halaman/components/breadcumsV'); ?>
<div class="content">
  <div class="row">
    <div class="col-lg-8">
      <div class="panel panel-flat panel-dark">
        <div class="">
          <table class="table multi-header table-dark datatable-fixed-both hide-sort" width="100%">
            <thead>
              <tr>
                <th rowspan="2">NO</th>
                <th colspan="4">PESERTA</th>
                <th colspan="5">TRANSAKSI</th>
                <th rowspan="2">STATUS REALISASI</th>
                <th rowspan="2">KETERANGAN</th>
              </tr>
              <tr>
                <th>NO. PENJUAL</th>
                <th>NAMA PENJUAL</th>
                <th>NO. PEMBELI</th>
                <th>NAMA PEMBELI</th>
                <th>KOMODITAS</th>
                <th>JENIS</th>
                <th>VOLUME</th>
                <th>HARGA</th>
                <th>TOTAL</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $totalAll = 0;
              foreach ($lelangs as $key => $lelang) {
                $no = $key + 1;
                $total = $lelang['volume'] * $lelang['harga_satuan'];
                $totalAll = $totalAll + $total;
              ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $lelang['penjual_no'] ?></td>
                  <td><?= $lelang['penjual_nama'] ?></td>
                  <td><?= $lelang['pembeli_no'] ?></td>
                  <td><?= $lelang['pembeli_nama'] ?></td>
                  <td><?= $lelang['komoditas'] ?></td>
                  <td><?= getTypeOfTrade($lelang['jenis']) ?></td>
                  <td><?= inttomoney($lelang['volume']) . ' ' . $lelang['satuan'] ?></td>
                  <td><?= inttomoney($lelang['harga_satuan']) ?></td>
                  <td><?= inttomoney($total) ?></td>
                  <td><?= $lelang['status_realisasi'] ?></td>
                  <td><?= $lelang['keterangan'] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="panel panel-flat panel-dark">
        <div class="">
          <table class="table multi-header table-dark datatable-fixed-both hide-sort" width="100%">
            <thead>
              <tr>
                <th rowspan="2">NO</th>
                <th colspan="2">PESERTA TERDAFTAR</th>
              </tr>
              <tr>
                <th>NAMA PENJUAL</th>
                <th>NAMA PEMBELI</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $totalAll = 0;
              for ($i = 0; $i < $totalPeserta; $i++) {
                $no = $i + 1;
              ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $penjuals[$i]['penjual_nama'] ?? '-' ?></td>
                  <td><?= $pembelis[$i]['pembeli_nama'] ?? '-' ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>