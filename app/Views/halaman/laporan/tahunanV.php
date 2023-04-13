<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-stack position-left"></i>Laporan Tahunan</h4>
    </div>
    <!--<div class="heading-elements">
      <div class="heading-btn-group">
        <a href="@Url.Action(" Market", "Lelang" )?id=@marketInc" class="btn btn-link btn-float text-size-small has-text"><i class="icon-database text-grey-700"></i><span>Data Lelang</span></a>
        <a href="@Url.Action(" Live", "Lelang" )?id=@marketInc" class="btn btn-link btn-float text-size-small has-text"><i class="icon-pulse2 text-grey-700"></i> <span>Lelang Aktif</span></a>
        <a href="@Url.Action(" Info", "Penyelenggara" )?id=@marketInc" class="btn btn-link btn-float text-size-small has-text"><i class="icon-info22 text-grey-700"></i> <span>Info</span></a>
      </div>
    </div>-->
  </div>
  <div class="breadcrumb-line breadcrumb-line-component" style="margin-bottom:0">
    <ul class="breadcrumb">
      <li><a href="<?= base_url('home') ?>">Home</a></li>
      <li><a href="<?= base_url('rekaptransaksi') ?>">Laporan</a></li>
      <li class="active">Laporan Tahunan</li>
    </ul>
  </div>

  <div class="content">
    <div class="row">
      <div class="col-lg-3">
            <div class="panel panel-flat panel-dark">
                <div class="panel-heading">
                    <h6 class="panel-title">Filter Data</h6>

                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">                          
                            
                            <div class="form-group">
                                <label>Tahun</label>
                                <div class="multi-select-full">
                                    <select class="bootstrap-select list-jenis-perdagangan" >
                                        <option value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>

                                    </select>
                                </div>
                            </div>

                            <div>
                                <button type="button" class="btn btn-info btn-xs legitRipple btn-filter-data" style="width: 100%"><i class="icon-search4 position-left"></i> Filter Data</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
      <div class="col-lg-9">
        <div class="panel panel-flat panel-dark">
          <div class="">
            <table  class="table multi-header table-dark datatable-fixed-both hide-sort" width="100%">
              <thead>
                <tr>
                  <th class="">No</th>
                  <th>Bulan</th>
                  <th>Peserta</th>
                  <th class="text-right">Nilai Transaksi(Rp)</th>
                  <th class="text-right">Realisasi Nilai Transaksi(Rp)</th>
                  <th class="text-right">Persentase</th>
                </tr>
              </thead>
              <tbody>
                
                  <tr>
                    <td></td>
                    <td></td>
                    <td class="text-right"></td>
                    <td class="text-right"></td>
                    <td class="text-right"></td>
                    <td class="text-center"> </td>
                  </tr>
               
              </tbody>
            </table>
			
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
<div class="hidden">
    <div class="button-table">
        <div class="btn-group">
            <div class="btn-group btn-select">
                <button type="button" class="btn btn-table btn-trans btn-toolbar dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-file-download2"></i> Export <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a  href="#" onclick="cetakLaporan('pdf')">PDF</a></li>
                    <li><a  href="#" onclick="cetakLaporan('xls')">Excel</a></li>
                    <li><a  href="#" onclick="cetakLaporan('word')" >Word</a></li>
                </ul>
            </div>
        </div>
    </div>
    <form id="submit-cetak-laporan" action="@Url.Action("LapTransaksi", "Laporan")" method="POST" target="_blank" >
        <input type="hidden" name="MarketId" id="submit-cetak-laporan-market-id" value="" />
        <input type="hidden" name="CommodityName" id="submit-cetak-laporan-commodity-name" value="" />
        <input type="hidden" name="JenisPerdagangan" id="submit-cetak-laporan-jenis-perdagangan" value="" />
        <input type="hidden" name="DateAuctionFrom" id="submit-cetak-laporan-date-from" value="" />
        <input type="hidden" name="DateAuctionUntil" id="submit-cetak-laporan-date-until" value=""/>
        <input type="hidden" name="TypeLaporan" id="submit-cetak-laporan-type"  value="" />
    </form>
</div>
<!--<script type="text/javascript" src="<?= base_url('assets/js/plugins/tables/datatables/datatables.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/plugins/tables/datatables/extensions/fixed_columns.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/plugins/forms/styling/uniform.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/plugins/forms/selects/bootstrap_multiselect.j') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/plugins/forms/selects/bootstrap_select.min.js")') ?>"></script>



<script type="text/javascript" src="<?= base_url('assets/js/plugins/visualization/echarts/echarts.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/plugins/ui/ripple.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/spplk/laporan.transaksi.js') ?>"></script>-->