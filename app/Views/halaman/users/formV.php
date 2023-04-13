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
                    <form action="<?= site_url('users/simpan') ?>" method="post">
                        <?php if ($isNew === false) { ?>
                            <input type="hidden" name="UserId" value="<?= $user['UserId']  ?? '' ?>">
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <th style="width: 120px;">Username</th>
                                        <th style="width: 10px;">:</th>
                                        <td>
                                            <input name="UserName" type="text" class="form-control" required placeholder="" value="<?= $user['UserName'] ?? '' ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <th>:</th>
                                        <td>
                                            <input name="FullName" type="text" class="form-control" required placeholder="" value="<?= $user['FullName'] ?? '' ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <th>:</th>
                                        <td>
                                            <input name="Email" type="text" class="form-control" required placeholder="" value="<?= $user['Email'] ?? '' ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <th>:</th>
                                        <td>
                                            <?php
                                            $isActive = $user['IsActive'] ?? 0;
                                            ?>
                                            <label class="radio-inline">
                                                <input type="radio" name="IsActive" class="styled" value="1" <?= $isActive == 1 ? 'checked' : '' ?>> Aktif
                                            </label>

                                            <label class="radio-inline">
                                                <input type="radio" name="IsActive" class="styled" value="0" <?= $isActive == 0 ? 'checked' : '' ?>> Tidak Aktif
                                            </label>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <th style="width: 120px;">Password</th>
                                        <th style="width: 10px;">:</th>
                                        <td>
                                            <div class="label-indicator-absolute">
                                                <input name="Password2" type="password" required class="form-control" placeholder="Enter your password" value="<?= $user['Password2'] ?? false ? 'tidak berubah' : '' ?>">
                                                <span class="label password-indicator-label-absolute"></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Telepon</th>
                                        <th>:</th>
                                        <td>
                                            <input name="PhoneNumber" type="text" class="form-control" required placeholder="" value="<?= $user['PhoneNumber'] ?? '' ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 120px;">Roles</th>
                                        <th style="width: 10px;">:</th>
                                        <td>
                                            <div class="form-group">
                                                <div class="multi-select-full">
                                                    <select name="Roles[]" class="multiselect-select-all" multiple="multiple" id="roleSelection" required>
                                                        <?php
                                                        $selectedRoles = $isNew ? [] : explode(',', $user['Roles']);
                                                        foreach ($roles as $key => $role) {
                                                            $selected = in_array($role['RoleName'], $selectedRoles) ? 'selected' : '';
                                                        ?>
                                                            <option value="<?= $role['RoleName'] ?>" <?= $selected ?>><?= $role['RoleName'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="selectPenyelenggara" class="hide">
                                        <th>Penyelenggara</th>
                                        <th>:</th>
                                        <td>
                                            <div class="form-group">
                                                <div class="select-full">
                                                    <select class="bootstrap-select" id="MarketId" data-width="100%" name="MarketId">
                                                        <option value="" disabled selected>Pilih Penyelenggara</option>
                                                        <?php foreach ($pasars as $pasar) {
                                                            $userMarket = $user['MarketId'] ?? '';
                                                            $selected = $userMarket == $pasar['pasar_id'] ? 'selected' : '';
                                                        ?>
                                                            <option <?= $selected ?> value="<?= $pasar['pasar_id'] ?>"><?= $pasar['pasar_name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-info btn-labeled btn-xs legitRipple">
                                <b>
                                    <i class="icon-arrow-left16"></i>
                                </b> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        let isRequiredPenylenggara = false;


        $('#roleSelection').on("change", function() {
            const selected = $(this).val();
            let hidePenyelenggara = true;
            isRequiredPenylenggara = false;
            if (selected && selected.includes('Penyelenggara')) {
                hidePenyelenggara = false;
                isRequiredPenylenggara = true;
            }
            $('#selectPenyelenggara').toggleClass('hide', hidePenyelenggara);
        });
        $('form').on('submit', function(e) {
            const MarketId = $('#MarketId').val();
            if (isRequiredPenylenggara && !MarketId) {
                swal('Perhatian', 'Harus memilih Penyelenggara', 'warning');
                e.preventDefault();
            }
        })

        $('#roleSelection').trigger('change');
    })
</script>