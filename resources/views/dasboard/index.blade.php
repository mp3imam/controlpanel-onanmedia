@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/swiper/swiper.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <div class="row">
        <div class="col-xxl-12 order-xxl-0 order-first">
            <div class="d-flex flex-column h-100">
                <div class="row h-100">
                    <div class="col-lg-6 col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Monitor KiosK
                                        </p>
                                    </div>
                                </div>
                                <div id="chart" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-colors="[&quot;--vz-primary&quot;, &quot;--vz-info&quot;, &quot;--vz-warning&quot;, &quot;--vz-success&quot;]"
                                    class="apex-charts mt-2" dir="ltr" style="min-height: 202.7px;">
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Admin Layanan
                                        </p>
                                    </div>
                                </div>
                                <div id="admin_layanan" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-colors="[&quot;--vz-primary&quot;, &quot;--vz-info&quot;, &quot;--vz-warning&quot;, &quot;--vz-success&quot;]"
                                    class="apex-charts mt-2" dir="ltr" style="min-height: 202.7px;">
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div>
                    {{-- <div class="col-lg-4 col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Rating Satker
                                            Terbaik
                                        </p>
                                    </div>
                                </div>
                                <div id="top_rating"
                                    data-colors="[&quot;--vz-primary&quot;, &quot;--vz-info&quot;, &quot;--vz-warning&quot;, &quot;--vz-success&quot;]"
                                    class="apex-charts mt-2" dir="ltr" style="min-height: 202.7px;">
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div> --}}
                </div><!-- end row -->

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
    <script type="text/javascript">

    </script>
@endsection
