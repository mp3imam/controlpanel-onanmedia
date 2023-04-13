<div class="content">
  <div class="row">
    <!-- LAST 5 LELANG -->
    <div class="col-lg-8">
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
      <input type="hidden" id="year" value="<?= $year ?>" />
      <div class="panel panel-dark panel-flat">
        <div class="panel-heading">
          <h6 class="panel-title">Grafik Lelang <?= $year ?></h6>
        </div>
        <div class="panel-body">
          <div style="height:300px;width:100%;" id="lelangChart"></div>
        </div>
        <div class="panel-detail hidden">
          <div style="padding: 0 20px" class="panel-heading">
            <h5 style="font-weight:400;margin-top:0">Juni 2022</h5>
            <div class="heading-icon" style="top:0;">
              <ul class="icons-list control-icon">
                <li><a href="javascript:void(0)" class="btn-close-detail" title="Filter"><i class="icon-cancel-square"></i></a></li>
              </ul>
            </div>
          </div>
          <table class="table table-item text-nowrap">
            <thead>
              <tr>
                <th>Penyelenggara</th>
                <th class="col-md-2 text-right">Nilai Transaksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <h5 class="no-margin litte">Dinas Perindag Provinsi Sulawesi Utara</h5>
                </td>
                <td class="text-right">Rp. 909.000.000</td>
              </tr>
              <tr>
                <td>
                  <h5 class="no-margin litte">Koperasi Wira Agri Aneka Jaya Jawa Tengah</h5>
                </td>
                <td class="text-right">Rp. 758.000.000</td>
              </tr>
              <tr>
                <td>
                  <h5 class="no-margin litte">PT. Bahtera Komoditi Indonesia</h5>
                </td>
                <td class="text-right">Rp. 103.299.900</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
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
                        <h6 class="text-semibold no-margin">Lelang <?= $resume['title'] ?></h6>
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
      <div class="panel panel-flat panel-dark">
        <div class="panel-heading">
          <h6 class="panel-title">10 Lelang Komoditas Terbesar <?= $year ?></h6>
          <div class="heading-icon">
            <ul class="icons-list control-icon">
              <li><a class="btn-filter" title="Filter"><i class="icon-filter4"></i></a></li>
            </ul>
          </div>

        </div>
        <div class="visible-elements filter-form hidden">
          <form action="" method="GET">
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                  <label>Penyelenggara Lelang</label>
                  <div class="select-full">
                    <select class="bootstrap-select" id="id" data-width="100%" name="id">
                      <option value="">Semua Penyelenggara</option>
                      <?php foreach ($pasars as $pasar) {
                        $qPasar = $_GET['id'] ?? '';
                        $selected = myDecrypt($qPasar) == $pasar['pasar_id'] ? 'selected' : '';
                      ?>
                        <option <?= $selected ?> value="<?= $pasar['pasar_id'] ?>"><?= $pasar['pasar_name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <button type="submit" class="btn btn-info btn-xs legitRipple" style="width:100%"><i class="icon-search4 position-left"></i> Filter Data</button>
            </div>
          </form>
        </div>
        <div class="">
          <table class="table table-item text-nowrap">
            <thead>
              <tr>
                <th>Komoditas</th>
                <th class="col-md-2 text-right">Nilai Transaksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($top10Komoditi as $komoditi) {
              ?>
                <tr>
                  <td>
                    <h5 class="no-margin litte"><?= $komoditi['CommodityName'] ?></h5>
                  </td>
                  <td class="text-right">Rp. <?= inttomoney($komoditi['Total']) ?></td>
                </tr>
              <?php } ?>
              <?php if (empty($top10Komoditi)) { ?>
                <tr>
                  <td colspan="2">
                    <h5 class="no-margin litte" style="color:silver;text-align:center">Belum ada transaksi lelang</h5>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?= base_url('assets/js/plugins/visualization/echarts/echarts.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/spplk/my-chart.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/spplk/home.js') ?>"></script>
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
    lelangChart.on('click', getDetail)

    function getDetail(param) {
      const [nilai, tahun, bulan] = chartData[param.dataIndex];
      const postParams = {
        tahun,
        bulan,
      };
      $.post(`<?= site_url('home/detailGrafik') ?>`, postParams, function(res) {
        console.log(res)
        $('.panel-detail').html(res);
        $('.panel-detail').removeClass('hidden');
        $('.btn-close-detail').click(function() {
          $(this).closest('.panel-detail').toggleClass('hidden');
        });
      });
    }
  })
</script>