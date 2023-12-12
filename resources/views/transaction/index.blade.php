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
                            <div class="col-xxl-4 col-md-4 p-3">
                                <label>Filter UserName</label>
                                <input id='username_id' name="username_id" />
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table id="dataTable" class="table table-striped table-bordered table-sm " cellspacing="0"
                            width="100%">
                                <thead>
                                    <tr>
                                        <th width="5px">No</th>
                                        <th width="50px">Nomor Transaksi</th>
                                        <th width="50px">Title</th>
                                        <th width="50px">Aktifitas</th>
                                        <th width="50px">Tgl. Order</th>
                                        <th width="50px">User Penjual</th>
                                        <th width="50px">User Pembeli</th>
                                        <th width="50px">Jumlah Termin</th>
                                        <th width="50px">Total Order</th>
                                        <th width="50px">Biaya Aplikasi</th>
                                        <th width="50px">Total Bayar</th>
                                        <th width="50px">Komisi Onan</th>
                                        <th width="50px">Dana Penjual</th>
                                        <th hidden>Persentase Komisi Onan</th>
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
                url: "{{ route('transaksi.create') }}",
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
                    data: 'nomor',
                    name: 'Nomor Transaksi',
                    render: function (data, type, row, meta) {
                        return `<button class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm" type="button" target="_blank" onclick="modal_crud('`+row.id+`', '`+row.nomor+`', '`+row.tawaran+`', '`+row.aktifitas+`', '`+row.penjual+`', '`+row.pembeli+`', '`+row.jumlahTermin+`', '`+row.totalPenawaran+`', '`+row.totalFee+`', '`+row.totalBayar+`', '`+row.totalKomisiOnan+`', '`+row.totalKomisiPenjual+`', '`+row.persentaseKomisiOnan+`')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">`+data+`</button>`;
                    }
                },{
                    data: 'tawaran',
                    name: 'Penawaran'
                },{
                    data: 'aktifitas',
                    name: 'Nama Aktifitas'
                },{
                    data: 'tanggal_order',
                    name: 'Tgl. Order'
                },{
                    data: 'penjual',
                    name: 'User Penjual'
                },{
                    data: 'pembeli',
                    name: 'User Pembeli'
                },{
                    data: 'jumlahTermin',
                    name: 'Jumlah Termin'
                },{
                    data: 'totalPenawaran',
                    name: 'Total Order'
                },{
                    data: 'totalFee',
                    name: 'Biaya Aplikasi'
                },{
                    data: 'totalBayar',
                    name: 'Total Bayar'
                },{
                    data: 'totalKomisiOnan',
                    name: 'Komisi Onan'
                },{
                    data: 'totalKomisiPenjual',
                    name: 'Dana Penjual'
                },{
                    data: 'persentaseKomisiOnan',
                    visible: false
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

    function modal_crud(id, nomor, tawaran, aktifitas, penjual, pembeli, jumlahTermin, totalPenawaran, totalFee, totalBayar, totalKomisiOnan, totalKomisiPenjual, persentaseKomisiOnan) {
        const modalContent = `
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Detail Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">No. Transaksi:</label>
                                    <input class="form-control" value="${nomor}" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Title:</label>
                                    <input class="form-control" value="${tawaran}" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Penjual:</label>
                                    <input class="form-control" value="${penjual}" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nama:</label>
                                    <input class="form-control" value="${pembeli}" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Aktivitas:</label>
                                    <input class="form-control" value="${aktifitas}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Total Bayar:</label>
                                    <input class="form-control money" value="${totalBayar}" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Total Fee:</label>
                                    <input class="form-control money" value="${totalFee}" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Total Komisi Penjual:</label>
                                    <input class="form-control money" value="${totalKomisiPenjual}" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Persentase Komisi Onan</label>
                                    <input class="form-control" value="${persentaseKomisiOnan}" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Total Komisi Onan:</label>
                                    <input class="form-control money" value="${totalKomisiOnan}" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Total Penawaran:</label>
                                    <input class="form-control money" value="${totalPenawaran}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <h1>Product Jasa</h1>
                <table id="productJasa" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="100px">Nama</th>
                            <th width="100px">Deskripsi</th>
                            <th width="30px">Nama Pricing</th>
                            <th width="30px">Jasa</th>
                            <th width="30px">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <div class="col-lg-12">
                    <div class="row align-self-center">
                        <div class="col-sm-6 align-self-start">
                        </div>
                        <div class="col-sm-6 text-end">
                            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `;

        $('#modal_content').html(modalContent);
        $(document).ready(function(){
            $('.money').inputmask({
                alias: 'numeric',
                radixPoint: '.',
                groupSeparator: ',',
                autoGroup: true,
                digits: 0,
                digitsOptional: false,
                prefix: 'Rp ', // Isi dengan simbol mata uang yang kamu inginkan
                placeholder: '0',
                rightAlign: false
            });
        });

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
                url: "{{ route('transaksi_product_datatable') }}/?id="+id,
            },
            columns: [{
                    data: 'nama',
                    name: 'Nama'
                },{
                    data: 'deskripsi',
                    name: 'Deskripsi'
                },{
                    data: 'namaPricing',
                    name: 'Nama Pricing'
                },{
                    data: 'namaJasa',
                    name: 'Jasa'
                },{
                    data: 'nilai',
                    name: 'Nilai'
                }
            ]
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
