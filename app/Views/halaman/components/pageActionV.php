<?php
if (!isset($pageHeader['pageActions'])) return;
$type = $pageHeader['pageActions']['type'];
$pasarId = $pasarId ?? '';
$actions = $pageHeader['pageActions']['actions'];
if ($type == 'horizontal') { ?>
  <div class="heading-elements">
    <div class="heading-btn-group">
      <?php foreach ($actions as $key => $action) { ?>
        <a href="<?= $action['url'] ?>" id="action-horizontal-<?= $key + 1  ?>" class="btn btn-link btn-float text-size-small has-text"><i class="<?= $action['icon'] ?> text-grey-700"></i><span><?= $action['title'] ?></span></a>
      <?php } ?>
    </div>
  </div>
<?php } ?>

<?php if ($type == 'vertical') { ?>
  <ul class="icons-list">
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
      <ul class="dropdown-menu dropdown-menu-right">
        <?php foreach ($actions as $action) { ?>
          <li><a href="<?= $action['url'] . $pasarId ?>"><?= $action['title'] ?></a></li>
        <?php } ?>
      </ul>
    </li>
  </ul>
<?php } ?>