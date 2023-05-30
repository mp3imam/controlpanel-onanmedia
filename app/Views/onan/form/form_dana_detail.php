<div class="row mb-2">
    <div class="col-sm-6">
        <table class="table table-borderless">
            <tr>
                <td colspan="3">
                    <font color="blue" style="font-weight: bold;font-size:18px;">PROFIL USER</font>
                </td>
            </tr>
            <tr>
                <td width="40%">Nama User</td>
                <td width="5%">:</td>
                <td width="55%">{$pencairan.userid|default:'-'}</td>
            </tr>
            <tr>
                <td >
                    Nilai
                </td>
                <td >:</td>
                <td >
                    {$pencairan.nilai|default:'-'}
                </td>
            </tr>
            <tr>
                <td >Jenis</td>
                <td >:</td>
                <td >{$pencairan.jenis|default:'-'}</td>
            </tr>
            <tr>
                <td >
                    Nama Rekening
                </td>
                <td >:</td>
                <td >{$pencairan.namaRekening|default:'-'}</td>
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
                <td width="40%">
                    No Rekening
                </td>
                <td  width="5%">:</td>
                <td  width="55%">
                    {$pencairan.rekening|default:'-'}
                </td>
            </tr>
            <tr>
                <td >ID Bank</td>
                <td >:</td>
                <td >{$pencairan.msbankid|default:'-'}</td>
            </tr>
            <tr>
                <td >
                    Status
                </td>
                <td >:</td>
                <td >{$pencairan.status|default:'-'}</td>
            </tr>
            <tr>
                <td >
                    Keterangan
                </td>
                <td >:</td>
                <td >{$pencairan.keterangan|default:'-'}</td>
            </tr>

        </table>
    </div>
    