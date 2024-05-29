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
                            <div class="row g-4">
                                <div class="row mt-4">
                                    <div class="col-md-9 p-3">
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
                                                <th width="50px">No</th>
                                                <th>Kategori</th>
                                                <th>Judul</th>
                                                <th>Deskripsi</th>
                                                <th>Action</th>
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
                        data: 'detail_id',
                        name: 'Nama',
                        render: function(data, type, row, meta) {
                            return `<a class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm" type="button" href="{{ url('helpdesk_list/`+row.id+`/edit') }}">${row.keluhan_nama}</a>`;
                        }
                    }, {
                        data: 'keluhan_email',
                        name: 'Email',
                    }, {
                        data: 'admin_id',
                        name: 'Di Kerjakan Oleh'
                    }, {
                        data: 'keluhan',
                        name: 'Keluhan',
                    }, {
                        data: 'tanggal_keluhan',
                        name: 'Tanggal',
                    }, {
                        data: 'statuss',
                        name: 'Status',
                        render: function(data, type, row, meta) {
                            switch (data) {
                                case 'Dibuat':
                                    bgColor = 'FFEDD5'
                                    color = 'F97316'
                                    break;
                                case 'Dalam Proses':
                                    bgColor = 'FEE2E2'
                                    color = 'EF4444'
                                    break;
                                case 'Pending':
                                    bgColor = 'D1FAE5'
                                    color = '10B981'
                                    break;
                                default:
                                    bgColor = 'DBEAFE'
                                    color = '3B82F6'
                            }
                            return `<span class="badge" style="background-color:#${bgColor}; color: #${color}"><i class="mdi mdi-circle-medium"></i> ${data}</span>`;
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
