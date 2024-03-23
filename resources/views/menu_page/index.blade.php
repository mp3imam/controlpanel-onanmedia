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
                    </div>
                    <div class="row g-4">
                        <div class="row mt-4">
                            <div class="col-md-6 col-md-2 mb-3">
                                <label>Filter Role</label>
                                <select id="roles_id" name="roles_id[]" multiple="multiple" class="form-control"></select>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table id="dataTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width="10%">ID</th>
                                        <th width="20%">Name</th>
                                        <th width="20%">Pengamanan</th>
                                        <th width="20%">Icon</th>
                                        <th width="20%">Url</th>
                                        <th hidden>Parent_Id</th>
                                        <th width="20%">Parent</th>
                                        <th width="20%">Posisi</th>
                                        <th width="20%">Status</th>
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
            order: [[5, 'asc'],[6, 'asc']],
            ajax: {
                url: "{{ route('menu_page.create') }}",
                data: function (d) {
                    d.roles_id = $('#roles_id').val()
                }
            },
            columns: [{
                    data: "id",
                    sortable: false
                },{
                    data: 'alias',
                    name: 'User',
                    render: function (data, type, row) {
                        return `<button class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm" type="button" target="_blank" onclick="modal_crud('`+row.id+`', '`+row.alias+`', '`+row.module_icon+`', '`+row.module_url+`', '`+row.module_parent+`', '`+row.parents+`', '`+row.module_position+`')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">`+data.trim()+`</button>`;
                    }
                },{
                    data: 'guard_name',
                    name: 'Pengamanan'
                },{
                    data: 'module_icon',
                    name: 'Icon'
                },{
                    data: 'module_url',
                    name: 'Url'
                },{
                    data: 'module_parent',
                    visible: false
                },{
                    data: 'parents',
                    name: 'Parent',
                    render: function (data) {
                        btn = data !== '-' ? `
                        <span class="badge badge-label bg-primary"><i class="mdi mdi-circle-medium"></i> ${data}</span>
                        ` : `<span class="badge badge-label bg-danger"><i class="mdi mdi-circle-medium"></i> ${data}</span>`
                        return btn
                    }
                },{
                    data: 'module_position',
                    name: 'Posisi'
                },{
                    data: 'module_status',
                    name: 'status',
                    render: function (data, type, row, meta) {
                        status = data == 1 ? "Aktif" : "Tidak Aktif"
                        checked = data == 1 ? "Checked" : ""
                        return `
                        <div class="form-check form-switch form-switch-success mb-3">
                            <input class="form-check-input" type="checkbox" role="switch" ${checked} id="swicth${row.id}" onclick="modal_status(${row.id})">
                            <label class="form-check-label" for="SwitchCheck3">${status}</label>
                        </div>
                        `
                    }
                }
            ]
        });

        $('#roles_id').change(function () {
            table.draw();
        });
    });

    function modal_crud(id, nama, icon, module_url, module_parent_id, module_parent, module_position){
        button_hapus = id ? `<a href="#" type="button" onclick="alert_delete('${id}','${nama}')" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Hapus</a>` : ''
        module_parent_modal = module_parent_id !== '0' ? `
        <div class="col-xxl-12" id="modal_parent_append">
            <label for="parent" class="form-label">Parent</label>
            <input class="form-control" id="modal_parent" hidden>
            <select id="modal_parent_id" class="form-control">
            </select>
        </div>` : ''

        $('#modal_content').html(`
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel"><span class="badge badge-label bg-primary"><i class="mdi mdi-circle-medium"></i> ${nama}</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-xxl-6" id="modal_nama_append">
                        <label for="nama" class="form-label">Nama Page</label>
                        <input class="form-control" id="modal_nama" placeholder="Enter nama" value="${nama}">
                    </div>
                    <div class="col-xxl-6" id="modal_nama_append">
                        <label for="nama" class="form-label"><i class="${icon}"></i> ${nama} Icon </label>
                        <div class="input-group">
                            <input type="text" id="modal_icon" class="form-control" aria-describedby="button-addon2" value="${icon}">
                            <button class="btn btn-outline-success" target="_blank" type="button" onclick="javascript:window.open('https://themesbrand.com/velzon/html/default/icons-remix.html', '_blank');" id="button-addon2"><i class="ri-search-line"></i></button>
                        </div>
                    </div>
                    <div class="col-xxl-6" id="modal_url_append">
                        <label for="url" class="form-label">Url</label>
                        <input class="form-control" id="modal_url" placeholder="Enter Url" value="${module_url}">
                    </div>
                    ${module_parent_modal}
                    <div class="col-xxl-6" id="modal_posisi_append">
                        <label for="posisi" class="form-label">Posisi</label>
                        <input class="form-control" id="modal_posisi" placeholder="Enter Posisi" value="${module_position}">
                    </div>
                    <div class="col-lg-12 d-flex justify-content-between">
                        <div class="d-flex">
                            ${button_hapus}
                        </div>
                        <div class="d-flex">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>&nbsp;
                            <button type="submit" class="btn btn-primary add" id="row`+id+`">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        `)

        if (id !== undefined){
            var dataParent = {id: module_parent_id, text: module_parent, selected: true};
            var newOptionParent = new Option(dataParent.text, dataParent.id, false, false)
            $('#modal_parent_id').append(newOptionParent).trigger('change')
            $('#modal_parent_id').select2()

            $('#row'+id).removeClass('add')
            $('#row'+id).removeClass('btn-primary')
            $('#row'+id).addClass('edit')
            $('#row'+id).addClass('btn-warning')
        }else{
            $('#rowundefined').removeClass('edit')
            $('#rowundefined').addClass('add')
            $('#rowundefined').removeClass('btn-warning')
            $('#rowundefined').addClass('btn-primary')
        }

        $("#modal_parent_id").select2({
            allowClear: true,
            width: '100%',
            ajax: {
                url: "{{ route('api.get_select2_parent') }}",
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
            },
            dropdownParent: $("#modal_content")
        });

        $('#modal_parent_id').change(function() {
            $("#modal_parent").val($("#modal_parent_id option:selected").text());
        });
        $("#modal_parent").val($("#modal_parent_id option:selected").text());


        $('.edit').on('click', function() {
            var data = new FormData()
            data.append('id', id)
            data.append('name', $('#modal_nama').val())
            data.append('modal_parent_id', $('#modal_parent_id').val())
            data.append('modal_parent', $('#modal_parent').val())
            data.append('modal_icon', $('#modal_icon').val())
            data.append('module_url', $('#modal_url').val())
            data.append('module_position', $('#modal_posisi').val())
            $.ajax({
                url: "{{ url('update_menu') }}",
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                success: function (result) {
                    if (result.status == 200){
                        Swal.fire({
                            title: 'Edit!',
                            text: 'Your file has been edit.',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: false
                        }).then(function(){
                            location.reload();
                        });
                    }else{
                        $('.remove_username').remove()
                        $('.remove_nama_lengkap').remove()
                        $('.remove_role').remove()
                        // if (result.)
                        $('.modal_username_append').append(`
                            <span class="remove_username text-danger">Data Tidak Boleh Kosong</span>
                        `)

                    }

                }
            });

        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    }

    function modal_status (id){
        var status = $('#swicth'+id).is(':checked') ? 1 : 0

        console.log($('#swicth'.id).is(':checked'), id);
        Fdata = new FormData()
        Fdata.append('_method', 'PUT')
        Fdata.append('id', id )
        Fdata.append('status', status )
        Fdata.append('_token', "{{ csrf_token() }}" )

        $.ajax({
            type: "POST",
            url: "{{ url('menu_page') }}/"+id,
            data: Fdata,
            processData: false,
            contentType: false,
            success: function (result) {
                Swal.fire({
                    title: 'Berhasil diubah!',
                    text: 'Your file has been change.',
                    icon: 'success',
                    confirmButtonClass: 'btn btn-primary w-xs mt-2',
                    buttonsStyling: false,
                    timer: 1500
                }).then(function(){
                    location.reload();
                });

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
