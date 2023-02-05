
var grid_nya;
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
if (dd < 10) { dd = '0' + dd }
if (mm < 10) { mm = '0' + mm }
today = yyyy + '-' + mm + '-' + dd;

function getClientHeight() {
	var theHeight;
	if (window.innerHeight)
		theHeight = window.innerHeight;
	else if (document.documentElement && document.documentElement.clientHeight)
		theHeight = document.documentElement.clientHeight;
	else if (document.body)
		theHeight = document.body.clientHeight;

	return theHeight;
}

function getClientWidth() {
	var theWidth;
	if (window.innerWidth)
		theWidth = window.innerWidth;
	else if (document.documentElement && document.documentElement.clientWidth)
		theWidth = document.documentElement.clientWidth;
	else if (document.body)
		theWidth = document.body.clientWidth;

	return theWidth;
}


function genGrid(modnya, divnya, lebarnya, tingginya, par1) {
	if (lebarnya == undefined) {
		lebarnya = getClientWidth() - 250;
	}
	if (tingginya == undefined) {
		tingginya = getClientHeight() - 450;
	}

	var kolom = {};
	var frozen = {};
	var judulnya;
	var param = {};
	var urlnya;
	var urlglobal = "";
	var url_detil = "";
	var post_detil = {};
	var fitnya;
	var klik = false;
	var doble_klik = false;
	var pagesizeboy = 50;
	var singleSelek = true;
	var nowrap_nya = true;
	var footer = false;
	var row_number = true;
	var paging = true;

	switch (modnya) {

		case "main-invoice":
			judulnya = "";
			urlnya = "invoice";
			fitnya = true;
			param = par1;
			row_number = true;
			nowrap_nya = false;

			kolom[modnya] = [
				{ field: 'no_order', title: 'No. Order', width: 150, halign: 'center', align: 'center' },
				{ field: 'tanggal_order', title: 'Tanggal Order', width: 150, halign: 'center', align: 'center' },
				{ field: 'jenis_request', title: 'Jenis Request Order', width: 150, halign: 'center', align: 'center' },
				{ field: 'nama_layanan', title: 'Layanan Order', width: 350, halign: 'center', align: 'left' },
				{ field: 'status_data', title: 'Status Order', width: 170, halign: 'center', align: 'center' },
			];
			break;
		case "main-order":
			judulnya = "";
			urlnya = "order";
			fitnya = true;
			param = par1;
			row_number = true;
			nowrap_nya = false;

			kolom[modnya] = [
				{ field: 'no_order', title: 'No. Order', width: 150, halign: 'center', align: 'center' },
				{ field: 'tanggal_order', title: 'Tanggal Order', width: 150, halign: 'center', align: 'center' },
				{ field: 'jenis_request', title: 'Jenis Request Order', width: 150, halign: 'center', align: 'center' },
				{ field: 'nama_layanan', title: 'Layanan Order', width: 350, halign: 'center', align: 'left' },
				{ field: 'status_data', title: 'Status Order', width: 170, halign: 'center', align: 'center' },
			];
			break;
		case "main-penjual":
			judulnya = "";
			urlnya = "penjual";
			fitnya = true;
			param = par1;
			row_number = true;
			nowrap_nya = false;

			kolom[modnya] = [
				{ field: 'fullname', title: 'Fullname', width: 150, halign: 'center', align: 'left' },
				{ field: 'phone', title: 'Phone', width: 150, halign: 'center', align: 'left' },
				{ field: 'email', title: 'Email', width: 150, halign: 'center', align: 'left' },
				{ field: 'tgl_daftar', title: 'Tanggal Daftar', width: 350, halign: 'center', align: 'center' },
			];
			break;
		case "main-pembeli":
			judulnya = "";
			urlnya = "pembeli";
			fitnya = true;
			param = par1;
			row_number = true;
			nowrap_nya = false;

			kolom[modnya] = [
				{ field: 'fullname', title: 'Fullname', width: 150, halign: 'center', align: 'left' },
				{ field: 'phone', title: 'Phone', width: 150, halign: 'center', align: 'left' },
				{ field: 'email', title: 'Email', width: 150, halign: 'center', align: 'left' },
				{ field: 'tgl_daftar', title: 'Tanggal Daftar', width: 350, halign: 'center', align: 'center' },
			];
			break;
		case "main-skill-penjual":
			judulnya = "";
			urlnya = "skill_penjual";
			fitnya = true;
			param = { 'user_id': par1 };
			row_number = true;
			nowrap_nya = false;

			kolom[modnya] = [
				{ field: 'name', title: 'Keahlian', width: 400, halign: 'center', align: 'center' },
				{ field: 'level', title: 'Level', width: 400, halign: 'center', align: 'center' }
			];
			break;
		case "main-sertifikat-penjual":
			judulnya = "";
			urlnya = "sertifikat_penjual";
			fitnya = true;
			param = { 'user_id': par1 };
			row_number = true;
			nowrap_nya = false;

			kolom[modnya] = [
				{ field: 'title', title: 'Nama Sertifikat', width: 350, halign: 'center', align: 'center' },
				{ field: 'published_by', title: 'Dikeluarkan Oleh', width: 250, halign: 'center', align: 'center' },
				{ field: 'year', title: 'Tahun', width: 250, halign: 'center', align: 'center' },
			];
			break;
		case "main-layanan-jasa-penjual":
			judulnya = "";
			urlnya = "layanan_jasa_penjual";
			fitnya = true;
			param = { 'user_id': par1 };
			row_number = true;
			nowrap_nya = false;

			kolom[modnya] = [
				{ field: 'judul_jasa', title: 'Nama Layanan Jasa', width: 350, halign: 'center', align: 'center' },
				{ field: 'nm_kategori', title: 'Kategori', width: 350, halign: 'center', align: 'center' },
				{ field: 'nm_subkategori', title: 'Subkategori', width: 350, halign: 'center', align: 'center' },
				{ field: 'tgl_input', title: 'Tanggal Input', width: 250, halign: 'center', align: 'center' },
			];
			break;
		case "main-transaksi-berlangsung":
			judulnya = "";
			urlnya = "transaksi_berlangsung";
			fitnya = true;
			param = par1;
			row_number = true;
			nowrap_nya = false;

			kolom[modnya] = [
				{ field: 'kode', title: 'Kode', width: 150, halign: 'center', align: 'center' },
				{ field: 'penawaran', title: 'Penawaran', width: 150, halign: 'center', align: 'center' },
				{ field: 'nm_activity', title: 'Aktivitas', width: 150, halign: 'center', align: 'center' },
				{ field: 'nm_penjual', title: 'Penjual', width: 350, halign: 'center', align: 'center' },
				{ field: 'nm_pembeli', title: 'Pembeli', width: 170, halign: 'center', align: 'center' },
				{ field: 'created', title: 'Tanggal Transaksi', width: 170, halign: 'center', align: 'center' },
			];
			break;

		// case "user_group":
		// 	judulnya = "";
		// 	urlnya = "cl_user_group";
		// 	fitnya = true;
		// 	param=par1;
		// 	row_number=true;

		// 	kolom[modnya] = [
		// 		{field:'user_group',title:'Nama User Grup',width:250, halign:'center',align:'left'},				
		// 		{field:'id',title:'Pengaturan Akses',width:120, halign:'center',align:'center',
		// 			formatter:function(value,rowData,rowIndex){
		// 				return '<button href="javascript:void(0)" onClick="kumpulAction(\'userrole\',\''+rowData.id+'\',\''+rowData.user_group+'\')" class="easyui-linkbutton" data-options="iconCls:\'icon-save\'">Pengaturan</button>';
		// 			}
		// 		},					
		// 	];
		// break;
		// case "user_mng":
		// 	judulnya = "";
		// 	urlnya = "tbl_user";
		// 	fitnya = true;
		// 	param=par1;
		// 	row_number=true;

		// 	kolom[modnya] = [
		// 		{field:'username',title:'Username',width:150, halign:'center',align:'left'},				
		// 		{field:'nama_lengkap',title:'Nama Lengkap',width:250, halign:'center',align:'left'},				
		// 		{field:'user_group',title:'User Grup',width:190, halign:'center',align:'center'},								
		// 	];
		// break;

	}
	// urlglobal = host + 'bjsdigital-data/' + urlnya;
	urlglobal = host + 'onanmedia-data/' + urlnya;
	grid_nya = $("#" + divnya).datagrid({
		title: judulnya,
		height: tingginya,
		width: lebarnya,
		rownumbers: row_number,
		iconCls: 'database',
		fit: fitnya,
		striped: true,
		pagination: paging,
		remoteSort: false,
		showFooter: footer,
		singleSelect: singleSelek,
		url: urlglobal,
		nowrap: nowrap_nya,
		pageSize: pagesizeboy,
		pageList: [10, 20, 30, 40, 50, 100, 200],
		queryParams: param,
		frozenColumns: [
			frozen[modnya]
		],
		columns: [
			kolom[modnya]
		],
		onLoadSuccess: function (d) {
			$('.btn_grid').linkbutton();
		},
		onClickRow: function (rowIndex, rowData) {
			if (modnya == 'ldap_user') {
				$('#user_ldap').val(rowData.samaccountname);
				$('#user_na').html(rowData.samaccountname);
				$('#nama_na').html(rowData.displayname);
			}
			if (modnya == 'main-penjual') {
				$('#user_id').val(rowData.user_id)
				var url = host + 'detail_penjual/' + rowData.user_id;
				$('#btn_detail').attr('href', url);
				console.log(url);
			}
			if (modnya == 'main-pembeli') {
				$('#user_id').val(rowData.user_id)
				var url = host + 'detail_pembeli/' + rowData.user_id;
				$('#btn_detail').attr('href', url);
				console.log(url);
			}
		},
		onDblClickRow: function (rowIndex, rowData) {

		},
		toolbar: '#tb_' + modnya,
		rowStyler: function (index, row) {


		},
		onLoadSuccess: function (data) {
			if (data.total == 0) {
				var $panel = $(this).datagrid('getPanel');
				var $info = '<div class="info-empty" style="margin-top:20%;">Data Tidak Tersedia</div>';
				$($panel).find(".datagrid-view").append($info);
			} else {
				$($panel).find(".datagrid-view").append('');
				$('.info-empty').remove();
			}
		},
	});
}

