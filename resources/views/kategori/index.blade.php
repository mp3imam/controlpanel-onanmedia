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
                    <div class="card">
                        <div class="card-body">
                            <table id="dataTable" class="table table-striped table-bordered table-sm no-wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width="30px">No</th>
                                        <th>Kategori</th>
                                        <th>Url</th>
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
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('kategori.create') }}",
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
                    data: 'nama',
                    name: 'Kategori',
                    render: function (data, type, row, meta) {
                        return `<button class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm" type="button" target="_blank" onclick="modal_crud('Edit','`+row.id+`', '`+row.nama+`', '`+row.url+`')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">`+data+`</button>`;
                    }
                },{
                    data: 'url',
                    name: 'Url',
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

    function modal_crud(data, id, nama, url){
        var user_modal = nama ?? ''
        var url_modal  = url ?? ''
        button_hapus = id ? `<a href="#" type="button" onclick="alert_delete('${id}','${nama}')" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Hapus</a>` : ''


        $('#modal_content').html(`
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">${data} Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-xxl-12" id="modal_kategori_append">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input class="form-control" id="modal_kategori" placeholder="Enter Kategori" value="${user_modal}">
                    </div>
                    <div class="col-xxl-12">
                        <label for="modal_url" class="form-label">URL</label>
                        <textarea class="form-control" id="modal_url" rows="3">${url_modal}</textarea>
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


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.add').on('click', function() {
            var data = new FormData()
            data.append('kategori', $('#modal_kategori').val())
            data.append('url', $('#modal_url').val())
            $.ajax({
                type: "post",
                url: "{{ url('kategori') }}",
                data: data,
                processData: false,
                contentType: false,
                success: function (result) {
                    if (result.status == 200){
                        Swal.fire({
                            title: 'Add!',
                            text: 'Your file has been add.',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: false
                        }).then(function(){
                            $('#dataTable').DataTable().ajax.reload()
                            $('#exampleModalgrid').modal('hide')
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

        $('.edit').on('click', function() {
            var data = new FormData()
            data.append('_method', 'PUT')
            data.append('id', id)
            data.append('kategori', $('#modal_kategori').val())
            data.append('url', $('#modal_url').val())
            $.ajax({
                url: "{{ url('kategori') }}/" + id,
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
                            $('#dataTable').DataTable().ajax.reload()
                            $('#exampleModalgrid').modal('hide')
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
                    url: "{{ url('kategori') }}" + '/' + id,
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
