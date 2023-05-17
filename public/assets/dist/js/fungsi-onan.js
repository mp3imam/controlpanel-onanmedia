var grid_nya_onan;

function genGridOnan(modnya, divnya, lebarnya, tingginya){
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
		
		case "onan_user_alamat":
			judulnya = "";
			urlnya = modnya;
			fitnya = true;
			row_number=true;
			nowrap_nya = false;

			param['idx_usr'] = idx_usr;

			frozen[modnya] = [			
				{field:'alamat',title:'Alamat',width:250, halign:'center',align:'left'},			
			];
			kolom[modnya] = [			
				{field:'catatanKurir',title:'Catatan Kurir',width:200, halign:'center',align:'left'},
				{field:'namaPenerima',title:'Nama Penerima',width:200, halign:'center',align:'left'},
			];
		break;

		case "onan_user_bahasa":
			judulnya = "";
			urlnya = modnya;
			fitnya = true;
			row_number=true;
			nowrap_nya = false;

			param['idx_usr'] = idx_usr;

			frozen[modnya] = [			
				{field:'bahasa',title:'Bahasa',width:250, halign:'center',align:'left'},			
			];
			kolom[modnya] = [			
				{field:'level',title:'Level',width:150, halign:'center',align:'center'},
			];
		break;
		case "onan_user_pendidikan":
			judulnya = "";
			urlnya = modnya;
			fitnya = true;
			row_number=true;
			nowrap_nya = false;

			param['idx_usr'] = idx_usr;

			frozen[modnya] = [			
				{field:'tingkat',title:'Tingkat Pendidikan',width:150, halign:'center',align:'left'},			
			];
			kolom[modnya] = [			
				{field:'negara',title:'Negara',width:250, halign:'center',align:'center'},
				{field:'institusi',title:'Institusi',width:250, halign:'center',align:'left'},
			];
		break;
		case "onan_user_keahlian":
			judulnya = "";
			urlnya = modnya;
			fitnya = true;
			row_number=true;
			nowrap_nya = false;

			param['idx_usr'] = idx_usr;

			frozen[modnya] = [			
				{field:'nama',title:'Nama Keahlian',width:250, halign:'center',align:'left'},			
			];
			kolom[modnya] = [			
				{field:'level',title:'Level',width:150, halign:'center',align:'center'},
			];
		break;
		case "onan_user_produk":
			judulnya = "";
			urlnya = modnya;
			fitnya = true;
			row_number=true;
			nowrap_nya = false;

			param['idx_usr'] = idx_usr;

			frozen[modnya] = [			
				{field:'nama',title:'Nama Produk',width:200, halign:'center',align:'left'},			
			];
			kolom[modnya] = [			
				{field:'kategori',title:'Kategori',width:200, halign:'center',align:'left'},
				{field:'subkategori',title:'Sub Kategori',width:200, halign:'center',align:'left'},
				{field:'impresi',title:'Impresi Halaman',width:150, halign:'center',align:'center'},	
				{field:'klik',title:'Jumlah Klik',width:150, halign:'center',align:'center'},	
				{field:'hargaTermurah',title:'Harga Termurah',width:150, halign:'center',align:'right'},	
				{field:'hargaTermahal',title:'Harga Termahal',width:150, halign:'center',align:'right'},	
			];
		break;
		case "onan_user":
			judulnya = "";
			urlnya = "onan_user";
			fitnya = true;
			row_number=true;
			nowrap_nya = false;

			frozen[modnya] = [			
				{field:'name',title:'Nama Lengkap',width:200, halign:'center',align:'left'},			
			];
			kolom[modnya] = [			
				{field:'email',title:'Email',width:200, halign:'center',align:'left'},
				{field:'phone',title:'No. Handphone',width:150, halign:'center',align:'center'},
				{field:'username',title:'Username',width:150, halign:'center',align:'left'},
				{field:'isEmailVerified',title:'Verifikasi Email',width:150, halign:'center',align:'center',
					formatter:function(value,rowData,rowIndex){
						if(value == 1){
							return '<img width="15%" src="'+host+'assets/images/ok.png" />';
						}else{
							return '<img width="15%" src="'+host+'assets/images/not-ok.png" />';
						}
					}
				},
				{field:'isPhoneVerified',title:'Verifikasi No. HP',width:150, halign:'center',align:'center',
					formatter:function(value,rowData,rowIndex){
						if(value == 1){
							return '<img width="15%" src="'+host+'assets/images/ok.png" />';
						}else{
							return '<img width="15%" src="'+host+'assets/images/not-ok.png" />';
						}
					}
				},
				{field:'sellerStatus',title:'Terdaftar Seller',width:150, halign:'center',align:'center',
					formatter:function(value,rowData,rowIndex){
						if(value == 1){
							return '<img width="15%" src="'+host+'assets/images/ok.png" />';
						}else{
							return '<img width="15%" src="'+host+'assets/images/not-ok.png" />';
						}
					}
				},
				{field:'status',title:'Aktivasi Admin',width:150, halign:'center',align:'center',
					formatter:function(value,rowData,rowIndex){
						if(value == 1){
							return '<img width="15%" src="'+host+'assets/images/ok.png" />';
						}else{
							return '<img width="15%" src="'+host+'assets/images/not-ok.png" />';
						}
					}
				},
			];
		break;
		case "onan_transaksi_jasa":
			judulnya = "";
			urlnya = modnya;
			fitnya = true;
			row_number=true;
			nowrap_nya = false;

			param['idx_order'] = idx_usr;

			frozen[modnya] = [			
				{field:'nama',title:'Nama',width:250, halign:'center',align:'left'},			
				{field:'deskripsi',title:'Deskripsi',width:150, halign:'center',align:'center'},
				{field:'namaPricing',title:'Nama Pricing',width:150, halign:'center',align:'center'},
				{field:'jasa',title:'Jasa',width:150, halign:'center',align:'center'},
				{field:'nilai',title:'Nilai',width:150, halign:'center',align:'center',
					formatter: function (value, row) {
						return formatNumber(value);
					}
				},
			];
		break;
		case "onan_transaksi":
			judulnya = "";
			urlnya = "onan_transaksi";
			fitnya = true;
			row_number=true;
			nowrap_nya = false;

			frozen[modnya] = [			
				{field:'penawaran',title:'Penawaran',width:200, halign:'center',align:'left'},			
			];
			kolom[modnya] = [			
				{field:'aktifitas',title:'Aktifitas',width:200, halign:'center',align:'left'},
				{field:'penjual',title:'Penjual',width:200, halign:'center',align:'left'},
				{field:'pembeli',title:'Pembeli',width:200, halign:'center',align:'left'},
				{field:'totalPenawaran',title:'Total Penawaran',width:200, halign:'center',align:'center',
					formatter: function (value, row) {
						return formatNumber(value);
					}
				},
				{field:'totalFee',title:'Total Fee',width:150, halign:'center',align:'center',
					formatter: function (value, row) {
						return formatNumber(value);
					}
				},
				{field:'totalBayar',title:'Total Bayar',width:150, halign:'center',align:'center',
					formatter: function (value, row) {
						return formatNumber(value);
					}
				},
				{field: 'totalKomisiPenjual',title: 'Total Komisi Penjual',width:150, halign:'center',align:'center',
					formatter: function (value, row) {
						return formatNumber(value);
					}
				},
				{field: 'persentaseKomisiOnan',title:'Persentase Komisi Onan',width:150, halign:'center',align:'center',
					formatter: function (value, row) {
						return value + "%";
					}
				},
				{field: 'totalKomisiOnan',title: 'Total Komisi Onan',width:150, halign:'center',align:'center',
					formatter: function (value, row) {
						return formatNumber(value);
					}
				},
				{field: 'totalKomisiPenjual',title: 'Total Komisi Penjual',width:150, halign:'center',align:'center',
					formatter: function (value, row) {
						return formatNumber(value);
					}
				},

			];
		break;
		
		case "onan_tender_peserta":
			judulnya = "";
			urlnya = modnya;
			fitnya = true;
			row_number=true;
			nowrap_nya = false;

			param['idx_tender'] = idx_usr;

			frozen[modnya] = [			
				{field:'budget',title:'Budget',width:200, halign:'center',align:'left',
					formatter: function (value, row) {
						return formatNumber(value);
					}
				},			
				{field:'namau',title:'Nama',width:200, halign:'center',align:'left'},
				{field:'durasiKontrak',title:'Durasi Kontrak',width:200, halign:'center',align:'center'},
				{field:'resume',title:'Resume',width:200, halign:'center',align:'left'},
				{field:'portofolio',title:'Portofolio',width:200, halign:'center',align:'left'},
				{field:'alasan',title:'Alasan',width:200, halign:'center',align:'left'},
				{field:'msAlasanPembatalanTenderId',title:'Alasan Pembatalan Tender',width:200, halign:'center',align:'left'},
				{field:'coverLatter',title:'Cover Letter',width:200, halign:'center',align:'left'},
				{field:'tenderId',title:'Tender',width:200, halign:'center',align:'left'},
				{field:'statusDiterima',title:'Status Diterima',width:200, halign:'center',align:'left'},
				{field:'statusAkun',title:'Status Akun',width:200, halign:'center',align:'left'},
			];	
		break;	
		
		case "onan_tender":
			judulnya = "";
			urlnya = "onan_tender";
			fitnya = true;
			row_number=true;
			nowrap_nya = false;

			frozen[modnya] = [
				{field: 'judulTender',title:'Judul Tender',width:200, halign:'center',align:'left'},
			];
			kolom[modnya] = [
				{field: 'namauser',title:'User',width:200, halign:'center',align:'left'},
				{field: 'skills',title:'Skill',width:200, halign:'center',align:'left'},
				{field: 'durasiKontrak',title:'Durasi Kontrak',width:200, halign:'center',align:'center'},
				{field: 'kategori',title:'Kategori',width:200, halign:'center',align:'center'},
				{field: 'lingkupPekerjaan',title:'Lingkup Pekerjaan',width:200, halign:'center',align:'center'},
				{field: 'tipePekerjaan',title:'Tipe Pekerjaan',width:200, halign:'center',align:'center'},
				{field: 'merchant',title:'Merchant Level',width:200, halign:'center',align:'left'},
				{field: 'deskripsiPekerjaan',title:'Deskripsi Pekerjaan',width:400, halign:'center',align:'left'},
				{field: 'metodePembayaran',title:'Metode Pembayaran',width:200, halign:'center',align:'center'},
				{field: 'posting',title:'Posting Tender',width:200, halign:'center',align:'center'},
				{field: 'budget',title:'Budget',width:200, halign:'center',align:'center',
					formatter: function (value, row) {
						return formatNumber(value);
					}
				},
				{field: 'syaratKetentuan',title:'Syarat Ketentuan',width:200, halign:'center',align:'center',
					formatter:function(value,rowData,rowIndex){
						if(value == 1){
							return '<img width="15%" src="'+host+'assets/images/ok.png" />';
						}else{
							return '<img width="15%" src="'+host+'assets/images/not-ok.png" />';
						}
					}
				},
			]

		function formatNumber(value) {
			const formatter = new Intl.NumberFormat('id-ID');
			return formatter.format(value);
		}

    }

    urlglobal = host+'onanapps/datagrid/'+urlnya;
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
				var $info = '<div class="info-empty" style="margin-top:10%;">Data Tidak Tersedia</div>';
				$($panel).find(".datagrid-view").append($info);
			}else{
				$($panel).find(".datagrid-view").append('');
				$('.info-empty').remove();
			}
		},
	});

}

function formatTotalFee(value, row, index) {
    return number_format(value, 0, ',', '.');
}


function genformOnan(type, modulnya, submodulnya, stswindow, p1, p2, p3){
	var urlpost = host+'onanapps/form/'+submodulnya;
	var urldelete = host+'onanapps/simpan/'+submodulnya;
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

			}
			
		break;

		case "lihat_detail_tender":
			var row = $("#grid_"+modulnya).datagrid('getSelected');
			if(row){

				$('#gridnya_'+modulnya).hide();
				$('#detailnya_'+modulnya).empty().show().addClass("loading");
				$.post(host+'onanapps/display/tender_detail', { 'id':row.id }, function(resp){
					$('#detailnya_'+modulnya).show();
					$('#detailnya_'+modulnya).html(resp).removeClass("loading");
				});
				
			}else{

			}
			
		break;


	}


}