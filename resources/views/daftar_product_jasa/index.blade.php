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
                        <div class="row">
                            <div class="col-md-4 p-3">
                                <label class="form-label">Filter Nama Jasa</label>
                                <input class="form-control" id='cari' name="cari" />
                            </div>
                            <div class="col-md-4 p-3">
                                <label for="inputState" class="form-label">Filter Status</label>
                                <select id="cari_status" class="form-control">
                                    <option selected="" value="-">Semua</option>
                                    <option value="0">Draft</option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Sedang Verifikasi</option>
                                    <option value="3">Diminta Perubahan</option>
                                    <option value="4">Ditolak</option>
                                    <option value="5">Ditahan</option>
                                    <option value="6">Non Aktif</option>
                                </select>
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
                stateSave: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('daftar_product_jasa.create') }}",
                    data: function(d) {
                        d.cari = $('#cari').val(),
                            d.status = $('#cari_status').val()
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
                        return `<a href="${data}" target="_blank"><img src="${data}" width="100px" height="100px"></a>`
                    }
                }, {
                    data: 'statusJasa',
                    name: 'SubKategori'
                }]
            });

            $('#cari').keyup(function() {
                table.draw();
            });

            $('#cari_status').change(function() {
                table.draw();
            });
        });
    </script>
@endsection
