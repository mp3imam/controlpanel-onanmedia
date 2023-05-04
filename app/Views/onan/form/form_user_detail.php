<div class="row mb-2">
    <div class="col-sm-12">
        <table class="table table-borderless">
            <tr>
                <td colspan="3">
                    <font color="blue" style="font-weight: bold;font-size:18px;">PROFIL USER</font>
                </td>
            </tr>
            <tr>
                <td width="20%">Nama</td>
                <td width="5%">:</td>
                <td width="75%">{$user.name|default:'-'}</td>
            </tr>
            <tr>
                <td >Email</td>
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
                <td >No. Handphone</td>
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
</script>