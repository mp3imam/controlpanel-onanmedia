<div class="row mb-2">
    <div class="col-sm-6">
        <table class="table table-borderless">
            <tr>
                <td colspan="3">
                    <font color="blue" style="font-weight: bold;font-size:18px;">DETAIL JASA</font>
                </td>
            </tr>
            <tr>
                <td width="40%">Nama</td>
                <td width="5%">:</td>
                <td width="55%">{$jasa.nama|default:'-'}</td>
            </tr>
            <tr>
                <td >
                    Subkategori
                </td>
                <td >:</td>
                <td >
                    {$jasa.subkategori|default:'-'}
                </td>
            </tr>
            <tr>
                <td >
                    Kategori
                </td>
                <td >:</td>
                <td >
                    {$jasa.kategori|default:'-'}
                </td>
            </tr>
            <tr>
                <td >Impresi</td>
                <td >:</td>
                <td >{$jasa.impresi|default:'-'}</td>
            </tr>
            <tr>
                <td >Klik</td>
                <td >:</td>
                <td >{$jasa.klik|default:'-'}</td>
            </tr>
            <tr>
                <td >Nama User</td>
                <td >:</td>
                <td >{$jasa.penjual|default:'-'}</td>
            </tr>
            <tr>
                <td >Tags</td>
                <td >:</td>
                <td >{$jasa.tags|default:'-'}</td>
            </tr>
            <tr>
                <td >Deskripsi</td>
                <td >:</td>
                <td >{$jasa.deskripsi|default:'-'}</td>
            </tr>
            <tr>
                <td >Status Verifikasi Jasa</td>
                <td >:</td>
                <td >{$jasa.statusjasa|default:'-'}</td>
            </tr>
        </table>
        
    </div>
    <div class="col-sm-6">
        <table class="table table-borderless">
            <tr>
                <td colspan="3" align="right">
                    {if $jasa.msStatusJasaId|default:'' eq '2'}
                        {include file="components/button_save.php" text="Verifikasi Jasa" id_na="aktivkan_jasa" style_btn="btn-success"  btn_goyz="true"}
                        &nbsp;
                    {/if}

                    {include file="components/button_save.php" text="Kembali" click="$('#gridnya_{$mod}').show();$('#detailnya_{$mod}').hide();" id_na="cancel" style_btn="btn-danger"  btn_goyz="true"}
                </td>
            </tr>
            <tr>
                <td width="40%">Slug</td>
                <td width="5%">:</td>
                <td width="55%">{$jasa.slug|default:'-'}</td>
            </tr>
            <tr>
                <td >Cover</td>
                <td >:</td>
                <td >
                    {if $jasa.cover|default:''}
                        <img width="25%" src="{$jasa.cover}" />
                    {else}
                        -
                    {/if}

                </td>
            </tr>
            <tr>
                <td >Harga Termahal</td>
                <td >:</td>
                <td >{$jasa.hargaTermahal|number_format:0:",":"."|default:'0'}</td>
            </tr>
            <tr>
                <td >Harga Termurah</td>
                <td >:</td>
                <td >{$jasa.hargaTermurah|number_format:0:",":"."|default:'0'}</td>
            </tr>
            <tr>
                <td >Status Jasa</td>
                <td >:</td>
                <td >{$jasa.statusjasa|default:'-'}</td>
            </tr>
            <tr>
                <td >Pengambilan</td>
                <td >:</td>
                <td >
                    {if $jasa.isPengambilan|default:'' eq '1'}
                        <img width="10%" title="Sudah Terdaftar di Pengambilan" src="{$baseurl}assets/images/ok.png" />
                    {else}
                        <img width="10%" title="Belum Terdaftar di Pengambilan" src="{$baseurl}assets/images/not-ok.png" />
                    {/if}

                </td>
            </tr>
            <tr>
                <td >Pengiriman</td>
                <td >:</td>
                <td >
                    {if $user.isPengiriman|default:'' eq '1'}
                        <img width="10%" title="Sudah Terdaftar di Pengiriman" src="{$baseurl}assets/images/ok.png" />
                    {else}
                        <img width="10%" title="Belum Terdaftar di Pengiriman" src="{$baseurl}assets/images/not-ok.png" />
                    {/if}

                </td>
            </tr>
            <tr>
                <td >Unggulan</td>
                <td >:</td>
                <td >
                    {if $jasa.isUnggulan|default:'' eq '1'}
                        <img width="10%" title="Sudah Terdaftar di Unggulan" src="{$baseurl}assets/images/ok.png" />
                    {else}
                        <img width="10%" title="Belum Terdaftar di Unggulan" src="{$baseurl}assets/images/not-ok.png" />
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
                <font color="purple" style="font-weight: bold;font-size:18px;">JASA PRICING</font>
            </div>
            <div class="col-sm-12" id="grid_parent_pricing_{$mod}">
                <div id='grid_pricing_{$mod}'></div>
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

    $('#grid_parent_pricing_{$mod}').css({
        //'height': (getClientHeight()-165)
        'height':( {$height_grid|default:'getClientHeight()-425'} )
    });

    genGridOnan('{$mod}_pricing','grid_pricing_{$mod}', '', '');

    $('#aktivkan_jasa_{$acak}').on('click', function(){
        //alert('Uhui');
        $.messager.confirm(nama_apps,'Anda Yakin Ingin Verifikasi Data Jasa Ini ?',function(re){
			if(re){
                $.LoadingOverlay("show");
				$.post(host+'onanapps/simpan/onanjasa_aktifkan', { 'id':idx_usr, 'editstatus':'ablahu' } , function(resp){
					if (resp.respons == "1") {
						$.messager.alert(nama_apps,"Data Jasa Sudah Terverifikasi",'info');
                        $('#cancels_{$acak}').trigger('click');
                        $('#grid_{$mod}').datagrid('reload');

						//$("#grid_"+submodulnya).datagrid('reload');								
					}else{
						$.messager.alert(nama_apps,"Gagal Memverifikasi Data "+resp,'error');
					}
					
					$.LoadingOverlay("hide", true);
				});	
            }
        });
    });
</script>