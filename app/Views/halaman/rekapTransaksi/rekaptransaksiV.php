<?= view('halaman/components/breadcumsV'); ?>
<div class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-flat panel-dark" style="margin-bottom:5px;">
        <div class="panel-heading">
          <h6 class="panel-title">Rekap Transaksi</h6>
        </div>

        <div class="">
          <table class="table table-item text-nowrap">
            <thead>
              <tr>
                <th>PENYELENGGARA</th>
                <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($pasars as $keyPasar => $pasar) {
                $pasarId = myEncrypt($pasar['pasar_id']);
              ?>
                <tr>
                  <td>
                    <h5 class="no-margin litte"><?= $pasar['pasar_name'] ?> </h5>
                  </td>
                  <td class="text-center">
                    <ul class="icons-list">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon-menu7"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li><a href="<?= site_url('rekaptransaksi/detail?id=' . $pasarId) ?>">Lihat</a></li>
                        </ul>
                      </li>
                    </ul>
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

<!-- @section PageScripts{
    <script type="text/javascript" src="@Url.Content("~/assets/js/plugins/tables/datatables/datatables.min.js")"></script>
<script type="text/javascript" src="@Url.Content("~/assets/js/plugins/tables/datatables/extensions/fixed_columns.min.js")"></script>
<script type="text/javascript" src="@Url.Content("~/assets/js/plugins/forms/styling/uniform.min.js")"></script>
<script type="text/javascript" src="@Url.Content("~/assets/js/plugins/forms/selects/bootstrap_multiselect.js")"></script>


<script type="text/javascript" src="@Url.Content("~/assets/js/plugins/visualization/echarts/echarts.min.js")"></script>
<script type="text/javascript" src="@Url.Content("~/assets/js/plugins/ui/ripple.min.js")"></script>
<script type="text/javascript" src="@Url.Content("~/assets/js/spplk/example2.js")"></script>
<script type="text/javascript" src="@Url.Content("~/assets/js/spplk/lelang.selesai.js")"></script>
<script type="text/javascript" src="@Url.Content("~/assets/js/spplk/lelang.selesai.bids.js")"></script>
<script type="text/javascript" src="@Url.Content("~/assets/js/spplk/chart-home-app.js")"></script>


} -->