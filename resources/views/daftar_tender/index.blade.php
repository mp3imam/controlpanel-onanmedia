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
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table id="dataTable" class="table table-striped table-bordered table-sm no-wrap" cellspacing="0"
                            width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th width="30px">Nama Tender</th>
                                        <th>User Posting</th>
                                        <th>Tgl Posting</th>
                                        <th>Skill</th>
                                        <th>Kategori</th>
                                        <th>Durasi</th>
                                        <th>Lingkup Pekerjaan</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Nilai Tender</th>
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
    var img_ok = `<img src="{{ URL::asset('assets/images/logo/ok.png') }}" alt=""height="30px">`
    var img_not_ok = `<img src="{{ URL::asset('assets/images/logo/not-ok.png') }}" alt=""height="30px">`
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
                url: "{{ route('daftar_tender.create') }}",
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
                    name: 'Nama Tender',
                    render: function (data, type, row, meta) {
                        return `<button class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm" type="button" target="_blank" onclick="modal_crud('`+row.id+`', '`+row.nama+`', '`+row.subkategori+`', '`+row.kategori+`', '`+row.impresi+`', '`+row.klik+`', '`+row.UserPosting+`', '`+row.tags+`', '`+row.deskripsi+`', '`+row.msStatusJasaId+`', '`+row.slug+`', '`+row.cover+`', '`+row.hargaTermahal+`', '`+row.hargaTermurah+`', '`+row.statusjasa+`', '`+row.isPengambilan+`', '`+row.isPengiriman+`', '`+row.isUnggulan+`')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">`+data+`</button>`;
                    }
                },{
                    data: 'UserPosting',
                    name: 'User Posting'
                },{
                    data: 'tanggal_posting',
                    name: 'Tgl Posting'
                },{
                    data: 'skills',
                    name: 'Skill'
                },{
                    data: 'kategori',
                    name: 'Kategori'
                },{
                    data: 'durasiKontrak',
                    name: 'Durasi'
                },{
                    data: 'lingkupPekerjaan',
                    name: 'Lingkup Pekerjaan'
                },{
                    data: 'metodePembayaran',
                    name: 'Metode Pembayaran'
                },{
                    data: 'budget',
                    name: 'Nilai Tender'
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

    function modal_crud(id, nama, subkategori, kategori, impresi, klik, UserPosting, tags, deskripsi, msStatusJasaId, slug, cover, hargaTermahal, hargaTermurah, statusjasa, isPengambilan, isPengiriman, isUnggulan){
        isPengambilanModal = isPengambilan == 1 ? img_ok : img_not_ok
        isPengirimanModal = isPengiriman == 1 ? img_ok : img_not_ok
        isUnggulanModal = isUnggulan == 1 ? img_ok : img_not_ok
        msStatusJasaIdModal = msStatusJasaId == 1 ? img_ok : img_not_ok
        $('#modal_content').html(`
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Detail Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4">Nama</div>
                                        <div class="col-md-8">: ${nama}</div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4">SubKategori</div>
                                        <div class="col-md-8">: ${subkategori}</div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4">Kategori</div>
                                        <div class="col-md-8">: ${kategori}</div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4">Impresi</div>
                                        <div class="col-md-8">: ${impresi}</div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4">klik</div>
                                        <div class="col-md-8">: ${klik}</div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4">Nama User</div>
                                        <div class="col-md-8">: ${UserPosting}</div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4">Tags</div>
                                        <div class="col-md-8">: ${tags}</div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4">Deskripsi</div>
                                        <div class="col-md-8">: ${deskripsi}</div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4">Status Verifikasi Jasa</div>
                                        <div class="col-md-8">: ${msStatusJasaIdModal}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4">Slug</div>
                                        <div class="col-md-8">: ${slug}</div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4">Harga Termahal</div>
                                        <div class="col-md-8">: ${hargaTermahal}</div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4">Harga Termurah</div>
                                        <div class="col-md-8">: ${hargaTermurah}</div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4">Status Jasa</div>
                                        <div class="col-md-8">: ${statusjasa}</div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4">Pengambilan</div>
                                        <div class="col-md-8">: ${isPengambilanModal}</div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4">Pengiriman</div>
                                        <div class="col-md-8">: ${isPengirimanModal}</div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4">Unggulan</div>
                                        <div class="col-md-8">: ${isUnggulanModal}</div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4">Cover</div>
                                        <div class="col-md-8">: <img src="${cover}" width="100px" height="100px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <hr>
                <h1>Jasa Pricing</h1>
                <table id="jasaPricing" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="100px">Nama Jasa</th>
                            <th width="100px">Nama Pricing</th>
                            <th width="30px">Deskripsi</th>
                            <th width="30px">Periode</th>
                            <th width="30px">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