function kumpulAction(type, p1, p2, p3, p4, p5) {
	var param = {};
	switch (type) {

		case "ubah_password":
			$.LoadingOverlay("show");
			param['editstatus'] = 'edit';
			$.post(host + 'backoffice-form/ubah_password', param, function (resp) {
				$('#headernya').html("<b>FORM UBAH PASSWORD </b>");
				$('#modalencuk').html(resp);
				$('#pesanModal').modal('show');
				$.LoadingOverlay("hide", true);
			});
			break;
		case "userrole":
			$.post(host + 'backoffice-form/form_user_role', { 'id': p1, 'editstatus': 'add' }, function (resp) {
				$('#headernya').html("<b>Form Pengaturan Hak Akses User Grup - " + p2 + "</b>");
				$('#modalencuk').html(resp);
				$('#pesanModal').modal('show');
			});
			break;
	}
}

function submit_form(frm, func) {
	var url = jQuery('#' + frm).attr("url");
	// $.messager.progress();
	jQuery('#' + frm).form('submit', {
		url: url,
		onSubmit: function () {
			var isValid = $(this).form('validate');
			if (!isValid) {
				//$.messager.progress('close');	// hide progress bar while the form is invalid
			}
			return isValid;
		},
		success: function (data) {
			if (func == undefined) {
				if (data == "1") {
					pesan('Data Sudah Disimpan ', 'Sukses');
				} else {
					pesan(data, 'Result');
				}
			} else {
				func(data);
			}
			//$.messager.progress('close');
		},
		error: function (data) {
			if (func == undefined) {
				pesan(data, 'Error');
			} else {
				func(data);
			}
		}
	});
}

