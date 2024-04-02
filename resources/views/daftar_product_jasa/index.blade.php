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
                                <table id="dataTable" class="table table-striped table-bordered table-sm no-wrap"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>User Posting</th>
                                            <th>Nama Jasa</th>
                                            <th>Kategory</th>
                                            <th>SubKategory</th>
                                            <th>Gambar Product</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade flip" id="exampleModalgrid" tabindex="-1"
                        aria-labelledby="exampleModalgridLabel" data-bs-backdrop="static" aria-modal="true" role="dialog"
                        style="display: none;">
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
        $(function() {
            var table = $('#dataTable').DataTable({
                dom: 'lrtip',
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('daftar_product_jasa.create') }}",
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
                    data: 'UserPosting',
                    name: 'User Posting',
                    render: function(data, type, row, meta) {
                        return `<a href="/daftar_product_jasa/${row.id}/edit" class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm">${data}</a>`;
                    }
                }, {
                    data: 'nama',
                    name: 'Nama Jasa'
                }, {
                    data: 'kategori',
                    name: 'Kategori'
                }, {
                    data: 'subKategori',
                    name: 'SubKategori'
                }, {
                    data: 'cover',
                    name: 'Gambar Product',
                    class: 'text-center',
                    render: function(data) {
                        return `<a href="` + data +
                            `" target="_blank" > <img src="${data}" width="100px" height="100px"> </a>`
                    }
                }, {
                    data: 'statusJasa',
                    name: 'SubKategori'
                }]
            });

            $('#cari').keyup(function() {
                table.draw();
            });
        });
    </script>
@endsection
