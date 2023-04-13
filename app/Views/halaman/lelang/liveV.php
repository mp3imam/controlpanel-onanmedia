<?= view('halaman/components/breadcumsV'); ?>
<div class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h6 class="panel-title">LELANG AKTIF</h6>
        </div>
        <div id="messages-stats"></div>
        <ul class="nav nav-lg nav-tabs no-margin no-border-radius bg-slate-400">
          <li class="active">
            <a href="#messages-tue" class="text-size-small text-uppercase" data-toggle="tab">
              <i class="icon-table"></i> Jurnal
            </a>
          </li>
          <li>
            <a href="#messages-fri" class="text-size-small text-uppercase" data-toggle="tab">
              <i class="icon-stats-dots"></i> Grafik Penawaran
            </a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active fade in" id="messages-tue">
            <?= view('halaman/lelang/tableV') ?>
          </div>
          <div class="tab-pane fade has-padding" id="messages-fri">
            <div style="padding:3px 10px">Grafik Penawaran</div>
            <div class="div-chart" style="background-color:#1c313a">
              <div class="div-chart-container">
                <div class="chart-container">
                  <div id="chart-bid"></div>
                </div>
                <div class="chart-desc v-middle" style="padding-right:30px;">
                  <table class="table-propertis tbl-chart-legend">
                    <tr>
                      <td class="text-right">Lelang</td>
                      <td style="font-size:1.6em;font-weight:600;">2</td>
                    </tr>
                    <tr>
                      <td class="text-right">Penawaran</td>
                      <td style="font-size:1.6em;font-weight:600;">10</td>
                    </tr>
                    <tr>
                      <td class="text-right">Match</td>
                      <td style="font-size:1.6em;font-weight:600;">2</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?= base_url('assets/js/plugins/forms/selects/bootstrap_multiselect.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/plugins/forms/selects/bootstrap_select.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/plugins/tables/datatables/datatables.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/plugins/tables/datatables/extensions/fixed_columns.min.js') ?>"></script>