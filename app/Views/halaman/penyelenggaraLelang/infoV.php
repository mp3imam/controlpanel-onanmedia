<?= view('halaman/components/breadcumsV'); ?>
<div class="content">
  <div class="row">
    <div class="col-lg-4">
      <!-- DETAIL PENYELENGGARA -->
      <div class="panel panel-flat panel-dark">
        <div class="panel-heading">
          <h6 class="panel-title">PENYELENGGARA PASAR LELANG KOMODITAS</h6>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12 info">
              <div class="form-group">
                <label>Nama :</label>
                <div class="text-bold">
                  <?= $pasar['pasar_name'] ?>
                </div>
              </div>
              <div class="form-group">
                <label>Alamat :</label>
                <div class="text-bold">
                  <?= $pasar['Address'] ?>
                </div>
              </div>
              <div class="form-group">
                <label>Nomor Telp :</label>
                <div class="text-bold">
                  <?= $pasar['Phone'] ?>
                </div>
              </div>
              <div class="form-group">
                <label>Website :</label>
                <div class="text-bold">
                  <?= $pasar['Website'] ?>
                </div>
              </div>
              <div class="form-group">
                <label>Email :</label>
                <div class="text-bold">
                  <?= $pasar['Email'] ?>
                </div>
              </div>
              <div class="form-group">
                <label>Contact Person :</label>
                <div class="text-bold">
                  <?= $pasar['Pic'] ?>
                </div>
              </div>
              <div class="form-group">
                <label>HP :</label>
                <div class="text-bold">
                  <?= $pasar['Pic_HP'] ?>
                </div>
              </div>
              <div class="form-group">
                <label>Email :</label>
                <div class="text-bold">
                  <?= $pasar['Pic_Email'] ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- RESUME LELANG -->
      <div class="panel panel-dark panel-flat">
        <div class="panel-heading">
          <h6 class="panel-title">Lelang Tahun <?= $year ?></h6>
        </div>
        <ul class="bg-teal-600 nav nav-lg nav-tabs nav-justified no-margin no-border-radius border-top border-top-teal-400">
          <?php foreach ($resumes as $key => $resume) { ?>
            <li class="<?= $key  == 0 ? 'active' : '' ?>">
              <a href="#messages-tue-<?= $key ?>" class="text-size-small text-uppercase" data-toggle="tab">
                <span class="content-group">
                  <span class="text-size-small"><?= $resume['title'] ?></span>
                </span>
              </a>
            </li>
          <?php } ?>
        </ul>
        <div class="tab-content">
          <?php foreach ($resumes as $key => $resume) {
            $data = $resume['data'];
          ?>
            <div class="tab-pane <?= $key == 0 ? 'active' : '' ?> fade in has-padding" id="messages-tue-<?= $key ?>" style="padding:0">
              <table class="table text-nowrap">
                <tbody>
                  <tr>
                    <td>
                      <div class="media-left media-middle">
                        <a href="#" class="btn border-slate text-slate btn-flat btn-rounded btn-icon-sm btn-xs legitRipple">
                          <i class="icon-clipboard3"></i>
                        </a>
                      </div>
                      <div class="media-body media-middle">
                        <h6 class="text-semibold no-margin">Lelang</h6>
                      </div>
                    </td>
                    <td class="text-right">
                      <h6 class="text-semibold no-margin"><?= inttomoney($data['lelang']) ?></h6>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="media-left media-middle">
                        <a href="#" class="btn border-slate text-slate btn-flat btn-rounded btn-icon-sm btn-xs legitRipple">
                          <i class="icon-users"></i>
                        </a>
                      </div>
                      <div class="media-body media-middle">
                        <h6 class="text-semibold no-margin">Peserta</h6>
                      </div>
                    </td>
                    <td class="text-right">
                      <h6 class="text-semibold no-margin"><?= inttomoney($data['peserta']) ?> orang</h6>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="media-left media-middle">
                        <a href="#" class="btn border-slate text-slate btn-flat btn-rounded btn-icon-sm btn-xs legitRipple">
                          <i class="icon-user"></i>
                        </a>
                      </div>
                      <div class="media-body media-middle">
                        <h6 class="text-semibold no-margin">Penjual</h6>
                      </div>
                    </td>

                    <td class="text-right">
                      <h6 class="text-semibold no-margin"><?= inttomoney($data['penjual']) ?> orang</h6>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="media-left media-middle">
                        <a href="#" class="btn border-slate text-slate btn-flat btn-rounded btn-icon-sm btn-xs legitRipple ">
                          <i class="icon-user-tie"></i>
                        </a>
                      </div>
                      <div class="media-body media-middle">
                        <h6 class="text-semibold no-margin">Pembeli</h6>
                      </div>
                    </td>

                    <td class="text-right">
                      <h6 class="text-semibold no-margin"><?= inttomoney($data['pembeli']) ?> orang</h6>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="media-left media-middle">
                        <a href="#" class="btn border-slate text-slate btn-flat btn-rounded btn-icon-sm btn-xs legitRipple">
                          <i class="icon-cash4"></i>
                        </a>
                      </div>
                      <div class="media-body media-middle">
                        <h6 class="text-semibold no-margin">Nilai Transaksi</h6>
                      </div>
                    </td>
                    <td class="text-right">
                      <h6 class="text-semibold no-margin">Rp. <?= inttomoney($data['total']) ?></h6>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="col-lg-8">
      <!-- LAST 5 LELANG -->
      <div class="panel panel-flat panel-dark">
        <div class="panel-heading">
          <h6 class="panel-title">5 Lelang Terakhir</h6>
        </div>
        <div class="">
          <table class="table table-item">
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
                  <td><?= dateFormat($lelang['LelangDate']) ?></td>
                  <td>
                    <h5 class="no-margin litte"><?= $lelang['pasar_name'] ?></h5>
                  </td>
                  <td class="text-right"><?= inttomoney($lelang['Participant']) ?></td>
                  <td class="text-right"><?= inttomoney($lelang['AuctionCount']) ?>
                  <td class="text-right">Rp. <?= inttomoney($lelang['AuctionTotal']) ?>
                  <td class="text-center">
                    <ul class="icons-list">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li><a href="<?= site_url('Lelang/market?id=' . myEncrypt($lelang['pasar_id'])) ?>"><i class="icon-file-stats"></i>Lihat lelang</a></li>
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
      <!-- GRAFIK LELANG -->
      <input type="hidden" id="market-id" value="<?= $pasar['pasar_id'] ?>" />
      <input type="hidden" id="year" value="<?= $year ?>" />
      <div class="panel panel-dark panel-flat">
        <div class="panel-heading">
          <h6 class="panel-title">Grafik Lelang <?= $year ?></h6>
        </div>
        <div class="panel-body">
          <div style="height:300px;width:100%;" id="lelangChart"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript" src="<?= base_url('assets/js/plugins/visualization/echarts/echarts.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/spplk/my-chart.js') ?>"></script>
<script>
  $(function() {
    const lelangData = JSON.parse(`<?= $monthlyAuction ?>`);
    const year = `<?= $year ?>`;
    const chartData = lelangData.map(lelang => [parseInt(lelang.TOTAL, 10), year, lelang.MONTH, lelang.MONTH_NAME])
    // const chartData = [
    //   [8826190000, 2018, 1, 'Jan'],
    //   [3729350000, 2018, 2, 'Feb'],
    //   [1292350000, 2018, 3, 'Mar'],
    //   [2680750000, 2018, 4, 'Apr'],
    //   [4821500000, 2018, 5, 'Mei'],
    //   [1350000000, 2018, 6, 'Jun'],
    //   [825200000, 2018, 7, 'Jul'],
    //   [6923730000, 2018, 8, 'Agt'],
    //   [0, 2018, 9, 'Sep'],
    //   [0, 2018, 10, 'Okt'],
    //   [0, 2018, 11, 'Nop'],
    //   [0, 2018, 12, 'Des']
    // ];
    const chartDom = document.getElementById('lelangChart');
    const lelangChart = echarts.init(chartDom);
    const option = buildEchart(chartData, true)
    lelangChart.setOption(option)
  })
</script>