var behaa = "";

function genGridLaporan(modnya, divnya, lebarnya, tingginya, par1){
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

	param['asuixp'] = modnya;

	switch(modnya){

		// Laporan Billing
		case "1":
			judulnya = "";
			urlnya = "view_1";
			fitnya = true;
			row_number=true;
			pagesizeboy = 100;
			singleSelek = false;
			cekonselek = true;
			selekoncek = true;

			param['tlpp'] = tgl_trk;

			frozen[modnya] = [
				{field:'tgllahir',title:'Tgl. Lahir',width:130, halign:'center',align:'center'},
				{field:'status_data',title:'Status Kirim',width:150, halign:'center',align:'center',
					formatter:function(value,rowData,rowIndex){
						if(value == 1){
							return "SUDAH KIRIM";
						}else if(value == 0){
							return "BELUM KIRIM";
						}else{
							return '-';
						}
					}
				},
			];
			kolom[modnya] = [
				{field:'nama_cabang',title:'Kantor Cabang',width:200, halign:'center',align:'left'},
				{field:'noktp',title:'No. KTP',width:150, halign:'center',align:'center'},
				{field:'pekerjaan',title:'Pekerjaan',width:150, halign:'center',align:'left'},
				{field:'nokontrak',title:'No. Akad',width:200, halign:'center',align:'center'},
				{field:'tglmulai',title:'Tgl. Akad',width:130, halign:'center',align:'center'},
				{field:'plafond',title:'Plafond Pembiayaan',width:150, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'tglmulai',title:'Tgl. Awal',width:130, halign:'center',align:'center'},
				{field:'tglakhir',title:'Tgl. Akhir',width:130, halign:'center',align:'center'},
				{field:'jkwkt',title:'Jml. Bulan',width:130, halign:'center',align:'center'},
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
				{field:'angsuran',title:'Asuransi Yg Dibayarkan',width:150, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'underwriting',title:'Underwriting',width:130, halign:'center',align:'center'},
				{field:'rate',title:'Rate',width:130, halign:'center',align:'center'},

			];

		break;
		case "2":
			judulnya = "";
			urlnya = "view_2";
			fitnya = true;
			row_number=true;
			pagesizeboy = 100;
			singleSelek = false;
			cekonselek = true;
			selekoncek = true;

			param['tlpp'] = tgl_trk;

			frozen[modnya] = [
				{field:'nokontrak',title:'No. Kontrak',width:130, halign:'center',align:'left'},
				{field:'status_data',title:'Status Kirim',width:150, halign:'center',align:'center',
					formatter:function(value,rowData,rowIndex){
						if(value == 1){
							return "SUDAH KIRIM";
						}else if(value == 0){
							return "BELUM KIRIM";
						}else{
							return '-';
						}
					}
				},
			];
			kolom[modnya] = [
				{field:'nama_cabang',title:'Kantor Cabang',width:200, halign:'center',align:'left'},
				{field:'nama',title:'Nama Nasabah',width:150, halign:'center',align:'left'},
				{field:'tgllahir',title:'Tgl. Lahir',width:150, halign:'center',align:'left'},
				{field:'pekerjaan',title:'Instansi',width:200, halign:'center',align:'left'},
				{field:'umur',title:'Usia',width:130, halign:'center',align:'center'},
				{field:'tglmulai',title:'Tanggal Akad',width:130, halign:'center',align:'left'},
				{field:'jkwkt',title:'Jangka Waktu (Thn)',width:130, halign:'center',align:'center'},
				{field:'plafond',title:'Plafond Pembiayaan',width:150, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'ijk',title:'IJK',width:130, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'rate',title:'Rate Premi',width:130, halign:'center',align:'center'},
				{field:'angsuran',title:'Angsuran Per Bulan',width:130, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'angsuran_dibayarkan',title:'Asuransi Yang Dibayarkan',width:150, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'selisih',title:'Selisih',width:150, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},

			];
		break;
		case "3":
			judulnya = "";
			urlnya = "view_3";
			fitnya = true;
			row_number=true;
			pagesizeboy = 100;
			singleSelek = false;
			cekonselek = true;
			selekoncek = true;

			param['tlpp'] = tgl_trk;

			frozen[modnya] = [
				{field:'nokontrak',title:'NO KONTRAK',width:130, halign:'center',align:'center'},
				{field:'status_data',title:'Status Kirim',width:150, halign:'center',align:'center',
					formatter:function(value,rowData,rowIndex){
						if(value == 1){
							return "SUDAH KIRIM";
						}else if(value == 0){
							return "BELUM KIRIM";
						}else{
							return '-';
						}
					}
				},
			];
			kolom[modnya] = [
				{field:'nama_cabang',title:'Kantor Cabang',width:200, halign:'center',align:'left'},
				{field:'nokontrak',title:'NO. REKENING',width:150, halign:'center',align:'center'},
				{field:'nama',title:'NAMA',width:150, halign:'center',align:'left'},
				{field:'alamat',title:'ALAMAT',width:200, halign:'center',align:'left'},
				{field:'tgllahir',title:'TGL. LAHIR',width:130, halign:'center',align:'left'},
				{field:'noktp',title:'NO.KTP',width:150, halign:'center',align:'left'},
				{field:'pekerjaan',title:'PEKERJAAN',width:130, halign:'center',align:'left'},
				{field:'',title:'AKAD PEMBIAYAAN NON-SWASTA',width:130, halign:'center',align:'left'},
				{field:'',title:'AKAD PEMBIAYAAN NOMOR',width:130, halign:'center',align:'center'},
				{field:'',title:'AKAD PEMBIAYAAN TANGGAL',width:130, halign:'center',align:'center'},
				{field:'plafond',title:'PLAFON PEMBIAYAAN',width:150, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'tglmulai',title:'JANGKA WAKTU AWAL',width:130, halign:'center',align:'center'},
				{field:'tglakhir',title:'JANGKA WAKTU AKHIR',width:130, halign:'center',align:'center'},
				{field:'jkwkt',title:'JML. BULAN',width:130, halign:'center',align:'center'},
				{field:'kafalah',title:'NILAI KAFALAH',width:150, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'lima_belas_persen',title:'15%',width:150, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'',title:'KAFALAH NETT',width:150, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'jnsagu',title:'JENIS AGUNAN',width:130, halign:'center',align:'center'},
				{field:'angsuran',title:'ASURANSI YANG DIBAYARKAN',width:150, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'',title:'SELISIH',width:150, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
			];
		break;
		case "4":
			judulnya = "";
			urlnya = "view_4";
			fitnya = true;
			row_number=true;
			pagesizeboy = 100;
			singleSelek = false;
			cekonselek = true;
			selekoncek = true;

			param['tlpp'] = tgl_trk;

			frozen[modnya] = [
				{field:'nokontrak',title:'NO KONTRAK',width:130, halign:'center',align:'center'},
				{field:'status_data',title:'Status Kirim',width:150, halign:'center',align:'center',
					formatter:function(value,rowData,rowIndex){
						if(value == 1){
							return "SUDAH KIRIM";
						}else if(value == 0){
							return "BELUM KIRIM";
						}else{
							return '-';
						}
					}
				},
			];
			kolom[modnya] = [
				{field:'nama_cabang',title:'Kantor Cabang',width:200, halign:'center',align:'left'},
				{field:'nokontrak',title:'NO. REKENING',width:150, halign:'center',align:'center'},
				{field:'nama',title:'NAMA',width:150, halign:'center',align:'left'},
				{field:'alamat',title:'ALAMAT',width:200, halign:'center',align:'left'},
				{field:'tgllahir',title:'TGL. LAHIR',width:130, halign:'center',align:'left'},
				{field:'noktp',title:'NO.KTP',width:150, halign:'center',align:'left'},
				{field:'pekerjaan',title:'PEKERJAAN',width:130, halign:'center',align:'left'},
				{field:'',title:'AKAD PEMBIAYAAN NON-SWASTA',width:130, halign:'center',align:'left'},
				{field:'',title:'AKAD PEMBIAYAAN NOMOR',width:130, halign:'center',align:'center'},
				{field:'',title:'AKAD PEMBIAYAAN TANGGAL',width:130, halign:'center',align:'center'},
				{field:'plafond',title:'PLAFON PEMBIAYAAN',width:150, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'tglmulai',title:'JANGKA WAKTU AWAL',width:130, halign:'center',align:'center'},
				{field:'tglakhir',title:'JANGKA WAKTU AKHIR',width:130, halign:'center',align:'center'},
				{field:'jkwkt',title:'JML. BULAN',width:130, halign:'center',align:'center'},
				{field:'kafalah',title:'NILAI KAFALAH',width:150, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'lima_belas_persen',title:'15%',width:150, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'',title:'KAFALAH NETT',width:150, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'jnsagu',title:'JENIS AGUNAN',width:130, halign:'center',align:'center'},
				{field:'angsuran',title:'Asuransi Yang Dibayarkan',width:150, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'',title:'Selisih',width:150, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
			];
		break;
		case "5":
			judulnya = "";
			urlnya = "view_5";
			fitnya = true;
			row_number=true;
			pagesizeboy = 100;
			singleSelek = false;
			cekonselek = true;
			selekoncek = true;

			param['tlpp'] = tgl_trk;

			frozen[modnya] = [
				{field:'nokontrak',title:'No. Kontrak',width:130, halign:'center',align:'center'},
				{field:'status_data',title:'Status Kirim',width:150, halign:'center',align:'center',
					formatter:function(value,rowData,rowIndex){
						if(value == 1){
							return "SUDAH KIRIM";
						}else if(value == 0){
							return "BELUM KIRIM";
						}else{
							return '-';
						}
					}
				},
			];
			kolom[modnya] = [
				{field:'nama_cabang',title:'Kantor Cabang',width:200, halign:'center',align:'left'},
				{field:'nama',title:'Nama',width:150, halign:'center',align:'left'},
				{field:'tgllahir',title:'TGL. LAHIR',width:130, halign:'center',align:'center'},
				{field:'umur',title:'Umur',width:150, halign:'center',align:'center'},
				{field:'nama_cabang',title:'Bank',width:130, halign:'center',align:'center'},
				{field:'tglmulai',title:'Tgl. Awal',width:130, halign:'center',align:'center'},
				{field:'tglakhir',title:'Tgl. Akhir',width:130, halign:'center',align:'center'},
				{field:'jkwkt',title:'Masa Asuransi (Bulan)',width:130, halign:'center',align:'center'},
				{field:'',title:'Uang Pertangunggan',width:150, halign:'right',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'jnskel',title:'Jenis Kelamin',width:130, halign:'center',align:'center'},
				{field:'',title:'Margin Pembiayaan',width:130, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'',title:'Tarip',width:130, halign:'center',align:'center'},
				{field:'',title:'Kontribusi',width:130, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'',title:'Fee Base',width:130, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'',title:'Kontibusi Nett',width:130, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'',title:'Usia + Masa (x+n)',width:130, halign:'center',align:'center'},
			];
		break;
		case "6":
			judulnya = "";
			urlnya = "view_6";
			fitnya = true;
			row_number=true;
			pagesizeboy = 100;
			singleSelek = false;
			cekonselek = true;
			selekoncek = true;

			param['tlpp'] = tgl_trk;

			frozen[modnya] = [
				{field:'nokontrak',title:'NO. KONTRAK',width:130, halign:'center',align:'center'},
				{field:'status_data',title:'Status Kirim',width:150, halign:'center',align:'center',
					formatter:function(value,rowData,rowIndex){
						if(value == 1){
							return "SUDAH KIRIM";
						}else if(value == 0){
							return "BELUM KIRIM";
						}else{
							return '-';
						}
					}
				},
			];
			kolom[modnya] = [
				{field:'nama_cabang',title:'Kantor Cabang',width:200, halign:'center',align:'left'},
				{field:'nama',title:'NAMA LENGKAP',width:150, halign:'center',align:'left'},
				{field:'jnskel',title:'JENIS KELAMIN',width:150, halign:'center',align:'left'},
				{field:'noktp',title:'NIK',width:200, halign:'center',align:'center'},
				{field:'tgllahir',title:'TGL. LAHIR',width:130, halign:'center',align:'center'},
				{field:'umur',title:'USIA',width:150, halign:'center',align:'center'},
				{field:'tglmulai',title:'AWAL AKAD',width:130, halign:'center',align:'center'},
				{field:'tglakhir',title:'AKHIR AKAD',width:130, halign:'center',align:'center'},
				{field:'jkwkt',title:'MASA ASURANSI',width:130, halign:'center',align:'center'},
				{field:'',title:'MANFAAT ASURANSI AWAL',width:150, halign:'right',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'rate',title:'RATE (‰)',width:130, halign:'center',align:'center'},
				{field:'',title:'KONTRIBUSI',width:130, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'underwriting',title:'UNDERWRITING',width:130, halign:'center',align:'center'},
			];
		break;
		case "7":
			judulnya = "";
			urlnya = "view_7";
			fitnya = true;
			row_number=true;
			pagesizeboy = 100;
			singleSelek = false;
			cekonselek = true;
			selekoncek = true;

			param['tlpp'] = tgl_trk;

			frozen[modnya] = [
				{field:'nokontrak',title:'No. Kontrak',width:130, halign:'center',align:'center'},
				{field:'status_data',title:'Status Kirim',width:150, halign:'center',align:'center',
					formatter:function(value,rowData,rowIndex){
						if(value == 1){
							return "SUDAH KIRIM";
						}else if(value == 0){
							return "BELUM KIRIM";
						}else{
							return '-';
						}
					}
				},
			];
			kolom[modnya] = [
				{field:'nama_cabang',title:'Kantor Cabang',width:200, halign:'center',align:'left'},
				{field:'nama',title:'Nama Nasabah',width:150, halign:'center',align:'left'},
				{field:'tgllahir',title:'TGL. LAHIR',width:130, halign:'center',align:'center'},
				{field:'pekerjaan',title:'INSTANSI',width:150, halign:'center',align:'center'},
				{field:'umur',title:'USIA',width:130, halign:'center',align:'center'},
				{field:'tglmulai',title:'TGL. AKAD',width:130, halign:'center',align:'center'},
				{field:'jkwkt',title:'Jangka Waktu (Thn)',width:130, halign:'center',align:'center'},
				{field:'tglakhir',title:'TGL. AKAD',width:130, halign:'center',align:'center'},
				{field:'plafond',title:'Plafond Pembiayaan',width:150, halign:'right',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'',title:'KONTRIBUSI',width:130, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
			];
		break;
		case "8":
			judulnya = "";
			urlnya = "view_8";
			fitnya = true;
			row_number=true;
			pagesizeboy = 100;
			singleSelek = false;
			cekonselek = true;
			selekoncek = true;

			param['tlpp'] = tgl_trk;

			frozen[modnya] = [
				{field:'nokontrak',title:'No. Kontrak',width:130, halign:'center',align:'center'},
				{field:'status_data',title:'Status Kirim',width:150, halign:'center',align:'center',
					formatter:function(value,rowData,rowIndex){
						if(value == 1){
							return "SUDAH KIRIM";
						}else if(value == 0){
							return "BELUM KIRIM";
						}else{
							return '-';
						}
					}
				},
			];
			kolom[modnya] = [
				{field:'nama_cabang',title:'Kantor Cabang',width:200, halign:'center',align:'left'},
				{field:'nama',title:'Nama Nasabah',width:150, halign:'center',align:'left'},
				{field:'tgllahir',title:'TGL. LAHIR',width:130, halign:'center',align:'center'},
				{field:'pekerjaan',title:'Instansi',width:150, halign:'center',align:'center'},
				{field:'umur',title:'Usia',width:130, halign:'center',align:'center'},
				{field:'tglmulai',title:'Tgl. Akad',width:130, halign:'center',align:'center'},
				{field:'jkwkt',title:'Jangka Waktu (Thn)',width:130, halign:'center',align:'center'},
				{field:'tglakhir',title:'Tgl. Akad',width:130, halign:'center',align:'center'},
				{field:'plafond',title:'Plafond Pembiayaan',width:150, halign:'right',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'',title:'KONTRIBUSI',width:130, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
			];
		break;
		case "9":
			judulnya = "";
			urlnya = "view_9";
			fitnya = true;
			row_number=true;
			pagesizeboy = 100;
			singleSelek = false;
			cekonselek = true;
			selekoncek = true;

			param['tlpp'] = tgl_trk;

			frozen[modnya] = [
				{field:'nokontrak',title:'No. Kontrak',width:130, halign:'center',align:'center'},
				{field:'status_data',title:'Status Kirim',width:150, halign:'center',align:'center',
					formatter:function(value,rowData,rowIndex){
						if(value == 1){
							return "SUDAH KIRIM";
						}else if(value == 0){
							return "BELUM KIRIM";
						}else{
							return '-';
						}
					}
				},
			];
			kolom[modnya] = [
				{field:'nama_cabang',title:'Kantor Cabang',width:200, halign:'center',align:'left'},
				{field:'nama',title:'Nama Nasabah',width:150, halign:'center',align:'left'},
				{field:'tgllahir',title:'TGL. LAHIR',width:130, halign:'center',align:'center'},
				{field:'pekerjaan',title:'Instansi',width:150, halign:'center',align:'center'},
				{field:'umur',title:'Usia',width:130, halign:'center',align:'center'},
				{field:'tglmulai',title:'Tgl. Akad',width:130, halign:'center',align:'center'},
				{field:'jkwkt',title:'Jangka Waktu (Thn)',width:130, halign:'center',align:'center'},
				{field:'tglakhir',title:'Tgl. Akad',width:130, halign:'center',align:'center'},
				{field:'plafond',title:'Plafond Pembiayaan',width:150, halign:'right',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'',title:'KONTRIBUSI',width:130, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
			];
		break;
		case "10":
			judulnya = "";
			urlnya = "view_10";
			fitnya = true;
			row_number=true;
			pagesizeboy = 100;
			singleSelek = false;
			cekonselek = true;
			selekoncek = true;

			param['tlpp'] = tgl_trk;

			frozen[modnya] = [
				{field:'nokontrak',title:'No. Kontrak',width:130, halign:'center',align:'center'},
				{field:'status_data',title:'Status Kirim',width:150, halign:'center',align:'center',
					formatter:function(value,rowData,rowIndex){
						if(value == 1){
							return "SUDAH KIRIM";
						}else if(value == 0){
							return "BELUM KIRIM";
						}else{
							return '-';
						}
					}
				},
			];
			kolom[modnya] = [
				{field:'nama_cabang',title:'Kantor Cabang',width:200, halign:'center',align:'left'},
				{field:'nama',title:'Nama Nasabah',width:150, halign:'center',align:'left'},
				{field:'tgllahir',title:'TGL. LAHIR',width:130, halign:'center',align:'center'},
				{field:'pekerjaan',title:'Instansi',width:150, halign:'center',align:'center'},
				{field:'umur',title:'Usia',width:130, halign:'center',align:'center'},
				{field:'tglmulai',title:'Tgl. Akad',width:130, halign:'center',align:'center'},
				{field:'jkwkt',title:'Jangka Waktu (Thn)',width:130, halign:'center',align:'center'},
				{field:'tglakhir',title:'Tgl. Akad',width:130, halign:'center',align:'center'},
				{field:'plafond',title:'Plafond Pembiayaan',width:150, halign:'right',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
				{field:'',title:'KONTRIBUSI',width:130, halign:'center',align:'right',
					formatter:function(value,rowData,rowIndex){
						if(value){
							return "Rp. "+NumberFormat(value);
						}else{
							return '-';
						}
					}
				},
			];
		break;
    }

    urlglobal = host+'laporan-data/'+urlnya;
	grid_nya_order = $("#"+divnya).datagrid({
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
			if(modnya == 'laporan_rugi_laba'){

				if(row.kode != ''){
					//return 'background-color:#CDF8D6;'; //warna ijo toska staff AGENT
				}else{
					return 'background-color:#FFDDDD;'; // warna merah terang - staff BO
				}

			}else if(modnya == 'xxx'){

			}

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


function genformLaporan(type, modulnya, submodulnya, stswindow, p1, p2, p3, acak){
	var urlpost = host+'marketing-form/'+submodulnya;
	var urldelete = host+'marketing-simpan/'+submodulnya;
    var urlcetakpdf = host+'marketing-cetak/quotation-detail/pdf';
    var urlcetakpdfall = host+'marketing-cetak/quotation/pdf';
	var id_tambahan = "";
	var nama_file = "";
	var table = submodulnya;
	var adafilenya = false;
	var post_search = {};

	switch(submodulnya){
		case "quotation":

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

				if(submodulnya == 'quotation'){
					if(row.tipe_level != 'Marketing Header'){
						$.messager.alert('PT. Biantara Jaya Services',"Harus di Level Marketing Header",'error');
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
					$.messager.confirm('PT. Biantara Jaya Services','Anda Yakin Ingin Menghapus Data Ini ?',function(re){
						if(re){

							loadingna();
							$.post(urldelete, {'id':row.id, 'editstatus':'delete'}, function(r){
								if(r==1){
									winLoadingClose();
									$.messager.alert('PT. Biantara Jaya Services',"Data Terhapus",'info');
									$("#grid_"+submodulnya).treegrid('reload');
								}else{
									winLoadingClose();
									$.messager.alert('PT. Biantara Jaya Services',"Gagal Menghapus Data "+r,'error');
								}
							});
						}
					});
					//}
				}

			}else{
				$.messager.alert('PT. Biantara Jaya Services',"Pilih Data Yang Akan Dihapus/Diedit",'error');
			}
		break;
		case "print-all":
			if(submodulnya == 'quotation'){
				post_search['kat_tgl'] = $('#kat_tgl_'+acak).val();
				post_search['date_start'] = $('#date_start_'+acak).val();
				post_search['date_end'] = $('#date_end_'+acak).val();
				post_search['kat'] = $('#kat_'+acak).val();
				post_search['key'] = $('#key_'+acak).val();
				post_search['tp'] = 'cetak';

				openWindowWithPost(urlcetakpdfall, post_search);
			}
		break;
		case "print":
			if(submodulnya == 'quotation'){
				var row = $("#grid_"+submodulnya).datagrid('getSelected');
				if(row){
					if(row.tipe_level != 'Marketing Header'){
						$.messager.alert('PT. Biantara Jaya Services',"Harus di Level Marketing Header",'error');
						return false;
					}
					openWindowWithPost(urlcetakpdf,{tp:'cetak',id:row.id});
				}else{
					$.messager.alert('PT. Biantara Jaya Services',"Pilih Data Yang Akan di Cetak",'error');
				}
			}
		break;


		case "cetak_kontrak_perusahaan":
		case "cetak_kontrak_pribadi":
		case "cetak_perusahaan":
		case "cetak_pribadi":
		case "cetak_request_pengambilan":
		case "cetak_history_pengambilan":
		case "cetak_history_create_penerimaan":
		case "cetak_penerimaan":
		case "cetak_opr_spj":
		case "cetak_opr_order":
		case "cetak_ppn":
		case "cetak_pph":
		case "cetak_kas":
		case "cetak_kas_pelaksana":
		case "cetak_lap_belanja":
		case "cetak_order_selesai":
		case "cetak_order_dokumen":
		case "cetak_order_legal":
		case "cetak_order_visa":
			post_search['tipe_order'] = p2;
			var ulr_cetak = host+"laporan-cetak/"+submodulnya+"/"+p1
			openWindowWithPost(ulr_cetak, post_search);
		break;
		case "cetak_laporan_laba":
		    if(submodulnya == 'laporan_laba'){
				post_search['date_start'] = $('#date_start1_'+acak).val();
				post_search['date_end'] = $('#date_end1_'+acak).val();

			}
			if(submodulnya == 'laporan_laba_ape'){
				post_search['date_start'] = $('#date_start1_'+acak).val();
				post_search['date_end'] = $('#date_end1_'+acak).val();

			}
			if(submodulnya == 'laporan_laba_tbp'){
				post_search['date_start'] = $('#date_start1_'+acak).val();
				post_search['date_end'] = $('#date_end1_'+acak).val();

			}
			post_search['tipe_order'] = p2;
			var ulr_cetak = host+"laporan-cetak/"+submodulnya+"/"+p1
			openWindowWithPost(ulr_cetak, post_search);
		break;
		case "cetak_laporan_jns_barang":
		case "cetak_laporan_jns_barang_final":

			post_search['key'] = $('#key_'+acak).val();
			post_search['kat'] = $('#kat_'+acak).val();


			var ulr_cetak = host+"laporan-cetak/"+submodulnya+"/"+p1
			openWindowWithPost(ulr_cetak, post_search);
		break;
		case "cetak_laporan_data_anggaran":

			post_search['key'] = $('#key_'+acak).val();
			post_search['kat'] = $('#kat_'+acak).val();


			var ulr_cetak = host+"laporan-cetak/"+submodulnya+"/"+p1
			openWindowWithPost(ulr_cetak, post_search);
		break;

	}
}

function cariDataLaporan(mod, acaknya, sts_data, tipe_order){
	var post_search = {};

	post_search['kat'] = $('#kat_'+acaknya).val();
	post_search['key'] = $('#key_'+acaknya).val();
	post_search['cl_coa'] = $('#cl_coa_'+acaknya).val();
	post_search['date_start'] = $('#date_start1_'+acaknya).val();
	post_search['date_end'] = $('#date_end1_'+acaknya).val();
	$('#grid_'+mod).datagrid('reload', post_search);
}
function reloadGridLaporan(mod, acaknya, sts_data, tipe_order){
	var post_search = {};

	$('#key_'+acaknya).val('');
	post_search['kat'] = $('#kat_'+acaknya).val();
	post_search['key'] = $('#key_'+acaknya).val();
	post_search['cl_coa'] = $('#cl_coa_'+acaknya).val();
	post_search['date_start'] = $('#date_start1_'+acaknya).val();
	post_search['date_end'] = $('#date_end1_'+acaknya).val();
	$('#grid_'+mod).datagrid('reload', post_search);
}

function cariTreeGridDataLaporan(mod, acaknya, sts_data, tipe_order){
	var post_search = {};

	post_search['kat'] = $('#kat_'+acaknya).val();
	post_search['key'] = $('#key_'+acaknya).val();
	post_search['kat_tgl'] = $('#kat_tgl_'+acaknya).val();
	post_search['tgl_mulai'] = $('#date_start_'+acaknya).val();
	post_search['tgl_akhir'] = $('#date_end_'+acaknya).val();
	post_search['status_data'] = sts_data;
	post_search['tipe_order'] = tipe_order;
	post_search['tipe_klien'] = $('#tipe_klien_'+acaknya).val();
	post_search['jenis_request'] = $('#jenis_request_'+acaknya).val();
	post_search['status_data_filter'] = $('#status_data_'+acaknya).val();
	post_search['tipe_order_filter'] = $('#tipe_order_'+acaknya).val();

	post_search['status_invoice'] = $('#status_invoice_'+acaknya).val();
	post_search['tipe_pajak'] = $('#tipe_pajak_'+acaknya).val();

	$('#grid_'+mod).treegrid('reload', post_search);
}

function reloadTreeGridGridLaporan(mod, acaknya, sts_data, tipe_order){
	var post_search = {};

	$('#key_'+acaknya).val('');
	$('#kat_tgl_'+acaknya).val('');
	$('#date_start_'+acaknya).val('');
	$('#date_end_'+acaknya).val('');
	$('#tipe_klien_'+acaknya).val('');
	$('#jenis_request_'+acaknya).val('');
	$('#status_data_'+acaknya).val('');
	$('#jenis_order_'+acaknya).val('');

	$('#status_invoice_'+acaknya).val('');
	$('#tipe_pajak_'+acaknya).val('');

	post_search['kat'] = $('#kat_'+acaknya).val();
	post_search['key'] = $('#key_'+acaknya).val();
	post_search['kat_tgl'] = $('#kat_tgl_'+acaknya).val();
	post_search['tgl_mulai'] = $('#date_start_'+acaknya).val();
	post_search['tgl_akhir'] = $('#date_end_'+acaknya).val();
	post_search['status_data'] = sts_data;
	post_search['tipe_order'] = tipe_order;
	post_search['tipe_klien'] = $('#tipe_klien_'+acaknya).val();
	post_search['jenis_request'] = $('#jenis_request_'+acaknya).val();
	post_search['status_data_filter'] = $('#status_data_'+acaknya).val();
	post_search['tipe_order_filter'] = $('#jenis_order_'+acaknya).val();

	post_search['status_invoice'] = $('#status_invoice_'+acaknya).val();
	post_search['tipe_pajak'] = $('#tipe_pajak_'+acaknya).val();

	$('#grid_'+mod).treegrid('reload', post_search);
}
