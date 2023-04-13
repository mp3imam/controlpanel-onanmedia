<?= view('halaman/components/breadcumsV'); ?>
<div class="content">
  <div class="row">
    <!-- FILTER -->
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
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h6 class="panel-title">DATA LELANG</h6>
        </div>
        <div id="messages-stats"></div>
        <ul class="nav nav-lg nav-tabs no-margin no-border-radius bg-slate-400">
          <li class="active">
            <a href="#messages-tue" class="text-size-small text-uppercase" data-toggle="tab">
              <i class="icon-table"></i> Jurnal
            </a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active fade in" id="messages-tue">
            <?= view('halaman/lelang/tableV') ?>
          </div>
          <div class="div-chart" style="background-color:#1c313a;width:100%">
            <div id="chart-bid"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>