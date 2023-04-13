<style>
</style>
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-user-tie position-left"></i>Roles</h4>
        </div>

    </div>
    <div class="breadcrumb-line breadcrumb-line-component" style="margin-bottom:0">
        <ul class="breadcrumb">
            <li><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="active">Roles</li>
        </ul>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default border-grey" style="position: static;">
                    <div class="panel-heading">
                        <h6 class="panel-title">Roles</h6>
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
                        <form action="@ViewBag.Url" method="post" class="add-form mb-20 text-center" style="display: none;">
                            <input type="hidden" name="RoleId" />
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Role Name</label>
                                    <div class="col-lg-10">
                                        <input name="RoleName" type="text" class="form-control" placeholder="Role Name" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Role Description</label>
                                    <div class="col-lg-10">
                                        <input name="Description" type="text" class="form-control" placeholder="Role Description" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-success btn-labeled btn-xs legitRipple"><b><i class="icon-floppy-disk"></i></b> Simpan</button>
                                <button type="reset" class="btn btn-warning btn-labeled btn-xs cancel"><b><i class="icon-cancel-circle2"></i></b> Batal</button>
                            </div>
                        </form>
                        <table class="table datatable-fixed-both table-bordered table-striped" width="100%">

                            <thead>
                                <tr class="bg-slate-800">
                                    <th style="width: 20px;">No.</th>
                                    <th>Role Name</th>
                                    <th>Role Description</th>
                                    <th class="text-center" style="width: 20px;">
                                        <i class="icon-arrow-down12"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($roleAll as $k => $v) {
                                    //$pasarId=$v['UserId'];
                                    $no = $k + 1;
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $v['RoleName']; ?></td>
                                        <td><?= $v['Description']; ?></td>
                                        <td>
                                            <ul class="icons-list">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li>
                                                            <a href="#" class="editRole" data-rowid="<?= $v['RoleId'] ?>" data-rolename="<?= $v['RoleName'] ?>" data-description="<?= $v['Description'] ?>">
                                                                <i class="icon-pencil5"></i> Ubah
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="noty-runner deleteRole" data-layout="center" data-rolename="<?= $v['RoleName'] ?>" data-rowid="<?= $v['RoleId'] ?>">
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
                            <div class="button-table add">
                                <a class="add btn bg-teal-400 btn-labeled legitRipple btn-sm">
                                    <b><i class="icon-add add"></i></b>Add Roles
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

            // $('.datatable-fixed-both').DataTable({
            //     "columnDefs": [{
            //         "orderable": false,
            //         "targets": 3
            //     }],
            //     sDom: "<'table-header' <'row' <'col-lg-12'<'table-action pull-left'><'table-global-filter pull-right' f> > > > <'table-content'rt> <'table-footer' <'row' <'col-lg-6 col-md-6 col-sm-6'lBi><'col-lg-6 col-md-6 col-sm-6'p >>>",
            // });

            $('.table-action').html($('.button-table').html());
            // $('.add').on('click', () => console.log('asdasd'))
            $(document).on('click', '.add', function() {
                $('.add-form input').val('');
                $('.add-form').attr('action', 'role/create');
                $('.add-form').show(1000);
            });
            $('.cancel').click(function() {
                $('.add-form').hide(1000);
            });
            $('.deleteRole').on('click', function() {
                const roleName = $(this).data('rolename');
                const RoleId = $(this).data('rowid');
                const url = `<?= site_url('role/delete?id=') ?>${RoleId}`;

                swal({
                        title: "Hapus Role",
                        text: `Yakin akan menghapus role ${roleName}`,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) window.location.href = url;
                    });

            });

            $('.editRole').on('click', function() {
                const roleName = $(this).data('rolename');
                const roleId = $(this).data('rowid');
                const roleDesc = $(this).data('description');
                $("input[name='RoleId']").val(roleId);
                $("input[name='RoleName']").val(roleName);
                $("input[name='Description']").val(roleDesc);
                $('.add-form').attr('action', 'role/update');
                $('.add-form').show(1000);
            });
        });
    </script>