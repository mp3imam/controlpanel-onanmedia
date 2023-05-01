var grid_nya_onan;

function genGridMaster(modnya, divnya, lebarnya, tingginya){
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
		
		case "bahasa":
			judulnya = "";
			urlnya = "bahasa";
			fitnya = true;
			row_number=true;
			nowrap_nya = false;

			kolom[modnya] = [			
				{field:'nama',title:'Bahasa',width:200, halign:'center',align:'left'},
			];
		break;

    }

    urlglobal = host+'master/datagrid/'+urlnya;
	grid_nya_onan = $("#"+divnya).datagrid({
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
			if(data.total == 0){
				var $panel = $(this).datagrid('getPanel');
				var $info = '<div class="info-empty" style="margin-top:20%;">Data Tidak Tersedia</div>';
				$($panel).find(".datagrid-view").append($info);
			}else{
				$($panel).find(".datagrid-view").append('');
				$('.info-empty').remove();
			}
		},
	});

}

function genformMaster(type, modulnya, submodulnya, stswindow, p1, p2, p3){
	var urlpost = host+'master/form/'+modulnya;
	var urldelete = host+'master/simpan/'+modulnya;
	var id_tambahan = "";
	var nama_file = "";
	var table = submodulnya;
	var adafilenya = false;
	
	switch(type){
		case "add":
			$('#gridnya_'+modulnya).hide();
			$('#detailnya_'+modulnya).empty().show().addClass("loading");
			$.post(urlpost, { 'editstatus':'add' }, function(resp){
				$('#detailnya_'+modulnya).show();
				$('#detailnya_'+modulnya).html(resp).removeClass("loading");
			});
		break;
		case "edit":
		case "delete":		
			var row = $("#grid_"+modulnya).datagrid('getSelected');
			if(row){
				
				if(type=='edit'){
					
					$('#gridnya_'+modulnya).hide();
					$('#detailnya_'+modulnya).empty().show().addClass("loading");
					$.post(urlpost, { 'editstatus':'edit', 'ts':table, id:row.id }, function(resp){
						$('#detailnya_'+modulnya).show();
						$('#detailnya_'+modulnya).html(resp).removeClass("loading");
					});

				}else if(type=='delete'){

					$.messager.confirm(nama_apps,'Anda Yakin Ingin Menghapus Data Ini ?',function(re){
						if(re){
							
							$.LoadingOverlay("show");
							$.ajax({
								type: "POST",
								dataType: "json",
								url: urldelete,
								data: {
									'id':row.id, 'editstatus':'delete'
								},
								success: function(resp){
									//resp = JSON.parse(r);
									if(resp.respons == "1"){ 
										$.messager.alert(nama_apps,"Data Terhapus",'info');
										$("#grid_"+modulnya).datagrid('reload');								
									}else{
										$.messager.alert(nama_apps,"Gagal Menghapus Data "+resp.respons,'error');
									}
									
									$.LoadingOverlay("hide", true);
								}
							});


							// $.post(urldelete, {'id':row.id, 'editstatus':'delete'}, function(r){
							// 	resp = JSON.parse(r);
							// 	if(resp.respons == "1"){ 
							// 		$.messager.alert(nama_apps,"Data Terhapus",'info');
							// 		$("#grid_"+modulnya).datagrid('reload');								
							// 	}else{
							// 		$.messager.alert(nama_apps,"Gagal Menghapus Data "+resp.respons,'error');
							// 	}
								
							// 	$.LoadingOverlay("hide", true);
							// });	
							
						}
					});	

				}
			}else{
				$.messager.alert(nama_apps,"Pilih Data Yang Akan Diproses",'error');
			}
		break;

		case "contohnya":
			$.messager.alert(nama_apps,"Alert nya",'info');
		break;

	}


}