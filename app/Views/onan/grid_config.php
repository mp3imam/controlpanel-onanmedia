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
                
                <div class="card card-default color-palette-box">
                    <div class="card-header">
                        <h3 class="card-title">
                            {$judulbesar|default:'ONANMEDIA PANEL'}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="gridnya_{$acak}">
                            
                            <div class="row mb-2">
                                <div class="col-sm-12 mb-2">
                                    
                                    <div class="row mb-2">
                                        <div class="col-sm-6">

                                        </div>
                                        <div class="col-sm-6 text-right">
                                            {if $mod eq 'onan_user'}
                                                <a href="javascript:void(0);" class="btn btn-primary btn-sm" onClick="genformOnan('contohnya');" >Lihat Detail</a>
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
                        <div id="detailnya_{$acak}"></div>
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
});
</script>