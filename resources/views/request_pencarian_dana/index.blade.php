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
                    <div class="card">
                        <div class="card-body">
                            <table id="dataTable" class="table table-striped table-bordered table-sm no-wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th width="100px">Nama User</th>
                                        <th>Nilai</th>
                                        <th>Jenis</th>
                                        <th>Nama Rekening</th>
                                        <th>No Rekening</th>
                                        <th>ID Bank</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" data-bs-backdrop="static" aria-modal="true" role="dialog" style="display: none;">
                    <div class="modal-dialog modal-xl">
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
                url: "{{ route('request_pencarian_dana.create') }}",
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
                    data: 'userid',
                    name: 'Nama User',
                    render: function (data, type, row, meta) {
                        return `<button class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm" type="button" target="_blank" onclick="modal_crud('`+row.id+`', '`+row.userId+`', '`+row.nilai+`', '`+row.namaRekening+`', '`+row.rekening+`', '`+row.msbankid+`', '`+row.status+`')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">`+data+`</button>`;
                    }
                },{
                    data: 'nilai',
                    name: 'Nilai'
                },{
                    data: 'userid',
                    name: 'Jenis',
                    render: function (data) {
                        return ''
                    }
                },{
                    data: 'namaRekening',
                    name: 'Nama Rekening'
                },{
                    data: 'rekening',
                    name: 'No Rekening'
                },{
                    data: 'msbankid',
                    name: 'ID Bank'
                },{
                    data: 'status',
                    name: 'Status'
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

    function modal_crud(id, userId, nilai, namaRekening, rekening, msbankid, status){
        $('#modal_content').html(`
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Details Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">Nama User</div>
                                <div class="col-md-8">: ${userId}</div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">Nilai</div>
                                <div class="col-md-8">: ${nilai}</div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">Jenis</div>
                                <div class="col-md-8">: -</div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">Nama Rekening</div>
                                <div class="col-md-8">: ${userId}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">No. Rekening</div>
                                <div class="col-md-8">: ${rekening}</div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">ID Bank</div>
                                <div class="col-md-8">: ${msbankid}</div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">Status</div>
                                <div class="col-md-8">: ${status}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
            </div>
        `)

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    }

    function alert_delete(id, nama){
        Swal.fire({
        title: `Hapus Data Satker`,
        text: "Apakah anda yakin untuk menghapus data Satker '"+nama+"'",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya',
        cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "delete",
                    url: "{{ url('users') }}" + '/' + id,
                    data: {
                        "_method": 'delete',
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (result) {
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Your file has been deleted.',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: false
                        }).then(function(){
                            $('#dataTable').DataTable().ajax.reload()
                        });
                    }
                });
            }

        });
    }

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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@endsection
