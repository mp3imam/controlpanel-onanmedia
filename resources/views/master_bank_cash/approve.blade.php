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
                            <h4 class="card-title mb-0">Permintaan Pembelanjaan Barang</h4>
                        </div>
                    </div>
                </div>
                <form action="{{ route('approve_direktur', $detail->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                @foreach ($detail_belanja as $detail)
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6 class="card-title mb-0">{{ $detail->nomor_transaksi }} -
                                                        {{ $detail->users->roles[0]->name }} -
                                                        {{ $detail->users->username }}</h6>
                                                </div>
                                                <div class="col-md-6 text-end text-mute">
                                                    <input id="id" name="id" value="{{ Request::get('id') }}"
                                                        class="form-control" hidden />
                                                    <input id="belanja_id" name="belanja_id[]" value="{{ $detail->id }}"
                                                        class="form-control" hidden />
                                                    {{ Carbon\Carbon::parse($detail->created_at)->format('d F Y') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body rounded-top-4">
                                            <div class="card-header text-center fs-16" style="background-color: #CCC4FF">
                                                <div class="row font-weight-bold">
                                                    <div class="col-md">
                                                        <select id="selectAll{{ $detail->id }}" name="selectAll[]"
                                                            class="form-control text-white selectAll"
                                                            style="background-color:#00bd9d">
                                                            <option value="1" selected>Approve All</option>
                                                            <option value="6">Pending All</option>
                                                            <option value="4">Tolak All</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 mt-2">Akun</div>
                                                    <div class="col-md mt-2">Item</div>
                                                    <div class="col-md mt-2">Qty</div>
                                                    <div class="col-md mt-2">Satuan</div>
                                                    <div class="col-md-2 mt-2">Harga</div>
                                                    <div class="col-md mt-2">Ket</div>
                                                    <div class="col-md-2 mt-2">Jumlah</div>
                                                    <div class="col-md mt-2">Foto</div>
                                                </div>
                                            </div>
                                            <div class="card-body tambah_detail">
                                                @foreach ($detail->belanja_barang as $belanja => $b)
                                                    <div class="row delete_detail {{ $belanja != 0 ? 'mt-3' : '' }}">
                                                        <div class="col-md">
                                                            <select id="selectDetail{{ $b->id }}"
                                                                name="selectDetail[]"
                                                                class="form-control selectDetail text-white"
                                                                style="background-color: #00bd9d">
                                                                <option value="1"
                                                                    {{ $b->status == 1 || $b->status == 0 ? 'selected' : '' }}>
                                                                    Approve</option>
                                                                <option value="6"
                                                                    {{ $b->status == 6 ? 'selected' : '' }}>Pending
                                                                </option>
                                                                <option value="4"
                                                                    {{ $b->status == 4 ? 'selected' : '' }}>Tolak</option>
                                                            </select>
                                                            <input id="username" name="username[]"
                                                                value="{{ $detail->users->username }}" class="form-control"
                                                                hidden />
                                                            <input id="nomor_transaksi" name="nomor_transaksi[]"
                                                                value="{{ $detail->nomor_transaksi }}" class="form-control"
                                                                hidden />
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input id="belanja_id_detail" name="belanja_id_detail[]"
                                                                value="{{ $b->id }}" class="form-control" hidden />
                                                            <select id="akun{{ $b->id }}" name="akun[]"
                                                                class="form-control akun" readonly required></select>
                                                        </div>
                                                        <div class="col-md">
                                                            <input id="nama_item" name="nama_item[]" class="form-control"
                                                                value="{{ $b->nama_item }}" readonly required />
                                                        </div>
                                                        <div class="col-md">
                                                            <input id="qty{{ $b->id }}" name="qty[]"
                                                                class="form-control" type="number"
                                                                onkeyup="updateTotal({{ $b->id }})" min="1"
                                                                value="{{ $b->qty }}" readonly required />
                                                        </div>
                                                        <div class="col-md">
                                                            <select id="satuan{{ $b->id }}" name="satuan[]"
                                                                class="form-control satuan" readonly required></select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input id="harga{{ $b->id }}" name="harga[]"
                                                                class="form-control harga" value="{{ $b->harga }}"
                                                                onkeyup="updateTotal({{ $b->id }})" min="1"
                                                                readonly required />
                                                        </div>
                                                        <div class="col-md">
                                                            <input id="keterangan{{ $b->id }}" name="keterangan[]"
                                                                class="form-control keterangan"
                                                                value="{{ $b->keterangan }}" />
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input id="jumlah{{ $b->id }}" name="jumlah[]"
                                                                class="form-control jumlah" value="{{ $b->jumlah }}"
                                                                readonly />
                                                        </div>
                                                        @if ($b->file)
                                                            <div class="col-md text-center"
                                                                onclick="zoomOutImage(`{{ $b->file }}`)">
                                                                <input name="foto{{ $b->id }}"
                                                                    value="{{ $b->file }}" hidden>
                                                                <img src="{{ $b->file }}" alt=""
                                                                    width="50px" height="50px">
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
                                                    <div class="col-md-8">
                                                        <input
                                                            class="form-control text-end total fs-20 text-white mt-1 total_nilai"
                                                            id="total_nilai{{ $detail->id }}"
                                                            style="border-color:#4E36E2; background-color: #4E36E2"
                                                            value="{{ $detail->nominal_approve }}" name="total_nilai[]"
                                                            readonly />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="card">
                                    <div class="card-header" id="sumber_dana_data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="sumber_dana">Sumber Dana</label>
                                                <select id="sumber_dana" name="sumber_dana"
                                                    class="form-control sumber_dana" required></select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="sumber_dana">Upload Foto</label>
                                                <input type="file" id="file" name="file" class="form-control"
                                                    accept="image/*" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body rounded-top-4">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <select id="selectTotal" name="selectTotal"
                                                    class="form-control text-white selectTotal"
                                                    onchange="checked_keseluruhan()" style="background-color: #00bd9d">
                                                    <option value="1" selected="selected">Approve All</option>
                                                    <opt value="6">Pending All</opt ion>
                                                    <option value="4">Tolak All</option>
                                                </select>
                                            </div>
                                            <div class="col-md text-end">
                                                <span class="fs-20 seluruh_total mb-2">{{ $checked_sum }}</span>
                                                <input class="fs-20 seluruh_total_input text-end mb-2"
                                                    name="seluruh_total" value="{{ $checked_sum }}" hidden />
                                                <button class="btn btn-outline-warning rounded-4 mx-3 mb-3"
                                                    onclick="history.back()">Back</button>
                                                <button class="btn btn-success rounded-4 mb-3"
                                                    type="submit">Approved</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card -->
                </form>
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
        var e = {!! json_encode($detail_belanja) !!}
        $(function() {
            $.each(e, function(ei, eitem) {
                $('#selectAll' + eitem.id).change(function(e) {
                    if (this.value == 1) {
                        $('#selectAll' + eitem.id).css("background-color", "#00bd9d");
                        $.each(eitem.belanja_barang, function(i, item) {
                            $('#selectDetail' + item.id).css("background-color", "#00bd9d");
                            $('#selectDetail' + item.id).val(1).change();
                            $('#keterangan' + item.id).val("")
                        });
                    }
                    if (this.value == 6) {
                        $('#selectAll' + eitem.id).css("background-color", "#25a0e2");
                        $.each(eitem.belanja_barang, function(i, item) {
                            $('#selectDetail' + item.id).css("background-color", "#25a0e2");
                            $('#selectDetail' + item.id).val(6).change();
                        });
                    }
                    if (this.value == 4) {
                        $('#selectAll' + eitem.id).css("background-color", "#f06548");
                        $.each(eitem.belanja_barang, function(i, item) {
                            $('#selectDetail' + item.id).css("background-color", "#f06548");
                            $('#selectDetail' + item.id).val(4).change();
                        });
                    }
                });

                $.each(eitem.belanja_barang, function(i, item) {
                    var data = {
                        id: item.coa_belanja.id,
                        text: item.coa_belanja.uraian,
                        selected: true
                    };
                    var newOption = new Option(data.text, data.id, false, false)
                    $('#akun' + item.id).append(newOption).trigger('change')
                    $('#akun' + item.id).select2()

                    var data = {
                        id: item.satuan_barang.id,
                        text: item.satuan_barang.nama,
                        selected: true
                    };
                    var newOption = new Option(data.text, data.id, false, false)
                    $('#satuan' + item.id).append(newOption).trigger('change')
                    $('#satuan' + item.id).select2()

                    var selectDetail = 0
                    $('#selectDetail' + item.id).change(function(e) {
                        if (this.value == 1) {
                            selectDetail = 0
                            $('#total_nilai' + eitem.id).val(parseInt($('#total_nilai' +
                                eitem.id).val().replace("Rp. ", "").replaceAll(
                                ",", "").replaceAll(".", "")) + parseInt($(
                                    '#jumlah' + item.id).val().replace("Rp. ", "")
                                .replaceAll(",", "").replaceAll(".", "")))
                            $('#selectDetail' + item.id).css("background-color", "#00bd9d");
                            $('#keterangan' + item.id).prop('required', false);
                            $('#keterangan' + item.id).val("")
                        } else {
                            if (selectDetail == 0)
                                $('#total_nilai' + eitem.id).val(parseInt($('#total_nilai' +
                                            eitem.id).val().replace("Rp. ", "")
                                        .replaceAll(",", "").replaceAll(".", "")) -
                                    parseInt($('#jumlah' + item.id).val().replace(
                                        "Rp. ", "").replaceAll(",", "").replaceAll(
                                        ".", "")))

                            if (this.value == 6) {
                                if ($('#total_nilai' + eitem.id).val() < 1) $(
                                    '#total_nilai' + eitem.id).val(0)
                                $('#selectDetail' + item.id).css("background-color",
                                    "#25a0e2");
                                $('#keterangan' + item.id).prop('required', true);
                                $('#keterangan' + item.id).val("Direktur")
                            } else {
                                if ($('#total_nilai' + eitem.id).val() < 1) $(
                                    '#total_nilai' + eitem.id).val(0)
                                $('#selectDetail' + item.id).css("background-color",
                                    "#f06548");
                                $('#keterangan' + item.id).prop('required', true);
                                $('#keterangan' + item.id).val("Direktur")
                            }
                            selectDetail = 1
                        }
                        countSeluruhTotal()
                    });
                });
            });

            $('#selectTotal').change(function(ef) {
                if (this.value == 1) {
                    $('#selectTotal').css("background-color", "#00bd9d");
                    $.each(e, function(i, eitem) {
                        $('#selectAll' + eitem.id).css("background-color", "#00bd9d");
                        $('#selectAll' + eitem.id).val(1).change();
                        $.each(eitem.belanja_barang, function(i, item) {
                            $('#selectDetail' + item.id).css("background-color", "#00bd9d");
                            $('#selectDetail' + item.id).val(1).change();
                            $('#keterangan' + item.id).val("")
                        });
                    });
                }
                if (this.value == 6) {
                    $('#selectTotal').css("background-color", "#25a0e2");
                    $.each(e, function(i, eitem) {
                        $('#selectAll' + eitem.id).css("background-color", "#25a0e2");
                        $('#selectAll' + eitem.id).val(6).change();
                        $.each(eitem.belanja_barang, function(i, it) {
                            $('#selectDetail' + it.id).css("background-color", "#25a0e2");
                            $('#selectDetail' + it.id).val(6).change();
                            $('#keterangan' + it.id).val("Direktur Pending All")
                        });
                    });
                }
                if (this.value == 4) {
                    $('#selectTotal').css("background-color", "#f06548");
                    $.each(e, function(i, eitem) {
                        $('#selectAll' + eitem.id).css("background-color", "#f06548");
                        $('#selectAll' + eitem.id).val(4).change();
                        $.each(eitem.belanja_barang, function(i, item) {
                            $('#selectDetail' + item.id).css("background-color", "#f06548");
                            $('#selectDetail' + item.id).val(4).change();
                            $('#keterangan' + item.id).val("Direktur Tolak All")
                        });
                    });
                }
            });
        })

        function zoomOutImage(url) {
            Swal.fire({
                imageUrl: url
            });
        }


        $("#sumber_dana").select2({
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
        }).on('select2:select', function(e) {
            $("#jenis_sumber").val(e.params.data.item);
        });

        function checked_keseluruhan() {
            if ($('#selectTotal').val() != 1) {
                $('.seluruh_total').text(0);
                $('.total_nilai').val(0);
                $('#sumber_dana_data').attr('hidden', true)
                $('#sumber_dana').attr('hidden', false)
                $('#file').attr('hidden', false)
            } else {
                location.reload()
            }
        }

        function countSeluruhTotal() {
            var sum_value = 0;
            $('.total_nilai').each(function() {
                sum_value += +$(this).val().replace("Rp. ", "").replaceAll(",", "").replaceAll(".", "");
                $('.seluruh_total').text(sum_value);
                $('.seluruh_total_input').val(sum_value);
            })

            $(".harga").priceFormat({
                prefix: 'Rp. ',
                centsSeparator: ',',
                thousandsSeparator: '.',
                centsLimit: 0
            });
            $(".jumlah").priceFormat({
                prefix: 'Rp. ',
                centsSeparator: ',',
                thousandsSeparator: '.',
                centsLimit: 0
            });
            $('.seluruh_total').priceFormat({
                prefix: 'Total Pembayaran Rp. ',
                centsSeparator: ',',
                thousandsSeparator: '.',
                centsLimit: 0
            });
            $('.total_nilai').priceFormat({
                prefix: 'Rp. ',
                centsSeparator: ',',
                thousandsSeparator: '.',
                centsLimit: 0
            });
        }

        $(".harga").priceFormat({
            prefix: 'Rp. ',
            centsSeparator: ',',
            thousandsSeparator: '.',
            centsLimit: 0
        });
        $(".jumlah").priceFormat({
            prefix: 'Rp. ',
            centsSeparator: ',',
            thousandsSeparator: '.',
            centsLimit: 0
        });
        $('.seluruh_total').priceFormat({
            prefix: 'Total Pembayaran Rp. ',
            centsSeparator: ',',
            thousandsSeparator: '.',
            centsLimit: 0
        });
        $('.total_nilai').priceFormat({
            prefix: 'Rp. ',
            centsSeparator: ',',
            thousandsSeparator: '.',
            centsLimit: 0
        });
    </script>
@endsection
