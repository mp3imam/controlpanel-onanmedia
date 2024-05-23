@extends('layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @include('components.breadcrumb')
    @include('sweetalert::alert')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="customerList">
                        <div class="col-sm-auto mb-3">
                            <a href="{{ route('master_coa.create') }}" type="button" class="btn btn-success">
                                Tambah
                            </a>
                            {{-- <a type="button" class="btn btn-primary btn-label btn-pdf">
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
                        </a> --}}
                        </div>
                        <div class="row g-4">
                            <div class="row mt-4">
                                <div class="col-xxl-12 col-md-6 p-3">
                                    <label>Filter</label>
                                    <div class="input-group">
                                        <input type="text" id="cari" name="cari" class="form-control"
                                            placeholder="Cari semua data">
                                        <button class="input-group-text"><i class="ri-search-line"></i>&nbsp;Cari</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table id="dataTable" class="table table-striped table-bordered table-sm no-wrap"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="z-index: 999; background-color:white">No</th>
                                            <th class="text-uppercase" width="10%"
                                                style="z-index: 999; background-color:white">Tanggal Pemesanan</th>
                                            <th class="text-uppercase">Product</th>
                                            <th class="text-uppercase">Nomor Order</th>
                                            <th class="text-uppercase">Pembeli</th>
                                            <th class="text-uppercase">Penjual</th>
                                            <th class="text-uppercase">Status</th>
                                            <th class="text-uppercase">Harga</th>
                                            <th class="text-uppercase">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel"
                        data-bs-backdrop="static" aria-modal="true" role="dialog" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content" id="modal_content"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        #dataTable tbody td {
            z-index: 999;
            background-color: white;
        }
    </style>
@endsection

@section('script')
    <script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var table = $('#dataTable').DataTable({
                dom: 'lrtip',
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('data_transaksi_table') }}",
                    data: function(d) {
                        d.cari = $('#cari').val()
                    }
                },
                columns: [{
                    data: "id",
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                }, {
                    data: 'createdAt',
                    name: 'Tanggal Pemesanan'
                }, {
                    data: 'nama',
                    name: 'Product'
                }, {
                    data: 'nomor_order',
                    name: 'Nomor Order'
                }, {
                    data: 'pembeli',
                    name: 'Pembeli'
                }, {
                    data: 'penjual',
                    name: 'Penjual',
                }, {
                    data: 'status',
                    name: 'Status',
                }, {
                    data: 'harga',
                    name: 'Harga',
                }, {
                    data: 'id',
                    name: 'Action',
                    render: function(data, type, row, meta) {
                        return `<a href="{{ url('master_coa') }}/` + row.id +
                            `/edit" class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm">` +
                            data + `</a>`;
                    }
                }]
            });

            $('#cari').on('keyup', function() {
                table.draw();
            });
        });

        $('.btn-pdf').on('click', function() {
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
                type: 'post',
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

                        setTimeout(function() {
                            URL.revokeObjectURL(downloadUrl);
                        }, 100); // cleanup
                    }
                }
            }).done(function() { //use this
                $('#exampleModal').modal('hide')
            });
        })
    </script>
@endsection
