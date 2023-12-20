@extends('layouts.master')

@section('title') {{ $title }} @endsection

@section('content')

@include('components.breadcrumb')
@section('content')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <ul class="nav nav-tabs nav-justified card-header-tabs mb-3" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" data-bs-toggle="tab" href="#base-justified-home" role="tab" aria-selected="false" tabindex="-1">
                Isi Saldo Kasir
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" href="#base-justified-product" role="tab" aria-selected="true">
                Pengembalian Kas Pelaksana
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active show" id="base-justified-home" role="tabpanel">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="customerList">
                                <div class="col-sm-auto mb-3">
                                    <a href="{{ route('master_bank_cash.create') }}" type="button" class="btn btn-success" >
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
                                            <div class="input-group">
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                <span class="input-group-text"><i class="ri-search-line"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <table id="dataTable" class="table table-striped table-bordered table-sm no-wrap" cellspacing="0"
                                        width="200%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th class="text-uppercase" width="10%">No. Transaksi</th>
                                                    <th class="text-uppercase">TGL. TRANSAKSI</th>
                                                    <th class="text-uppercase">SUMBER</th>
                                                    <th class="text-uppercase">JENIS TRANSAKSI</th>
                                                    <th class="text-uppercase">USER PELAKSANA</th>
                                                    <th class="text-uppercase">NILAI</th>
                                                    <th class="text-uppercase">KETERANGAN</th>
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
        </div>
        <div class="tab-pane active" id="product" role="tabpanel">
            <h6>Pengembalian Kas Pelaksana</h6>
            <p class="mb-0">
                -
            </p>
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
                url: "{{ route('getDataTableBankCash') }}",
                data: function (d) {
                    d.username_id = $('#username_id').val()
                    d.roles_id = $('#roles_id').val()
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
                    name: 'TGL. TRANSAKSI'
                },{
                    data: 'banks',
                    name: 'SUMBER'
                },{
                    data: 'jenis_transaksi',
                    name: 'JENIS TRANSAKSI'
                },{
                    data: 'user',
                    name: 'USER PELAKSANA'
                },{
                    data: 'nilai',
                    name: 'NILAI'
                },{
                    data: 'keterangan',
                    name: 'KETERANGAN'
                }
            ]
        });

        $('#username_id').keyup(function () {
            table.draw();
        });

        $('#roles_id').change(function () {
            table.draw();
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
</script>
@endsection
