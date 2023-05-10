<form id="form_{$acak}" method="post" url="{$baseurl}master/simpan/subkategori" enctype="multipart/form-data" >
    <input type="hidden" name="id" value="{$data.id|default:''}">
	<input type="hidden" name="editstatus" value="{$sts|default:'add'}">


    <div class="row mb-2">
        <div class="col-sm-12">

            <div class="row">
                <div class="col-sm-12">
                    {include file="components/input_form.php" required="true" label="Nama Subkategori" class_width="col-lg-12" type="text" name="nama" id="nama" value="{$data.nama|default:''}"}
                    {include file="components/input_form.php" required="true" label="URL" class_width="col-lg-12" type="text" name="url" id="url" value="{$data.url|default:''}"}
					{include file="components/input_form.php" required="true" label="Kategori" class_width="col-lg-12" type="select" name="msKategoriId" id="msKategoriId" options="getKategoriOptions()"}
            </div>

            <hr />
			<div class="row">
				<div class="col-md-12">
					{include file="components/button_save.php" text="Simpan" id_na="save" style_btn="btn-success"  btn_goyz="false"}
					{include file="components/button_save.php" text="Kembali" click="$('#gridnya_{$mod}').show();$('#detailnya_{$mod}').hide();" id_na="cancel" style_btn="btn-danger"  btn_goyz="true"}	
				</div>
			</div>

        </div>
    </div>


</form>


<script>	
    var rulesnya = {
		nama : "required",
        url : "required",
		msKategoriId: "required",
	};

	var messagesnya = {
		nama : "<i style='color:red'>Harus Diisi</i>",
        url : "<i style='color:red'>Harus Diisi</i>",
		msKategoriId : "<i style='color:red'>Harus Diisi</i>",
	}

	function getKategoriOptions() {
        return $.ajax({
            url: "{$baseurl}master/getKategoriOptions",
            type: "GET",
            dataType: "json",
            async: false
        }).responseJSON;
    }

	$( "#form_{$acak}" ).validate( {
		rules: rulesnya,
		messages: messagesnya,
		submitHandler: function(form) {
			$.LoadingOverlay("show");
			submit_form('form_{$acak}',function(r){
                resp = JSON.parse(r);
				if(resp.respons == "1"){ 
					$.messager.alert(nama_apps,'Data Tersimpan','info'); 
					$('#cancel_{$acak}').trigger('click');
					$('#grid_{$mod}').datagrid('reload');
				}else{ 
					$.messager.alert(nama_apps, 'Proses Simpan Data Gagal '+resp.respons,'warning'); 
				}
				$.LoadingOverlay("hide", true);
			});
			//*/
		},
		errorPlacement: function(error, element) {
	        var name = element.attr('name');
	        var errorSelector = '.validation_error_message[for="' + name + '"]';
	        var $element = $(errorSelector);
	        if ($element.length) { 
	            $(errorSelector).html(error.html());
	        } else {
	            error.insertAfter(element);
	        }
	    }
	} );
</script>