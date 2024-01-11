@extends('layouts.master')

@section('title') {{ $title }} @endsection

@section('content')

@include('components.breadcrumb')
@include('sweetalert::alert')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <!-- <div id="customerList">
                    <div class="col-sm-auto mb-3">

                    </div> 
                    <div class="row g-4">
                        <div class="row mt-4">
                            <div class="col-xxl-4 col-md-6 p-3">
                                <label>Filter UserName</label> <input id='username_id' name="username_id" />
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            
                        </div>
                    </div>

                     <th width="5px">Nomor</th>
                            <th width="100px">Nama Lengkap</th>
                            <th width="30px">Nomor Hanphone</th>
                            <th width="30px">Username</th>
                            <th width="30px">Verifikasi Email</th>
                            <th width="30px">Verifikasi No.Hp</th>
                            <th width="30px">Terdaftar Seller</th>
                </div> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-2">
                                        <div>
                                            <label for="basiInput" class="form-label">Status User</label>
                                            <select id="status_user" class="form-select">
                                                <option value="">-- Pilih --</option>
                                                <option value="0">Pembeli</option>
                                                <option value="1">Penjual</option>
                                                <option value="2">Pengajuan Seller</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table id="dataTable" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th >No</th>
                                    <th >Nama Lengkap</th>
                                    <th >No. Handphone</th>
                                    <th >Username</th>
                                    <th >Verif. Email</th>
                                    <th >Verif. No.Hp</th>
                                    <th >Terdaftar Seller</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" data-bs-backdrop="static" aria-modal="true" role="dialog" style="display: none;">
                    <div class="modal-dialog modal-xl" id="modal_content">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #dataTable thead th {
        background-color: #405189;
        color: #ffffff;
        text-align: center;
        text-transform: uppercase;
        height:40px;
        vertical-align: middle;
    }
</style>
@endsection

