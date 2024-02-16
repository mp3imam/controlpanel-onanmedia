@extends('layouts.master')

<!-- @section('title')
    {{ $title }}
@endsection -->

@section('content')
@section('css')
@endsection
@include('components.breadcrumb')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-11">
                        <h4 class="card-title">List Kas Belanja Pending</h4>
                    </div>
                    <div class="col">
                        <a href="{{ route('master_kas_belanja.index') }}" class="btn bg-animation rounded-5 btn-outline-primary waves-effect waves-light float-end" style="color: #4E36E2">Kembali</a>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <form action="{{ route('checked_pending_finance') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="row mb-3">
                                <div class="col-md mb-3">
                                    <label for="id_detail" class="form-label">Deskripsi</label>
                                    <input id="id_detail" name="id_detail" class="form-control" value="{{ $detail->id }}" hidden />
                                    <textarea class="form-control" rows="4" cols="50" placeholder="Tulis deskripsi pembelanjaan di sini...." name="deskripsi" required readonly>{{ $detail->keterangan_kas }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="card-title mb-0">Detail Belanja</h6>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body rounded-top-4">
                                    <div class="card-header text-center fs-16" style="background-color: #CCC4FF">
                                        <div class="row font-weight-bold">
                                            <div class="col-md">
                                                <select id="selectAll" name="selectAll" class="form-control text-white selectAll" style="background-color:#25a0e2">
                                                    <option value="Approve">Approve All</option>
                                                    <option value="Pending" selected>Pending All</option>
                                                    <option value="Tolak">Tolak All</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">Akun</div>
                                            <div class="col-md">Item</div>
                                            <div class="col-md">Qty</div>
                                            <div class="col-md">Satuan</div>
                                            <div class="col-md-2">Harga</div>
                                            <div class="col-md">Ket</div>
                                            <div class="col-md-2">Jumlah</div>
                                            <div class="col-md">Bukti Foto</div>
                                            <div class="col-md-1 text-center">Action</div>
                                        </div>
                                    </div>
                                    <div class="card-body tambah_detail">
                                        @foreach ($detail->belanja_barang as $belanja => $b)
                                            <div class="row delete_detail {{ $belanja != 0 ? "mt-3" : "" }}">
                                                <div class="col-md">
                                                    <select id="selectDetail{{ $b->id }}" name="selectDetail[]" class="form-control text-white selectDetail" style="background-color:#25a0e2" >
                                                        <option value="1" {{ $b->status == 1 || $b->status == 0 ? "selected" : "" }}>Approve</option>
                                                        <option value="6" {{ $b->status == 6 ? "selected" : "" }}>Pending</option>
                                                        <option value="4" {{ $b->status == 4 ? "selected" : "" }}>Tolak</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <select id="akun{{ $b->id }}" name="akun[]" class="form-control akun" required></select>
                                                </div>
                                                <div class="col-md">
                                                    <input id="id_item" name="id_item[]" class="form-control" value="{{ $b->id }}" hidden />
                                                    <input id="nama_item" name="nama_item[]" class="form-control" value="{{ $b->nama_item }}" readonly required />
                                                </div>
                                                <div class="col-md">
                                                    <input id="qty{{ $b->id }}" name="qty[]" class="form-control" type="number" onkeyup="updateTotal({{ $b->id }})" min="1" value="{{ $b->qty }}" readonly required />
                                                </div>
                                                <div class="col-md">
                                                    <select id="satuan{{ $b->id }}" name="satuan[]" class="form-control satuan" readonly required ></select>
                                                </div>
                                                <div class="col-md-2">
                                                    <input id="harga{{ $b->id }}" name="harga[]" class="form-control harga" value="{{ $b->harga }}" onkeyup="updateTotal({{ $b->id }})" min="1" readonly required />
                                                </div>
                                                <div class="col-md">
                                                    <input id="keterangan{{ $b->id }}" name="keterangan[]" class="form-control keterangan text-white" value="{{ $b->keterangan }}" style="background-color:#25a0e2" />
                                                </div>
                                                <div class="col-md-2">
                                                    <input id="jumlah{{ $b->id }}" name="jumlah[]" class="form-control jumlah" value="{{ $b->jumlah }}" readonly />
                                                </div>
                                                @if ($b->file)
                                                    <div class="col-md text-center" onclick="zoomOutImage(`{{ $b->file }}`)">
                                                        <img src="{{ $b->file }}" alt="" width="50px" height="50px">
                                                    </div>
                                                @else
                                                    <div class="col-md text-center">Tidak ada Foto</div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md text-uppercase text-center mt-3 fs-16 fw-bold">
                                                TOTAL
                                            </div>
                                            <div class="col-md-8" style="background-color: #4E36E2">
                                                <input class="form-control text-end total fs-20 text-white mt-1" id="total_nilai" style="border-color:#4E36E2; background-color: #4E36E2" value="0" name="total_nilai"  readonly/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-end">
                            <button class="btn bg-animation btn-success mr-5 rounded-5"><i class="bx bxs-save label-icon align-middle fs-16 me-2"></i> Approve</button>
                            &nbsp;&nbsp;&nbsp;
                            <a href="{{ route('master_kas_belanja.index') }}" class="btn bg-animation rounded-5 btn-outline-primary waves-effect waves-light float-end" style="color: #4E36E2">Kembali</a>
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
<script>
    var f = {!! json_encode($detail->belanja_barang) !!}
    $(function() {
        $.each(f, function(i, item) {
            var data = {id: 74,text: "Pembelian Barang", selected: true};
            var newOption = new Option(data.text, data.id, false, false)
            $('#akun'+item.id).append(newOption).trigger('change')
            $('#akun'+item.id).select2()

            $("#akun"+item.id).select2({
                allowClear: true,
                width: '100%',
                ajax: {
                    url: "{{ route('api.get_select2_belanja') }}",
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
            })

            var data = {id: item.satuan_barang.id,text: item.satuan_barang.nama, selected: true};
            var newOption = new Option(data.text, data.id, false, false)
            $('#satuan'+item.id).append(newOption).trigger('change')
            $('#satuan'+item.id).select2()

            $('#selectDetail' + item.id).change(function (e) {
                if (this.value == 1) {
                    $('#total_nilai').val(parseInt($('#total_nilai').val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")) + parseInt($('#jumlah' + item.id).val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")))
                    $('#selectDetail' + item.id).css("background-color", "#00bd9d");
                    $('#keterangan' + item.id).prop('required',false);
                }
                if (this.value == 6) {
                    $('#total_nilai').val(parseInt($('#total_nilai').val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")) - parseInt($('#jumlah' + item.id).val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")))
                    if ($('#total_nilai').val() < 1) $('#total_nilai').val(0)
                    $('#selectDetail' + item.id).css("background-color", "#25a0e2");
                    $('#keterangan' + item.id).prop('required',true);
                }
                if (this.value == 4) {
                    $('#total_nilai').val(parseInt($('#total_nilai').val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")) - parseInt($('#jumlah' + item.id).val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")))
                    if ($('#total_nilai').val() < 1) $('#total_nilai').val(0)
                    $('#selectDetail' + item.id).css("background-color", "#f06548");
                    $('#keterangan' + item.id).prop('required',true);
                }
                $('#keterangan'+ item.id).val("")
                $('#total_nilai').priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
            });


        });
    })

    $("#account_id").select2({
        allowClear: true,
        width: '100%',
        ajax: {
            url: "{{ route('api.get_select2_banks') }}",
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

    $('#selectAll').change(function (e) {
        if (this.value == 'Approve') {
            $('#selectAll').css("background-color", "#00bd9d");
            $.each(f, function(i, item) {
                $('#selectDetail' + item.id).css("background-color", "#00bd9d");
                $('#selectDetail' + item.id).val(1).change();
                $('#keterangan' + item.id).val("")
            });
        }
        if (this.value == 'Pending') {
            countNilai()
            $('#selectAll').css("background-color", "#25a0e2");
            $.each(f, function(i, item) {
                $('#selectDetail' + item.id).css("background-color", "#25a0e2");
                $('#selectDetail' + item.id).val(6).change();
                $('#keterangan' + item.id).val("Pending All")
            });
        }
        if (this.value == 'Tolak') {
            countNilai()
            $('#selectAll').css("background-color", "#f06548");
            $.each(f, function(i, item) {
                $('#selectDetail' + item.id).css("background-color", "#f06548");
                $('#selectDetail' + item.id).val(4).change();
                $('#keterangan' + item.id).val("Tolak All")
            });
        }
    });

    function zoomOutImage(url){
        Swal.fire({
            imageUrl: url
        });
    }

    $(".akun").select2({
        allowClear: true,
        width: '100%',
        ajax: {
            url: "{{ route('api.get_select2_belanja') }}",
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

    $(".satuan").select2({
        allowClear: true,
        width: '100%',
        ajax: {
            url: "{{ route('api.get_select2_satuan_barang') }}",
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

    function updateTotal(data) {
        var qty = $('#qty'+data).val().replace("Rp. ","").replaceAll(",","").replaceAll(".","");
        var harga = $('#harga'+data).val().replace("Rp. ","").replaceAll(",","").replaceAll(".","");
        var total = qty * harga;

        $('#jumlah'+data).val(total);
        $(".jumlah").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
        countNilai()
    }


    $('.hapus_detail').click(function(){
        $(this).closest('.delete_detail').remove();
        countNilai()
    })

    function countNilai() {
        var sum_value = 0;
        $('.jumlah').each(function(){
            sum_value += +$(this).val().replace("Rp. ","").replaceAll(",","").replaceAll(".","");
            $('#total_nilai').val(sum_value);
        })

        $('#total_nilai').priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
        $(".harga").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
    }

    $(".harga").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
    $(".jumlah").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
    $('#total_nilai').priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});


</script>
@endsection
