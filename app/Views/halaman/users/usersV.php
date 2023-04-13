<?= view('halaman/components/breadcumsV'); ?>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-flat" style="position: static;">
                <div class="panel-heading">
                    <h6 class="panel-title">Daftar Pengguna</h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <a data-action="reload"></a>
                            </li>
                            <li>
                                <a data-action="collapse"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table datatable-fixed-both table-bordered table-striped" width="100%">
                        <thead>
                            <tr class="bg-slate-800">
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Roles</th>
                                <th>Status</th>
                                <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($userAll as $k => $v) {
                                $id = myEncrypt($v['UserId']);
                            ?>
                                <tr>
                                    <td><?= $v['UserName']; ?></td>
                                    <td><?= $v['Email']; ?></td>
                                    <td><?= $v['PhoneNumber']; ?></td>
                                    <td><?= $v['Roles']; ?></td>
                                    <td><?= $v['IsActive'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?></td>
                                    <td>
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="<?= site_url('Users/detail?id=' . $id) ?>"><i class="icon-eye4"></i> Detail</a></li>
                                                    <li><a href="<?= site_url('Users/update?id=' . $id) ?>"><i class="icon-pencil5"></i> Ubah</a></li>
                                                    <li>
                                                        <a class="noty-runner deleteUser" data-layout="center" data-username="<?= $v['UserName'] ?>" data-id="<?= $id ?>">
                                                            <i class="icon-trash"></i> Hapus
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="hidden">
                        <div class="button-table">
                            <a href="users/create" class="btn bg-teal-400 btn-labeled legitRipple btn-sm">
                                <b><i class="icon-user-plus"></i></b> Add User
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('.deleteUser').on('click', function() {
            const userName = $(this).data('username');
            const id = $(this).data('id');
            const url = `<?= site_url('users/delete?id=') ?>${id}`;
            swal({
                    title: "Hapus User",
                    text: `Yakin akan menghapus user ${userName}`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) window.location.href = url;
                });
        });
    })
</script>