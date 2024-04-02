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
                    <h4 class="card-title mb-4">
                        <label>Pencarian Judul Tender</label>
                        <input type="text" id="judulTender" class="form-control" placeholder="Cari Judul Tender">
                    </h4>
                    <div id="customerList">
                        <table id="dataTable" class="table table-striped table-bordered table-sm no-wrap" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>USER </th>
                                    <th>NAMA TENDER</th>
                                    <th>LELVEL KUALIFIKASI</th>
                                    <th>Budget</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel"
                        data-bs-backdrop="static" aria-modal="true" role="dialog" style="display: none;">
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
                    url: "{{ route('daftar_tender.create') }}",
                    data: function(d) {
                        d.judulTender = $('#judulTender').val()
                    }
                },
                columns: [{
                    data: "id",
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                }, {
                    data: 'namaUser',
                    name: 'USER',
                    render: function(data, type, row, meta) {
                        return `<a href="/daftar_tender/${row.id}/edit" class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm">${data}</a>`;
                    }
                }, {
                    data: 'judulTender',
                    name: 'NAMA TENDER'
                }, {
                    data: 'level_kualifikasi',
                    name: 'LEVEL KUALIFIKASI'
                }, {
                    data: 'budget',
                    name: 'Budget',
                    render: function(data, type, row, meta) {
                        return `Rp. ${data} / Sprint`;
                    }
                }, {
                    data: 'statusTender',
                    name: 'STATUS'
                }]
            });

            $('#judulTender').keyup(function() {
                table.draw();
            });
        });
    </script>
@endsection
