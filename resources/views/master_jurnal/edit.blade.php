@extends('layouts.master')

<!-- @section('title')
    {{ $title }}
@endsection -->

@section('content')
@section('css')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link
    href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
    rel="stylesheet"
/>
@endsection
@include('components.breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-11">
                        <h4 class="card-title mb-0">Detail <span style="color:#4E36E2">{{ $detail->nomor_transaksi ." => ". $detail->dokumen }}</span></h4>
                    </div>
                    <div class="col">
                        <div class="row float-end">
                            <div class="col">
                                @if ($detail->jenis == 0)
                                    <button type="button" class="btn btn-outline-danger btn-icon waves-effect waves-light float-end" onclick="konfirmasi_hapus('{{ $detail->id }}',`{{ $detail->nomor_transaksi }}`)" target="_blank"><i class="ri-delete-bin-5-line"></i></button>
                                @endif
                            </div>
                            <div class="col">
                                <a href="{{ route('master_jurnal.index') }}" class="btn bg-animation rounded-5 btn-outline-primary waves-effect waves-light float-end" style="color: #4E36E2"><i class="ri-arrow-go-back-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('master_jurnal.update', $detail->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="row mb-3">
                                @if ($detail->jurnal_file->isNotEmpty())
                                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            @foreach ($detail->jurnal_file as $foto => $f)
                                                <button id="carousel-role{{ $f->id }}" type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $foto }}" class="active" aria-current="true" aria-label="Slide {{ $foto }}"></button>
                                            @endforeach
                                        </div>
                                        <div class="carousel-inner">
                                            @foreach ($detail->jurnal_file as $foto => $f)
                                                <div id="carousel{{ $f->id }}" class="carousel-item {{ $foto == 0 ? 'active' : '' }}" data-bs-interval="2000">
                                                    <img id="{{ $f->id }}" class="d-block" width="100%" height="300px" src="{{ asset($f->path)."/".$f->filename }}" >
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <a href="{{ asset($f->path)."/".$f->filename }}" target="_blank" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-external-link-line"></i></a>
                                                        @if ($detail->jenis == 0)
                                                            <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" onclick="hapus_gambar('{{ $f->id }}')"><i class="ri-delete-bin-5-line"></i></button>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                @endif

                                @if ($detail->jenis == 0)
                                    <div class="col-md-12">
                                        <input class="bg-success" type="file" name="attachment[]" id="attachment" accept="image/*" multiple>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="tanggal_transaksi" class="form-label">TANGGAL TRANSAKSI</label>
                                <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="{{ $detail->tanggal_transaksi }}" {{ $detail->jenis == 0 ? "" : "disabled" }} required/>
                            </div>
                            {{--
                            <div class="col-md-12 mb-4">
                                <div>
                                    <p class="text-muted fw-medium">Jenis Pembayaran</p>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis" id="jenis_transaksi_1" {{ $detail->jenis == 0 ? "checked=''" : "" }}  value="1" {{ $detail->jenis == 0 ? "" : "disabled" }}>
                                        <label class="form-check-label" for="jenis_transaksi_1">
                                            Transfer
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis" id="jenis_transaksi_2" {{ $detail->jenis == 0 ? "checked=''" : "" }} value="2" {{ $detail->jenis == 0 ? "" : "disabled" }}>
                                        <label class="form-check-label" for="jenis_transaksi_2">
                                            Cash
                                        </label>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-md-6 mb-4">
                                <label for="keterangan_jurnal_umum" class="form-label">KETERANGAN</label>
                                <textarea class="form-control" id="keterangan_jurnal_umum" name="keterangan_jurnal_umum" rows="1" {{ $detail->jenis == 0 ? "" : "disabled" }}>{{ $detail->keterangan_jurnal_umum }}</textarea>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="card-title mb-0 text-uppercase">Detail Jurnal</h6>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($detail->jenis == 0)
                                                <button class="btn float-end" type="button" onclick="tambah_detail()" style="background-color:#E0E7FF; color:#4E36E2"><i class="ri-add-box-fill"></i> Tambah Baris</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-header">
                                        <div class="row font-weight-bold">
                                            <div class="col-md-3">Akun</div>
                                            <div class="col">Keterangan</div>
                                            <div class="col">Debit</div>
                                            <div class="col">Kredit</div>
                                            @if ($detail->jenis == 0 && $belanja !== 0)
                                                <div class="col text-center"></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-body tambah_detail">
                                        @foreach ($detail->details as $belanja => $b)
                                            <div class="row delete_detail mt-2">
                                                <div class="col-md-3">
                                                    <select id="akun_belanja{{ $b->id }}" name="akun_belanja[]" class="form-control akun_belanja" {{ $detail->jenis == 0 ? "" : "disabled" }} required ></select>
                                                </div>
                                                <div class="col">
                                                    <input id="keterangan[]" name="keterangan[]" class="form-control" value="{{ $b->keterangan }}" {{ $detail->jenis == 0 ? "" : "disabled" }} />
                                                </div>
                                                <div class="col">
                                                    <input class="form-control text-end debet" id="debet[]" name="debet_detail[]" value="{{ $b->debet ?? '0' }}" onkeyup="countDebet()" {{ $detail->jenis == 0 ? "" : "disabled" }} required/>
                                                </div>
                                                <div class="col">
                                                    <input class="form-control text-end kredit" id="kredit[]" name="kredit_detail[]" value="{{ $b->kredit ?? '0' }}" onkeyup="countKredit()" {{ $detail->jenis == 0 ? "" : "disabled" }} required/>
                                                </div>
                                                @if ($detail->jenis == 0 && $belanja !== 0)
                                                    <div class="col">
                                                            <div class="text-center float-end hapus_detail">
                                                                    <i class="ri-delete-bin-line text-danger ri-2x"></i>
                                                            </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col text-uppercase">TOTAL</div>
                                            <div class="col">
                                                <input class="form-control text-end total text-white" style="background-color: #4E36E2" id="total_debet" name="total_debet" value="{{ $detail->debet }}" readonly/>
                                            </div>
                                            <div class="col">
                                                <input class="form-control text-end total text-white" style="background-color: #4E36E2" id="total_kredit" name="total_kredit" value="{{ $detail->kredit }}" readonly/>
                                            </div>
                                            @if ($detail->jenis == 0 && $belanja !== 0)
                                                <div class="col">
                                                    <div id="ubahwarna" class="col text-white text-end rounded-3" style="background-color: #4E36E2; padding-right: 20px">
                                                        <label class="mt-2" id="total_all" name="total_all">Rp. 0</label>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-end">
                            @if ($detail->jenis == 0)
                                <button class="btn btn-success mr-5 rounded-5 bg-animation bg-success"><i class="ri-ball-pen-fill label-icon align-middle fs-16 me-2"></i> Ubah</button>
                                    &nbsp;&nbsp;&nbsp;
                            @endif
                            <a href="{{ route('master_jurnal.index') }}" class="btn bg-animation rounded-5 btn-outline-primary waves-effect waves-light float-end" style="color: #4E36E2"><i class="ri-arrow-go-back-line"></i></a>
                        </div>
                    </form>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!--end row-->
@endsection

@section('script')

<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script>
    var detail = "{{ $detail->jenis }}"
    if (detail == 0){
        FilePond.registerPlugin(FilePondPluginImagePreview);

        const inputElement = document.querySelector('input[id="attachment"]');
        const pond = FilePond.create(inputElement);
        const pondBox = document.querySelector('.filepond--root');
        pondBox.addEventListener('FilePond:addfile', e => {
            var fileName = pond.getFile();
        });

        FilePond.setOptions({
            allowMultiple: true,
            server: {
                process: "/upload_foto_jurnal_umum",
                headers:{'X-CSRF-TOKEN': '{{ csrf_token() }}'}
            }
        });

    }

    function hapus_gambar(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ route("hapus_foto_jurnal_umum") }}',
                    data: { '_token': $('meta[name=csrf-token]').attr('content'), id: id },
                    type: 'POST',
                    success: function (resp) {
                        if (resp.status == 200) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success",
                                showConfirmButton: false, // Hide the confirmation button
                                timer: 1500 // Automatically close after 1.5 seconds
                            });
                            $('#' + id).remove(); // Remove the image
                            $('#carousel' + id).remove(); // Remove the image
                            $('#carousel-role' + id).remove(); // Remove the image
                        } else {
                            Swal.fire("Failed !!!", "An error occurred while deleting the image", "error");
                        }
                    },
                    error: function () {
                        Swal.fire("Failed !!!", "An error occurred while deleting the image", "error");
                    }
                });
            }
        });
    }

    var f = {!! json_encode($detail->details) !!}
    var s = {!! json_encode($detail->sumber_data) !!}
    var akun_belanja = {!! json_encode($detail->coa_jurnal) !!}

    $.each(f, function(i, item) {
        var dataId = item.coa_jurnal.id
        var dataText = item.coa_jurnal.uraian
        if (i !== 1 && s == 3 || i == f.length -1 && s == 4) {
            dataId = item.jurnal_banks.id
            dataText = item.jurnal_banks.nama
        }

        var data = {id: dataId, text: dataText, selected: true};
        var newOption = new Option(data.text, data.id, false, false)
        $('#akun_belanja'+item.id).append(newOption).trigger('change')
        $('#akun_belanja'+item.id).select2()
    });

    $(function(){
        $("#modal_account_id").select2({
            allowClear: true,
            width: '100%',
            ajax: {
                url: "{{ route('api.get_select2_banks_coa') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.id,
                            text: item.name
                        }
                    })
                };
                }
            }
        });

        $(".akun_belanja").select2({
            allowClear: true,
            width: '100%',
            ajax: {
                url: "{{ route('api.get_select2_uraian') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.id,
                            text: item.name
                        }
                    })
                };
                }
            }
        }).on('select2:select', function (e) {
            $("#jenis_sumber").val(e.params.data.item);
        });
    })

    function convertRupiah(){
        $(".debet").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});
        $('#total_debet').priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});

        $(".kredit").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});
        $('#total_kredit').priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});
        $('#total_all').text(parseInt($('#total_debet').val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")) - parseInt($('#total_kredit').val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")))
        $('#total_all').priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});
        $('#total_all').text() !== "Rp. 0" ? $('#ubahwarna').attr('style', 'background-color : #E9967A; padding-right: 20px') : $('#ubahwarna').attr('style', 'background-color : #4E36E2; padding-right: 20px')
    }

    var count = 1000
    function tambah_detail() {
        $('.tambah_detail').append(`
            <div class="row delete_detail mt-2">
                <div class="col-md-3">
                    <select id="akun_belanja`+count+++`" name="akun_belanja[]" class="form-control akun_belanja" required ></select>
                </div>
                <div class="col">
                    <input id="keterangan" name="keterangan[]" class="form-control" />
                </div>
                <div class="col">
                    <input class="form-control text-end debet" id="debet[]" name="debet_detail[]" onkeyup="countDebet()"  required/>
                </div>
                <div class="col">
                    <input class="form-control text-end kredit" id="kredit[]" name="kredit_detail[]" onkeyup="countKredit()"  required/>
                </div>
                <div class="col text-center hapus_detail">
                    <i class="ri-delete-bin-line text-danger ri-2x"></i>
                </div>
            </div>
        `);

        // Inisialisasi Select2 pada elemen dengan class akun_belanja
        $(".akun_belanja").select2({
            allowClear: true,
            width: '100%',
            ajax: {
                url: "{{ route('api.get_select2_uraian') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data.data, function(item) {
                            return {
                                id: item.id,
                                text: item.name
                            };
                        })
                    };
                }
            }
        }).on('select2:select', function(e) {
            $("#jenis_sumber").val(e.params.data.item);
        });

        $('.hapus_detail').click(function() {
            $(this).closest('.delete_detail').remove();
            countDebet()
            countKredit()
        });

        $(".nilai").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});
        convertRupiah()

    }

    $('.hapus_detail').click(function(){
        $(this).closest('.delete_detail').remove();
        countDebet()
        countKredit()
    })

    countDebet()
    countKredit()

    function countDebet() {
        var sum_value = 0;
        $('.debet').each(function(){
            sum_value += +$(this).val().replace("Rp. ","").replaceAll(",","").replaceAll(".","");
            $('#total_debet').val(sum_value);
        })

        $('#total_debet').priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});
        $('#total_all').text(parseInt($('#total_debet').val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")) - parseInt($('#total_kredit').val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")))
        $('#total_all').priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});
        convertRupiah()
    }

    function countKredit() {
        var sum_value = 0;
        $('.kredit').each(function(){
            sum_value += +$(this).val().replace("Rp. ","").replaceAll(",","").replaceAll(".","");
            $('#total_kredit').val(sum_value);
        })

        $('#total_kredit').priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});
        $('#total_all').text(parseInt($('#total_debet').val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")) - parseInt($('#total_kredit').val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")))
        $('#total_all').priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});
        convertRupiah()
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function konfirmasi_hapus(id, name){
        Swal.fire({
            title: "Masukan Alasan menghapus data Jurnal "+name,
            input: "text",
            inputAttributes: {
                autocapitalize: "off"
            },
            showCancelButton: true,
            confirmButtonText: "Hapus",
            }).then((result) => {
            if (result.isConfirmed && result.value) {
                var data = new FormData();
                data.append('id', id);
                data.append('alasan', result.value);
                $.ajax({
                    type: "post",
                    url: "{{ route('softdelete_jurnal_umum') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        Swal.fire({
                            title: 'Hapus!',
                            text: 'Data berhasil di hapus',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: false,
                            timer: 2500
                        }).then(function(){
                            window.location.href = "{{ route('master_jurnal.index') }}";
                        });
                    }
                });
            }

        });
    }

</script>
@endsection
