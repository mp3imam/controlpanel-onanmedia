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
                        <h4 class="card-title">Tambah Kas Belanja</h4>
                    </div>
                    <div class="col">
                        <a href="{{ route('master_kas_belanja.index') }}" class="btn bg-animation rounded-5 btn-outline-primary waves-effect waves-light float-end" style="color: #4E36E2">Kembali</a>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    @hasrole('finance')
                        @php  $route = route('checked_finance') @endphp
                        @if ($detail->status == 2)
                            @php  $route = route('upload_bukti_transfer_divisi_finance') @endphp
                        @elseif ($detail->status == 3 && $detail->bukti_transfer_divisi_to_finance == null && $detail->users->roles[0]->name == 'finance')
                            @php  $route = url('upload_bukti_transfer_finance_divisi') @endphp
                        @elseif ($detail->bukti_transfer_divisi_to_finance != null)
                            @php  $route = route('finance_selesai') @endphp
                        @endif
                    @else
                        @php  $route = url('master_kas_belanja.update') @endphp
                        @if ($detail->status == 3)
                            @php  $route = url('upload_bukti_transfer_finance_divisi') @endphp
                        @endif
                    @endhasrole
                    <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="row mb-3">
                                <div class="col-md mb-3">
                                    <label for="id_detail" class="form-label">Deskripsi</label>
                                    <input id="id_detail" name="id_detail" class="form-control" value="{{ $detail->id }}" hidden />
                                    <textarea class="form-control" rows="4" cols="50" placeholder="Tulis deskripsi pembelanjaan di sini...." name="deskripsi" required @hasrole('finance') readonly @endhasrole>{{ $detail->keterangan_kas }}</textarea>
                                </div>
                                @hasrole('finance')
                                    @if ($detail->status == 2 && Request::get('q') == 2)
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="account_id" class="form-label">Upload Bukti Transfer</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="file" name="upload_bukti" accept="image/*" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="account_id" class="form-label">Pilih Bank</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select id="account_id" name="account_id" class="form-control" required></select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="account_id" class="form-label">Keterangan</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <textarea class="form-control" type="file" name="keterangan_upload" rows="1" cols="50" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($detail->status == 3 && $detail->bukti_transfer_divisi_to_finance == null && $detail->users->roles[0]->name == 'finance')
                                        <div class="col-md">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="account_id" class="form-label">Upload Bukti Belanja</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="file" name="upload_bukti_belanja" accept="image/*" required />
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    @if ($detail->status == 3 && $detail->bukti_transfer_divisi_to_finance == null)
                                        <div class="col-md">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="account_id" class="form-label">Upload Bukti Belanja</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="file" name="upload_bukti_belanja" accept="image/*" required />
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endhasrole
                                @if ($detail->bukti_transfer_finance_to_divisi != null)
                                    <div class="col-md">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <label for="account_id" class="form-label">Foto Bukti Transfer</label>
                                            </div>
                                            <div class="col-md-12 text-center" onclick="zoomOutImage(`{{ $detail->bukti_transfer_finance_to_divisi }}`)">
                                                <img src="{{ $detail->bukti_transfer_finance_to_divisi }}" alt="" width="100px" height="100px">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($detail->bukti_transfer_divisi_to_finance != null)
                                <div class="col-md">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <label for="account_id" class="form-label">Foto Bukti Belanja</label>
                                        </div>
                                        <div class="col-md-12 text-center" onclick="zoomOutImage(`{{ $detail->bukti_transfer_divisi_to_finance }}`)">
                                            <img src="{{ $detail->bukti_transfer_divisi_to_finance }}" alt="" width="100px" height="100px">
                                        </div>
                                    </div>
                                </div>
                                @endif
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
                                            @hasrole('finance')
                                            @else
                                                @if ($detail->status == 1)
                                                    <button class="btn float-end mt-2" type="button" onclick="tambah_detail()" style="background-color:#E0E7FF; color:#4E36E2"><i class="ri-add-box-fill"></i> Tambah Baris</button>
                                                @endif
                                            @endhasrole
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body rounded-top-4">
                                    <div class="card-header text-center fs-16" style="background-color: #CCC4FF">
                                        <div class="row font-weight-bold">
                                            @hasrole('finance')
                                                <div class="col-md">
                                                    <select id="selectAll" name="selectAll" class="form-control text-white selectAll" @if($detail->status > 1) disabled @endif style="background-color:#00bd9d">
                                                        <option value="Approve" selected>Approve All</option>
                                                        <option value="Pending">Pending All</option>
                                                        <option value="Tolak">Tolak All</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">Akun</div>
                                            @endhasrole()
                                            <div class="col-md">Item</div>
                                            <div class="col-md">Qty</div>
                                            <div class="col-md">Satuan</div>
                                            <div class="col-md-2">Harga</div>
                                            <div class="col-md">Ket</div>
                                            <div class="col-md-2">Jumlah</div>
                                            <div class="col-md">@hasrole('finance') @else Bukti @endhasrole() Foto</div>
                                            @hasrole('finance')
                                            @else
                                                <div class="col-md-1 text-center">Action</div>
                                            @endhasrole
                                        </div>
                                    </div>
                                    <div class="card-body tambah_detail">
                                        @foreach ($detail->belanja_barang as $belanja => $b)
                                            <div class="row delete_detail {{ $belanja != 0 ? "mt-3" : "" }}">
                                                @switch($b->status)
                                                    @case(4)
                                                        @php $color = "#f06548" @endphp
                                                    @break
                                                    @case(6)
                                                        @php $color = "#25a0e2" @endphp
                                                    @break
                                                    @default
                                                    @php
                                                        $color = "#00bd9d";
                                                    @endphp
                                                @endswitch

                                                @hasrole('finance')
                                                    <div class="col-md">
                                                        @if ($detail->status == 1 && $b->status == 1 || $b->status == 6)
                                                            <select id="selectDetail{{ $b->id }}" name="selectDetail[]" class="form-control text-white selectDetail" @if($detail->status > 1) readonly @endif style="background-color:{{ $color }}" >
                                                                <option value="1" {{ $b->status == 1 || $b->status == 0 ? "selected" : "" }}>Approve</option>
                                                                <option value="6" {{ $b->status == 6 ? "selected" : "" }}>Pending</option>
                                                                <option value="4" {{ $b->status == 4 ? "selected" : "" }}>Tolak</option>
                                                            </select>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select id="akun{{ $b->id }}" name="akun[]" class="form-control akun" @if($detail->status == 2) disabled @endif required></select>
                                                    </div>
                                                @endhasrole()
                                                <div class="col-md">
                                                    <input id="id_item" name="id_item[]" class="form-control" value="{{ $b->id }}" hidden />
                                                    <input id="nama_item" name="nama_item[]" class="form-control" value="{{ $b->nama_item }}" @hasrole('finance') readonly @endhasrole  @if($detail->status > 1) disabled @endif required />
                                                </div>
                                                <div class="col-md">
                                                    <input id="qty{{ $b->id }}" name="qty[]" class="form-control" type="number" onkeyup="updateTotal({{ $b->id }})" min="1" value="{{ $b->qty }}" @hasrole('finance') readonly @endhasrole  @if($detail->status > 1) disabled @endif required />
                                                </div>
                                                <div class="col-md">
                                                    <select id="satuan{{ $b->id }}" name="satuan[]" class="form-control satuan" @hasrole('finance') readonly @endhasrole @if($detail->status > 1) disabled @endif required ></select>
                                                </div>
                                                <div class="col-md-2">
                                                    <input id="harga{{ $b->id }}" name="harga[]" class="form-control harga" value="{{ $b->harga }}" onkeyup="updateTotal({{ $b->id }})" min="1" @hasrole('finance') readonly @endhasrole  @if($detail->status > 1) disabled @endif required />
                                                </div>
                                                <div class="col-md">
                                                    <input id="keterangan{{ $b->id }}" name="keterangan[]" class="form-control keterangan" value="{{ $b->keterangan }}" style="background-color:{{ $color }}" @if($detail->status > 1) disabled @endif />
                                                </div>
                                                <div class="col-md-2">
                                                    <input id="jumlah{{ $b->id }}" name="jumlah[]" class="form-control jumlah" value="{{ $b->jumlah }}" @if($detail->status > 1) disabled @endif readonly />
                                                </div>
                                                @if ($b->file)
                                                    <div class="col-md text-center" onclick="zoomOutImage(`{{ $b->file }}`)">
                                                        <img src="{{ $b->file }}" alt="" width="50px" height="50px">
                                                    </div>
                                                @else
                                                    <div class="col-md text-center">Tidak ada Foto</div>
                                                @endif
                                                @hasrole('finance')
                                                @else
                                                    <div class="col-md text-center float-end {{ !$loop->first ? "hapus_detail" : "" }}" >
                                                        @if($detail->status == 1)
                                                            @if (!$loop->first )
                                                                <i class="ri-delete-bin-line text-danger ri-2x"></i>
                                                            @endif
                                                        @endif
                                                    </div>
                                                @endhasrole
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md text-uppercase text-center mt-3 fs-16 fw-bold">
                                                TOTAL
                                            </div>
                                            <div class="col-md-8" style="background-color: #4E36E2">
                                                <input class="form-control text-end total fs-20 text-white mt-1" id="total_nilai" style="border-color:#4E36E2; background-color: #4E36E2" value="{{ $detail->nominal_approve == 0 ? $detail->nominal : $detail->nominal_approve }}" name="total_nilai"  readonly/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-end">
                            @hasrole('finance')
                                @if($detail->status == 1)
                                    <button class="btn bg-animation btn-success mr-5 rounded-5"><i class="bx bxs-save label-icon align-middle fs-16 me-2"></i> Approve</button>
                                @elseif ($detail->status == 2 && Request::get('q') == 2)
                                    <button class="btn bg-animation btn-info mr-5 rounded-5"><i class="bx bxs-save label-icon align-middle fs-16 me-2"></i> Upload Bukti Transfer</button>
                                @elseif ($detail->status == 3 && $detail->bukti_transfer_divisi_to_finance == null && $detail->users->roles[0]->name == 'finance')
                                    <button class="btn bg-animation btn-info mr-5 rounded-5"><i class="bx bxs-save label-icon align-middle fs-16 me-2"></i> Upload Bukti Transfer</button>
                                @elseif ($detail->bukti_transfer_divisi_to_finance != null && $detail->status !== 5)
                                    <button class="btn bg-animation btn-info mr-5 rounded-5"><i class="bx bxs-save label-icon align-middle fs-16 me-2"></i> Selesai</button>
                                @endif
                            @else
                                @if ($detail->status == 1)
                                    <button class="btn bg-animation btn-warning mr-5 rounded-5" style="background-color: #4E36E2"><i class="bx bxs-save label-icon align-middle fs-16 me-2"></i> Update</button>
                                @elseif ($detail->status == 3 && $detail->bukti_transfer_divisi_to_finance == null)
                                    <button class="btn bg-animation btn-info mr-5 rounded-5"><i class="bx bxs-save label-icon align-middle fs-16 me-2"></i> Upload Bukti Transfer</button>
                                @endif
                            @endhasrole
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
                    $('#keterangan'+ item.id).val("")
                }
                if (this.value == 6) {
                    $('#total_nilai').val(parseInt($('#total_nilai').val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")) - parseInt($('#jumlah' + item.id).val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")))
                    if ($('#total_nilai').val() < 1) $('#total_nilai').val(0)
                    $('#selectDetail' + item.id).css("background-color", "#25a0e2");
                    $('#keterangan' + item.id).val("Finance Pending")
                    $('#keterangan' + item.id).prop('required',true);
                }
                if (this.value == 4) {
                    $('#total_nilai').val(parseInt($('#total_nilai').val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")) - parseInt($('#jumlah' + item.id).val().replace("Rp. ","").replaceAll(",","").replaceAll(".","")))
                    if ($('#total_nilai').val() < 1) $('#total_nilai').val(0)
                    $('#selectDetail' + item.id).css("background-color", "#f06548");
                    $('#keterangan' + item.id).val("Finance Tolak")
                    $('#keterangan' + item.id).prop('required',true);
                }
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
                $('#keterangan' + item.id).val("Finance Pending All")
            });
        }
        if (this.value == 'Tolak') {
            countNilai()
            $('#selectAll').css("background-color", "#f06548");
            $.each(f, function(i, item) {
                $('#selectDetail' + item.id).css("background-color", "#f06548");
                $('#selectDetail' + item.id).val(4).change();
                $('#keterangan' + item.id).val("Finance Tolak All")
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


</script>
@endsection
