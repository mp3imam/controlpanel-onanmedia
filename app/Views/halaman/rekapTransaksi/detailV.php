<?= view('halaman/components/breadcumsV'); ?>
<div class="content">
  <div class="row">
    <div class="col-lg-3">
      <div class="panel panel-flat panel-dark">
        <div class="panel-heading">
          <h6 class="panel-title">Filter Data</h6>
        </div>
        <div class="container-fluid">
          <form action="" method="GET">
            <input type="hidden" name="id" value="<?= myEncrypt($pasar['pasar_id']) ?>" />
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                  <label>Komoditas</label>
                  <div class="multi-select-full">
                    <select class="multiselect-select-all select-commodity" multiple="multiple" name="komoditas[]">
                      <?php
                      $selectedCommodity = $_GET['komoditas'] ?? [];
                      foreach ($commodities as $key => $commodity) {
                        $selected = in_array($commodity['CommodityName'], $selectedCommodity) ? 'selected' : '';
                      ?>
                        <option value="<?= $commodity['CommodityName'] ?>" <?= $selected ?>><?= $commodity['CommodityName'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Jenis Perdagangan</label>
                  <div class="multi-select-full">
                    <select class="multiselect-select-all" multiple="multiple" name="type[]">
                      <?php
                      $selectedType = $_GET['type'] ?? [];
                      foreach ($jenisDagangs as $key => $jenis) {
                        $selected = in_array($key, $selectedType) ? 'selected' : '';
                      ?>
                        <option value="<?= $key ?>" <?= $selected ?>><?= $jenis ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Tanggal Lelang</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="icon-calendar"></i>
                    </span>
                    <input class="form-control date-from" placeholder="" name="startDate" type="date" value=<?= $_GET['startDate'] ?? '' ?>>
                  </div>
                  <div class="panel-title" style="margin-top: 10px">Sampai dengan</div>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="icon-calendar"></i>
                    </span>
                    <input class="form-control date-until" placeholder="" name="endDate" type="date" value="<?= $_GET['endDate'] ?? '' ?>">
                  </div>
                </div>
                <div>
                  <button type="submit" class="btn btn-info btn-xs legitRipple" style="width:100%"><i class="icon-search4 position-left"></i> Filter Data</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-9">
      <div class="panel panel-flat panel-dark">
        <div class="">
          <?= view('halaman/rekapTransaksi/tableV') ?>
          <div class="hidden">
            <div class="button-table">
              <div class="btn-group">
                <div class="btn-group btn-select">
                  <button type="button" class="btn btn-table btn-trans btn-toolbar dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-file-download2"></i> Export <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <?php foreach ($exports as $export) {
                    ?>
                      <li><a href="#" class="exportData" data-target="<?= strtolower($export); ?>"><?= $export ?></a></li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(function() {
    const qParams = JSON.parse(`<?= json_encode($_GET ?? []) ?>`);
    $(document).on('click', '.exportData', function() {
      const target = $(this).data('target');
      const url = `<?= site_url('rekaptransaksi/export') ?>`;
      const query = $.param({
        ...qParams,
        target
      });
      window.open(`${url}?${query}`, '_blank');
    });
  })
</script>