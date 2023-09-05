<style type="text/css">
	.datagrid-row-over td{
		background:#D0E5F5;
	}
	.datagrid-row-selected td{
		background:#FBEC88;
		color:#000;
	}
</style>


{assign var=jenis_grid value='grid'}

<section class="content-header">
    <div class="container-fluid">

        <div class="row mb-2">
            <div class="col-sm-12">
                
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            {$judulbesar|default:'ONANMEDIA PANEL'}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="gridnya_{$mod}">
                            
                            <div class="row mb-2">
                                <div class="col-sm-12 mb-2">
                                    
                                    <div class="row mb-2">
                                         <div class="col-sm-4">
                                            <input class="form-control form-control-sm" type="text" id="search_input" placeholder="Kolom Pencarian Data">
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="javascript:void(0);" class="btn btn-warning btn-sm" id="search_btn" >Cari</a>
                                            &nbsp;
                                            <a href="javascript:void(0);" class="btn btn-info btn-sm" id="reload_btn" >Reload</a>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            {if $mod eq 'coa'}
                                                <a href="javascript:void(0);" class="btn btn-primary btn-sm" onClick="genformFinance('add', '{$mod}', '{$acak}');" >Tambah</a>
                                                &nbsp;
                                                <a href="javascript:void(0);" class="btn btn-primary btn-sm" onClick="genformFinance('edit', '{$mod}', '{$acak}');" >Edit</a>
                                                &nbsp;
                                                <a href="javascript:void(0);" class="btn btn-primary btn-sm" onClick="genformFinance('delete', '{$mod}', '{$acak}');" >Hapus</a>
                                            {/if}
                                            {if $mod eq 'kas_bank'}
                                                <a href="javascript:void(0);" class="btn btn-primary btn-sm" onClick="genformOnan('lihat_detail_transaksi', '{$mod}', '{$acak}');" >Lihat Detail</a>
                                            {/if}

                                            {if $mod eq 'onan_user'}
                                                <a href="javascript:void(0);" class="btn btn-primary btn-sm" onClick="genformOnan('lihat_detail_user', '{$mod}', '{$acak}');" >Lihat Detail</a>
                                            {/if}

                                            {if $mod eq 'onan_produk_jasa'}
                                                <a href="javascript:void(0);" class="btn btn-primary btn-sm" onClick="genformOnan('lihat_detail_jasa', '{$mod}', '{$acak}');" >Lihat Detail</a>
                                            {/if}

                                            {if $mod eq 'onan_transaksi'}
                                                <a href="javascript:void(0);" class="btn btn-primary btn-sm" onClick="genformOnan('lihat_detail_transaksi', '{$mod}', '{$acak}');" >Lihat Detail</a>
                                            {/if}

                                            {if $mod eq 'onan_cairdana'}
                                                <a href="javascript:void(0);" class="btn btn-primary btn-sm" onClick="genformOnan('lihat_detail_cairdana', '{$mod}', '{$acak}');" >Lihat Detail</a>
                                            {/if}


                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-12">
                                    
                                    <div class="row" style="margin-bottom:0px !important;">	
                                        <div class="col-lg-12" id="grid_parent_{$mod}">
                                            <div id='grid_{$mod}'></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div id="detailnya_{$mod}"></div>
                    </div>
                </div>

            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>

<script>
$(function(){
    $('#grid_parent_{$mod}').css({
        //'height': (getClientHeight()-165)
        'height':( {$height_grid|default:'getClientHeight()-255'} )
    });
    heighttree = (getClientHeight()-255)+'px';

    genGridOnan('{$mod}','grid_{$mod}', '', '');

    $('#reload_btn').click(function() {
        $('#search_input').val('');
        var queryParams = {
            search: "",
        };

        $('#grid_{$mod}').datagrid('reload', queryParams);
    });
    $('#search_btn').click(function() {
        var queryParams = {
            search: $('#search_input').val(),
        };

        $('#grid_{$mod}').datagrid('reload', queryParams);
    });
});
</script>