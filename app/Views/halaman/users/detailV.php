<?= view('halaman/components/breadcumsV'); ?>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title"><?= $user['UserName'] ?? 'Add User' ?></h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <a data-action="collapse"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-hover">
                                <tr>
                                    <th style="width: 120px;">Username</th>
                                    <th style="width: 10px;">:</th>
                                    <td><?= $user['UserName'] ?></td>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>:</th>
                                    <td><?= $user['FullName'] ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <th>:</th>
                                    <td><?= $user['Email'] ?></td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <th>:</th>
                                    <td><?= $user['PhoneNumber'] ?></td>
                                </tr>

                            </table>
                        </div>

                        <div class="col-md-6">
                            <table class="table table-hover">
                                <tr>
                                    <th style="width: 120px;">Roles</th>
                                    <th style="width: 10px;">:</th>
                                    <td><?= $user['Roles'] ?> <?= $user['market']['pasar_name'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <th>:</th>
                                    <td><?= $user['IsActive'] == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
                                </tr>
                                <tr>
                                    <th>Tgl.Daftar</th>
                                    <th>:</th>
                                    <td><?= dateTimeFormat($user['CreateDate']) ?? '-' ?></td>
                                </tr>
                                <tr>
                                    <th>Login Terakhir</th>
                                    <th>:</th>
                                    <td><?= dateTimeFormat($user['LastLoginDate']) ?? '-' ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="<?= site_url('users') ?>" class="btn btn-info btn-labeled btn-xs legitRipple">
                            <b>
                                <i class="icon-arrow-left16"></i>
                            </b> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>