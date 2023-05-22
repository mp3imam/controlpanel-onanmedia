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
                    {$jasa.msSubkategoriId|default:'-'}
                </td>
            </tr>
            <tr>
                <td >
                    Kategori
                </td>
                <td >:</td>
                <td >
                    {$jasa.msKategoriId|default:'-'}
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
                <td >{$jasa.userId|default:'-'}</td>
            </tr>
            <tr>
                <td >Deskripsi</td>
                <td >:</td>
                <td >{$jasa.deskripsi|default:'-'}</td>
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
                <td width="40%">Slug</td>
                <td width="5%">:</td>
                <td width="55%">{$jasa.slug|default:'-'}</td>
            </tr>
            <tr>
                <td >Harga Termahal</td>
                <td >:</td>
                <td >{$jasa.hargaTermahal|default:'-'}</td>
            </tr>
            <tr>
                <td >Harga Termurah</td>
                <td >:</td>
                <td >{$jasa.hargaTermurah|default:'-'}</td>
            </tr>
            <tr>
                <td >Status Jasa</td>
                <td >:</td>
                <td >{$jasa.msStatusJasaId|default:'-'}</td>
            </tr>
            <tr>
                <td >Pengambilan</td>
                <td >:</td>
                <td ><span>{$jasa.isPengambilan|default:'-'}</span></td>
            </tr>
            <tr>
                <td >Pengiriman</td>
                <td >:</td>
                <td ><span>{$jasa.isPengiriman|default:'-'}</span></td>
            </tr>
            <tr>
                <td >Unggulan</td>
                <td >:</td>
                <td ><span>{$jasa.isUnggulan|default:'-'}</span></td>
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

</script>