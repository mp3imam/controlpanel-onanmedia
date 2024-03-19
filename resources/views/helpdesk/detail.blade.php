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
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-md-8">
                                <h1 class="card-title mb-0">{{ $detail->jasas->nama }}</h1>
                                <h5 class="card-title mb-0">{{ $detail->order->nomor }}</h5>
                            </div>
                            <div class="col-md-4 d-flex justify-content-md-end">
                                <img src="{{ $detail->order->penjual->image }}" alt=""
                                    class="rounded-circle avatar-xs mt-1 mx-2">
                                <img src="{{ asset('assets/images/logo/logo-image.png') }}" alt=""
                                    class="rounded-circle avatar-xs mt-1">
                                <img src="{{ $detail->order->pembeli->image }}" alt=""
                                    class="rounded-circle avatar-xs mt-1 mx-2">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
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
                                    <div class="fs-18 mt-1">{!! nl2br(e($detail->pesan)) !!}</div>
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
                                                $userRole = 'Penjual';
                                                $color = 'F97316';
                                                break;

                                            case $detail->order->userIdPembeli:
                                                $userRole = 'Pembeli';
                                                $color = '10B981';
                                                break;

                                            default:
                                                $userRole = 'ADMIN';
                                                $color = '4E36E2';
                                                break;
                                        }
                                    @endphp
                                    <div class="row">
                                        <div class="col-md-auto">
                                            <img src="{{ $userRole != 'ADMIN' ? $d->userPublic->image : asset('assets/images/logo/logo-image.png') }}"
                                                alt="" class="rounded-circle avatar-sm">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="fs-20 font-weight-bold">{{ $d->userPublic->name }}</div>
                                            <span class="badge rounded-pill px-4"
                                                style="background-color: #{{ $color }}">{{ $userRole }}</span>
                                        </div>
                                        <div class="col-md-3 text-end text-muted mt-2">
                                            <label
                                                class="mt-2 fs-16">{{ Carbon\Carbon::parse($d->createdAt)->format('D, d M - H:i a') }}</label>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-12 mt-4">
                                            <div class="fs-18"><strong>Pesan</strong></div>
                                            <div class="fs-18 mt-1">{!! nl2br(e($d->pesan)) !!}</div>
                                        </div>
                                        <div class="col-md-12 my-4">
                                            @if ($d->file_details->isNotEmpty())
                                                @foreach ($d->file_details as $file => $f)
                                                    <a class="mx-2" href="{{ $f->url }}"
                                                        target="_blank">{{ $f->fileName }}</a>
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
                    @if ($detail->helpdeskStatusId !== 4)
                        <div class="card-fotter">
                            @foreach ($adminBalasan as $balasan => $b)
                                <div onclick="copy_balasan(`{{ $b->isi }}`)"
                                    class="alert alert-dismissible show alert-aktif rounded-5"
                                    style="color:#4E36E2; border-color:#4E36E2" role="alert">
                                    {{ $b->isi }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endforeach
                            <div class="row mt-2">
                                <div class="col-md-8 my-2">
                                    <strong class="fs-18">Berikan balasan <span class="cursor-pointer text-success"
                                            onclick="window.location.reload();">template</span></strong>
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
                                                style="width: 100%; height: 100px; min-height: 0px !important;"
                                                id="image-upload" method="post" id="gambar-dropzone">
                                                @csrf
                                                <input id="random_text" name="random_text" value="{{ Str::random(25) }}" hidden />
                                                <div class="dz-default dz-message"
                                                    style="margin:0px !important; font-size: 20px">
                                                    <div>Drag & drop a photo or</div>
                                                    <span class="text-primary">Browse</span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button id="simpan" class="btn btn-success text-white rounded-5 me-3"
                                        style="background-color: #4E36E2">
                                        <i class="ri-send-plane-fill"></i> Kirim
                                    </button>
                                    <a class="btn btn-outline-dark btn-border rounded-5 me-3"
                                        href="{{ route('helpdesk_list.index') }}">
                                        <i class="ri-reply-fill"></i> Batal
                                    </a>
                                    @if ($detail->isAktif == 0)
                                        <button id="support_seller" type="button"
                                            class="btn btn-border rounded-5 me-3 text-white" style="background-color: #F97316"
                                            onclick="konfirmasi_seller('{{ $detail->id }}','{{ $detail->order->pembeli->name }}','{{ $detail->order->penjual->name }}','{{ $detail->order->penjual->email }}')">
                                            <i class="ri-customer-service-2-fill ri-1x"></i> Support Penjual
                                        </button>
                                    @endif
                                    @if ($detail->isAktif == 1)
                                        <a type="button" target="_blank"
                                            href="https://api.whatsapp.com/send/?phone={{ $detail->order->penjual->phone }}&text=Hallo Bpk/Ibu {{ $detail->order->penjual->name }}. Kami dari OnanMedia, ada keluhan tentang penjualan anda. Silahkan buka Onanmedia.com untuk informasi lebih lanjut atau bisa wa langsung disini. Terima kasih&type=phone_number&app_absent=0"
                                            class="btn btn-success btn-border rounded-5 me-3">
                                            <i class="ri-whatsapp-fill ri-1x"></i> WhatsApp Penjual
                                        </a>
                                        <a type="button" target="_blank"
                                            href="https://api.whatsapp.com/send/?phone={{ $detail->order->pembeli->phone }}&text=Hallo Bpk/Ibu {{ $detail->order->penjual->name }}. Kami dari OnanMedia, ada keluhan tentang penjualan anda. Silahkan buka Onanmedia.com untuk informasi lebih lanjut atau bisa wa langsung disini. Terima kasih&type=phone_number&app_absent=0"
                                            class="btn btn-warning btn-border rounded-5 me-3">
                                            <i class="ri-whatsapp-fill ri-1x"></i> WhatsApp Pembeli
                                        </a>
                                    @endif
                                    <button id="done_button" onclick="button_selesai(`{{ $detail->id }}`,`{{ $detail->order->nomor }}`)" class="btn btn-danger text-white rounded-5 me-3">
                                        <i class="ri-pushpin-fill label-icon align-middle fs-16 me-2"></i>
                                        Selesai
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
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
                    type: "post",
                    url: "{{ route('helpdesk_list.store') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        $('#append_chat').append(`
                        <div class="row">
                            <div class="col-md-auto">
                                <img src="{{ asset('assets/images/logo/logo-image.png') }}" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <div class="col-md-8">
                                <div class="fs-20 font-weight-bold">${result.message.user_public.name}</div>
                                <span class="badge rounded-pill px-4 py-1" style="background-color: #4E36E2">ADMIN</span>
                            </div>
                            <div class="col-md-3 text-end text-muted mt-2">
                                <label class="mt-2 fs-16">
                                    {{ Carbon\Carbon::now()->format('D, d M - H:i a') }}
                                </label>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12 mt-4">
                                <div class="fs-18"><strong>Pesan</strong></div>
                                <div class="fs-18 mt-1">${result.message.pesan}</div>
                            </div>
                            <div class="col-md-12 my-4 append_image">
                            </div>
                        </div>
                    `)

                        result.message.file_details.forEach(element => {
                            $('.append_image').append(
                                `<a class="mx-2" href="${element.url}" target="_blank">${element.fileName}</a>`
                            )
                        });

                    }
                }).done(function(e) {
                    $('#balasan').val("");
                    $('#drop-zone-container').empty();
                    $("html, body").animate({
                        scrollTop: $(document).height() - $(window).height()
                    });
                    $('.dz-default').remove();
                    $('.dz-preview').remove();
                })
            })

            $("html, body").animate({
                scrollTop: $(document).height() - $(window).height()
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });

        function konfirmasi_seller(id, pembeli_name, penjual_name, email_penjual) {
            $('#support_seller').attr('disabled', true)
            Swal.fire({
                title: "Aktifkan Chat dengan Seller " + penjual_name,
                showCancelButton: true,
                confirmButtonText: "Aktifkan",
            }).then((result) => {
                if (result.isConfirmed) {
                    var data = new FormData();
                    data.append('id', id);
                    data.append('pembeli', pembeli_name);
                    data.append('penjual', penjual_name);
                    data.append('email', email_penjual);
                    $.ajax({
                        type: "post",
                        url: "{{ route('aktifkan.seller.chat', $detail->id) }}",
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function(result) {
                            var data = new FormData();
                            data.append('balasan', 'Baik Bapak/Ibu ' + pembeli_name +
                                ', Mohon tunggu 2 x 24 Jam, kami akan menghubungi dari pihak Penjual. Terima kasih'
                            )
                            data.append('random_text', $('#random_text').val())
                            data.append('helpdesk_id', $('#helpdeskId').val())
                            $.ajax({
                                type: "post",
                                url: "{{ route('helpdesk_list.store') }}",
                                data: data,
                                processData: false,
                                contentType: false,
                                success: function(result) {
                                    $('#append_chat').append(`
                    <div class="row">
                        <div class="col-md-auto">
                            <img src="{{ asset('assets/images/logo/logo-image.png') }}" alt="" class="rounded-circle avatar-sm">
                        </div>
                        <div class="col-md-8">
                            <div class="fs-20 font-weight-bold">${result.message.user_public.name}</div>
                            <span class="badge rounded-pill px-4 py-1" style="background-color: #4E36E2">ADMIN</span>
                        </div>
                        <div class="col-md-3 text-end text-muted mt-2">
                            <label class="mt-2 fs-16">
                                {{ Carbon\Carbon::now()->format('D, d M - H:i a') }}
                            </label>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 mt-4">
                            <div class="fs-18"><strong>Pesan</strong></div>
                            <div class="fs-18 mt-1">${result.message.pesan}</div>
                        </div>
                        <div class="col-md-12 my-4 append_image">
                        </div>
                    </div>
                    `)

                                    result.message.file_details.forEach(element => {
                                        $('.append_image').append(
                                            `<a class="mx-2" href="${element.url}" target="_blank">${element.fileName}</a>`
                                        )
                                    });
                                }
                            }).done(function(e) {
                                $('#balasan').val("");
                                $('#drop-zone-container').empty();
                                $("html, body").animate({
                                    scrollTop: $(document).height() - $(window).height()
                                });
                                $('.dz-default').remove();
                                $('.dz-preview').remove();
                            })

                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Data berhasil di aktifkan',
                                icon: 'success',
                                confirmButtonClass: 'btn btn-primary w-xs mt-2',
                                buttonsStyling: false,
                                timer: 2500
                            })
                            window.location.reload();
                        }
                    });
                } else {
                    $('#support_seller').attr('disabled', false)
                }
            });
        }
        function button_selesai(id, nomor) {
        // Disable the button with id 'done_button' when the function is called
        $('#done_button').prop('disabled', true);

        // Show a confirmation dialog using Swal (SweetAlert)
        Swal.fire({
            title: "Menyelesaikan Keluhan dengan nomor " + nomor,
            showCancelButton: true,
            confirmButtonText: "Selesai",
        }).then((result) => {
            // Handle the result of the confirmation dialog
            if (result.isConfirmed) {
                // Create a FormData object and append the 'id' parameter
                var data = new FormData();
                data.append('id', id);

                // Make an AJAX request to the specified route with the FormData
                $.ajax({
                    type: "post",
                    url: "{{ route('selesaikan.keluhan') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        // Show a success message using Swal
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Data berhasil diaktifkan',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: false,
                            timer: 2500
                        });

                        // Redirect to the specified route after successful completion
                        window.location.href = "{{ route('helpdesk_list.index') }}";
                    }
                });
            } else {
                // Re-enable the button with id 'done_button' if the user cancels the action
                $('#done_button').prop('disabled', false);
            }
        });
    }

        function copy_balasan(isi) {
            $('#balasan').val(isi)
            $('.alert-aktif').remove();
        }
</script>
@endsection
