function genGridHrd(modnya, divnya, lebarnya, tingginya) {
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
	var pagesizeboy = 10;
	var singleSelek = true;
	var cekonselek = false;
	var selekoncek = false;
	var nowrap_nya = true;
	var footer = false;
	var row_number = true;
	var paging = true;

	switch (modnya) {
        case "datakaryawan":
			judulnya = "";
			urlnya = "datakaryawan";
			fitnya = true;
			row_number = true;
			nowrap_nya = false;

            frozen[modnya] = [			
				{field:'penjual',title:'NIK',width:100, halign:'center',align:'center'},
			];
			kolom[modnya] = [
				{ field: 'nama', title: 'Nama Karyawan', width: 200, halign: 'center', align: 'left' },
				{ field: 'url', title: 'Tanggal Mulai Kerja', width: 200, halign: 'center', align: 'center' },
				{ field: 'url', title: 'Jenis Kelamin', width: 150, halign: 'center', align: 'center' },
				{ field: 'url', title: 'Divisi', width: 150, halign: 'center', align: 'center' },
				{ field: 'url', title: 'Jabatan', width: 150, halign: 'center', align: 'center' },
			];
            
        break;
    }

    urlglobal = host + 'hrdapps/datagrid/' + urlnya;
	grid_nya_onan = $("#" + divnya).datagrid({
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
		checkOnSelect: cekonselek,
		selectOnCheck: selekoncek,

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