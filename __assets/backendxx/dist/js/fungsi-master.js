var kancut;

function genGridMaster(modnya, divnya, lebarnya, tingginya, par1){
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
	var nowrap_nya = true;
	var footer=false;
	var row_number=true;
	var paging=true;
	
	switch(modnya){
		
		case "juru_parkir":
			judulnya = "";
			urlnya = modnya;
			fitnya = true;
			nowrap_nya = false;
			pagesizeboy = 50;
			
			kolom[modnya] = [	
				{field:'notlp',title:'No. Telpon',width:200, halign:'center',align:'left'},		
				{field:'nama',title:'Nama',width:200, halign:'center',align:'left'},					
				{field:'username',title:'Username',width:200, halign:'center',align:'center'},				
				{field:'create_date',title:'Tgl. Input',width:150, halign:'center',align:'center'},					
				{field:'create_by',title:'User Input',width:150, halign:'center',align:'center'},	
			];
		break;
		case "titik_parkir":
			judulnya = "";
			urlnya = modnya;
			fitnya = true;
			nowrap_nya = false;
			pagesizeboy = 50;
			
			kolom[modnya] = [		
				{field:'nama',title:'Titik Lokasi',width:200, halign:'center',align:'left'},
				{field:'flag_marka',title:'Marka',width:200, halign:'center',align:'center'},				
				{field:'juru_parkir',title:'Juru Parkir',width:200, halign:'center',align:'center'},				
				{field:'create_date',title:'Tgl. Input',width:150, halign:'center',align:'center'},					
				{field:'create_by',title:'User Input',width:150, halign:'center',align:'center'},	
			];
		break;
		case "list_kendaraan":
			judulnya = "";
			urlnya = modnya;
			fitnya = true;
			nowrap_nya = false;
			pagesizeboy = 50;
			
			kolom[modnya] = [		
				{field:'nama',title:'No. Polisi',width:150, halign:'center',align:'left'},
				{field:'jns_kendaraan',title:'Jenis Kendaraan',width:150, halign:'center',align:'left'},
				{field:'nama_stnk_bpkb',title:'Nama Pemilik',width:200, halign:'center',align:'center'},				
				{field:'status',title:'Status',width:150, halign:'center',align:'center'},				
				{field:'create_date',title:'Tgl. Input',width:150, halign:'center',align:'center'},					
				{field:'create_by',title:'User Input',width:150, halign:'center',align:'center'},	
			];
		break;
		case "cek_data_kendaraan":
			judulnya = "";
			urlnya = modnya;
			fitnya = true;
			nowrap_nya = false;
			pagesizeboy = 50;
			
			kolom[modnya] = [		
				{field:'nama',title:'No. Polisi',width:150, halign:'center',align:'left'},
				{field:'jns_kendaraan',title:'Jenis Kendaraan',width:150, halign:'center',align:'left'},
				{field:'nama_stnk_bpkb',title:'Nama Pemilik',width:200, halign:'center',align:'center'},				
				{field:'status',title:'Status',width:150, halign:'center',align:'center'},				
				{field:'create_date',title:'Tgl. Input',width:150, halign:'center',align:'center'},					
				{field:'create_by',title:'User Input',width:150, halign:'center',align:'center'},	
			];
		break;
		case "transaksi_parkir":
			judulnya = "";
			urlnya = modnya;
			fitnya = true;
			nowrap_nya = false;
			pagesizeboy = 50;
			
			kolom[modnya] = [		
				{field:'nopol',title:'No. Polisi',width:150, halign:'center',align:'left'},
				{field:'jns_kendaraan',title:'Jenis Kendaraan',width:150, halign:'center',align:'left'},				
				{field:'status',title:'Status',width:150, halign:'center',align:'center'},
				{field:'tmt_parkir',title:'Lokasi/Titik Parkir',width:150, halign:'center',align:'center'},
				{field:'jukir',title:'Juru Parkir',width:100, halign:'center',align:'center'},
				{field:'durasi',title:'Durasi Parkir',width:150, halign:'center',align:'center'},
				{field:'tgl_parkir_masuk',title:'Tgl. Masuk',width:150, halign:'center',align:'center'},
				{field:'tgl_parkir_keluar',title:'Tgl. Keluar',width:150, halign:'center',align:'center'},									
				{field:'create_by',title:'User Input',width:150, halign:'center',align:'center'},	
			];
		break;
		
		
	}
	
	urlglobal = host+'master-data/'+urlnya;
	grid_nya_master = $("#"+divnya).datagrid({
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
			if(modnya=='ldap_user'){
				$('#user_ldap').val(rowData.samaccountname);
				$('#user_na').html(rowData.samaccountname);
				$('#nama_na').html(rowData.displayname);
			}
		},
		onDblClickRow:function(rowIndex,rowData){
			
		},
		toolbar: '#tb_'+modnya,
		rowStyler: function(index,row){
			if(modnya == 'dokumen_order'){
				if (row.sisa_hari != null){
					if (row.sisa_hari <= 60){
						return 'background-color:#FFF1C2;';
					} 
					if (row.sisa_hari <= 30){
						return 'background-color:#FDAC95;';
					}
				}
			}
		},
		onLoadSuccess: function(data){
			if(data.total == 0){
				var $panel = $(this).datagrid('getPanel');
				var $info = '<div class="info-empty" style="margin-top:15%;">Data Tidak Tersedia</div>';
				$($panel).find(".datagrid-view").append($info);
			}else{
				$($panel).find(".datagrid-view").append('');
				$('.info-empty').remove();
			}
		},
	});
}