function fillCombo(url, SelID, value, value2, value3, value4) {
	//if(Ext.get(SelID).innerHTML == "") return false;
	if (value == undefined) value = "";
	if (value2 == undefined) value2 = "";
	if (value3 == undefined) value3 = "";
	if (value4 == undefined) value4 = "";

	$('#' + SelID).empty();
	$.post(url, { "v": value, "v2": value2, "v3": value3, "v4": value4 }, function (data) {
		$('#' + SelID).append(data);
	});

}

function formatDate(date) {
	console.log(date);
	var y = date.getFullYear();
	var m = date.getMonth() + 1;
	var d = date.getDate();
	return y + '-' + (m < 10 ? ('0' + m) : m) + '-' + (d < 10 ? ('0' + d) : d);
}
function parserDate(s) {
	if (!s) return new Date();
	var ss = s.split('-');
	var y = parseInt(ss[0], 10);
	var m = parseInt(ss[1], 10);
	var d = parseInt(ss[2], 10);
	if (!isNaN(y) && !isNaN(m) && !isNaN(d)) {
		return new Date(y, m - 1, d)
	} else {
		return new Date();
	}
}


function clear_form(id) {
	$('#' + id).find("input[type=text], textarea,select").val("");
	//$('.angka').numberbox('setValue',0);
}

function NumberFormat(value) {

	var jml = new String(value);
	if (jml == "null" || jml == "NaN") jml = "0";
	jml1 = jml.split(".");
	jml2 = jml1[0];
	amount = jml2.split("").reverse();

	var output = "";
	for (var i = 0; i <= amount.length - 1; i++) {
		output = amount[i] + output;
		if ((i + 1) % 3 == 0 && (amount.length - 1) !== i) output = '.' + output;
	}
	//if(jml1[1]===undefined) jml1[1] ="00";
	// if(isNaN(output))  output = "0";
	return output; // + "." + jml1[1];
}

