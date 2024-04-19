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
                            <form method="POST" action="{{ route('absen') }}">
                                @csrf
                                <div style="width:100%; height:300px;" id="my_camera"></div>
                                <input type="hidden" name="image" class="image-tag">
                                <button class="btn btn-success mt-3">Absen</button>
                                <div id="results" hidden>Your captured image will appear here...</div>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="card">
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
                                    <div class="card">
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
                                    <div class="card">
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
                                    <div class="card">
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

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0 align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Jumlah Pengunjung disetiap Satker hari ini</h4>
                                <span id="total_tamu" class="text-success text-end"></span>
                            </div>
                            <div class="card-body p-0 pb-3">
                                <div id="chart_tamu" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-colors="[&quot;--vz-success&quot;, &quot;--vz-danger&quot;]" class="apex-charts"
                                    dir="ltr" style="min-height: 309px;">
                                </div>
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
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
        Webcam.set({
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }
    </script>
@endsection
