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
                    <div class="col-md-11">
                        <h4 class="card-title">Tambah Jurnal Umum</h4>
                    </div>
                    <div class="col">
                        <a href="{{ route('master_jurnal.index') }}" class="btn bg-animation rounded-5 btn-outline-primary waves-effect waves-light float-end" style="color: #4E36E2"><i class="ri-arrow-go-back-line"></i></a>
                    </div>
                </div><!-- end card header -->

                <form action="{{ route('upload.foto.jurnal.umum') }}" enctype="multipart/form-data" class="dropzone dz-clickable" id="image-upload" method="post" id="gambar-dropzone">
                    @csrf
                    <input id="random_text" name="random_text" value="{{ $random_string }}" hidden />
                    <input id="folder" name="folder" value="Jurnal_Umum" hidden />
                    <div class="dz-default dz-message">
                        <div>Drag & drop a photo or</div>
                        <span class="text-primary">Browse</span>
                    </div>
                    <ul class="list-unstyled mb-0" id="dropzone-preview"></ul>
                </form>
                <div class="dz-preview dz-file-preview">
                    <div class="dz-details">
                      <div class="dz-filename"><span data-dz-name></span></div>
                      <div class="dz-size" data-dz-size></div>
                      <img data-dz-thumbnail />
                    </div>
                    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                    <div class="dz-success-mark"><span>✔</span></div>
                    <div class="dz-error-mark"><span>✘</span></div>
                    <div class="dz-error-message"><span data-dz-errormessage></span></div>
                  </div>
                <div class="card-body">
                    <form action="{{ route('master_jurnal.store') }}" method="POST" enctype="multipart/form-data" onsubmit="myButtonValue.disabled = true; return true;">
                    @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                            <input id="random_text" name="random_text" value="{{ $random_string }}" hidden />
                            <label for="tanggal_transaksi" class="form-label">TANGGAL TRANSAKSI</label>
                                <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required/>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="modal_jenis_mata_uang" class="form-label">Jenis Mata Uang</label>
                                <select id="modal_jenis_mata_uang" name="modal_jenis_mata_uang" class="form-control" required></select>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="keterangan_jurnal_umum" class="form-label">KETERANGAN</label>
                                <textarea class="form-control" id="keterangan_jurnal_umum" name="keterangan_jurnal_umum" rows="1"></textarea>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <h6 class="card-title mb-0">Detail Jurnal</h6>
                                    </div>
                                </div>
                                <button class="btn form-control" type="button" onclick="tambah_detail()" style="background-color:#E0E7FF; color:#4E36E2"><i class="ri-add-box-fill"></i> Tambah Baris</button>
                                <div class="card-body">
                                    <div class="card-header">
                                        <div class="row font-weight-bold">
                                            <div class="col-md-3">Akun</div>
                                            <div class="col">Keterangan</div>
                                            <div class="col">Debit</div>
                                            <div class="col">Kredit</div>
                                            <div class="col text-center">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body tambah_detail">
                                        <div class="row delete_detail">
                                            <div class="col-md-3">
                                                <select id="akun_belanja" name="akun_belanja[]" class="form-control akun_belanja" required ></select>
                                            </div>
                                            <div class="col">
                                                <input id="keterangan[]" name="keterangan[]" class="form-control" />
                                            </div>
                                            <div class="col">
                                                <input class="form-control debet_detail text-end" id="debet_detail[]" name="debet_detail[]"  onkeyup="countDebet()" required/>
                                            </div>
                                            <div class="col">
                                                <input class="form-control text-end kredit_detail" id="kredit_detail[]" name="kredit_detail[]"  onkeyup="countKredit()" required/>
                                            </div>
                                            <div class="col text-center float-end hapus_detail">
                                                {{-- <i class="ri-delete-bin-line text-danger ri-2x"></i> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col text-uppercase">
                                                TOTAL
                                            </div>
                                            <div class="col">
                                                <input class="form-control text-end total_debet text-white" style="background-color: #4E36E2"  id="total_debet" name="total_debet" readonly/>
                                            </div>
                                            <div class="col">
                                                <input class="form-control text-end total_kredit text-white" style="background-color: #4E36E2"  id="total_kredit" name="total_kredit" readonly/>
                                            </div>
                                            <div class="col text-center">
                                                <input class="form-control text-end total_all text-white" style="background-color: #4E36E2"  id="total_all" name="total_all" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-end">
                            <button id="myButtonValue" class="btn bg-animation btn-success mr-5 rounded-5" style="background-color: #4E36E2" data-bs-toggle="tooltip" data-bs-placement="top" title="Simpan ke Database">
                                <i class="bx bxs-save label-icon align-middle fs-16 me-2"></i> Simpan</button>
                                &nbsp;&nbsp;&nbsp;
                            <a href="{{ route('master_jurnal.index') }}" class="btn bg-animation rounded-5 btn-outline-primary waves-effect waves-light float-end"  data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali ke Menu" style="color: #4E36E2">
                                <i class="ri-arrow-go-back-line"></i>
                            </a>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"
integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var data = {id: "1", text: "Rupiah", selected: true};
    var newOption = new Option(data.text, data.id, false, false)
    $('#modal_jenis_mata_uang').append(newOption).trigger('change')
    $('#modal_jenis_mata_uang').select2()

    $(function () {
        $("#modal_jenis_mata_uang").select2({
            allowClear: true,
            width: '100%',
            ajax: {
                url: "{{ route('api.get_select2_mata_uangs') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(
                            data.data,
                            function(item) {
                                return {
                                    id: item.id,
                                    text: item.nama
                                }
                            }
                        )
                    }
                }
            }
        }).on('select2:select', function (e) {
            $("#jenis_sumber").val(e.params.data.item);
        });

    })

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
                    results: $.map(
                        data.data,
                        function(item) {
                            return {
                                id: item.id,
                                text: item.name
                            }
                        }
                    )
                }
            }
        }
    }).on('select2:select', function (e) {
        $("#jenis_sumber").val(e.params.data.item);
    });

    var count = 1
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
                    <input class="form-control debet_detail text-end" id="debet_detail[]" name="debet_detail[]"  onkeyup="countDebet()" required/>
                </div>
                <div class="col">
                    <input class="form-control text-end kredit_detail" id="kredit_detail[]" name="kredit_detail[]"  onkeyup="countKredit()" required/>
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

        $('#total_all').val() !== "Rp. 0" ? $('#total_all').css('background-color', 'E9967A') : $('#total_all').css('background-color', '4E36E2')

        $(".debet_detail").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});
        $(".kredit_detail").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});

    }

    $('.hapus_detail').click(function(){
        $(this).closest('.delete_detail').remove();
        countDebet()
        countKredit()
    })

    function countDebet() {
        var sum_value = 0;
        $('.debet_detail').each(function(){
            sum_value += +$(this).val().replace("Rp. ","").replaceAll(",","").replaceAll(".","");
            $('#total_debet').val(sum_value);
        })

        $('#total_debet').priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});
        $('#total_all').val(parseInt($('#total_debet').val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")) - parseInt($('#total_kredit').val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")))
        $('#total_all').priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});
        $('#total_all').val() !== "Rp. 0" ? $('#total_all').css('background-color', 'E9967A') : $('#total_all').css('background-color', '4E36E2')
    }

    function countKredit() {
        var sum_value = 0;
        $('.kredit_detail').each(function(){
            sum_value += +$(this).val().replace("Rp. ","").replaceAll(",","").replaceAll(".","");
            $('#total_kredit').val(sum_value);
        })

        $('#total_kredit').priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});
        $('#total_all').val(parseInt($('#total_debet').val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")) - parseInt($('#total_kredit').val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")))
        $('#total_all').priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});
        $('#total_all').val() !== "Rp. 0" ? $('#total_all').css('background-color', 'E9967A') : $('#total_all').css('background-color', '4E36E2')
    }

    $(".kredit_detail").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});
    $(".debet_detail").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});
    $("#total_debet").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});
    $('#total_kredit').priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0, allowNegative: true});
</script>
@endsection