function cariData(divnya, acaknya) {
	var post_search = {};
	post_search['kat'] = $('#kat_' + acaknya).val();
	post_search['key'] = $('#key_' + acaknya).val();
	post_search['kantor_cabang'] = $('#kantor_cabang_' + acaknya).val();

	if (divnya == 'voucher_transaksi') {
		post_search['no_transaksi'] = $('#no_transaksi_' + acaknya).val();
		post_search['tgl_dokumen'] = $('#tgl_dokumen_' + acaknya).val();
	}

	$('#grid_' + divnya).datagrid('reload', post_search);
}
function reloadGrid(divnya, acaknya) {
	var post_search = {};

	$('#kat_' + acaknya).prop('selectedIndex', 0);;
	$('#key_' + acaknya).val('');
	$('#no_transaksi_' + acaknya).val('');
	$('#tgl_dokumen_' + acaknya).val('');
	$('#kantor_cabang_' + acaknya).val('').trigger('change');

	post_search['kat'] = $('#kat_' + acaknya).val();
	post_search['key'] = $('#key_' + acaknya).val();
	post_search['kantor_cabang'] = $('#kantor_cabang_' + acaknya).val();

	if (divnya == 'voucher_transaksi') {
		$('#no_transaksi_' + acaknya).val('');
		$('#tgl_dokumen_' + acaknya).val('');

		post_search['no_transaksi'] = $('#no_transaksi_' + acaknya).val();
		post_search['tgl_dokumen'] = $('#tgl_dokumen_' + acaknya).val();
	}

	$('#grid_' + divnya).datagrid('reload', post_search);
}

function formatDate(date) {
	var bulan = date.getMonth() + 1;
	var tgl = date.getDate();
	if (bulan < 10) {
		bulan = '0' + bulan;
	}

	if (tgl < 10) {
		tgl = '0' + tgl;
	}
	return date.getFullYear() + "-" + bulan + "-" + tgl;
}

function myparser(s) {
	if (!s) return new Date();
	var ss = (s.split('-'));
	var y = parseInt(ss[0], 10);
	var m = parseInt(ss[1], 10);
	var d = parseInt(ss[2], 10);
	if (!isNaN(y) && !isNaN(m) && !isNaN(d)) {
		return new Date(y, m - 1, d);
	} else {
		return new Date();
	}
}

function openWindowWithPost(url, params) {
	var newWindow = window.open(url, 'winpost');
	if (!newWindow) return false;
	var html = "";
	html += "<html><head></head><body><form  id='formid' method='post' action='" + url + "'>";

	$.each(params, function (key, value) {
		if (value instanceof Array || value instanceof Object) {
			$.each(value, function (key1, value1) {
				html += "<input type='hidden' name='" + key + "[" + key1 + "]' value='" + value1 + "'/>";
			});
		} else {
			html += "<input type='hidden' name='" + key + "' value='" + value + "'/>";
		}
	});

	html += "</form><script type='text/javascript'>document.getElementById(\"formid\").submit()</script></body></html>";
	newWindow.document.write(html);
	return newWindow;
}

function export_data(type, mod, acak) {
	var url = host + 'Basarnas-Cetak'
	var params = {};
	switch (mod) {
		case "laporan_tukin_persatker":
			params['satker'] = $('#filter_satker_' + acak).val();
			break;
		case "laporan_tukin_perkelas":
			params['kelas'] = $('#filter_kelas_' + acak).val();
			break;
	}
	params['periode'] = $('#periode_' + acak).val();
	params['mod'] = mod;
	params['type'] = type;
	openWindowWithPost(url, params);
}

function monthHPL(date) {
	var tglRumus = moment(date).format("M");

	if (tglRumus <= 3) {
		days = moment(date).add(7, 'days').format('DD');
		month = moment(date).add(9, 'month').format('MM');
		year = moment(date).format('YYYY');
	} else {
		days = moment(date).add(7, 'days').format('DD');
		month = moment(date).subtract(3, 'month').format('MM');
		year = moment(date).add(1, 'year').format('YYYY');
	}

	return year + "-" + month + "-" + days;
	//return days+"-"+month+"-"+year;
}

function getWeeks(tipe, days) {
	if (tipe == "bulan_hari") {
		var value = {
			month: Math.floor(days / 30),
			days: ((days) % 30)
		};
		return value.month + " Bulan, " + value.days + " Hari";
	} else if (tipe == "minggu_hari") {
		var value = {
			weeks: Math.floor(days / 7),
			days: ((days) % 7)
		};
		return value.weeks + " Minggu, " + value.days + " Hari";
	} else if (tipe == "bulan") {
		var value = {
			month: Math.floor(days / 30),
		};
		return value.month;
	}
}

function uniqidnya(prefix = "", random = false) {
	const sec = Date.now() * 1000 + Math.random() * 1000;
	const id = sec.toString(16).replace(/\./g, "").padEnd(14, "0");
	return `${prefix}${id}${random ? `.${Math.trunc(Math.random() * 100000000)}` : ""}`;
};

function sleep(ms) {
	return new Promise(
		resolve => setTimeout(resolve, ms)
	);
}