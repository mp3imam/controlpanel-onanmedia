<?= view('halaman/components/breadcumsV'); ?>
<div class="content">
  <div class="row">
    <div class="col-lg-4">
      <div class="panel panel-flat panel-dark" style="margin-bottom:5px;">
        <div class="panel-heading">
          <h6 class="panel-title">Filter</h6>
        </div>
        <div class="panel-body">
          <div class="col-lg-12">
            <div class="row">
              <form method="GET" action="<?= site_url('laporan/bulanan/detail') ?>">
                <div class="form-group">
                  <label>Penyelenggara Lelang</label>
                  <div class="select-full">
                    <select class="bootstrap-select list-marketname" id="pasarId" name="id" data-width="100%">
                      <option value="" disabled>Pilih</option>
                      <?php foreach ($pasars as $pasar) {
                        $pasarId = $selectedPasar['pasar_id'] ?? '';
                        $selected = $pasar['pasar_id'] == $pasarId ? 'selected' : '';
                        $disabled = $_SESSION['marketIdUser'] != '' && $_SESSION['marketIdUser'] == $pasar['pasar_id'] ? '' : 'disabled';
                      ?>
                        <option <?= $selected ?> value="<?= $pasar['pasar_id'] ?>" <?= $disabled ?>><?= $pasar['pasar_name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Bulan</label>
                  <div class="select-full">
                    <select class="bootstrap-select list-marketname" name="bulan" id="bulan" data-width="100%">
                      <option value="">Pilih Bulan Laporan</option>
                      <?php foreach (getShortMonth() as $month) {
                        $selected = $month['id'] == $selectedBulan ? 'selected' : '';
                      ?>
                        <option <?= $selected ?> value="<?= $month['id'] ?>"><?= $month['text'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="tahun">Tahun</label>
                  <input name="tahun" id="tahun" type="number" class="form-control" value="<?= $selectedTahun ?>">
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-info btn-xs legitRipple" style="width:100%"><i class="icon-search4 position-left"></i> Filter Data</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8">
      <?php foreach ($availableLelangs as $tanggal => $lelangs) { ?>
        <div class="col-lg-12">
          <div class="panel panel-flat panel-dark">
            <div class="panel-heading">
              <h6 class="panel-title">Tanggal <?= dateFormat($tanggal) ?></h6>
            </div>
            <div class="">
              <div class="panel panel-flat panel-dark">
                <div class="">
                  <table class="table table-item" width="100%">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>PENJUAL</th>
                        <th>PEMBELI</th>
                        <th>NILAI TRANSAKSI (Rp)</th>
                        <th>REALISASI NILAI TRANSAKSI (Rp)</th>
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
                          <td><?= $lelang['penjual_nama'] ?></td>
                          <td><?= $lelang['pembeli_nama'] ?></td>
                          <td class="text-right"><?= inttomoney($total) ?></td>
                          <td class="text-right"><?= inttomoney($lelang['nilai_realisasi']) ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <?php if (empty($availableLelangs)) { ?>
        <h1 class="text-center">Data Tidak Tersedia</h1>
        <h6 class="text-center text-gray">Pilih Periode lain</h6>
      <?php } ?>
    </div>
  </div>
</div>