function genformMaster(type, modulnya, submodulnya, stswindow, p1, p2, p3){
	var parampost = {};
	var urlpost = host+'master-form/'+submodulnya;
	var urldelete = host+'master-simpan/'+submodulnya;
	var id_tambahan = "";
	var nama_file = "";
	var table = submodulnya;
	var adafilenya = false;
	var jenis_grid = 'grid';
	
	switch(submodulnya){
		case "perusahaan": 
			
		break;
	}
	
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
				}else if(type=='delete'){
					
					$.messager.confirm(nama_apps,'Anda Yakin Ingin Menghapus Data Ini ?',function(re){
						if(re){
							$.LoadingOverlay("show");
							$.post(urldelete, {'id':row.id, 'editstatus':'delete'}, function(r){
								if(r==1){
									$.messager.alert(nama_apps,"Data Terhapus",'info');
									if(jenis_grid == 'grid'){
										$('#grid_'+submodulnya).datagrid('reload');								
									}else if(jenis_grid == 'treegrid'){
										$('#grid_'+submodulnya).treegrid({
											loadFilter: function(data){
												var opts = $(this).treegrid('options');
												var originalData = $(this).treegrid('getData');
												if (originalData){
													setState(data);
												}
												return data;
												
												function setState(data){
													for(var i=0; i<data.length; i++){
														var node = data[i];
														var originalNode = findNode(node[opts.idField], originalData);
														if (originalNode){
															node.state =originalNode.state;
														}
														if (node.children){
															setState(node.children);
														}
													}
												}
												
												function findNode(id, data){
													var cc = [data];
													while(cc.length){
														var c = cc.shift();
														for(var i=0; i<c.length; i++){
															var node = c[i];
															if (node[opts.idField] == id){
																return node;
															} else if (node['children']){
																cc.push(node['children']);
															}
														}
													}
													return null;
												}
											}
										});
									}
								}else{
									$.messager.alert(nama_apps,"Gagal Menghapus Data "+r,'error');
								}
								
								$.LoadingOverlay("hide", true);
							});	
						}
					});	
					//}
				}
				
			}else{
				$.messager.alert(nama_apps,"Pilih Data Yang Akan Dihapus/Diedit",'error');
			}
		break;
		
	}
}

function tambah_row_master(mod,param){
	var tr_table;
	var no; 
	
	switch(mod){
		case "dokumen_ceklist":
			idx_row++;
			tr_table += '<tr class="tr_doklist" id="tr_dok_'+idx_row+'" idx="'+idx_row+'">';
			tr_table += '	<td>';
			tr_table += '		<select class="form-control form-rab select2nya" name="cl_dokumen_ceklist_id[]" id="cl_dokumen_ceklist_id_'+idx_row+'">'+master_dokumen+'</select>';
			tr_table += '	</td>';
			tr_table +=	'	<td class="text-center"><a href="javascript:void(0);" class="btn btn-danger btn-circle" onclick="$(this).parents(\'tr\').first().remove();"><i class="fa fa-times"></i></a></td>';
			tr_table += '</tr>';	
		break;
	}
	
	$('.'+mod).append(tr_table);
	$(".select2nya").select2({ 'width':'100%', containerCssClass: "wrap" });
	$(".angka-uhuy").maskMoney({
		precision:0,
		decimal:',',
		thousands:'.',
		allowZero: true, 
		defaultZero: false
	});	
	$('.angka').autoNumeric('init', {
		aSep : '.',
		aDec: ',',
		mDec: '0'
	});
	
	
}

function cariDataMaster(mod, acak, jns_grid){
	var post_search = {};
	
	post_search['kat'] = $('#kat_'+acak).val();
	post_search['key'] = $('#key_'+acak).val();
	
	switch(mod){
		case "barang":
			post_search['tipe_barang_pengadaan'] = $('#tipe_barang_pengadaan_'+acak).val();
			post_search['jenis_barang'] = $('#jenis_barang_'+acak).val();
			post_search['daerah'] = $('#daerah_'+acak).val();
		break;
	}
	
	$('#grid_'+mod).datagrid('reload', post_search);
}

function reloadGridMaster(mod, acak, jns_grid){
	var post_search = {};
	
	$('#kat_'+acak).prop('selectedIndex',0);
	$('#key_'+acak).val('');
	$('#tipe_barang_pengadaan_'+acak).prop('selectedIndex',0);
	$("#jenis_barang_"+acak).val('').trigger('change');
	$("#daerah_"+acak).val('').trigger('change');
	
	switch(mod){
		case "barang":
			post_search['tipe_barang_pengadaan'] = $('#tipe_barang_pengadaan_'+acak).val();
			post_search['jenis_barang'] = $('#jenis_barang_'+acak).val();
			post_search['daerah'] = $('#daerah_'+acak).val();
		break;
	}

	$('#grid_'+mod).datagrid('reload', post_search);
}