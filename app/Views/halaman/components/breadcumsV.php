<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-home2 position-left"></i><?= $pageHeader['title'] ?></h4>
    </div>
    <?php if (isset($pageHeader['pageActions']) && $pageHeader['pageActions']['type'] == 'horizontal') {
      echo view('halaman/components/pageActionV');
    } ?>
  </div>
  <div class="breadcrumb-line breadcrumb-line-component" style="margin-bottom:0">
    <ul class="breadcrumb">
      <?php
      $totalBreadcum = count($pageHeader['breadcums']) - 1;
      foreach ($pageHeader['breadcums'] as $key => $breadcum) { ?>
        <li class="<?= $totalBreadcum == $key ? 'active' : '' ?>"><?= $breadcum ?></li>
      <?php }
      ?>
    </ul>
  </div>
</div>