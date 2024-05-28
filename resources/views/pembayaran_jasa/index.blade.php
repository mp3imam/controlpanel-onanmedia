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
                        <div class="row g-4">
                            <div class="row mt-4">
                                <div class="col-xxl-3 col-md-3 p-3">
                                    <label>Filter</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control flatpickr-input active" id="cari_tanggal"
                                            name="cari_tanggal" data-provider="flatpickr" data-date-format="d-m-Y"
                                            data-range-date="true" readonly="readonly"
                                            value="{{ Carbon\Carbon::now()->subMonth(3)->startOfMonth()->format('d-m-Y') . ' to ' . Carbon\Carbon::now()->format('d-m-Y') }}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6 p-3">
                                    <label>Filter</label>
                                    <div class="input-group">
                                        <input type="text" id="cari" name="cari" class="form-control"
                                            placeholder="Cari semua data">
                                        <button class="input-group-text"><i class="ri-search-line"></i>&nbsp;Cari</button>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3 p-3">
                                    <label>Filter</label>
                                    <div class="input-group">
                                        <select name="cari_status" id="cari_status" class="form-control">
                                            <option value="">Semua</option>
                                            @hasrole('finance')
                                                <option value="1" selected>Approve</option>
                                                <option value="2">Belum Approve</option>
                                                <option value="3">Selesai</option>
                                            @else
                                                <option value="1">Approve</option>
                                                <option value="2" selected>Belum Approve</option>
                                                <option value="3">Selesai</option>
                                            @endhasrole
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="userRole" data-role="{{ auth()->user()->roles[0]->name }}"></div>
                        <input id="userName" type="hidden" value="{{ auth()->user()->nama_lengkap }}">

                        <div class="card">
                            <div class="card-body">
                                <table id="dataTable" class="table table-striped table-bordered table-sm no-wrap"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="z-index: 999; background-color:white">No</th>
                                            <th class="text-uppercase" width="10%"
                                                style="z-index: 999; background-color:white">Tanggal</th>
                                            <th class="text-uppercase" hidden>phone_penjual</th>
                                            <th class="text-uppercase" hidden>phone_pembeli</th>
                                            <th class="text-uppercase">Product</th>
                                            <th class="text-uppercase">Nomor Order</th>
                                            <th class="text-uppercase">Pembeli</th>
                                            <th class="text-uppercase">Penjual</th>
                                            <th class="text-uppercase">No Rek Penjual</th>
                                            <th class="text-uppercase">Status</th>
                                            <th class="text-uppercase">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel"
                        data-bs-backdrop="static" aria-modal="true" role="dialog" style="display: none;">
                        <div class="modal-dialog modal-xl">
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
            var userRole = "{{ auth()->user()->roles[0]->name }}";
            var table = $('#dataTable').DataTable({
                dom: 'lrtip',
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('data_transaksi_table') }}",
                    data: function(d) {
                        d.cari = $('#cari').val(),
                            d.cari_tanggal = $('#cari_tanggal').val()
                        d.cari_status = $('#cari_status').val()
                    }
                },
                columns: [{
                        data: "id",
                        sortable: false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    }, {
                        data: 'tanggal',
                        name: 'Tanggal'
                    }, {
                        data: 'phone_penjual',
                        visible: false
                    }, {
                        data: 'phone_pembeli',
                        visible: false
                    }, {
                        data: 'nama',
                        name: 'Product',
                        render: function(data, type, row) {
                            var btn = data.length > 15 ? data.substr(0, 15) + '...' : data;
                            var link = data.toLowerCase().replace(/ /g, '-');
                            return `<a target="_blank" href="http://www.onanmedia.com/jasa/${row.penjual}/${link}" class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm" type="button">${btn}</a>`
                        }
                    }, {
                        data: 'nomor_order',
                        name: 'Nomor Order',
                        render: function(data, type, row, meta) {
                            return userRole == 'finance' && row.status == 'Pembayaran' ?
                                `<button class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm" type="button" target="_blank" onclick="modal_crud('${row.id}','${row.tanggal}','${row.nama}','${data}', '${row.pembeli}', '${row.penjual}','${row.rekening_penjual}','${row.status}','${row.harga}','finance','Upload Foto Bukti Pembayaran Jasa')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">${data}</button>` :
                                userRole == 'help_desk' && row.status == 'Validasi' ?
                                `<button class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm" type="button" target="_blank" onclick="modal_crud('${row.id}','${row.tanggal}','${row.nama}','${data}', '${row.pembeli}', '${row.penjual}','${row.rekening_penjual}','${row.status}','${row.harga}','helpdesk','Pengecekan Jasa')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">${data}</button>` :
                                data;
                        }
                    }, {
                        data: 'pembeli',
                        name: 'Pembeli',
                        render: function(data, type, row, meta) {
                            return userRole == 'help_desk' && row.status == 'Validasi' ?
                                `<a type="button" target="_blank"
                                    href="https://api.whatsapp.com/send/?phone=${row.phone_pembeli}&text=Hallo Bpk/Ibu ${data}. Kami dari tim Onanmedia ingin bertanya terkait pekerjaan ${row.nama} dari Bpk /Ibu ${row.penjual} nomor order ${row.nomor_order} sejumlah ${row.harga}. Apakah benar sudah selesai? mohon di koreksi kembali terkait pekerjaan yang telah anda berikan, apabila sudah lebih dari 2 hari tidak ada balasan ke nomor ini, maka akan kami anggap sudah selesai. Terima kasih sudah menggunakan Onanmedia dan Semoga berkah selalu.&type=phone_number&app_absent=0"
                                    class="btn btn-outline-primary btn-border rounded-3">
                                    <i class="ri-whatsapp-fill"></i> ${data.split(" ")[0]}
                                </a>` :
                                data;
                        }
                    },
                    {
                        data: 'penjual',
                        name: 'Penjual',
                        render: function(data, type, row, meta) {
                            return userRole == 'help_desk' && row.status == 'Validasi' ?
                                `<a type="button" target="_blank"
                                    href="https://api.whatsapp.com/send/?phone=${row.phone_penjual}&text=Hallo Bpk/Ibu ${data}. Kami dari tim Onanmedia ingin memberitahukan bahwa pekerjaan ${row.nama} dari Bpk /Ibu ${row.pembeli} dengan nomor order ${row.nomor_order} sudah selesai. Apakah nomor rekening penjual ${row.rekening_penjual} sudah benar? Mohon agar dibalas kembali, agar segera kita transfer ke rekening sejumlah ${row.harga}. Terima kasih sudah menggunakan Onanmedia dan Semoga berkah selalu.&type=phone_number&app_absent=0" class="btn btn-outline-success btn-border rounded-3">
                                    <i class="ri-whatsapp-fill"></i> ${data.split(" ")[0]}
                                </a>` :
                                data;
                        }
                    },
                    {
                        data: 'rekening_penjual',
                        name: 'No Rek Penjual',
                    },
                    {
                        data: 'status',
                        name: 'Status',
                    },
                    {
                        data: 'harga',
                        name: 'Harga',
                    }
                ]
            });

            $('#cari').on('keyup', function() {
                table.draw();
            });

            $('#cari_tanggal').on('change', function() {
                table.draw();
            });

            $('#cari_status').on('change', function() {
                table.draw();
            });
        });

        function modal_crud(id, tanggal, product, nomor_order, pembeli, penjual, rekening_penjual, status, harga, role,
            judul) {
            $('#modal_content').html(`
            <div class="modal-body p-5">
                <h1 class="mb-4">${judul}</h1>
                <div class="row">
                    <div id="userRole" data-role="{{ auth()->user()->roles[0]->name }}"></div>
                    <div class="col-lg-4 mb-3">
                        <label for="formFile" class="form-label">Tanggal Pemesanan</label>
                        <input id="id" hidden value="${id}">
                        <input class="form-control" type="text" value="${tanggal}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label for="formFile" class="form-label">Product</label>
                        <input class="form-control" type="text" value="${product}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label for="formFile" class="form-label">Nomor Order</label>
                        <input class="form-control" type="text" value="${nomor_order}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label for="formFile" class="form-label">Nama Pembeli</label>
                        <input class="form-control" type="text" value="${pembeli}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label for="formFile" class="form-label">Nama Penjual</label>
                        <input class="form-control" type="text" value="${penjual}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label for="formFile" class="form-label">Rek Penjual</label>
                        <input class="form-control" type="text" value="${rekening_penjual}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label for="formFile" class="form-label">Status</label>
                        <input class="form-control" type="text" value="${status}" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label for="formFile" class="form-label">Harga</label>
                        <input class="form-control" type="text" value="${harga}" readonly>
                    </div>
                    @if (auth()->user()->roles[0]->name == 'finance')
                        <div class="col-lg-12 mb-3">
                            <label for="formFile" class="form-label">Upload Bukti Pembayaran</label>
                            <input class="form-control" id="formFile" type="file" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                        <button class="btn btn-primary form-control mt-4 btn-pembayaran-jasa">Upload Bukti Pembayaran</button>
                    @else
                        <div class="col-lg-6 mb-3">
                        <button class="btn btn-primary form-control mt-4 btn-pembayaran-jasa">Approve</button>
                    @endif
                        </div>
                        <div class="col-lg-6 mb-3">
                            <button class="btn btn-warning form-control mt-4" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
            `)
            $("#exampleModalgrid").modal('show');
            $('.btn-pembayaran-jasa').on('click', function() {
                if (!confirm('Anda yakin ingin approve?')) return false

                if (userRole === 'finance')
                    if (!$('#formFile').val()) return false

                var userRole = $('#userRole').data('role');
                var userName = $('#userName').val();
                var fd = new FormData()
                fd.append('id', id)
                fd.append('userName', userName)
                fd.append('userRole', userRole)
                if (userRole === 'finance') fd.append('foto_bukti_transfer_manual', $('#formFile').val())
                $.ajax({
                    type: 'post',
                    url: "{{ route('data_transaksi.store') }}",
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.status == 200) {
                            $('#dataTable').DataTable().ajax.reload()
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Data Berhasil di approve',
                                icon: 'success',
                                timer: 1500
                            })
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Data Error',
                                icon: 'danger',
                                timer: 1500
                            })
                        }
                    }
                }).done(function() { //use this
                    $('#exampleModalgrid').modal('hide')
                });
            })

        }

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
    </script>
@endsection
