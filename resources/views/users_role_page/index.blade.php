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
                    <button type="button" class="btn btn-success" onclick="modal_crud('Tambah')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                        Tambah
                    </button>
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
                            <div class="col-xxl-4 col-md-6 p-3">
                                <label>Filter UserName</label>
                                <input id='username_id' name="username_id" />
                            </div>
                            <div class="col-xxl-3 col-md-2 mb-3">
                                <label>Filter Role</label>
                                <select id="roles_id" name="roles_id[]" multiple="multiple" class="form-control"></select>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table id="dataTable" class="table table-striped table-bordered table-sm " cellspacing="0"
                            width="100%">
                                <thead>
                                    <tr>
                                        <th width="10%">Nomor</th>
                                        <th width="20%">Users</th>
                                        <th width="70%">Pages</th>
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
<script type="text/javascript">
    $(function () {
        var table = $('#dataTable').DataTable({
            dom: 'lrtip',
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('users_role_page.create') }}",
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
                    data: 'name',
                    name: 'User',
                    render: function (data, type, row) {
                        return `<button class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm" type="button" target="_blank" onclick="modal_crud('`+row.id+`', '`+row.name+`')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">`+data.trim()+`</button>`;
                    }
                },{
                    data: 'pages',
                    name: 'Pages'
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

    function modal_crud(id, username, nama_lengkap, role_id, role_name){
        $('#modal_content').html(`
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel"><span class="badge badge-label bg-primary"><i class="mdi mdi-circle-medium"></i> ${username}</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <table id="productJasa" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="100px">Nama Pages</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        `)
        url = "{{ url('users_role_page') }}/"+id+"/edit"

        var table = $('#productJasa').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: url,
            },
            columns: [{
                    data: 'name',
                    name: 'Nama Pages'
                },{
                    data: 'role_id',
                    name: 'Action',
                    render: function (data, type, row) {
                        status = data !== null ? "Aktif" : "Tidak Aktif"
                        checked = data !== null ? "Checked" : ""
                        return `
                        <div class="form-check form-switch form-switch-success mb-3">
                            <input class="form-check-input" type="checkbox" role="switch" ${checked} id="swicth${row.id}" onclick="modal_role_status(${id},${row.id})">
                            <label class="form-check-label" for="SwitchCheck3" id="labelSwicth${row.id}">${status}</label>
                        </div>
                        `
                    }
                }
            ]
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    }

    function modal_role_status(role_id, permission_id){
        var status = $('#swicth'+permission_id).is(':checked') ? 1 : 0

        status ? $('#labelSwicth'+permission_id).text('Aktif') : $('#labelSwicth'+permission_id).text('Tidak Aktif')

        Fdata = new FormData()
        Fdata.append('role_id', role_id )
        Fdata.append('permission_id', permission_id )
        Fdata.append('status', status )
        Fdata.append('_token', "{{ csrf_token() }}" )

        $.ajax({
            type: "POST",
            url: "{{ route('users_role_page.store') }}",
            data: Fdata,
            processData: false,
            contentType: false,
            success: function (result) {
                $('#dataTable').DataTable().ajax.reload()
            }
        });
    }

    $('#roles_id').select2({
        allowClear: true,
        width: '100%',
        ajax: {
            url: "{{ route('api.roles') }}",
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
