var grid_nya_onan;

function genGridFinance(modnya, divnya, lebarnya, tingginya){
    if(lebarnya == undefined){
		lebarnya = getClientWidth()-250;
	}
	if(tingginya == undefined){
		tingginya = getClientHeight()-450;
	}

	var kolom ={};
	var frozen ={};
	var judulnya;
	var param={};
	var urlnya;
	var urlglobal="";
	var url_detil="";
	var post_detil={};
	var fitnya;
	var klik=false;
	var doble_klik=false;
	var pagesizeboy = 10;
	var singleSelek = true;
	var cekonselek = false;
	var selekoncek = false;
	var nowrap_nya = true;
	var footer=false;
	var row_number=true;
	var paging=true;
	
    switch(modnya){

		case "onan_cairdana":
			judulnya = "";
			urlnya = "onan_cairdana";
			fitnya = true;
			row_number=true;
			nowrap_nya = false;

			frozen[modnya] = [
				{field:'userid',title:'Nama User',width:200, halign:'center',align:'center'},
			];
			kolom[modnya] = [
				{field:'nilai',title:'Nilai',width:200, halign:'center',align:'center',
					formatter: function (value, row) {
						return formatNumber(value);
					}
				},
				{field:'jenis',title:'Jenis',width:200, halign:'center',align:'center'},
				{field:'namaRekening',title:'Nama Rekening',width:200, halign:'center',align:'center'},
				{field:'rekening',title:'No Rekening',width:200, halign:'center',align:'center'},
				{field:'msbankid',title:'ID Bank',width:200, halign:'center',align:'center'},
				{field:'status',title:'Status',width:200, halign:'center',align:'center'},
				{field:'keterangan',title:'Keterangan',width:200, halign:'center',align:'center'},
			];
		break;


		function formatNumber(value) {
			const formatter = new Intl.NumberFormat('id-ID');
			return formatter.format(value);
		}

    }

    urlglobal = host+'finance/datagrid/'+urlnya;
	grid_nya_finance = $("#"+divnya).datagrid({
		title:judulnya,
		height:tingginya,
		width:lebarnya,
		rownumbers:row_number,
		iconCls:'database',
		fit:fitnya,
		striped:true,
		pagination:paging,
		remoteSort: false,
		showFooter:footer,
		
		singleSelect:singleSelek,
		checkOnSelect:cekonselek,
		selectOnCheck:selekoncek,
		
		url: urlglobal,		
		nowrap: nowrap_nya,
		pageSize:pagesizeboy,
		pageList:[10,20,30,40,50,100,200],
		queryParams:param,
		frozenColumns:[
			frozen[modnya]
		],
		columns:[
			kolom[modnya]
		],
		onLoadSuccess:function(d){
			$('.btn_grid').linkbutton();
		},
		onClickRow:function(rowIndex,rowData){
			
		},
		onDblClickRow:function(rowIndex,rowData){
			
		},
		toolbar: '#tb_'+modnya,
		rowStyler: function(index,row){
			
		},
		onLoadSuccess: function(data){
			var $panel = $(this).datagrid('getPanel');
			if(data.total == 0){
				var $info = '<div class="info-empty" style="margin-top:10%;">Data Tidak Tersedia</div>';
				$($panel).find(".datagrid-view").append($info);
			}else{
				$($panel).find(".datagrid-view").append('');
				$('.info-empty').remove();
			}
		},
	});

}


