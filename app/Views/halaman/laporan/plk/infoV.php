<?= view('halaman/components/breadcumsV'); ?>
<div class="content">
  <div class="row">
    <div class="col-lg-12">
      <!-- LAST 5 LELANG -->
      <div class="panel panel-flat panel-dark">
        <div class="">
          <table class="table table-dark datatable-fixed-both hide-sort" width="100%">
            <thead>
              <tr>
                <th class="">Tanggal</th>
                <th>Penyelenggara</th>
                <th>Peserta</th>
                <th class="text-right">Lelang</th>
                <th class="text-right">Nilai Lelang</th>
                <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($lastLelangs as $key => $lelang) {
              ?>
                <tr>
                  <td><?= dateFormat($lelang['tgl_lelang']) ?></td>
                  <td>
                    <h5 class="no-margin litte"><?= $lelang['pasar_name'] ?></h5>
                  </td>
                  <td class="text-right"><?= inttomoney($lelang['total_pembeli'] + $lelang['total_penjual']) ?></td>
                  <td class="text-right"><?= inttomoney($lelang['total_lelang']) ?>
                  <td class="text-right">Rp. <?= inttomoney($lelang['total_uang']) ?>
                  <td class="text-center">
                    <ul class="icons-list">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li><a href="<?= site_url('laporan/plk/detail?id=' . myEncrypt($lelang['pasar_id']) . '&tgl=' . $lelang['tgl_lelang']) ?>"><i class="icon-file-stats"></i>Lihat lelang</a></li>
                        </ul>
                      </li>
                    </ul>
                  </td>
                </tr>
              <?php } ?>
              <?php if (empty($lastLelangs)) { ?>
                <tr>
                  <td colspan="6" style="color:silver;text-align:center">Belum ada lelang</td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>