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
                    <div class="col-sm-auto mb-3">
                        <button type="button" class="btn btn-primary btn-pdf" data-bs-toggle="modal"
                            data-bs-target="#exampleModalgrid">
                            Download PDF
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="card-title mb-4">
                                <label>Tanggal</label>
                                <input type="text" class="form-control flatpickr-input active" id="cari_tanggal"
                                    name="tanggal" data-provider="flatpickr" data-date-format="d-m-Y" data-range-date="true"
                                    readonly="readonly" value="{{ Carbon\Carbon::now()->format('d-m-Y') }}">
                            </h4>
                        </div>
                        <div class="col-md-4">
                            <h4 class="card-title mb-4">
                                <label>User</label>
                                <select id="cari_user" class="form-control"></select>
                            </h4>
                        </div>
                        <div class="col-md-4">
                            <h4 class="card-title mb-4">
                                <label>Status</label>
                                <select id="cari_status" class="form-control">
                                    <option value="">Semua</option>
                                    <option value="Hadir">Hadir</option>
                                    <option value="Izin">Izin</option>
                                    <option value="Telat">Telat</option>
                                </select>
                            </h4>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-xl-12">
                            <table id="dataTable" class="table table-striped table-bordered table-sm no-wrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama </th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                        <th>Jenis</th>
                                        <th>Bukti Kehadiran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div><!-- end col -->
                    </div><!-- end row -->

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
    <script language="JavaScript">
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
                    url: "{{ route('data_absensi.create') }}",
                    data: function(d) {
                        d.cari_tanggal = $('#cari_tanggal').val(),
                            d.cari_user = $('#cari_user').val(),
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
                    data: 'namaUser',
                    name: 'User',
                    render: function(data, type, row, meta) {
                        return `<a href="/daftar_tender/${row.id}/edit" class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm">${data}</a>`;
                    }
                }, {
                    data: 'tanggal',
                    name: 'Tanggal'
                }, {
                    data: 'waktu',
                    name: 'Waktu'
                }, {
                    data: 'status',
                    name: 'Status'
                }, {
                    data: 'jenis_absen',
                    name: 'Jenis'
                }, {
                    data: 'foto',
                    name: 'Bukti Kehadiran',
                    render: function(data, type, row, meta) {
                        return `<img src="${data}" width="300" height="200" />`;
                    }
                }]
            });

            $('#cari_tanggal').change(function() {
                table.draw();
            });

            $('#cari_user').change(function() {
                table.draw();
            });

            $('#cari_status').change(function() {
                table.draw();
            });
        });

        $("#cari_user").select2({
            allowClear: true,
            width: '100%',
            ajax: {
                url: "{{ route('api.get_select2_users_karyawan') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data.data, function(item) {
                            return {
                                id: item.id,
                                text: item.name
                            }
                        })
                    };
                }
            }
        });

        $('#btn_batal').on('click', function() {
            // Clear previous modal content
            $('#modal_content').empty();

            // Populate modal with new content
            var modalBody = `
                <div class="modal-body text-center mb-3">
                    <h5 class="mb-3">Berikan Keterangan Izin</h5>
                    <div id="div_izin" class="mb-3"></div>
                    <textarea name="keterangan" id="keterangan" rows="4" class="form-control" placeholder="Tulis alasanmu disini..."></textarea>
                    <div class="d-grid gap-2 mt-3">
                        <button type="button" class="btn btn-primary mt-2" id="btn_kirim">Kirim</button>
                    </div>
                </div>
            `;
            $('#modal_content').html(modalBody);

            // Show the modal
            $("#exampleModal").modal('show');

            // Capture image with Webcam.js
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                $('#div_izin').html('<img id="img_izin" src="' + data_uri +
                    '" width="300px" height="300px" />');
            });


            // Setup CSRF headers for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#btn_kirim').on('click', function() {
                // Get image data URI and user-provided text
                var imageDataURI = $('#img_izin').attr('src');
                var keterangan = $('#keterangan').val();

                // Create FormData object
                var formData = new FormData();
                formData.append('image', imageDataURI);
                formData.append('status', 'Izin');
                formData.append('keterangan', keterangan);

                // Send AJAX request
                $.ajax({
                    type: 'post',
                    url: "{{ route('absen') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#dataTable').DataTable().ajax.reload()
                        $('#btn_kirim').props('hidden', true);
                        $('#btn_batal').props('hidden', true);
                    },
                }).done(function() {
                    // Hide the modal after successful submission
                    $('#exampleModal').modal('hide');
                });
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
            fd.append('periode', $('#cari_tanggal').val())
            $.ajax({
                type: 'post',
                url: "{{ route('data.absensi.pdf') }}",
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection
