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
                        <a href="{{ route('master_jurnal.create') }}" type="button" class="btn btn-success" >
                            Tambah
                        </a>
                        <a type="button" class="btn btn-primary btn-label btn-pdf" href="{{ route('master_jurnal.pdf', ['cari' => Request::get('cari'), 'tanggal' => Request::get('tanggal') ] ) }}">
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
                    <form action="{{ route('master_jurnal.index') }}">
                        <div class="card mt-4">
                            <div class="row">
                                <div class="col-md-3 p-3">
                                    <label>Filter Tanggal</label>
                                    <input type="text" class="form-control flatpickr-input" id="tanggal" name="tanggal" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" readonly="readonly" value="{{ old('tanggal', Request::get('tanggal') ?? Carbon\Carbon::now()->subMonths(3)->firstOfMonth()->format('d M, Y')." to ".Carbon\Carbon::now()->format('d M, Y')) }}">
                                </div>
                                <div class="col-md-3 p-3">
                                    <label>Filter All</label>
                                    <input type="text" id="cari" name="cari" value="{{ old('cari', Request::get('cari')) }}"
                                    class="form-control" placeholder="Cari semua data" aria-label="Amount (to the nearest dollar)">
                                </div>
                                <div class="col-md-3 p-3 text-center mt-4">
                                    <button class="btn btn-success btn-icon waves-effect waves-light"><i class="ri-search-2-line"></i></button>
                                    <button type="reset" class="btn btn-warning btn-icon waves-effect waves-light"><i class="ri-repeat-2-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card">
                        <div class="card-body">
                            <table id="dataTable" class="table table-striped table-bordered table-sm no-wrap" cellspacing="0"
                            width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th class="text-uppercase" width="10%">No. Transaksi</th>
                                        <th class="text-uppercase">TANGGAL Jurnal</th>
                                        <th class="text-uppercase">Dokumen</th>
                                        <th class="text-uppercase">Uraian</th>
                                        <th class="text-uppercase">Debit</th>
                                        <th class="text-uppercase">Kredit</th>
                                        <th class="text-uppercase">KETERANGAN</th>
                                        <th class="text-uppercase" hidden>jenis</th>
                                        <th class="text-uppercase">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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
            stateSave: true,
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
                url: "{{ route('getDataTableMasterJurnal') }}",
                data: function (d) {
                    d.cari = $('#cari').val(),
                    d.tanggal = $('#tanggal').val()
                }
            },
            columns: [{
                    data: "id",
                    sortable: false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },{
                    data: 'nomor_transaksi',
                    name: 'No. Transaksi',
                    render: function (data, type, row, meta) {
                        btn = row.tipe == 0 ? data : `<a href="{{ url('master_jurnal') }}/`+row.id+`/edit" class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm">`+data+`</a>`
                        return btn
                    }
                },{
                    data: 'tanggal_transaksi',
                    name: 'TANGGAL TRANSAKSI'
                },{
                    data: 'dokumen',
                    name: 'Documen'
                },{
                    data: 'uraian',
                    name: 'Uraian'
                },{
                    data: 'debets',
                    name: 'Debet'
                },{
                    data: 'kredits',
                    name: 'Kredit'
                },{
                    data: 'keterangan_jurnal_umum',
                    name: 'KETERANGAN'
                },{
                    data: 'jenis',
                    visible: false
                },{
                    data: 'id',
                    name: 'Action',
                    render: function (data, type, row, meta) {
                        icon = row.jenis == "1" ? 'ri-eye-fill' : 'ri-pencil-fill'
                        btn = `
                        <a href="{{ url('master_jurnal') }}/`+row.id+`/edit" class="btn btn-outline-warning btn-icon waves-effect waves-light">
                            <i class="${icon}"></i>
                        </a>
                        `
                        btn += row.jenis == "1" ? `` : `

                        <button type="button" class="btn btn-outline-danger btn-icon waves-effect waves-light" onclick="konfirmasi_hapus(`+row.id+`,'`+row.nomor_transaksi+`')" target="_blank">
                            <i class="ri-delete-bin-5-line"></i>
                        </button>
                        `
                        return btn
                    }
                }
            ]
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function konfirmasi_hapus(id, name){
        Swal.fire({
            title: "Masukan Alasan menghapus data Jurnal "+name,
            input: "text",
            inputAttributes: {
                autocapitalize: "off"
            },
            showCancelButton: true,
            confirmButtonText: "Hapus",
            }).then((result) => {
            if (result.isConfirmed && result.value) {
                var data = new FormData();
                data.append('id', id);
                data.append('alasan', result.value);
                $.ajax({
                    type: "post",
                    url: "{{ route('softdelete_jurnal_umum') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        Swal.fire({
                            title: 'Hapus!',
                            text: 'Data berhasil di hapus',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: false,
                            timer: 2500
                        }).then(function(){
                            window.location.href = "{{ route('master_jurnal.index') }}";
                        });
                    }
                });
            }

        });
    }

</script>
@endsection
