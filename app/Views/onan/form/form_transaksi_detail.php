<div class="row mb-2">
    <div class="col-sm-6">
        <table class="table table-borderless">
            <tr>
                <td colspan="3">
                    <font color="blue" style="font-weight: bold;font-size:18px;">DETAIL TRANSAKSI</font>
                </td>
            </tr>
            <tr>
                <td width="40%">Penawaran</td>
                <td width="5%">:</td>
                <td width="55%">{$order.penawaran|default:'-'}</td>
            </tr>
            <tr>
                <td >
                    Penjual
                </td>
                <td >:</td>
                <td >
                    {$order.penjual|default:'-'}
                </td>
            </tr>
            <tr>
                <td >
                    Pembeli
                </td>
                <td >:</td>
                <td >
                    {$order.pembeli|default:'-'}
                </td>
            </tr>
            <tr>
                <td >
                    Aktifitas
                </td>
                <td >:</td>
                <td >
                    {$order.aktifitas|default:'-'}
                </td>
            </tr>
            <tr>
                <td >Total Penawaran</td>
                <td >:</td>
                <td >{$order.totalPenawaran|default:'-'}</td>
            </tr>
        </table>
        
    </div>
    <div class="col-sm-6">
        <table class="table table-borderless">
            <tr>
                <td colspan="3" align="right">
                    {include file="components/button_save.php" text="Kembali" click="$('#gridnya_{$mod}').show();$('#detailnya_{$mod}').hide();" id_na="cancel" style_btn="btn-danger"  btn_goyz="true"}
                </td>
            </tr>
            <tr>
                <td width="40%">Total Bayar</td>
                <td width="5%">:</td>
                <td width="55%">{$order.totalBayar|default:'-'}</td>
            </tr>
            <tr>
                <td >
                    Total Fee
                </td>
                <td >:</td>
                <td >{$order.totalFee|default:'-'}</td>
            </tr>
            <tr>
                <td >Total Komisi Penjual</td>
                <td >:</td>
                <td >{$order.totalKomisiPenjual|default:'-'}</td>
            </tr>
            <tr>
                <td >Persentase Komisi Onan</td>
                <td >:</td>
                <td >{$order.persentaseKomisiOnan|default:'-'}</td>
            </tr>
            <tr>
                <td >Total Komisi Onan</td>
                <td >:</td>
                <td >{$order.totalKomisiOnan|default:'-'}</td>
            </tr>

        </table>
    </div>
    
    <div class="col-sm-12">
        <hr/>
    </div>

    <div class="col-sm-12">

        <div class="row mb-2"> 
            <div class="col-sm-12 mb-1">
                <font color="purple" style="font-weight: bold;font-size:18px;">PRODUK JASA</font>
            </div>
            <div class="col-sm-12" id="grid_parent_jasa_{$mod}">
                <div id='grid_jasa_{$mod}'></div>
            </div>
        </div>
        
    </div>

    <div class="col-sm-12">
        <hr/>
        {include file="components/button_save.php" text="Kembali" click="$('#gridnya_{$mod}').show();$('#detailnya_{$mod}').hide();" id_na="cancels" style_btn="btn-danger"  btn_goyz="true"}
    </div>

</div>


<script>
    var idx_usr = "{$id|default:''}";

    $('#grid_parent_jasa_{$mod}').css({
        //'height': (getClientHeight()-165)
        'height':( {$height_grid|default:'getClientHeight()-425'} )
    });

    genGridOnan('{$mod}_jasa','grid_jasa_{$mod}', '', '');

    // $('#aktivkan_{$acak}').on('click', function(){
    //     //alert('Uhui');
    //     $.messager.confirm(nama_apps,'Anda Yakin Ingin Mengaktifkan Data Ini ?',function(re){
	// 		if(re){
    //             $.LoadingOverlay("show");
	// 			$.post(host+'onanapps/simpan/onanuser_aktifkan', { 'id':idx_usr, 'editstatus':'ablahu' } , function(resp){
	// 				if (resp.respons == "1") {
	// 					$.messager.alert(nama_apps,"Data User Sudah Aktif",'info');
    //                     $('#cancels_{$acak}').trigger('click');
    //                     $('#grid_{$mod}').datagrid('reload');

	// 					//$("#grid_"+submodulnya).datagrid('reload');								
	// 				}else{
	// 					$.messager.alert(nama_apps,"Gagal Mengaktifkan Data "+resp,'error');
	// 				}
					
	// 				$.LoadingOverlay("hide", true);
	// 			});	
    //         }
    //     });
    // });
</script>