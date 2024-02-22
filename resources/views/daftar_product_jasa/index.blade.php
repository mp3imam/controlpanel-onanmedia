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
                                <label>Filter Nama Jasa</label>
                                <input class="form-control" id='cari' name="cari" />
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table id="dataTable" class="table table-striped table-bordered table-sm no-wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>User Posting</th>
                                        <th>Nama Jasa</th>
                                        <th>Kategory</th>
                                        <th>SubKategory</th>
                                        <th>Gambar Product</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade flip" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" data-bs-backdrop="static" aria-modal="true" role="dialog" style="display: none;">
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
<script type="text/javascript">
    var img_ok = `<img src="{{ URL::asset('assets/images/logo/ok.png') }}" alt=""height="30px">`
    var img_not_ok = `<img src="{{ URL::asset('assets/images/logo/not-ok.png') }}" alt=""height="30px">`
    $(function () {
        var table = $('#dataTable').DataTable({
            dom: 'lrtip',
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('daftar_product_jasa.create') }}",
                data: function (d) {
                    d.cari = $('#cari').val()
                }
            },
            columns: [{
                    data: "id",
                    sortable: false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },{
                    data: 'UserPosting',
                    name: 'User Posting',
                    render: function (data, type, row, meta) {
                        return `<a href="/daftar_product_jasa/${row.id}/edit" class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm">${data}</a>`;
                    }
                },{
                    data: 'nama',
                    name: 'Nama Jasa'
                },{
                    data: 'kategori',
                    name: 'Kategori'
                },{
                    data: 'subKategori',
                    name: 'SubKategori'
                },{
                    data: 'cover',
                    name: 'Gambar Product',
                    class:'text-center',
                    render: function (data) {
                        return `<a href="`+ data +`" target="_blank" > <img src="${data}" width="100px" height="100px"> </a>`
                    }
                }
            ]
        });

        $('#cari').keyup(function () {
            table.draw();
        });
    });

    function modal_crud(id, nama, subkategori, kategori, impresi, klik, UserPosting, tags, deskripsi, msStatusJasaId, slug, cover, hargaTermahal, hargaTermurah, statusjasa, isPengambilan, isPengiriman, isUnggulan){
        msStatusJasaIdModal = msStatusJasaId == 1 ? img_ok : `<img src="{{ URL::asset('assets/images/logo/not-ok.png') }}" alt=""height="30px" onclick="konfirmasi_verifikasi_jasa('${id}','${nama}')" style="cursor:pointer">`
        $('#modal_content').html(`
            <div class="modal-body">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header bg-info">
                                <h4 class="text-control text-white">Jasa Detail</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills arrow-navtabs bg-info nav-success bg-light mb-3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#arrow-detail" role="tab" aria-selected="true">
                                            <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                                            <span class="d-none d-sm-block">Detail</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#arrow-deskripsi" role="tab" aria-selected="false" tabindex="-1">
                                            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                                            <span class="d-none d-sm-block">Deskripsi</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#arrow-foto" role="tab" aria-selected="false" tabindex="-1">
                                            <span class="d-block d-sm-none"><i class="mdi mdi-email"></i></span>
                                            <span class="d-none d-sm-block">Foto</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#arrow-pricing" role="tab" aria-selected="false" tabindex="-1">
                                            <span class="d-block d-sm-none"><i class="mdi mdi-email"></i></span>
                                            <span class="d-none d-sm-block">Pricing</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content text-muted">
                                    <div class="tab-pane active show" id="arrow-detail" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="col-md-4 text-muted">Nama Jasa</div>
                                                <div class="col-md-8 fs-14 fw-bold">${nama}</div>
                                            </div>
                                            <div class="col-md mb-3">
                                                <div class="col-md-4 text-muted">Nama User</div>
                                                <div class="col-md-8 fs-14 fw-bold">${UserPosting}</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="col-md-4 text-muted">Kategori</div>
                                                <div class="col-md-8 fs-14 fw-bold">${kategori}</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="col-md-4 text-muted">Tags</div>
                                                <div class="col-md-8 fs-14 fw-bold">${tags}</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="col-md-4 text-muted">SubKategori</div>
                                                <div class="col-md-8 fs-14 fw-bold">${subkategori}</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="col-md-4 text-muted">Slug</div>
                                                <div class="col-md-8 fs-14 fw-bold">${slug}</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="col-md-4 text-muted">Impresi</div>
                                                <div class="col-md-8 fs-14 fw-bold">${impresi}</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="col-md-4 text-muted">Harga Termahal</div>
                                                <div class="col-md-8 fs-14 fw-bold">${hargaTermahal}</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="col-md-4 text-muted">Klik</div>
                                                <div class="col-md-8 fs-14 fw-bold">${klik}</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="col-md-4 text-muted">Harga Termurah</div>
                                                <div class="col-md-8 fs-14 fw-bold">${hargaTermurah}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="arrow-deskripsi" role="tabpanel">
                                        <p class="mb-0">
                                            ${deskripsi}
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="arrow-foto" role="tabpanel">
                                        <p class="mb-0">
                                            ${deskripsi}
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="arrow-pricing" role="tabpanel">
                                        <p class="mb-0">
                                            ${deskripsi}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h4 class="text-control text-white">Status</h4>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-control text-muted fs-12">Status Verifikasi Jasa</h5>
                                    <select class="form-control mb-3" id="verifikasi_jasa">
                                        <option value="1" selected>Aktif</option>
                                        <option value="2" >Tidak Aktif</option>
                                        <option value="3" >Pending</option>
                                        <option value="4" >Tolak</option>
                                    </select>
                                    <h5 class="text-control text-muted fs-12">Status Jasa</h5>
                                    <select class="form-control mb-3" id="status_jasa">
                                        <option value="1" selected>Aktif</option>
                                        <option value="2" >Tidak Aktif</option>
                                    </select>
                                    <h5 class="text-control text-muted fs-12">Pengambilan</h5>
                                    <select class="form-control mb-3" id="pengambilan">
                                        <option value="1" selected>Aktif</option>
                                        <option value="2" >Tidak Aktif</option>
                                    </select>
                                    <h5 class="text-control text-muted fs-12">Pengiriman</h5>
                                    <select class="form-control mb-3" id="pengiriman">
                                        <option value="1" selected>Aktif</option>
                                        <option value="2" >Tidak Aktif</option>
                                    </select>
                                </div>
                                <div class="card-footer">
                                    <a href="javascript:void(0);" class="card-link link-secondary">Simpan</a>
                                    <a href="javascript:void(0);" class="card-link link-success">Bookmark <i class="ri-bookmark-line align-middle ms-1 lh-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `)

        var table = $('#jasaPricing').DataTable({
            dom: 'lrtip',
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('daftar_pricing_datatable') }}/?id="+id,
            },
            columns: [{
                    data: 'namaJasa',
                    name: 'Nama Jasa'
                },{
                    data: 'nama',
                    name: 'Nama Pricing'
                },{
                    data: 'deskripsi',
                    name: 'Deskripsi'
                },{
                    data: 'periode',
                    name: 'Periode'
                },{
                    data: 'harga',
                    name: 'Harga'
                }
            ]
        });

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


    function konfirmasi_verifikasi_jasa(id, nama){
        Swal.fire({
        title: `Aktifkan Jasa`,
        text: "Apakah anda yakin untuk mengaktifkan Jasa '"+nama+"'",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya',
        cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "{{ url('verifikasi_jasa') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function (result) {
                        Swal.fire({
                            title: 'Aktif!',
                            text: 'Your file has been aktif.',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: false
                        }).then(function(){
                            $('#dataTable').DataTable().ajax.reload()
                            $('#exampleModalgrid').modal('hide')
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