@section('script')
<script type="text/javascript">
    var img_ok = `<img src="{{ URL::asset('assets/images/logo/ok.png') }}" alt=""height="30px">`
    var img_not_ok = `<img src="{{ URL::asset('assets/images/logo/not-ok.png') }}" alt=""height="30px">`
    var img_pengajuan = `<img src="{{ URL::asset('assets/images/logo/pengajuan.png') }}" alt=""height="30px">`
    $(function () {
        var table = $('#dataTable').DataTable({
            //dom: 'lrtip',
            //dom: '<"top"f>rt<"bottom"lip><"clear">',
            processing: true,
            serverSide: true,
            ordering: false,
            "deferRender": true,
            ajax: {
                url: "{{ route('users_public.create') }}",
                data: function (d) {
                    //d.username_id = $('#username_id').val()
                    //d.roles_id = $('#roles_id').val()

                    d.status_user = $('#status_user').val();
                }
            },
            columns: [{
                    data: "id",
                    sortable: false,
                    width: '5%',
                    className: 'dt-center',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },{
                    data: 'name',
                    width : "30%",
                    render: function (data, type, row) {
                        return `<button class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm" type="button" target="_blank" onclick="modal_crud('Edit', '`+row.id+`', '`+row.name+`', '`+row.email+`', '`+row.phone+`', '`+row.isEmailVerified+`', '`+row.isPhoneVerified+`', '`+row.sellerStatus+`')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">`+data.trim()+`</button>`;
                    }
                },{
                    data: 'email',
                },{
                    data: 'phone',
                },{
                    data: 'isEmailVerified',
                    className: 'dt-center',
                    render: function (data) {
                        return data ? img_ok : img_not_ok;
                    }
                },{
                    data: 'isPhoneVerified',
                    className: 'dt-center',
                    render: function (data) {
                        return data ? img_ok : img_not_ok;
                    }
                },{
                    data: 'sellerStatus',
                    className: 'dt-center',
                    render: function (data) {
                        return data == 2 ? img_pengajuan : data == 1 ? img_ok : img_not_ok;
                    }
                }
            ]
        });

        $('#status_user').on('change', function () {
            table.draw();
        });

    });

    function modal_crud(data, id, name, email, phone, isEmailVerified, isPhoneVerified, sellerStatus){
        var warna = id ? 'warning' : 'success';
        var isEmailVerified_modal = isEmailVerified == 1 ? img_ok : img_not_ok;
        var isPhoneVerified_modal = isPhoneVerified == 1 ? img_ok : img_not_ok;
        var sellerStatus_modal = sellerStatus == 1 ? img_ok : sellerStatus == 2 ? img_pengajuan : img_not_ok;
        var aktifSeller_modal = sellerStatus == 2 ? `<button type="button" target="_blank" onclick="aktifkan_seller('${id}','${name}')" class="btn btn-warning">Aktifkan User</button>` : ``;

        $('#modal_content').html(`
            <div class="modal-content">
                <div class="modal-header text-white pb-1 bg-success">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="modal-title text-white" id="exampleModalgridLabel">Detail Data</h5>
                            </div>
                            <div class="col-sm-6 text-end">
                                ${aktifSeller_modal}
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-xxl-4">
                            <label for="modal_nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input class="form-control" id="modal_nama_lengkap" disabled value="${name}">
                        </div>
                        <div class="col-xxl-4">
                            <label for="modal_email" class="form-label">Email</label>
                            <input class="form-control" id="modal_email" disabled value="${email}">
                        </div>
                        <div class="col-xxl-4">
                            <label for="modal_phone" class="form-label">Phone</label>
                            <input class="form-control" id="modal_phone" disabled value="${phone}">
                        </div>
                        <div class="col-xxl-4">
                            <label for="modal_isEmail" class="form-label">Verifikasi Email</label>
                            <div>${isEmailVerified_modal}</div>
                        </div>
                        <div class="col-xxl-4">
                            <label for="modal_isEmail" class="form-label">Verifikasi Phone</label>
                            <div>${isPhoneVerified_modal}</div>
                        </div>
                        <div class="col-xxl-4">
                            <label for="modal_isEmail" class="form-label">Terdaftar Seller</label>
                            <div>${sellerStatus_modal}</div>
                        </div>
                        <hr>
                        <h1>Product Jasa</h1>
                        <table id="productJasa" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="100px">Nama Product</th>
                                    <th width="100px">Kategori</th>
                                    <th width="30px">Sub Kategori</th>
                                    <th width="30px">Impresi Halaman</th>
                                    <th width="30px">Jumlah Klik</th>
                                    <th width="30px">Harga Termurah</th>
                                    <th width="30px">Harga Termahal</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>


                        <hr>
                        <h1>Keahlian</h1>
                        <table id="keahlian" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="50px">Nama Keahlian</th>
                                    <th width="100px">Level</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <hr>
                        <h1>Pendidikan</h1>
                        <table id="pendidikan" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="100px">Tingkat Pendidikan</th>
                                    <th width="100px">Negara</th>
                                    <th width="100px">Institusi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <hr>
                        <h1>Keahlian Bahasa</h1>
                        <table id="bahasa" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="100px">Bahasa</th>
                                    <th width="100px">Level</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <hr>
                        <h1>Alamat</h1>
                        <table id="alamat" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="100px">Alamat</th>
                                    <th width="100px">Catatan Kurir</th>
                                    <th width="100px">Nama Penerima</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <div class="col-lg-12">
                            <div class="row align-self-center">
                                <div class="col-sm-6 align-self-start">
                                    ${aktifSeller_modal}
                                </div>
                                <div class="col-sm-6 text-end">
                                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        `);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('#productJasa').DataTable({
            dom: 'lrtip',
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('user_product_datatable') }}/?id="+id,
            },
            columns: [{
                    data: 'nama',
                    name: 'Nama Product'
                },{
                    data: 'kategori',
                    name: 'Kategori'
                },{
                    data: 'subkategori',
                    name: 'Sub Kategori'
                },{
                    data: 'impresi',
                    name: 'Impresi Halaman'
                },{
                    data: 'klik',
                    name: 'Jumlah Klik'
                },{
                    data: 'hargaTermurah',
                    name: 'Harga Termurah'
                },{
                    data: 'hargaTermahal',
                    name: 'Harga Termahal'
                }
            ]
        });

        var table = $('#keahlian').DataTable({
            dom: 'lrtip',
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('user_keahlian_datatable') }}/?id="+id,
            },
            columns: [{
                    data: 'nama',
                    name: 'Nama Keahlian'
                },{
                    data: 'level',
                    name: 'Level'
                }
            ]
        });

        var table = $('#pendidikan').DataTable({
            dom: 'lrtip',
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('user_pendidikan_datatable') }}/?id="+id,
            },
            columns: [{
                    data: 'institusi',
                    name: 'Tingkat Pendidikan'
                },{
                    data: 'negara',
                    name: 'Negara'
                },{
                    data: 'tingkat',
                    name: 'Institusi'
                }
            ]
        });

        var table = $('#bahasa').DataTable({
            dom: 'lrtip',
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('user_bahasa_datatable') }}/?id="+id,
            },
            columns: [{
                    data: 'bahasa',
                    name: 'Bahasa'
                },{
                    data: 'level',
                    name: 'Level'
                }
            ]
        });

        var table = $('#alamat').DataTable({
            dom: 'lrtip',
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('user_alamat_datatable') }}/?id="+id,
            },
            columns: [{
                    data: 'alamat',
                    name: 'Alamat'
                },{
                    data: 'catatanKurir',
                    name: 'Catatan Kurir'
                },{
                    data: 'namaPenerima',
                    name: 'Nama Penerima'
                }
            ]
        });

        function aktifkan_seller(id, name){
            aktifkan_seller(id, name)
        }
    }

    function aktifkan_seller(id, name){
        Swal.fire({
        title: `Konfirmasi`,
        text: "Apakah anda yakin untuk menjadikan Seller '"+name+"'",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya',
        cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                var data = new FormData();
                data.append('id', id);
                $.ajax({
                    type: "post",
                    url: "{{ url('aktifkan_seller') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        Swal.fire({
                            title: 'Seller!',
                            text: 'Your file has been Seller.',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: false
                        }).then(function(){
                            $('#dataTable').DataTable().ajax.reload()
                            $('#exampleModalgrid').modal('hide');
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


{{-- 
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
--}}