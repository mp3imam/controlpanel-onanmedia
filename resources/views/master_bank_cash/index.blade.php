@extends('layouts.master')

@section('title') {{ $title }} @endsection

@section('content')

@include('components.breadcrumb')
@include('sweetalert::alert')
    <ul class="nav nav-tabs nav-justified nav-border-bottom animation-nav" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" data-bs-toggle="tab" href="#base-justified-home" role="tab" aria-selected="true">
                Isi Saldo Kasir
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" href="#base-justified-product" role="tab" aria-selected="false">
                Pengembalian Kas
            </a>
        </li>
    </ul>

    <div class="tab-content mt-4">
        <div class="tab-pane active" id="base-justified-home" role="tabpanel">
            <!-- Konten untuk Isi Saldo Kasir -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ route('master_bank_cash.create') }}" type="button" class="btn btn-success mb-3" >
                            Tambah
                        </a>
                        <!-- Tambahkan konten yang sesuai untuk Isi Saldo Kasir -->
                        <div class="card">
                            <div class="card-body">
                                <!-- Tabel untuk menampilkan data -->
                                <table id="dataTable" class="table table-striped w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Transaksi</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Sumber</th>
                                            <th>Jenis Transaksi</th>
                                            <th>Nominal</th>
                                            <th>Keterangan</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi tabel disini -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="base-justified-product" role="tabpanel">
            <!-- Konten untuk Pengembalian Kas -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ route('master_return_bank_cash.create') }}" type="button" class="btn btn-success mb-3">
                            Tambah
                        </a>
                        <div class="card">
                            <div class="card-body">
                                <!-- Tabel untuk menampilkan data -->
                                <table id="dataTableReturn" class="table table-striped w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Transaksi</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Tujuan</th>
                                            <th>Jenis Transaksi</th>
                                            <th>Nominal</th>
                                            <th>Keterangan</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    $(function () {
        var table = $('#dataTable').DataTable({
            dom: 'lrtip',
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('getDataTableBankCash') }}",
                data: function (d) {
                    d.cari = $('#cari').val()
                }
            },
            columns: [{
                    data: "id",
                    sortable: false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },{
                    data: 'nomor_transaksi',
                    name: 'No. Transaksi',
                    render: function (data, type, row, meta) {
                        return `<a href="{{ url('master_bank_cash') }}/`+row.id+`/edit" class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm">`+data+`</a>`;
                    }
                },{
                    data: 'tanggal_transaksi',
                    name: 'TANGGAL TRANSAKSI'
                },{
                    data: 'banks',
                    name: 'SUMBER'
                },{
                    data: 'jenis',
                    name: 'JENIS TRANSAKSI'
                },{
                    data: 'nominal_number',
                    name: 'Nilai'
                },{
                    data: 'keterangan',
                    name: 'KETERANGAN'
                }, {
                    data: 'id',
                    name: 'Action',
                    render: function(data, type, row, meta) {
                        return `
                        <a type="button" href="{{ url('master_bank_cash') }}/` + row.id + `/edit" class="btn btn-warning btn-icon waves-effect waves-light"><i class="ri-pencil-fill"></i></a>
                        <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" onclick="konfirmasi_hapus(1, '${data}','${row.nomor_transaksi}')" target="_blank"><i class="ri-delete-bin-5-line"></i></button>
                        `;
                    }
                }
            ]
        });
    });

    $(function () {
        var table = $('#dataTableReturn').DataTable({
            dom: 'lrtip',
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('getDataTableReturnBankCash') }}",
                data: function (d) {
                    d.cari = $('#cari').val()
                }
            },
            columns: [{
                    data: "id",
                    sortable: false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },{
                    data: 'nomor_transaksi',
                    name: 'No. Transaksi',
                    render: function (data, type, row, meta) {
                        return `<a href="{{ url('master_return_bank_cash') }}/`+row.id+`/edit" class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm">`+data+`</a>`;
                    }
                },{
                    data: 'tanggal_transaksi',
                    name: 'TANGGAL TRANSAKSI'
                },{
                    data: 'banks',
                    name: 'Tujuan'
                },{
                    data: 'jenis',
                    name: 'JENIS TRANSAKSI'
                },{
                    data: 'nominal_number',
                    name: 'Nilai'
                },{
                    data: 'keterangan',
                    name: 'KETERANGAN'
                }, {
                    data: 'id',
                    name: 'Action',
                    render: function(data, type, row, meta) {
                        return `
                        <a type="button" href="{{ url('master_return_bank_cash') }}/` + row.id + `/edit" class="btn btn-warning btn-icon waves-effect waves-light"><i class="ri-pencil-fill"></i></a>
                        <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" onclick="konfirmasi_hapus(2, '${data}','${row.nomor_transaksi}')" target="_blank"><i class="ri-delete-bin-5-line"></i></button>
                        `;
                    }
                }
            ]
        });

    });


    $('.btn-pdf').on('click', function(){
        $('#modal_content').html(`
            <div class="modal-body text-center p-5">
                <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:120px;height:120px"></lord-icon>

                <div class="mt-4">
                    <h4 class="mb-3">Sedang Mendownload PDF</h4>
                    <p class="text-muted mb-4"> Mohon Tunggu Sebentar. </p>
                </div>
            </div>
        `)
        $("#exampleModal").modal('show');

        var fd = new FormData()
        fd.append('username_id', $('#username_id').val())
        fd.append('nama_lengkap_id', $('#nama_lengkap_id').val())
        $.ajax({
            type:'post',
            url: "{{ route('users.pdf') }}",
            data: fd,
            processData: false,
            contentType: false,
            xhrFields: {
                responseType: 'blob' // to avoid binary data being mangled on charset conversion
            },
            success: function(blob, status, xhr) {
                // check for a filename
                var filename = "";
                var disposition = xhr.getResponseHeader('Content-Disposition');
                if (disposition && disposition.indexOf('attachment') !== -1) {
                    var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                    var matches = filenameRegex.exec(disposition);
                    if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
                }

                if (typeof window.navigator.msSaveBlob !== 'undefined') {
                    // IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
                    window.navigator.msSaveBlob(blob, filename);
                } else {
                    var URL = window.URL || window.webkitURL;
                    var downloadUrl = URL.createObjectURL(blob);

                    if (filename) {
                        // use HTML5 a[download] attribute to specify filename
                        var a = document.createElement("a");
                        // safari doesn't support this yet
                        if (typeof a.download === 'undefined') {
                            window.location.href = downloadUrl;
                        } else {
                            a.href = downloadUrl;
                            a.download = filename;
                            document.body.appendChild(a);
                            a.click();
                        }
                    } else {
                        window.location.href = downloadUrl;
                    }

                    setTimeout(function () { URL.revokeObjectURL(downloadUrl); }, 100); // cleanup
                }
            }
        }).done(function() { //use this
            $('#exampleModal').modal('hide')
        });
    })


    $('.btn-return-pdf').on('click', function(){
        $('#modal_content').html(`
            <div class="modal-body text-center p-5">
                <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:120px;height:120px"></lord-icon>

                <div class="mt-4">
                    <h4 class="mb-3">Sedang Mendownload PDF</h4>
                    <p class="text-muted mb-4"> Mohon Tunggu Sebentar. </p>
                </div>
            </div>
        `)
        $("#exampleModalReturn").modal('show');

        var fd = new FormData()
        fd.append('username_id', $('#username_id').val())
        fd.append('nama_lengkap_id', $('#nama_lengkap_id').val())
        $.ajax({
            type:'post',
            url: "{{ route('users.pdf') }}",
            data: fd,
            processData: false,
            contentType: false,
            xhrFields: {
                responseType: 'blob' // to avoid binary data being mangled on charset conversion
            },
            success: function(blob, status, xhr) {
                // check for a filename
                var filename = "";
                var disposition = xhr.getResponseHeader('Content-Disposition');
                if (disposition && disposition.indexOf('attachment') !== -1) {
                    var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                    var matches = filenameRegex.exec(disposition);
                    if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
                }

                if (typeof window.navigator.msSaveBlob !== 'undefined') {
                    // IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
                    window.navigator.msSaveBlob(blob, filename);
                } else {
                    var URL = window.URL || window.webkitURL;
                    var downloadUrl = URL.createObjectURL(blob);

                    if (filename) {
                        // use HTML5 a[download] attribute to specify filename
                        var a = document.createElement("a");
                        // safari doesn't support this yet
                        if (typeof a.download === 'undefined') {
                            window.location.href = downloadUrl;
                        } else {
                            a.href = downloadUrl;
                            a.download = filename;
                            document.body.appendChild(a);
                            a.click();
                        }
                    } else {
                        window.location.href = downloadUrl;
                    }

                    setTimeout(function () { URL.revokeObjectURL(downloadUrl); }, 100); // cleanup
                }
            }
        }).done(function() { //use this
            $('#exampleModalReturn').modal('hide')
        });
    })


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function konfirmasi_hapus(get, id, name) {
        Swal.fire({
            title: "Masukan Alasan menghapus data transaksi " + name,
            input: "text",
            inputAttributes: {
                autocapitalize: "off"
            },
            showCancelButton: true,
            confirmButtonText: "Hapus",
        }).then((result) => {
            console.log(get == 1, get);
            var getUrl = get == 1 ? "{{ route('softdelete_kas_isi_saldo') }}" : "{{ route('softdelete_pengembalian_kas') }}"
            if (result.isConfirmed && result.value) {
                var data = new FormData();
                data.append('id', id);
                data.append('alasan', result.value);
                $.ajax({
                    type: "post",
                    url: getUrl,
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        Swal.fire({
                            title: 'Hapus!',
                            text: 'Data berhasil di hapus',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: false,
                            timer: 2500
                        }).then(function() {
                            $('#dataTable').DataTable().ajax.reload()
                            $('#exampleModalgrid').modal('hide');
                        });
                    }
                });
            }

        });
    }

</script>
@endsection
