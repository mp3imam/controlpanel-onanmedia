<div class="row mb-2">
    <div class="col-sm-6">
        <table class="table table-borderless">
            <tr>
                <td colspan="3">
                    <font color="blue" style="font-weight: bold;font-size:18px;">PROFIL USER</font>
                </td>
            </tr>
            <tr>
                <td width="40%">Nama</td>
                <td width="5%">:</td>
                <td width="55%">{$user.name|default:'-'}</td>
            </tr>
            <tr>
                <td >
                    Email
                </td>
                <td >:</td>
                <td >
                    {$user.email|default:'-'}
                </td>
            </tr>
            <tr>
                <td >Username</td>
                <td >:</td>
                <td >{$user.username|default:'-'}</td>
            </tr>
            <tr>
                <td >
                    No. Handphone
                </td>
                <td >:</td>
                <td >{$user.phone|default:'-'}</td>
            </tr>
            <tr>
                <td >Level user</td>
                <td >:</td>
                <td >{$user.leveluser|default:'-'}</td>
            </tr>
        </table>

    </div>
    <div class="col-sm-6">
        <table class="table table-borderless">
            <tr>
                <td colspan="3" align="right">
                    {if $user.status|default:'' eq '0'}
                        {include file="components/button_save.php" text="Aktifkan User" id_na="aktivkan" style_btn="btn-success"  btn_goyz="true"}
                        &nbsp;
                    {/if}

                    {include file="components/button_save.php" text="Kembali" click="$('#gridnya_{$mod}').show();$('#detailnya_{$mod}').hide();" id_na="cancel" style_btn="btn-danger"  btn_goyz="true"}
                </td>
            </tr>
            <tr>
                <td width="40%">Verifikasi Email</td>
                <td width="5%">:</td>
                <td width="55%">
                    {if $user.isEmailVerified|default:'' eq '1'}
                        <img width="10%" title="Sudah Aktivasi Email" src="{$baseurl}assets/images/ok.png" />
                    {else}
                        <img width="10%" title="Belum Aktivasi Email" src="{$baseurl}assets/images/not-ok.png" />
                    {/if}
                </td>
            </tr>
            <tr>
                <td >
                    Verifikasi No. Handphone
                </td>
                <td >:</td>
                <td >
                    {if $user.isPhoneVerified|default:'' eq '1'}
                        <img width="10%" title="Sudah Terdaftar Sebagai Seller" src="{$baseurl}assets/images/ok.png" />
                    {else}
                        <img width="10%" title="Belum Terdaftar Sebagai Seller" src="{$baseurl}assets/images/not-ok.png" />
                    {/if}
                </td>
            </tr>
            <tr>
                <td >
                    Terdaftar Sebagai Seller
                </td>
                <td >:</td>
                <td >
                    {if $user.sellerStatus|default:'' eq '1'}
                        <img width="10%" title="Sudah Terdaftar Sebagai Seller" src="{$baseurl}assets/images/ok.png" />
                    {else}
                        <img width="10%" title="Belum Terdaftar Sebagai Seller" src="{$baseurl}assets/images/not-ok.png" />
                    {/if}
                </td>
            </tr>
            <tr>
                <td >
                    Aktivasi By Admin
                </td>
                <td >:</td>
                <td >
                    {if $user.status|default:'' eq '1'}
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
                <font color="purple" style="font-weight: bold;font-size:18px;">PRODUK JASA</font>
            </div>
            <div class="col-sm-12" id="grid_parent_produk_{$mod}">
                <div id='grid_produk_{$mod}'></div>
            </div>
        </div>
        
    </div>

    <div class="col-sm-12">
        <hr/>
    </div>

    <div class="col-sm-12">

        <div class="row mb-2"> 
            <div class="col-sm-12 mb-1">
                <font color="purple" style="font-weight: bold;font-size:18px;">KEAHLIAN</font>
            </div>
            <div class="col-sm-12" id="grid_parent_keahlian_{$mod}">
                <div id='grid_keahlian_{$mod}'></div>
            </div>
        </div>
    
    </div>

    <div class="col-sm-12">
        <hr/>
    </div>

    <div class="col-sm-12">

        <div class="row mb-2"> 
            <div class="col-sm-12 mb-1">
                <font color="purple" style="font-weight: bold;font-size:18px;">PENDIDIKAN</font>
            </div>
            <div class="col-sm-12" id="grid_parent_pendidikan_{$mod}">
                <div id='grid_pendidikan_{$mod}'></div>
            </div>
        </div>
    
    </div>

    <div class="col-sm-12">
        <hr/>
    </div>

    <div class="col-sm-12">

        <div class="row mb-2"> 
            <div class="col-sm-12 mb-1">
                <font color="purple" style="font-weight: bold;font-size:18px;">KEAHLIAN BAHASA</font>
            </div>
            <div class="col-sm-12" id="grid_parent_bahasa_{$mod}">
                <div id='grid_bahasa_{$mod}'></div>
            </div>
        </div>
    
    </div>

    <div class="col-sm-12">
        <hr/>
    </div>

    <div class="col-sm-12">

        <div class="row mb-2"> 
            <div class="col-sm-12 mb-1">
                <font color="purple" style="font-weight: bold;font-size:18px;">ALAMAT TERDAFTAR</font>
            </div>
            <div class="col-sm-12" id="grid_parent_alamat_{$mod}">
                <div id='grid_alamat_{$mod}'></div>
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

    $('#grid_parent_produk_{$mod}').css({
        //'height': (getClientHeight()-165)
        'height':( {$height_grid|default:'getClientHeight()-425'} )
    });
    $('#grid_parent_keahlian_{$mod}').css({
        //'height': (getClientHeight()-165)
        'height':( {$height_grid|default:'getClientHeight()-425'} )
    });
    $('#grid_parent_pendidikan_{$mod}').css({
        //'height': (getClientHeight()-165)
        'height':( {$height_grid|default:'getClientHeight()-425'} )
    });
    $('#grid_parent_bahasa_{$mod}').css({
        //'height': (getClientHeight()-165)
        'height':( {$height_grid|default:'getClientHeight()-425'} )
    });
    $('#grid_parent_alamat_{$mod}').css({
        //'height': (getClientHeight()-165)
        'height':( {$height_grid|default:'getClientHeight()-425'} )
    });

    genGridOnan('{$mod}_produk','grid_produk_{$mod}', '', '');
    genGridOnan('{$mod}_keahlian','grid_keahlian_{$mod}', '', '');
    genGridOnan('{$mod}_pendidikan','grid_pendidikan_{$mod}', '', '');
    genGridOnan('{$mod}_bahasa','grid_bahasa_{$mod}', '', '');
    genGridOnan('{$mod}_alamat','grid_alamat_{$mod}', '', '');

    $('#aktivkan_{$acak}').on('click', function(){
        //alert('Uhui');
        $.messager.confirm(nama_apps,'Anda Yakin Ingin Mengaktifkan Data Ini ?',function(re){
			if(re){
                $.LoadingOverlay("show");
				$.post(host+'onanapps/simpan/onanuser_aktifkan', { 'id':idx_usr, 'editstatus':'ablahu' } , function(resp){
					if (resp.respons == "1") {
						$.messager.alert(nama_apps,"Data User Sudah Aktif",'info');
                        $('#cancels_{$acak}').trigger('click');
                        $('#grid_{$mod}').datagrid('reload');

						//$("#grid_"+submodulnya).datagrid('reload');								
					}else{
						$.messager.alert(nama_apps,"Gagal Mengaktifkan Data "+resp,'error');
					}
					
					$.LoadingOverlay("hide", true);
				});	
            }
        });
    });
</script>