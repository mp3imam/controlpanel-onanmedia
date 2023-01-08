var kancut;

function genGridIntegrasi(modnya, divnya, lebarnya, tingginya, par1){
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
		
		case "log_integrasi":
			judulnya = "";
			urlnya = "log_integrasi";
			fitnya = true;
			row_number=true;
			pagesizeboy = 100;
			singleSelek = false;
			cekonselek = true;
			selekoncek = true;
			
			frozen[modnya] = [			
				{field:'create_date',title:'Create Date',width:130, halign:'center',align:'center'},			
			];
			kolom[modnya] = [	
				{field:'jml_data',title:'Jumlah Data',width:150, halign:'center',align:'left'},			
				{field:'request',title:'Request',width:130, halign:'center',align:'center'},
				{field:'response',title:'Response',width:150, halign:'center',align:'left'},
				{field:'create_by',title:'User',width:150, halign:'center',align:'left'},
			];
		break;
		case "pengiriman_data":
			judulnya = "";
			urlnya = "pengiriman_data";
			fitnya = true;
			row_number=true;
			pagesizeboy = 100;
			singleSelek = false;
			cekonselek = true;
			selekoncek = true;
			
			frozen[modnya] = [			
				{field:'create_date',title:'Create Date',width:130, halign:'center',align:'center'},		
			];
			kolom[modnya] = [
				{field:'jml_data',title:'Jumlah Data',width:150, halign:'center',align:'left'},	
				{field:'request',title:'Request',width:150, halign:'center',align:'center'},				
				{field:'response',title:'Response',width:150, halign:'center',align:'center'},
				{field:'tipe_pengiriman',title:'Tipe Pengiriman',width:150, halign:'center',align:'center'},
				{field:'create_by',title:'User',width:150, halign:'center',align:'left'},				
			];
		break;
		case "data_core_banking":
			judulnya = "";
			urlnya = "data_core_banking";
			fitnya = true;
			row_number=true;
			pagesizeboy = 100;
			
			frozen[modnya] = [			
				{field:'nama_cabang',title:'Kantor Cabang',width:200, halign:'center',align:'left'},			
				{field:'nokontrak',title:'No. Kontrak',width:120, halign:'center',align:'center'},			
			];
			kolom[modnya] = [
				{field:'status_data',title:'Sts. Proses',width:130, halign:'center',align:'center',
					formatter:function(value,rowData,rowIndex){
						if(rowData.nama_asuransi){
							return "Sudah Diproses";
						}else{
							return 'Belum Diproses'
						}
					},
					styler: function(value,rowData,index){
						if(rowData.nama_asuransi){
							return 'background-color:#e4fcfc;';
						}else{
							return 'background-color:#FFFF9F;';
						}
					}
				},
				{field:'statusnya',title:'Sts. Kirim',width:130, halign:'center',align:'center',
					styler: function(value,rowData,index){
						if(value == 'Sudah Dikirim'){
							return 'background-color:#D0FFE1;';
						}else{
							return 'background-color:#ffe6e6;';
						}
					}
				},
				{field:'nama_asuransi',title:'Nama Asuransi',width:150, halign:'center',align:'center'},
				{field:'rate',title:'Rate',width:80, halign:'center',align:'center'},
				{field:'nilai_premi',title:'Nilai Premi',width:120, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'plafond',title:'Plafond',width:130, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'angsuran',title:'Angsuran',width:130, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'jkwkt',title:'Jangka Waktu',width:130, halign:'center',align:'center'},
				{field:'noktp',title:'No. KTP',width:150, halign:'center',align:'center'},			
				{field:'nama',title:'Nama',width:150, halign:'center',align:'left'},			
				{field:'alamat',title:'Alamat',width:150, halign:'center',align:'left'},			
				{field:'tgllahir',title:'Tgl. Lahir',width:130, halign:'center',align:'center'},
				{field:'pekerjaan',title:'Pekerjaan',width:150, halign:'center',align:'left'},					
				{field:'tglmulai',title:'Tgl. Akad',width:130, halign:'center',align:'center'},
				{field:'tglmulai',title:'Tgl. Awal',width:130, halign:'center',align:'center'},
				{field:'tglakhir',title:'Tgl. Akhir',width:130, halign:'center',align:'center'},
				{field:'kafalah',title:'Nilai Kafalah',width:150, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'jnsagu',title:'Jenis Agunan',width:130, halign:'center',align:'center'},
				{field:'underwriting',title:'Underwriting',width:130, halign:'center',align:'center'},
				{field:'create_date',title:'Tgl. Penarikan Data',width:150, halign:'center',align:'center'},
				
			];

		break;
		
	}
	
	urlglobal = host+'integrasi-data/'+urlnya;
	grid_nya_integrasi = $("#"+divnya).datagrid({
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



function genformIntegrasi(type, modulnya, submodulnya, stswindow, p1, p2, p3){
	var parampost = {};
	var urlpost = host+'integrasi-form/'+submodulnya;
	var urldelete = host+'integrasi-simpan/'+submodulnya;
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
				
				if(submodulnya == 'kontrak_pribadi' || submodulnya == 'kontrak_perusahaan'){
					if(row.tipe_level != 'kontrak'){
						$.messager.alert(nama_apps, "Pilih Data di Level Kontrak", 'error');
						return false;
					}
					
					if(row.status_data == 'SELESAI'){
						$.messager.alert(nama_apps, "Data Kontrak Sudah Selesai!", 'error');
						return false;
					}
				}
				
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
		
		case "proses_core_banking":
			var row = $("#grid_"+submodulnya).datagrid('getSelected');
			if(row){

				if(row.status_data == 1){
					$.messager.alert(nama_apps,"Data Sudah Dikirim ke Asuransi, Tidak Bisa Diubah",'error');
					return false;
				}

				$.LoadingOverlay("show");
				$('#modalencuk').html('');
				$('#headernya').html("<b>Proses Core Banking</b>");
				$('#pesanModal').modal('show');

				$('#pesanModal').on('shown.bs.modal', function (e) {
					e.preventDefault();
					$.ajax({
						type: "POST",
						url: host+'integrasi-display/proses_core_banking',
						data: {
							'id':row.id,
						},
						success: function(resp){
							$('#modalencuk').html(resp);
							$.LoadingOverlay("hide", true);
						}
					});
					
					$(this).off('shown.bs.modal');
				});
			}else{
				$.messager.alert(nama_apps,"Pilih Data Yang Akan Diproses",'error');
			}
		break;
		
	}
}

function tambah_row_integrasi(mod,param){
	var tr_table;
	var no; 
	
	switch(mod){
		case "dokumen_ceklist":
			idx_row++;
			tr_table += '<tr class="tr_doklist" id="tr_dok_'+idx_row+'" idx="'+idx_row+'">';
			tr_table += '	<td>';
			tr_table += '		<select class="form-control form-rab select2nya" name="cl_dokumen_ceklist_id[]" id="cl_dokumen_ceklist_id_'+idx_row+'">'+integrasi_dokumen+'</select>';
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

function cariDataIntegrasi(mod, acak, jns_grid){
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

function reloadGridIntegrasi(mod, acak, jns_grid){
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
