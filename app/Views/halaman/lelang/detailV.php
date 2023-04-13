<?= view('halaman/components/breadcumsV'); ?>
<div class="content" style="padding-bottom:5px;">
  <div class="panel panel-flat panel-dark">
    <div class="panel-heading">
      <h6 class="panel-title">Informasi Lelang</h6>
      <div class="heading-elements">
        <ul class="icons-list">
          <li><a data-action="collapse"></a></li>
        </ul>
      </div>
    </div>
    <div class="container-fluid" style="padding-top:5px;">
      <div class="row">
        <div class="col-lg-4">
          <div>
            <table class="table-propertis" style="width:100%">
              <tr>
                <td class="key" style="min-width:120px;">ID Lelang</td>
                <td><?= $lastBid['AuctionNo'] ?></td>
              </tr>
              <tr>
                <td class="key">Jenis Perdagangan</td>
                <td><?= getTypeOfTrade($lastBid['TypeOfTrade']) ?></td>
              </tr>
              <tr>
                <td class="key">Komoditas</td>
                <td><?= $lastBid['CommodityName'] ?></td>
              </tr>
              <tr>
                <td class="key">Kontrak</td>
                <td><?= $lastBid['ContractId'] ?></td>
              </tr>
              <tr>
                <td class="key">Qty</td>
                <td><?= inttomoney($lastBid['CommoditySize']) . ' ' . $lastBid['UOM'] ?></td>
              </tr>
              <tr>
                <td class="key">Harga Buka</td>
                <td><?= $lastBid['Currency'] . ' ' . inttomoney($lastBid['InitialValue']) ?></td>
              </tr>
              </tr>
              <tr>
                <td class="key">Kelipatan</td>
                <td><?= $lastBid['Currency'] . ' ' . inttomoney($lastBid['IncreaseInValue']) ?></td>
              </tr>
              <tr>
                <td class="key">Penjual</td>
                <td><?= $lastBid['SellerName'] ?></td>
              </tr>
              <tr>
                <td class="key">Penyerahan Barang</td>
                <td><?= $lastBid['SettlementPlace'] ?></td>
              </tr>
              <tr>
                <td class="key">Tanggal Lelang</td>
                <td><?= dateFormat($lastBid['LastBidTime'], 'text') ?></td>
              </tr>
              <tr>
                <td class="key">Sesi Lelang</td>
                <td><?= timeFormat($lastBid['LastBidSessionTimeStart']) . ' - ' . timeFormat($lastBid['LastBidSessionTimeEnd']) ?></td>
              </tr>
              <tr>
                <td class="key">Status Lelang</td>
                <td><?= $lastBid['StateStatus'] ?></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-lg-2">
          <div style="text-align:center;padding:20px 5px">
            <div>Penawar Terakhir</div>
            <h5 style="margin-top:0;font-size:12pt" class="last-bid-name"><?= $lastBid['BuyerName'] ?></h5>
            <div>Penawaran</div>
            <h4 style="margin-top:0">IDR <span class="last-bid-value"><?= inttomoney($lastBid['HighBidValue']) ?></span></h4>
          </div>
        </div>
        <div class="col-lg-6">
          <div style="background-color:#1c313a;">
            <div class="chart" id="chart" style="height:300px;width:100%"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="panel panel-flat panel-dark">
    <div class="container-fluid" style="padding:0px">
      <table class="table table-dark tbl-bid hide-sort" width="100%">
        <thead>
          <tr>
            <th style="width:40px;">No</th>
            <th style="width:150px;">Tanggal</th>
            <th>Penawar</th>
            <th class="text-right">Qty</th>
            <th class="text-right">Penawaran</th>
            <th class="text-right">Harga Satuan</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($bids as $key => $bid) {
            $no = $key + 1;
          ?>
            <tr class="tr-data">
              <td class="text-center"><?= $no ?></td>
              <td class="text-center"><?= dateTimeFormat($bid['LastBidTime']) ?></td>
              <td class="text-left"><?= $bid['BuyerName'] ?></td>
              <td class="text-right"><?= inttomoney($bid['CommoditySize']) . ' ' . $bid['UOM'] ?></td>
              <td class="text-right"><?= $bid['Currency'] . ' ' . inttomoney($bid['HighBidValue']) ?>
              <td class="text-right"><?= $bid['Currency'] . ' ' . inttomoney($bid['UnitPrice'] / $bid['CommoditySize']) . '/' . $bid['UOM'] ?>
            </tr>
          <?php } ?>
          <?php if (empty($bids)) { ?>
            <tr>
              <td class="text-center" colspan="6" style="color:silver">Tidak ada penawaran</td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="hidden">
        <div class="button-table">
          <div class="btn-group">
            <div class="btn-group btn-select">
              <button type="button" class="btn btn-table btn-trans btn-toolbar dropdown-toggle" data-toggle="dropdown">
                <i class="icon-file-download2"></i> Export <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a class="export-excel" href="javascript:void(0);" onclick="monsys.table.export(this, 0)">Excel</a></li>
                <li><a class="export-csv" href="javascript:void(0);" onclick="monsys.table.export(this, 1)">CSV</a></li>
                <li><a class="export-pdf" href="javascript:void(0);" onclick="monsys.table.export(this, 2)">PDF</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- @Html.Partial("~/Views/Lelang/Detail/TableLelang.cshtml", new Tuple<string,string,bool>(auctionId,marketId,isLive)) -->

</div>

<script>
  $(function() {
    const winner = JSON.parse(`<?= json_encode($winner) ?>`);
    // const chartData = bids.map(bid => {
    //   const bidPrice = parseInt(winner.HighBidValue, 10);
    //   const qty = parseInt(winner.CommoditySize, 10);
    // })
    const scatter = [winner.LastBidTime, parseInt(winner.HighBidValue, 10), '', winner.BuyerName, parseInt(winner.CommoditySize, 10), 'scatter'];
    const effectScatter = [winner.LastBidTime, parseInt(winner.HighBidValue, 10), '', winner.BuyerName, parseInt(winner.CommoditySize, 10), 'effectScatter'];
    const chartData = [
      [
        scatter
      ],
      [
        effectScatter
      ]
    ];

    const chartDom = document.getElementById('chart');
    const chart = echarts.init(chartDom);
    const formattedData = seriesChartFormatData(chartData)
    const option = seriesChartOption(formattedData)
    chart.setOption(option)
  })
</script>