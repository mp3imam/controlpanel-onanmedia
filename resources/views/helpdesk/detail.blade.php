@extends('layouts.master')

<!-- @section('title')
    {{ $title }}
@endsection -->

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @include('components.breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-md-8">
                            <h1 class="card-title mb-0">{{ $detail->jasas->nama }}</h1>
                            <h5 class="card-title mb-0">{{ $detail->order->nomor }}</h5>
                        </div>
                        <div class="col-md-4 d-flex justify-content-md-end">
                            <img src="{{ $detail->order->penjual->image }}" alt="" class="rounded-circle avatar-xs mt-1 mx-2">
                            <img src="{{ asset('assets/images/logo/logo-image.png') }}" alt="" class="rounded-circle avatar-xs mt-1">
                            <img src="{{ $detail->order->pembeli->image }}" alt="" class="rounded-circle avatar-xs mt-1 mx-2">
                            <button id="deleteButton" class="btn float-end btn-danger text-white rounded-5 me-3">
                                <i class="bx bxs-trash label-icon align-middle fs-16 me-2"></i> Selesai
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body" data-simplebar-track="success">
                    <div id="append_chat">
                        {{-- Keluhan --}}
                        <div class="row">
                            <div class="col-md-auto">
                                <img src="{{ $detail->order->pembeli->image }}" alt=""
                                    class="rounded-circle avatar-sm">
                            </div>
                            <div class="col-md-8">
                                <div class="fs-20 font-weight-bold">{{ $detail->user_public->name }} </div>
                                <span class="badge bg-success rounded-pill px-4 py-1">Pembeli</span>
                            </div>
                            <div class="col-md-3 text-end text-muted mt-2">
                                <label
                                    class="mt-2 fs-16">{{ Carbon\Carbon::parse($detail->createdAt)->format('D, d M - H:i a') }}</label>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="fs-18"><strong>Keluhan</strong></div>
                                <div class="fs-18 mt-1">{{ $detail->keluhan }}</div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="fs-18"><strong>Pesan</strong></div>
                                <div class="fs-18 mt-1">{{ $detail->pesan }}</div>
                            </div>
                            <div class="col-md-12 my-4">
                                @if ($detail->file->isNotEmpty())
                                    @foreach ($detail->file as $file => $f)
                                        <a href="{{ $f->url }}" target="_blank">{{ $f->fileName }}</a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        {{-- Keluhan --}}

                        {{-- Isi Chat --}}
                        @if ($detail->detail->isNotEmpty())
                            @foreach ($detail->detail as $dtl => $d)
                                @php
                                switch ($d->userId) {
                                    case $detail->order->userIdPenjual:
                                        $userRole = "Penjual";
                                        $color = "F97316";
                                        break;

                                    case $detail->order->userIdPembeli:
                                        $userRole = "Pembeli";
                                        $color = "10B981";
                                        break;

                                    default:
                                        $userRole = "Admin";
                                        $color = "4E36E2";
                                        break;
                                }
                                @endphp
                                <div class="row">
                                    <div class="col-md-auto">
                                        <img src="{{ $d->userPublic->image }}" alt="" class="rounded-circle avatar-sm">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="fs-20 font-weight-bold">{{ $d->userPublic->name }}</div>
                                        <span class="badge rounded-pill px-4 py-1" style="background-color: #{{ $color }}">{{ $userRole }}</span>
                                    </div>
                                    <div class="col-md-3 text-end text-muted mt-2">
                                        <label
                                            class="mt-2 fs-16">{{ Carbon\Carbon::parse($d->createdAt)->format('D, d M - H:i a') }}</label>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12 mt-4">
                                        <div class="fs-18"><strong>Pesan</strong></div>
                                        <div class="fs-18 mt-1">{{ $d->pesan }}</div>
                                    </div>
                                    <div class="col-md-12 my-4">
                                        @if ($d->file->isNotEmpty())
                                            @foreach ($d->file as $file => $f)
                                                <a href="{{ $f->url }}" target="_blank">{{ $f->fileName }}</a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                        @endif

                        {{-- Isi Chat --}}
                    </div>
                </div><!-- end card -->
                <div class="card-fotter">
                    <div class="row mt-2">
                        <div class="col-md-8 my-2">
                            <strong class="fs-18">Berikan balasan</strong>
                        </div>
                        <div class="col-md-4">
                            <strong class="fs-18">Lampirkan file</strong>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <textarea class="form-control" name="balasan" id="balasan" cols="30" rows="4"
                                        placeholder="Tulis balasan di sini...."></textarea>
                                        <input id="helpdeskId" value="{{ $detail->id }}" hidden />
                                </div>
                                <div class="col-md">
                                    <form action="{{ route('helpdesk.upload.image') }}" enctype="multipart/form-data"
                                        class="dropzone dz-clickable"
                                        style="width: 100%; height: 100px; min-height: 0px !important;" id="image-upload"
                                        method="post">
                                        @csrf
                                        <input id="random_text" name="random_text" value="{{ Str::random(25) }}" hidden />
                                        <div class="dz-default dz-message" style="margin:0px !important; font-size: 20px">
                                            <div>Drag & drop a photo or</div>
                                            <span class="text-primary">Browse</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <a class="btn btn-warning float-end text-white rounded-5 me-3"
                                href="{{ route('helpdesk_list.index') }}">
                                <i class="ri-arrow-go-back-line"></i> Kembali
                            </a>
                            <button id="simpan" class="btn float-end btn-success text-white rounded-5 me-3"
                                style="background-color: #4E36E2">
                                <i class="bx bxs-save label-icon align-middle fs-16 me-2"></i> Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"
        integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('#simpan').click(function() {
                var data = new FormData();
                data.append('balasan', $('#balasan').val())
                data.append('random_text', $('#random_text').val())
                data.append('helpdesk_id', $('#helpdeskId').val())
                $.ajax({
                    type: "POST",
                    url: "{{ route('helpdesk_list.store') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                }).success(function(res) {
                    $('#append_chat').append(`
                        <div class="row">
                            <div class="col-md-auto">
                                <img src="{{ asset('assets/images/logo/logo-image.png') }}" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <div class="col-md-8">
                                <div class="fs-20 font-weight-bold">OnanMedia</div>
                                <span class="badge rounded-pill px-4 py-1" style="background-color: #4E36E2">Admin</span>
                            </div>
                            <div class="col-md-3 text-end text-muted mt-2">
                                <label
                                    class="mt-2 fs-16">{{ Carbon\Carbon::now()->format('D, d M - H:i a') }}</label>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12 mt-4">
                                <div class="fs-18"><strong>Pesan</strong></div>
                                <div class="fs-18 mt-1">`+$('#balasan').val()+`</div>
                            </div>
                            <div class="col-md-12 my-4">
                            </div>
                        </div>
                    `)
                });
            })

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
</script>
@endsection
