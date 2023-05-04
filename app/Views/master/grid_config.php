<style type="text/css">
.datagrid-row-over td {
    background: #D0E5F5;
}

.datagrid-row-selected td {
    background: #FBEC88;
    color: #000;
}
</style>

{assign var=jenis_grid value='grid'}
<section class="content-header">
    <div class="container-fluid">

    <div class="row mb-2">
        <div class="col-sm-12">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        {$judulbesar|default:'ONANMEDIA PANEL'}
                    </h3>
                </div>
                <div class="card-body">
                    <div id="gridnya_{$mod}">

                        <div class="row mb-1">
                            <div class="col-sm-12 mb-1">

                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-sm" type="text" name="search" id="search_input"
                                            placeholder="Kolom Pencarian Data">
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="javascript:void(0);" class="btn btn-warning btn-sm" id="search_btn"
                                            onClick="">Cari</a>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        {if $tombol_std|default:'' eq 'true'}
                                        <a href="javascript:void(0);" class="btn btn-success btn-sm"
                                            onClick="genformMaster('add', '{$mod}', '{$acak}');">Tambah</a>
                                        &nbsp;
                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm"
                                            onClick="genformMaster('edit', '{$mod}', '{$acak}');">Ubah</a>
                                        &nbsp;
                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm"
                                            onClick="genformMaster('delete', '{$mod}', '{$acak}');">Hapus</a>
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

    genGridMaster('{$mod}','grid_{$mod}', '', '');

    $('#search_btn').click(function() {
        var searchVal = $('#search_input').val();
        var url = '{$baseurl}master/grid/kategori';
        var queryParams = {
            search: searchVal,
        };

        $('#grid_{$mod}').datagrid('load', queryParams);
    });
});
</script>
