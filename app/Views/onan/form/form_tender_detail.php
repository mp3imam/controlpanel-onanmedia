<script>
    function formatNumber(value) {
			const formatter = new Intl.NumberFormat('id-ID');
			return formatter.format(value);
	}
</script>

<div class="row mb-2">
    <div class="col-sm-6">
        <table class="table table-borderless">
            <tr>
                <td colspan="3">
                    <font color="blue" style="font-weight: bold;font-size:18px;">DETAIL TENDER</font>
                </td>
            </tr>
            <tr>
                <td width="40%">Judul Tender</td>
                <td width="5%">:</td>
                <td width="55%">{$tender.judulTender|default:'-'}</td>
            </tr>
            <tr>
                <td >
                    Nama
                </td>
                <td >:</td>
                <td >
                    {$tender.namauser|default:'-'}
                </td>
            </tr>
            <tr>
                <td >
                    Skills
                </td>
                <td >:</td>
                <td >
                    {$tender.skills|default:'-'}
                </td>
            </tr>
            <tr>
                <td >
                    Durasi Kontrak
                </td>
                <td >:</td>
                <td >
                    {$tender.durasiKontrak|default:'-'}
                </td>
            </tr>
            <tr>
                <td >Kategori</td>
                <td >:</td>
                <td >{$tender.kategori|default:'-'}</td>
            </tr>
            <tr>
                <td >lingkupPekerjaan</td>
                <td >:</td>
                <td >{$tender.lingkupPekerjaan|default:'-'}</td>
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
                <td width="40%">Tipe Pekerjaan</td>
                <td width="5%">:</td>
                <td width="55%">{$tender.tipePekerjaan|default:'-'}</td>
            </tr>
            <tr>
                <td >
                    Merchant Level
                </td>
                <td >:</td>
                <td >{$tender.merchant|default:'-'}</td>
            </tr>
            <tr>
                <td >Deskripsi Pekerjaan</td>
                <td >:</td>
                <td >{$tender.deskripsiPekerjaan|default:'-'}</td>
            </tr>
            <tr>
                <td >Metode Pembayaran</td>
                <td >:</td>
                <td >{$tender.metodePembayaran|default:'-'}</td>
            </tr>
            <tr>
                <td >Posting Tender</td>
                <td >:</td>
                <td >{$tender.posting|default:'-'}</td>
            </tr>
            <tr>
                <td >Budget</td>
                <td >:</td>
                <td ><span id="formattedBudget">{$tender.budget|default:'-'}</span></td>
            </tr>
            <tr>
                <td >Syarat Ketentuan</td>
                <td >:</td>
                <td >
                    {if $tender.syaratKetentuan|default:'' eq '1'}
                        <img width="10%" title="Sudah Terdaftar Sebagai Seller" src="{$baseurl}assets/images/ok.png" />
                    {else}
                        <img width="10%" title="Belum Terdaftar Sebagai Seller" src="{$baseurl}assets/images/not-ok.png" />
                    {/if}
                </td>
            </tr>

        </table>
    </div>
    
    <div class="col-sm-12">
        <hr/>
    </div>

    <div class="col-sm-12">

        <div class="row mb-2"> 
            <div class="col-sm-12 mb-1">
                <font color="purple" style="font-weight: bold;font-size:18px;">TENDER PESERTA</font>
            </div>
            <div class="col-sm-12" id="grid_parent_peserta_{$mod}">
                <div id='grid_peserta_{$mod}'></div>
            </div>
        </div>
        
    </div>

    <div class="col-sm-12">
        <hr/>
        {include file="components/button_save.php" text="Kembali" click="$('#gridnya_{$mod}').show();$('#detailnya_{$mod}').hide();" id_na="cancels" style_btn="btn-danger"  btn_goyz="true"}
    </div>

</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var budgetElement = document.getElementById("formattedBudget");
        var budgetValue = budgetElement.textContent || budgetElement.innerText;
        budgetElement.textContent = formatNumber(budgetValue);
    });

    function formatNumber(value) {
		const formatter = new Intl.NumberFormat('id-ID');
		return formatter.format(value);
	}

    var idx_usr = "{$id|default:''}";

    $('#grid_parent_peserta_{$mod}').css({
        //'height': (getClientHeight()-165)
        'height':( {$height_grid|default:'getClientHeight()-425'} )
    });

    genGridOnan('{$mod}_peserta','grid_peserta_{$mod}', '', '');

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