function genformFinance(type, modulnya, submodulnya, stswindow, p1, p2, p3){
	var urlpost = host+'finance/form/'+submodulnya;
	var urldelete = host+'finance/simpan/'+submodulnya;
	var id_tambahan = "";
	var nama_file = "";
	var table = submodulnya;
	var adafilenya = false;
	
	switch(type){
		case "add":
			if(stswindow == undefined){
				$('#grid_nya_'+submodulnya).hide();
				$('#detil_nya_'+submodulnya).empty().show().addClass("loading");
			}
			$.post(urlpost, {'editstatus':'add', 'ts':table, 'id_tambahan':id_tambahan }, function(resp){
				if(stswindow == 'windowform'){
					windowForm(resp, judulwindow, lebar, tinggi);
				}else if(stswindow == 'windowpanel'){
					windowFormPanel(resp, judulwindow, lebar, tinggi);
				}else{
					$('#detil_nya_'+submodulnya).show();
					$('#detil_nya_'+submodulnya).html(resp).removeClass("loading");
				}
			});
		break;
		case "edit":
		case "delete":		
			var row = $("#grid_"+submodulnya).datagrid('getSelected');
			if(row){
				
				if(type=='edit'){
					if(modulnya == 'rab'){

						if(row.status_data == 1){
							$.messager.alert(nama_apps,"Data RAB ini sudah Final, tidak bisa diedit kembali!",'error');
							return false;
						}else{
							if(stswindow == undefined){
								$('#grid_nya_'+submodulnya).hide();
								$('#detil_nya_'+submodulnya).empty().show().addClass("loading");;		
							}
							$.post(urlpost, { 'editstatus':'edit', 'ts':table, id:row.id }, function(resp){
								if(stswindow == 'windowform'){
									windowForm(resp, judulwindow, lebar, tinggi);
								}else if(stswindow == 'windowpanel'){
									windowFormPanel(resp, judulwindow, lebar, tinggi);
								}else{
									$('#detil_nya_'+submodulnya).show();
									$('#detil_nya_'+submodulnya).html(resp).removeClass("loading");
								}
							});
						}

					}else{
						if(stswindow == undefined){
							$('#grid_nya_'+submodulnya).hide();
							$('#detil_nya_'+submodulnya).empty().show().addClass("loading");	
						}
						$.post(urlpost, { 'editstatus':'edit', 'ts':table, id:row.id }, function(resp){
							if(stswindow == 'windowform'){
								windowForm(resp, judulwindow, lebar, tinggi);
							}else if(stswindow == 'windowpanel'){
								windowFormPanel(resp, judulwindow, lebar, tinggi);
							}else{
								$('#detil_nya_'+submodulnya).show();
								$('#detil_nya_'+submodulnya).html(resp).removeClass("loading");
							}
						});
					}
				}else if(type=='delete'){

					if(modulnya == 'rab'){
						if(row.status_data == 1){
							$.messager.alert(nama_apps,"Data RAB ini sudah Final, tidak bisa diedit kembali!",'error');
							return false;
						}
					}

					$.messager.confirm(nama_apps,'Anda Yakin Ingin Menghapus Data Ini ?',function(re){
						if(re){
							
							$.LoadingOverlay("show");
							$.post(urldelete, {'id':row.id, 'editstatus':'delete'}, function(r){
								if(r==1){
									$.messager.alert(nama_apps,"Data Terhapus",'info');
									$("#grid_"+submodulnya).datagrid('reload');								
								}else{
									$.messager.alert(nama_apps,"Gagal Menghapus Data "+r,'error');
								}
								
								$.LoadingOverlay("hide", true);
							});	
							
						}
					});	

				}
			}else{
				$.messager.alert(nama_apps,"Pilih Data Yang Akan Diproses",'error');
			}
		break;

		case "lihat_detail_user":
			var row = $("#grid_"+modulnya).datagrid('getSelected');
			if(row){

				$('#gridnya_'+modulnya).hide();
				$('#detailnya_'+modulnya).empty().show().addClass("loading");
				$.post(host+'onanapps/display/user_detail', { 'id':row.id }, function(resp){
					$('#detailnya_'+modulnya).show();
					$('#detailnya_'+modulnya).html(resp).removeClass("loading");
				});
				
				// $.LoadingOverlay("show");
				// $('#modalencuk').html('');
				// $('#headernya').html("<b>Detail User Onanmedia</b>");
				// $('#pesanModal').modal('show');

				// $('#pesanModal').on('shown.bs.modal', function (e) {
				// 	e.preventDefault();
				// 	$.ajax({
				// 		type: "POST",
				// 		url: host+'onanapps-display/'+type,
				// 		data: {
				// 			'id' : row.id
				// 		},
				// 		success: function(resp){
				// 			$('#modalencuk').html(resp);
				// 			$.LoadingOverlay("hide", true);
				// 		}
				// 	});
					
				// 	$(this).off('shown.bs.modal');
				// });

			}else{
				$.messager.alert(nama_apps,"Pilih Data Yang Akan Diproses",'error');
			}
		
		break;

		case "lihat_detail_transaksi":
			var row = $("#grid_"+modulnya).datagrid('getSelected');
			if(row){

				$('#gridnya_'+modulnya).hide();
				$('#detailnya_'+modulnya).empty().show().addClass("loading");
				$.post(host+'onanapps/display/transaksi_detail', { 'id':row.id }, function(resp){
					$('#detailnya_'+modulnya).show();
					$('#detailnya_'+modulnya).html(resp).removeClass("loading");
				});
				
			}else{
				$.messager.alert(nama_apps,"Pilih Data Yang Akan Diproses",'error');
			}
			
		break;

	}


}