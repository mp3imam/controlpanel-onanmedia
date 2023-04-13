<?= view('halaman/components/breadcumsV') ?>
<div class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-flat panel-dark" style="margin-bottom:5px;">
        <div class="panel-heading">
          <h6 class="panel-title">Penyelenggara Pasar Lelang</h6>
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
                          <li><a href="<?= site_url('laporan/bulanan/detail?id=' . $pasarId) ?>">Lihat</a></li>
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
<script>
  $(function() {
    $('#action-horizontal-1').on('click', function() {
      $('#uploadExcel').modal('show');
    })
  })
</script>