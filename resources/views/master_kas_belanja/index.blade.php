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
                                    Approve ({{ $create }})
                                </button>
                            @else
                                <button id="create_filter" type="button" class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                                    Create ({{ $create }})
                                </button>
                            @endhasrole
                            <button id="on_progress_filter" type="button" class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                                On Progress ({{ $on_progress }})
                            </button>
                            <button id="prosess_filter" type="button" class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                                Prosess ({{ $prosess }})
                            </button>
                            <button id="pending_filter" type="button" class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                                Pending ({{ $pending }})
                            </button>
                            <button id="cancell_filter" type="button" class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                                Cancel ({{ $tolak }})
                            </button>
                            <button id="done_filter" type="button" class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                                Done ({{ $histori }})
                            </button>
                            <button id="all_filter" type="button" class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                                All ({{ $all }})
                            </button>
                        </div>
                        <div class="row g-3">
                            <form action="{{ route('master_kas_belanja.index') }}">
                                <div class="row">
                                    <div class="col-md-4 p-3">
                                        <label>Filter Tanggal</label>
                                        <input class="form-control flatpickr-input" id="q" hidden>
                                        <input type="text" class="form-control flatpickr-input" id="tanggal" name="tanggal" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" readonly="readonly" value="{{ Request::get('tanggal') }}">
                                    </div>
                                    <div class="col-md-6 p-3">
                                        <label>Filter All</label>
                                        <input type="text" id="cari" name="cari" value="{{ Request::get('cari') }}" class="form-control"
                                            placeholder="Cari semua data"
                                            aria-label="Amount (to the nearest dollar)">
                                    </div>
                                    <div class="col-md py-2 text-center mt-4 float-end">
                                        <a href="{{ route('master_kas_belanja.create') }}" type="button" class="btn text-white fs-20 px-4" style="background-color: #4E36E2">
                                            <i class="ri-add-fill"></i> Add
                                        </a>
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
                                            <th><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" disabled ></th>
                                            <th>No</th>
                                            <th class="text-uppercase">No. Transaksi</th>
                                            <th class="text-uppercase">Tanggal Transaksi</th>
                                            @if($finance)
                                                <th class="text-uppercase">Role</th>
                                                <th class="text-uppercase">Username</th>
                                            @endif
                                            <th class="text-uppercase">Deskripsi</th>
                                            <th class="text-uppercase">Nominal</th>
                                            <th class="text-uppercase" id="data_nominal">Nominal Approve</th>
                                            <th class="text-uppercase" width="80px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    @hasrole('finance')
                                        @if ($checked_sum > 0)
                                        <tfoot id="footer_nominal">
                                                <tr>
                                                    <td class="text-end" colspan="8">
                                                        <label class="fs-20 rounded-4 py-2 px-4">Total</label>
                                                        <label class="fs-20 text-white rounded-4 py-2 px-5 pt-2" style="background-color: #4E36E2" id="checked_sum">{{ $checked_sum }}</label>
                                                    </td>
                                                    <td class="text-end mb-2" colspan="2">
                                                        <button id="approved" class="btn btn-success fs-20 text-white rounded-4 py-2 px-4" onclick="konfirmasi_id('{{ $checked_id }}','{{ $checked_sum }}')">
                                                            Approved
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        @endif
                                    @endhasrole
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
        var route = "{{ url('master_kas_belanja') }}";
        var userLogin = "{{ Auth::user()->id }}";
        $(function() {
            var table = $('#dataTable').DataTable({
                dom: 'lrtip',
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('getDataTableMasterKasBelanja') }}",
                    data: function(d) {
                        d.cari = $('#cari').val(),
                        d.tanggal = $('#tanggal').val(),
                        d.q = $('#q').val()
                    }
                },
                columns: [{
                    data: "id",
                    sortable: false,
                    render: function(data, type, row, meta) {
                        checked = "disabled"
                        if (row.checked == 1) checked = "checked onclick='this.checked=!this.checked;'"
                        if (row.checked > 1)  checked = "checked onclick='this.checked=!this.checked;' disabled"
                        return `<input type="checkbox" ${checked} >`
                    }
                }, {
                    data: "checked",
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },{
                    data: 'nomor_transaksi',
                    name: 'No. Transaksi',
                    render: function(data, type, row, meta) {
                        return '<a href="' + route +"/" + row.id + '/edit?q=' + $('#q').val() + '" class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm">' + data + '</a>';
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
                    data: 'keterangan_kas',
                    name: 'Deskripsi'
                }, {
                    data: 'nominals',
                    name: 'Nominal',
                }, {
                    data: 'nominal_approve',
                    name: 'Nominal Approve',
                    render: function(data, type, row, meta) {
                        $('#data_nominal').text('Nominal Approve')
                        if ($('#q').val() == 6) {
                            data = row.nominal_pending
                            $('#data_nominal').text('Nominal Pending')
                        }
                        if ($('#q').val() == 4) {
                            data = row.nominal_tolak
                            $('#data_nominal').text('Nominal Tolak')
                        }
                        var nominalLabel = `<label class="nominal_approve">` + data + `</label>`;
                        // Memastikan elemen '.nominal_approve' ada di DOM sebelum memformatnya
                        $(document).ready(function() {
                            $('.nominal_approve').priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
                        });
                        return nominalLabel;
                    }
                }, {
                    data: 'id',
                    name: 'Action',
                    render: function(data, type, row, meta) {
                        button = `<a type="button" href="{{ url('master_kas_belanja') }}/` + row.id + `/edit" class="btn btn-warning btn-icon waves-effect waves-light"><i class="ri-pencil-fill" target="_blank"></i></a>
                        <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" onclick="konfirmasi_hapus('${data}','${row.nomor_transaksi}')" target="_blank"><i class="ri-delete-bin-5-line"></i></button>`
                        if (userLogin == 2) button = ""
                        return row.status < 2 ? button : null;
                    }
                }]
            });

            $('#approve_filter').click(function () {
                $('#q').val({{ App\Models\MasterKasBelanja::STATUS_CREATE }})
                resetWarna()
                $('#footer_nominal').attr('hidden',false)
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
                $('#q').val({{ App\Models\MasterKasBelanja::STATUS_PROSESS }})
                resetWarna()
                $('#prosess_filter').css({'color': '#f7f6fb', 'border-color': '#4E36E2', 'background-color' : '#4E36E2'})
                table.draw();
            });

            $('#cancell_filter').click(function () {
                $('#q').val({{ App\Models\MasterKasBelanja::STATUS_TOLAK }})
                resetWarna()
                $('#cancell_filter').css({'color': '#f7f6fb', 'border-color': '#4E36E2', 'background-color' : '#4E36E2'})
                table.draw();
            });

            $('#pending_filter').click(function () {
                $('#q').val({{ App\Models\MasterKasBelanja::STATUS_PENDING }})
                resetWarna()
                route = "{{ url('list_pending_finance') }}";
                $('#pending_filter').css({'color': '#f7f6fb', 'border-color': '#4E36E2', 'background-color' : '#4E36E2'})
                table.draw();
            });

            $('#done_filter').click(function () {
                $('#q').val({{ App\Models\MasterKasBelanja::STATUS_HISTORY }})
                resetWarna()
                $('#done_filter').css({'color': '#f7f6fb', 'border-color': '#4E36E2', 'background-color' : '#4E36E2'})
                table.draw();
            });

            $('#all_filter').click(function () {
                $('#q').val("ALL")
                resetWarna()
                $('#all_filter').css({'color': '#f7f6fb', 'border-color': '#4E36E2', 'background-color' : '#4E36E2'})
                table.draw();
            });
        });

        function resetWarna(){
            $('#approve_filter').css({'color': '#828282', 'background-color' : '#ffffff', 'border-color': '#E0E0E0'})
            $('#create_filter').css({'color': '#828282', 'background-color' : '#ffffff', 'border-color': '#E0E0E0'})
            $('#on_progress_filter').css({'color': '#828282', 'background-color' : '#ffffff', 'border-color': '#E0E0E0'})
            $('#pending_filter').css({'color': '#828282', 'background-color' : '#ffffff', 'border-color': '#E0E0E0'})
            $('#prosess_filter').css({'color': '#828282', 'background-color' : '#ffffff', 'border-color': '#E0E0E0'})
            $('#cancell_filter').css({'color': '#828282', 'background-color' : '#ffffff', 'border-color': '#E0E0E0'})
            $('#done_filter').css({'color': '#828282', 'background-color' : '#ffffff', 'border-color': '#E0E0E0'})
            $('#all_filter').css({'color': '#828282', 'background-color' : '#ffffff', 'border-color': '#E0E0E0'})
            $('#footer_nominal').attr('hidden',true)
            route = "{{ url('master_kas_belanja') }}";
            $(".nominal_approve").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
        }

        resetWarna()
        $('#create_filter').css({'color': '#f7f6fb', 'border-color': '#4E36E2', 'background-color' : '#4E36E2'})
        $('#approve_filter').css({'color': '#f7f6fb', 'border-color': '#4E36E2', 'background-color' : '#4E36E2'})
        $('#footer_nominal').attr('hidden',false)
        $(".nominal_approve").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});

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
    $("#checked_sum").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
    $(".nominal_approve").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});

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

    function konfirmasi_id(id, nominal) {
        Swal.fire({
        title: "Konfirmasi Permintaan",
        text: "Transaksi Kas sebesar Rp. "+nominal,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes"
        }).then((result) => {
        if (result.isConfirmed) {
            var data = new FormData();
            data.append('id', id);
            data.append('nominal', nominal);
            $.ajax({
                type: "post",
                url: "{{ route('approve_finance') }}",
                data: data,
                processData: false,
                contentType: false,
                success: function(result) {
                    Swal.fire({
                        title: 'Berhasi;!',
                        text: 'Data berhasil di approve',
                        icon: 'success',
                        confirmButtonClass: 'btn btn-primary w-xs mt-2',
                        buttonsStyling: false,
                        timer: 2500
                    }).then(function() {
                        location.reload();
                    });
                }
            });
            }
        });
    }

</script>
@endsection
