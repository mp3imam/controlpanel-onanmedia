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

                <form action="{{ route('master_bank_cash.update', $detail->id) }}" method="POST">
                    @csrf
                    @method('PUT')


                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <label for="sumber_dana">Sumber Dana</label>
                                        <select id="sumber_dana" name="sumber_dana" class="form-control sumber_dana" required></select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sumber_dana">Upload Foto</label>
                                        <input type="file" id="file" name="file" class="form-control" value="" readonly required />
                                    </div>
                                </div>
                                @foreach ($detail_belanja as $detail)
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6 class="card-title mb-0">{{ $detail->nomor_transaksi }} - {{ $detail->users->roles[0]->name }} - {{ $detail->users->username }}</h6>
                                                </div>
                                                <div class="col-md-6 text-end text-mute">
                                                    {{ Carbon\Carbon::parse($detail->created_at)->format('d F Y') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body rounded-top-4">
                                            <div class="card-header text-center fs-16" style="background-color: #CCC4FF">
                                                <div class="row font-weight-bold">
                                                    <div class="col-md">
                                                        <select id="selectAll" name="selectAll" class="form-control text-white selectAll" style="background-color:#00bd9d">
                                                            <option value="Approve" selected>Approve All</option>
                                                            <option value="Pending">Pending All</option>
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
                                                    <div class="col-md">Foto</div>
                                                </div>
                                            </div>
                                            <div class="card-body tambah_detail">
                                                @foreach ($detail->belanja_barang as $belanja => $b)
                                                    <div class="row delete_detail {{ $belanja != 0 ? "mt-3" : "" }}">
                                                        <div class="col-md">
                                                            <select id="selectDetail{{ $b->id }}" name="selectDetail[]" class="form-control selectDetail" >
                                                                <option value="1" {{ $b->status == 1 || $b->status == 0 ? "selected" : "" }}>Approve</option>
                                                                <option value="6" {{ $b->status == 6 ? "selected" : "" }}>Pending</option>
                                                                <option value="4" {{ $b->status == 4 ? "selected" : "" }}>Tolak</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <select id="akun{{ $b->id }}" name="akun[]" class="form-control akun"  required></select>
                                                        </div>
                                                        <div class="col-md">
                                                            <input id="nama_item" name="nama_item[]" class="form-control" value="{{ $b->nama_item }}" readonly required />
                                                        </div>
                                                        <div class="col-md">
                                                            <input id="qty{{ $b->id }}" name="qty[]" class="form-control" type="number" onkeyup="updateTotal({{ $b->id }})" min="1" value="{{ $b->qty }}" readonly  required />
                                                        </div>
                                                        <div class="col-md">
                                                            <select id="satuan{{ $b->id }}" name="satuan[]" class="form-control satuan" readonly  required ></select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input id="harga{{ $b->id }}" name="harga[]" class="form-control harga" value="{{ $b->harga }}" onkeyup="updateTotal({{ $b->id }})" min="1" readonly  required />
                                                        </div>
                                                        <div class="col-md">
                                                            <input id="keterangan{{ $b->id }}" name="keterangan[]" class="form-control keterangan" value="{{ $b->keterangan }}" />
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
                                                    <div class="col-md-8">
                                                        <input class="form-control text-end total fs-20 text-white mt-1 total_nilai" id="total_nilai{{ $b->id }}" style="border-color:#4E36E2; background-color: #4E36E2" value="{{ $detail->nominal }}" name="total_nilai{{ $b->id }}"  readonly/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="card">
                                    <div class="card-body rounded-top-4">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <select id="selectAll" name="selectAll" class="form-control selectAll" >
                                                    <option value="1" selected="selected">Approve All</option>
                                                    <option value="6">Pending All</option>
                                                    <option value="4">Tolak All</option>
                                                </select>
                                            </div>
                                            <div class="col-md text-end">
                                                <span class="fs-36 seluruh_total"> {{ $checked_sum }}</span>
                                                <button class="btn btn-outline-warning rounded-4 mx-3 mb-3">Back</button>
                                                <button class="btn btn-success rounded-4 mb-3">Approved</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var e = {!! json_encode($detail_belanja) !!}
    $(function() {
        $.each(e, function(ei, eitem) {

            $.each(eitem.belanja_barang, function(i, item) {
                console.log(item);

                var data = {id: item.coa_belanja.id,text: item.coa_belanja.uraian, selected: true};
                var newOption = new Option(data.text, data.id, false, false)
                $('#akun'+item.id).append(newOption).trigger('change')
                $('#akun'+item.id).select2()


                var data = {id: item.satuan_barang.id,text: item.satuan_barang.nama, selected: true};
                var newOption = new Option(data.text, data.id, false, false)
                $('#satuan'+item.id).append(newOption).trigger('change')
                $('#satuan'+item.id).select2()

                $('#selectDetail' + item.id).change(function (e) {
                    if (this.value == 1) {
                        $('#selectDetail' + item.id).css("background-color", "#00bd9d");
                        $('#keterangan' + item.id).prop('required',false);
                    }
                    if (this.value == 6) {
                        $('#selectDetail' + item.id).css("background-color", "#25a0e2");
                        $('#keterangan' + item.id).prop('required',true);
                    }
                    if (this.value == 4) {
                        $('#selectDetail' + item.id).css("background-color", "#f06548");
                        $('#keterangan' + item.id).prop('required',true);
                    }
                    $('#keterangan'+ item.id).val("")
                });
            });
        });
    })

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
            $('#selectAll').css("background-color", "#25a0e2");
            $.each(f, function(i, item) {
                $('#selectDetail' + item.id).css("background-color", "#25a0e2");
                $('#selectDetail' + item.id).val(6).change();
                $('#keterangan' + item.id).val("Pending All")
            });
        }
        if (this.value == 'Tolak') {
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

    var count = 100
    function tambah_detail() {
        $('.tambah_detail').append(`
            <div class="row delete_detail mt-4">
                <div class="col-md">
                    <select id="akun`+count+`" name="akun[]" class="form-control akun" required ></select>
                </div>
                <div class="col-md">
                    <input id="nama_item`+count+`" name="nama_item[]" class="form-control" required />
                </div>
                <div class="col-md-1">
                    <input id="qty`+count+`" name="qty[]" class="form-control" onkeyup="updateTotal(`+count+`)" type="number" min="1" value="1" required />
                </div>
                <div class="col-md-1">
                    <select id="satuan`+count+`" name="satuan[]" class="form-control satuan" required ></select>
                </div>
                <div class="col-md">
                    <input id="harga`+count+`" name="harga[]" class="form-control harga" onkeyup="updateTotal(`+count+`)" value="1" min="1" required />
                </div>
                <div class="col-md">
                    <input id="keterangan`+count+`" name="keterangan[]" class="form-control" />
                </div>
                <div class="col-md">
                    <input id="jumlah`+count+`" name="jumlah[]" class="form-control jumlah" value="0" readonly />
                </div>
                <div class="col-md">
                    <input id="file`+count+`" name="file[]" type="file" class="form-control" accept="image/*" />
                </div>
                <div class="col-md text-center float-end hapus_detail">
                    <i class="ri-delete-bin-line text-danger ri-2x"></i>
                </div>
            </div>

        `);

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
                            };
                        })
                    };
                }
            }
        }).on('select2:select', function(e) {
            $("#jenis_sumber").val(e.params.data.item);
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
        }).on('select2:select', function (e) {
            $("#jenis_sumber").val(e.params.data.item);
        });

        $('.hapus_detail').click(function() {
            $(this).closest('.delete_detail').remove();
            countNilai()
        });
        $(".harga").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
        $(".jumlah").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});

        count++;
    }

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
    $('.seluruh_total').priceFormat({prefix: 'Total Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});


</script>

@endsection
