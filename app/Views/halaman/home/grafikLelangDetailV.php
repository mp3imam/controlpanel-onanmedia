<div style="padding: 0 20px" class="panel-heading">
  <h5 style="font-weight:400;margin-top:0"><?= $judul ?></h5>
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
    <?php foreach ($details as $detail) { ?>
      <tr>
        <td>
          <h5 class="no-margin litte"><?= $detail['Market'] ?></h5>
        </td>
        <td class="text-right">Rp. <?= inttomoney($detail['total']) ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>