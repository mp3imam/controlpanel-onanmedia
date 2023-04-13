<?= view('halaman/components/breadcumsV') ?>
<div class="content">
  <?php
  $notif = $session->getFlashdata('changePasswordResult') ?? [];
  if (!empty($notif)) { ?>
    <div class="alert alert-<?= $notif['status'] ?> alert-styled-left alert-arrow-left alert-bordered">
      <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
      <?= $notif['msg'] ?>
    </div>
  <?php } ?>
  <div class="col-md-3">
    <div class="content-group">
      <div class="panel-body bg-blue border-radius-top text-center" style="background-image: url(<?= base_url('assets/images/backgrounds/bg-1.jpg') ?>" background-size: contain;">
        <div class="content-group-sm">
          <h5 class="text-semibold no-margin-bottom">
            <?= $_SESSION['fullname'] ?>
          </h5>
        </div>

        <a href="#" class="display-inline-block content-group-sm">
          <img src="<?= base_url('assets/images/demo/users/profile.png') ?>" class="img-circle img-responsive" alt="" style="width: 120px; height: 120px;">
        </a>
      </div>
      <div class="panel panel-body no-border-top no-border-radius-top">

        <div class="list-group no-border no-padding-top">
          <a href="#myprofile" class="list-group-item" data-toggle="tab"><i class="icon-user-tie"></i> My Profile</a>
          <a href="#changepassword" class="list-group-item" data-toggle="tab"><i class="icon-key"></i> Change Password</a>
          <div class="list-group-divider"></div>
          <a href="<?= site_url('profil/logout') ?>" class="list-group-item"><i class="icon-switch2"></i> Logout</a>
        </div>
      </div>
    </div>
  </div>

  <div class="tab-content col-md-9">
    <div class="tab-pane active fade in" id="myprofile">
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h3 class="panel-title">
            My Profile
            <a class="heading-elements-toggle">
              <i class="icon-more"></i>
            </a>
          </h3>
          <div class="heading-elements">
            <ul class="icons-list">
              <li>
                <a data-action="collapse"></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="panel-body">
          <table class="table table-striped">
            <tr>
              <th style="width: 150px;">Username</th>
              <td style="width: 10px;">:</td>
              <td><?= $user['UserName'] ?></td>
            </tr>
            <tr>
              <th>Nama Lengkap</th>
              <td style="width: 10px;">:</td>
              <td><?= $user['FullName'] ?></td>
            </tr>
            <tr>
              <th>Email</th>
              <td style="width: 10px;">:</td>
              <td><?= $user['Email'] ?></td>
            </tr>
            <tr>
              <th>No. Telepon</th>
              <td style="width: 10px;">:</td>
              <td><?= $user['PhoneNumber'] ?></td>
            </tr>
            <tr>
              <th>Status</th>
              <td style="width: 10px;">:</td>
              <td><?= $user['IsActive'] == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
            </tr>
            <tr>
              <th>Tgl. Daftar</th>
              <td style="width: 10px;">:</td>
              <td><?= $user['CreateDate'] ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="changepassword">
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h2 class="panel-title">
            Change Password
            <a class="heading-elements-toggle">
              <i class="icon-more"></i>
            </a>
          </h2>
          <div class="heading-elements">
            <ul class="icons-list">
              <li>
                <a data-action="collapse"></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="panel-body">
          <form action="<?= site_url('profil/changePassword') ?>" method="POST">
            <table class="table table-striped">
              <tr>
                <th style="width: 149px;">Password Lama</th>
                <td style="width: 9px;">:</td>
                <td>
                  <input name="oldPassword" type="password" class="form-control" placeholder="Password Lama" required>
                </td>
              </tr>
              <tr>
                <th style="width: 149px;">Password Baru</th>
                <td style="width: 9px;">:</td>
                <td>
                  <input name="newPassword" type="password" class="form-control" placeholder="Password Baru" required>
                </td>
              </tr>
            </table>
            <div class="text-right">
              <button type="submit" class="btn btn-primary legitRipple">Simpan <i class="icon-floppy-disk position-right"></i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>