@extends('layouts.master')

@section('title') {{ $title }} @endsection

@section('content')

@include('components.breadcrumb')
@section('content')
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div id="customerList">
                    <div class="col-sm-auto mb-3">
                        <a href="{{ route('master_jurnal.create') }}" type="button" class="btn btn-success" >
                            Tambah
                        </a>
                        <a type="button" class="btn btn-primary btn-label btn-pdf">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <i class="bx bxs-file-pdf label-icon align-middle fs-16 me-2"></i>
                                </div>
                                <div class="flex-grow-1 btn-pdf-loading" hidden>
                                    Loading...
                                </div>
                                <div class="flex-grow-1 btn-pdf-no-loading">
                                    PDF
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="row g-4">
                        <div class="row mt-4">
                            <div class="col-xxl-12 col-md-6 p-3">
                                <label>Filter</label>
                                <form action="{{ route('master_kas_belanja.index') }}">
                                    <div class="input-group">
                                            <input type="text" id="cari" name="cari" value="{{ Request::get('cari') }}" class="form-control" placeholder="Cari semua data" aria-label="Amount (to the nearest dollar)">
                                        <button class="input-group-text"><i class="ri-search-line"></i>&nbsp;Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table id="dataTable" class="table table-striped table-bordered table-sm no-wrap" cellspacing="0"
                            width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th class="text-uppercase" width="10%">No. Transaksi</th>
                                        <th class="text-uppercase">TGL. Jurnal</th>
                                        <th class="text-uppercase">Dokumen</th>
                                        {{-- <th class="text-uppercase">Rekening</th> --}}
                                        <th class="text-uppercase">Uraian</th>
                                        <th class="text-uppercase">Debet</th>
                                        <th class="text-uppercase">Kredit</th>
                                        <th class="text-uppercase">KETERANGAN</th>
                                        <th class="text-uppercase" hidden>jenis</th>
                                        <th class="text-uppercase">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" data-bs-backdrop="static" aria-modal="true" role="dialog" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content" id="modal_content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript">
    $(function () {
        var table = $('#dataTable').DataTable({
            dom: 'lrtip',
            scrollY: "400px",
            scrollX: true,
            processing: true,
            serverSide: true,
            fixedColumns: {
                left: 2,
                right: 0,
                width: 200,
                targets: 10
            },
            ajax: {
                url: "{{ route('getDataTableMasterJurnal') }}",
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
                        btn = row.tipe == 0 ? data : `<a href="{{ url('master_jurnal') }}/`+row.id+`/edit" class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm">`+data+`</a>`
                        return btn
                    }
                },{
                    data: 'tanggal_transaksi',
                    name: 'TGL. TRANSAKSI'
                },{
                    data: 'dokumen',
                    name: 'Documen'
                },{
                //     data: 'banks',
                //     name: 'Rekening'
                // },{
                    data: 'uraian',
                    name: 'Uraian'
                },{
                    data: 'debets',
                    name: 'Debet'
                },{
                    data: 'kredits',
                    name: 'Kredit'
                },{
                    data: 'keterangan_jurnal_umum',
                    name: 'KETERANGAN'
                },{
                    data: 'jenis',
                    visible: false
                },{
                    data: 'id',
                    name: 'Action',
                    render: function (data, type, row, meta) {
                        btn = row.jenis !== 0 ? `` : `
                        <a href="{{ url('master_jurnal') }}/`+row.id+`/edit" class="btn btn-ghost-warning waves-effect waves-light btn-sm"><i class="ri-pencil-fill"></i></a>

                        <button type="button" class="btn btn-danger btn-icon waves-effect waves-light float-end" onclick="konfirmasi_hapus(`+row.id+`,`+$row.nomor_transaksi+`)" target="_blank"><i class="ri-delete-bin-5-line"></i></button>
                        `
                        return btn
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

    function konfirmasi_hapus(id, name){
        Swal.fire({
            title: "Masukan Alasan menghapus data Jurnal "+name,
            input: "text",
            inputAttributes: {
                autocapitalize: "off"
            },
            showCancelButton: true,
            confirmButtonText: "Hapus",
            }).then((result) => {
            if (result.isConfirmed && result.value) {
                var data = new FormData();
                data.append('id', id);
                data.append('alasan', result.value);
                $.ajax({
                    type: "post",
                    url: "{{ route('softdelete_jurnal_umum') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        Swal.fire({
                            title: 'Hapus!',
                            text: 'Data berhasil di hapus',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: false,
                            timer: 2500
                        }).then(function(){
                            window.location.href = "{{ route('master_jurnal.index') }}";
                        });
                    }
                });
            }

        });
    }

</script>
@endsection
