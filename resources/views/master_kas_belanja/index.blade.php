@extends('layouts.master')

@section('title') {{ $title }} @endsection

@section('content')

@include('components.breadcrumb')
@include('sweetalert::alert')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="customerList">
                        <div class="col-sm-auto mb-3">
                            @hasrole('finance')
                                <button id="approve_filter" type="button" class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                                    Approve ({{ $all }})
                                </button>
                            @else
                                <button id="create_filter" type="button" class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                                    Create ({{ $all }})
                                </button>
                            @endhasrole
                            <button id="on_progress_filter" type="button" class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                                On Progress
                            </button>
                            <button id="prosess_filter" type="button" class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                                Prosess (30)
                            </button>
                            <button id="cancell_filter" type="button" class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                                Cancel (30)
                            </button>
                            <button id="done_filter" type="button" class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                                Done (30)
                            </button>
                            <button id="all_filter" type="button" class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                                All (30)
                            </button>
                        </div>
                        <div class="row g-3">
                            <form action="{{ route('master_kas_belanja.index') }}">
                                <div class="card mt-4">
                                    <div class="row">
                                        <div class="col-md-3 p-3">
                                            <label>Filter Tanggal</label>
                                            <input class="form-control flatpickr-input" id="q" hidden>
                                            <input type="text" class="form-control flatpickr-input" id="tanggal" name="tanggal" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" readonly="readonly" value="{{ Request::get('tanggal') }}">
                                        </div>
                                        <div class="col-md-3 p-3">
                                            <label>Sumber Dana</label>
                                            <select class="form-control" id="sumber" name="sumber">
                                                <option value="">-- ALL --</option>
                                                <option value="1" {{ Request::get('sumber') == 1 ? "selected" : "" }}>Transfer</option>
                                                <option value="2" {{ Request::get('sumber') == 2 ? "selected" : "" }}>Cash</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 p-3">
                                            <label>Filter All</label>
                                            <input type="text" id="cari" name="cari" value="{{ Request::get('cari') }}" class="form-control"
                                                placeholder="Cari semua data"
                                                aria-label="Amount (to the nearest dollar)">
                                        </div>
                                        <div class="col-md-3 p-3 text-center mt-4 float-end">
                                            <a href="{{ route('master_kas_belanja.create') }}" type="button" class="btn btn-success">
                                                Tambah
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table id="dataTable" class="table table-striped table-bordered table-sm no-wrap"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th class="text-uppercase" width="10%">No. Transaksi</th>
                                            <th class="text-uppercase">TANGGAL TRANSAKSI</th>
                                            @if($finance)
                                                <th class="text-uppercase">Role</th>
                                                <th class="text-uppercase">Username</th>
                                            @endif
                                            <th class="text-uppercase">Sumber</th>
                                            <th class="text-uppercase">Jenis Pembayaran</th>
                                            <th class="text-uppercase">Nominal</th>
                                            <th class="text-uppercase">KETERANGAN</th>
                                            <th hidden>status</th>
                                            <th class="text-uppercase" width="80px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel"
                        data-bs-backdrop="static" aria-modal="true" role="dialog" style="display: none;">
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
        $(function() {
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
                    url: "{{ route('getDataTableMasterKasBelanja') }}",
                    data: function(d) {
                        d.cari = $('#cari').val(),
                        d.tanggal = $('#tanggal').val(),
                        d.sumber = $('#sumber').val(),
                        d.tanggal = $('#tanggal').val(),
                        d.q = $('#q').val()
                    }
                },
                columns: [{
                    data: "id",
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                }, {
                    data: 'nomor_transaksi',
                    name: 'No. Transaksi',
                    render: function(data, type, row, meta) {
                        return `<a href="{{ url('master_kas_belanja') }}/` + row.id +
                            `/edit" class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm">` +
                            data + `</a>`;
                    }
                }, {
                    data: 'tanggal',
                    name: 'Tanggal Transaksi'
                }, {
                    <?php if ($finance) { ?>
                    data: 'role',
                    name: 'Role'
                }, {
                    data: 'username',
                    name: 'Username'
                }, {
                    <?php } ?>
                    data: 'banks',
                    name: 'SUMBER'
                }, {
                    data: 'jenis_transaksi',
                    name: 'JENIS PEMBAYARAN'
                }, {
                    data: 'nominals',
                    name: 'NILAI'
                }, {
                    data: 'keterangan_kas',
                    name: 'KETERANGAN'
                }, {
                    data: 'status',
                    visible: false
                }, {
                    data: 'id',
                    name: 'Action',
                    render: function(data, type, row, meta) {
                        button = `<a type="button" href="{{ url('master_kas_belanja') }}/` + row.id + `/edit" class="btn btn-warning btn-icon waves-effect waves-light"><i class="ri-pencil-fill" target="_blank"></i></a>
                        <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" onclick="konfirmasi_hapus('${data}','${row.nomor_transaksi}')" target="_blank"><i class="ri-delete-bin-5-line"></i></button>`
                        return row.status;
                    }
                }]
            });

            $('#approve_filter').click(function () {
                $('#q').val({{ App\Models\MasterKasBelanja::STATUS_CREATE }})
                resetWarna()
                $('#approve_filter').css({'color': '#f7f6fb', 'border-color': '#4E36E2', 'background-color' : '#4E36E2'})
                table.draw();
            });

            $('#create_filter').click(function () {
                $('#q').val({{ App\Models\MasterKasBelanja::STATUS_CREATE }})
                resetWarna()
                $('#create_filter').css({'color': '#f7f6fb', 'border-color': '#4E36E2', 'background-color' : '#4E36E2'})
                table.draw();
            });

            $('#on_progress_filter').click(function () {
                $('#q').val({{ App\Models\MasterKasBelanja::STATUS_ON_PROGRESS }})
                resetWarna()
                $('#on_progress_filter').css({'color': '#f7f6fb', 'border-color': '#4E36E2', 'background-color' : '#4E36E2'})
                table.draw();
            });

            $('#prosess_filter').click(function () {
                $('#q').val({{ App\Models\MasterKasBelanja::STATUS_ON_PROGRESS }})
                resetWarna()
                $('#prosess_filter').css({'color': '#f7f6fb', 'border-color': '#4E36E2', 'background-color' : '#4E36E2'})
                table.draw();
            });

            $('#cancell_filter').click(function () {
                $('#q').val({{ App\Models\MasterKasBelanja::STATUS_ON_PROGRESS }})
                resetWarna()
                $('#cancell_filter').css({'color': '#f7f6fb', 'border-color': '#4E36E2', 'background-color' : '#4E36E2'})
                table.draw();
            });

            $('#done_filter').click(function () {
                $('#q').val({{ App\Models\MasterKasBelanja::STATUS_ON_PROGRESS }})
                resetWarna()
                $('#done_filter').css({'color': '#f7f6fb', 'border-color': '#4E36E2', 'background-color' : '#4E36E2'})
                table.draw();
            });

            $('#all_filter').click(function () {
                $('#q').val({{ App\Models\MasterKasBelanja::STATUS_ON_PROGRESS }})
                resetWarna()
                $('#all_filter').css({'color': '#f7f6fb', 'border-color': '#4E36E2', 'background-color' : '#4E36E2'})
                table.draw();
            });
        });

        function resetWarna(){
            $('#approve_filter').css({'color': '#4E36E2', 'background-color' : '#ffffff', 'border-color': '#4E36E2'})
            $('#create_filter').css({'color': '#4E36E2', 'background-color' : '#ffffff', 'border-color': '#4E36E2'})
            $('#on_progress_filter').css({'color': '#4E36E2', 'background-color' : '#ffffff', 'border-color': '#4E36E2'})
            $('#prosess_filter').css({'color': '#4E36E2', 'background-color' : '#ffffff', 'border-color': '#4E36E2'})
            $('#cancell_filter').css({'color': '#4E36E2', 'background-color' : '#ffffff', 'border-color': '#4E36E2'})
            $('#done_filter').css({'color': '#4E36E2', 'background-color' : '#ffffff', 'border-color': '#4E36E2'})
            $('#all_filter').css({'color': '#4E36E2', 'background-color' : '#ffffff', 'border-color': '#4E36E2'})
        }

        resetWarna()
        $('#create_filter').css({'color': '#f7f6fb', 'border-color': '#4E36E2', 'background-color' : '#4E36E2'})
        $('#approve_filter').css({'color': '#f7f6fb', 'border-color': '#4E36E2', 'background-color' : '#4E36E2'})

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
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

        function konfirmasi_hapus(id, name) {
            Swal.fire({
                title: "Masukan Alasan menghapus data transaksi " + name,
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
                        url: "{{ route('softdelete_kas_belanja') }}",
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
