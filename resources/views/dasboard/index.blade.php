@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/swiper/swiper.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <div class="row">
        <div class="col-xxl-12 order-xxl-0 order-first">
            <div class="d-flex flex-column h-100">
                <div class="row h-100">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <form id="capture-form" method="POST" action="{{ route('absen') }}">
                                @csrf
                                <div style="width:100%; height:300px;" id="my_camera"></div>
                                <input type="hidden" name="image" class="image-tag">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary mt-3 px-4"
                                            onClick="take_snapshot()">Absen</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-outline-dark mt-3 px-4">Izin</button>
                                    </div>
                                </div>
                                <div id="results" hidden>Your captured image will appear here...</div>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="card py-3">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 m-2">
                                                    <img src="assets/images/users/avatar-1.jpg" alt=""
                                                        class="avatar-md rounded-circle card-animate">
                                                </div>
                                                <div class="flex-grow-1 ms-2">
                                                    <h5 class="card-title mb-1 fs-20 fw-bold">12</h5>
                                                    <p class="text-muted mb-0">Hadir hari ini</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="card py-3">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 m-2">
                                                    <img src="assets/images/users/avatar-1.jpg" alt=""
                                                        class="avatar-md rounded-circle card-animate">
                                                </div>
                                                <div class="flex-grow-1 ms-2">
                                                    <h5 class="card-title mb-1 fs-20 fw-bold">12</h5>
                                                    <p class="text-muted mb-0">Hadir hari ini</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="card py-3">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 m-2">
                                                    <img src="assets/images/users/avatar-1.jpg" alt=""
                                                        class="avatar-md rounded-circle card-animate">
                                                </div>
                                                <div class="flex-grow-1 ms-2">
                                                    <h5 class="card-title mb-1 fs-20 fw-bold">12</h5>
                                                    <p class="text-muted mb-0">Hadir hari ini</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="card py-3">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 m-2">
                                                    <img src="assets/images/users/avatar-1.jpg" alt=""
                                                        class="avatar-md rounded-circle card-animate">
                                                </div>
                                                <div class="flex-grow-1 ms-2">
                                                    <h5 class="card-title mb-1 fs-20 fw-bold">12</h5>
                                                    <p class="text-muted mb-0">Hadir hari ini</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-xl-12">
                        <table id="dataTable" class="table table-striped table-bordered table-sm no-wrap" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama </th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                    <th>Jenis</th>
                                    <th>Bukti Kehadiran</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" id="modal_content_layanan">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

@section('script')
    <script language="JavaScript">
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
                    url: "{{ route('absen.list') }}",
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
                    name: 'User',
                    render: function(data, type, row, meta) {
                        return `<a href="/daftar_tender/${row.id}/edit" class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm">${data}</a>`;
                    }
                }, {
                    data: 'tanggal',
                    name: 'Tanggal'
                }, {
                    data: 'waktu',
                    name: 'Waktu'
                }, {
                    data: 'status',
                    name: 'Status'
                }, {
                    data: 'jenis_absen',
                    name: 'Jenis'
                }, {
                    data: 'foto',
                    name: 'Bukti Kehadiran',
                    render: function(data, type, row, meta) {
                        return `<img src="${data}" width="300" height="200" />`;
                    }
                }]
            });

            $('#judulTender').keyup(function() {
                table.draw();
            });
        });


        Webcam.set({
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="' + data_uri + '" />';
                document.getElementById('capture-form').submit();
            });
        }
    </script>
@endsection
