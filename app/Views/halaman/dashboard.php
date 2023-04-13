<div class="content">
    <div class="row">
        <div class="col-lg-8">

        <div class="panel panel-flat panel-dark">
            <div class="panel-heading">
                <h6 class="panel-title">5 Lelang Terakhir</h6>
            </div>

            <div class="">
                <table class="table table-item">
                    <thead>
                        <tr>
                            <th class="">Tanggal</th>
                            <th>Penyelenggara</th>
                            <th>Peserta</th>
                            <th class="text-right">Lelang</th>
                            <th class="text-right">Nilai Lelang</th>
                            <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($PasarLelang_Spv_GetLast5All as $k => $v){ ?>
                            <tr>
                                <td><?= date("d/m/Y", strtotime($v['LelangDate'])); ?></td>
                                <td><?= $v['pasar_name']; ?></td>
                                <td><?= $v['Participant']; ?></td>
                                <td><?= $v['AuctionCount']; ?></td>
                                <td><?= number_format($v['AuctionTotal'],2,",","."); ?></td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="icon-file-stats"></i> Lihat lelang</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>


        </div>
        <div class="col-lg-4">

        </div>
    </div>
</div>
