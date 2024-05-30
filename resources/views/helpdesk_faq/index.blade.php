@extends('layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @include('components.breadcrumb')
    @include('sweetalert::alert')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="customerList">
                        <div class="col-sm-auto mb-3">
                            <div class="row">
                                <div class="col-md">
                                    <div class="input-group">
                                        <a href="{{ route('helpdesk_faq.create') }}" class="btn btn-success" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">Tambah
                                            Data</a>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md">
                                        <div class="input-group">
                                            <input class="form-control" id='cari' name="cari"
                                                placeholder="Cari data user di sini">
                                            <span class="input-group-text"><i class="ri-search-line"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <table id="dataTable" class="table table-striped table-bordered table-sm no-wrap"
                                        cellspacing="0" width="100%">
                                        <thead class="text-white text-center text-uppercase"
                                            style="background-color: #405189 !important">
                                            <tr>
                                                <th width="10$">No</th>
                                                <th width="20%">Kategori</th>
                                                <th>Judul</th>
                                                <th width="60%">Deskripsi</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel"
                            data-bs-backdrop="static" aria-modal="true" role="dialog" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content" id="modal_content">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            #dataTable thead th {
                height: 30px;
                vertical-align: middle;
            }
        </style>
    @endsection

    @section('script')
        <script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
        <script type="text/javascript">
            $(function() {
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
                        url: "{{ route('helpdesk_faq.create') }}",
                        data: function(d) {
                            d.cari = $('#cari').val()
                        }
                    },
                    columns: [{
                        data: "id",
                        sortable: false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    }, {
                        data: 'kategori',
                        name: 'Kategori'
                    }, {
                        data: 'Title',
                        name: 'Judul',
                        render: function(data, type, row, meta) {
                            return `<a class="btn btn-ghost-primary waves-effect waves-light btn-sm" type="button" href="{{ url('helpdesk_faq/`+row.id+`/edit') }}">${data}</a>`;
                        }
                    }, {
                        data: 'Content',
                        name: 'Content',
                    }, {
                        data: 'isAktif',
                        name: 'Status',
                        class: 'text-center',
                        render: function(data, type, row, meta) {
                            return data == 1 ?
                                '<button class="btn btn-success waves-effect waves-light btn-xl" type="button">Aktif</button>' :
                                '<button class="btn btn-danger waves-effect waves-light btn-xl" type="button">Tidak Aktif</button>';
                        }
                    }]
                });

                $('#cari').keyup(function() {
                    table.draw();
                });

            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    @endsection
