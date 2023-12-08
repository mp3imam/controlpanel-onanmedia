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
                            <table id="dataTable" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width="5px">Nomor</th>
                                        <th width="100px">Nama Lengkap</th>
                                        <th width="30px">Nomor Hanphone</th>
                                        <th width="30px">Username</th>
                                        <th width="30px">Verifikasi Email</th>
                                        <th width="30px">Verifikasi No.Hp</th>
                                        <th width="30px">Terdaftar Seller</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" data-bs-backdrop="static" aria-modal="true" role="dialog" style="display: none;">
                    <div class="modal-dialog" id="modal_content">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    var img_ok = `<img src="{{ URL::asset('assets/images/logo/ok.png') }}" alt=""height="30px">`
    var img_not_ok = `<img src="{{ URL::asset('assets/images/logo/not-ok.png') }}" alt=""height="30px">`
    $(function () {
        var table = $('#dataTable').DataTable({
            dom: 'lrtip',
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('users_public.create') }}",
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
                    name: 'Nama Lengkap',
                    render: function (data, type, row) {
                        return `<button class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm" type="button" target="_blank" onclick="modal_crud('Edit', '`+row.uuid+`', '`+row.name+`', '`+row.email+`', '`+row.phone+`', '`+row.isEmailVerified+`', '`+row.isPhoneVerified+`', '`+row.sellerStatus+`')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">`+data.trim()+`</button>`;
                    }
                },{
                    data: 'email',
                    name: 'Email'
                },{
                    data: 'phone',
                    name: 'No Handphone'
                },{
                    data: 'isEmailVerified',
                    name: 'Verifikasi Email',
                    render: function (data) {
                        return data ? img_ok : img_not_ok;
                    }
                },{
                    data: 'isPhoneVerified',
                    name: 'Verifikasi No Handphone',
                    render: function (data) {
                        return data ? img_ok : img_not_ok;
                    }
                },{
                    data: 'sellerStatus',
                    name: 'Terdaftar Seller',
                    render: function (data) {
                        return data ? img_ok : img_not_ok;
                    }
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

    function modal_crud(data, id, name, email, phone, isEmailVerified, isPhoneVerified, sellerStatus){
        console.log(data, id, name, email, phone, isEmailVerified, isPhoneVerified, sellerStatus);
        var warna = id ? 'warning' : 'success';
        var nama = name ?? '';
        var email_modal = email ?? '';
        var phone_modal = phone ?? '';
        var isEmailVerified_modal = isEmailVerified == 1 ? img_ok : img_not_ok;
        var isPhoneVerified_modal = isPhoneVerified == 1 ? img_ok : img_not_ok;
        var sellerStatus_modal = sellerStatus == 1 ? img_ok : img_not_ok;
        var botton_hapus = id ? `<button type="button" target="_blank" onclick="konfirmasi_hapus(${id})" class="btn btn-danger">Delete</button>` : ``

        $('#modal_content').html(`
            <div class="modal-content">
                <div class="modal-header text-white pb-3 bg-${warna}">
                    <h5 class="modal-title text-white" id="exampleModalgridLabel">${data} Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <label for="modal_nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input class="form-control" id="modal_nama_lengkap" placeholder="Enter Nama Lengkap" value="${nama}">
                        </div>
                        <div class="col-xxl-12">
                            <label for="modal_email" class="form-label">Email</label>
                            <input class="form-control" id="modal_email" placeholder="Enter Email" value="${email_modal}">
                        </div>
                        <div class="col-xxl-12">
                            <label for="modal_phone" class="form-label">Phone</label>
                            <input class="form-control" id="modal_phone" placeholder="Enter Phone" value="${phone_modal}">
                        </div>
                        <div class="col-xxl-12">
                            <label for="modal_isEmail" class="form-label">Verifikasi Email</label>
                            ${isEmailVerified_modal}
                        </div>
                        <div class="col-xxl-12">
                            <label for="modal_isEmail" class="form-label">Verifikasi Phone</label>
                            ${isPhoneVerified_modal}
                        </div>
                        <div class="col-xxl-12">
                            <label for="modal_isEmail" class="form-label">Terdaftar Seller</label>
                            ${sellerStatus_modal}
                        </div>
                        <div class="col-lg-12">
                            <div class="row align-self-center">
                                <div class="col-sm-7 align-self-start">
                                    ${botton_hapus}
                                </div>
                                <div class="col-sm-5 text-end">
                                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary add btn-${warna}" id="row${id}">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        `);



        function konfirmasi_hapus(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('users_public') }}" + '/' + id,
                        data: {
                            "_method": 'DELETE',
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function (result) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                icon: 'success',
                                confirmButtonClass: 'btn btn-primary w-xs mt-2',
                                timer: 1500,
                                buttonsStyling: false
                            }).then(function(){
                                $('#dataTable').DataTable().ajax.reload();
                            });
                        }
                    });
                }
            });
        }


        if (id !== undefined){
            $('#row'+id).removeClass('add')
            $('#row'+id).addClass('edit')
        }else{
            $('#rowundefined').removeClass('edit')
            $('#rowundefined').addClass('add')
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.add').on('click', function() {
            var data = new FormData()
            data.append('username', $('#modal_username').val())
            data.append('nama_lengkap', $('#modal_nama_lengkap').val())
            data.append('role', $('#nama_role').val())
            $.ajax({
                type: "post",
                url: "{{ url('users') }}",
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

        $("#modal_roles_id").select2({
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
            },
            dropdownParent: $("#modal_content")
        });

        $('#modal_roles_id').change(function() {
            $("#nama_role").val($("#modal_roles_id option:selected").text());
        });
        $("#nama_role").val($("#modal_roles_id option:selected").text());

        $('.edit').on('click', function() {
            var data = new FormData()
            data.append('_method', 'PUT')
            data.append('id', id)
            data.append('username', $('#modal_username').val())
            data.append('nama_lengkap', $('#modal_nama_lengkap').val())
            data.append('role', $('#nama_role').val())
            $.ajax({
                url: "{{ url('users') }}/" + id,
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
