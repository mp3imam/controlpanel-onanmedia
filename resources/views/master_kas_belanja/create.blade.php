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
                    <a href="{{ route('master_kas_belanja.index') }}"
                        class="btn bg-animation rounded-5 btn-outline-primary waves-effect waves-light float-end"
                        style="color: #4E36E2">Kembali</a>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <form action="{{ route('master_kas_belanja.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="account_id" class="form-label">Deskripsi</label>
                                <textarea class="form-control" rows="4" cols="50" placeholder="Tulis deskripsi pembelanjaan di sini...."
                                    name="deskripsi" required></textarea>
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
                                        <button class="btn float-end rounded-3" type="button" onclick="tambah_detail()"
                                            style="background-color:#E0E7FF; color:#4E36E2"><i
                                                class="ri-add-box-fill"></i> Tambah Data Baris</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-header text-center fs-16" style="background-color: #CCC4FF">
                                    <div class="row font-weight-bold">
                                        <div class="col-md">Nama Item</div>
                                        <div class="col-md-1">Quantity</div>
                                        <div class="col-md-1">Satuan</div>
                                        <div class="col-md">Harga</div>
                                        <div class="col-md">Keterangan</div>
                                        <div class="col-md">Ongkir</div>
                                        <div class="col-md">Jumlah</div>
                                        <div class="col-md">Upload Foto</div>
                                        <div class="col-md text-center">Action</div>
                                    </div>
                                </div>
                                <div class="card-body tambah_detail">
                                    <div class="row delete_detail">
                                        <div class="col-md">
                                            <input id="nama_item" name="nama_item[]" class="form-control" required />
                                        </div>
                                        <div class="col-md-1">
                                            <input id="qty0" name="qty[]" class="form-control" type="number"
                                                onkeyup="updateTotal(0)" min="1" value="1" required />
                                        </div>
                                        <div class="col-md-1">
                                            <select id="satuan0" name="satuan[]" class="form-control satuan"
                                                required></select>
                                        </div>
                                        <div class="col-md">
                                            <input id="harga0" name="harga[]" class="form-control harga"
                                                value="1" onkeyup="updateTotal(0)" min="1" required />
                                        </div>
                                        <div class="col-md">
                                            <input id="keterangan" name="keterangan[]" class="form-control" />
                                        </div>
                                        <div class="col-md">
                                            <input id="pengiriman0" name="pengiriman[]" class="form-control pengiriman"
                                                value="0" onkeyup="updateTotal(0)" />
                                        </div>
                                        <div class="col-md">
                                            <input id="jumlah0" name="jumlah[]" class="form-control jumlah"
                                                value="1" readonly />
                                        </div>
                                        <div class="col-md">
                                            <input id="file" name="file0" type="file" class="form-control"
                                                accept="image/*" />
                                        </div>
                                        <div class="col-md text-center float-end">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-2 text-uppercase text-center mt-1 fs-16 fw-bold">
                                            TOTAL
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control text-end total fs-20 text-white"
                                                style="background-color: #4E36E2" id="total_nilai" value="1"
                                                name="total_nilai" readonly />
                                        </div>
                                        <div class="col-md text-center">
                                            <button class="btn float-end" type="button" onclick="tambah_detail()"
                                                style="background-color:#E0E7FF; color:#4E36E2"><i
                                                    class="ri-add-box-fill"></i> Tambah Data Baris</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="float-end">
                        <button class="btn bg-animation btn-success mr-5 rounded-5"
                            style="background-color: #4E36E2"><i
                                class="bx bxs-save label-icon align-middle fs-16 me-2"></i> Simpan</button>
                        &nbsp;&nbsp;&nbsp;
                        <a href="{{ route('master_kas_belanja.index') }}"
                            class="btn bg-animation rounded-5 btn-outline-primary waves-effect waves-light float-end"
                            style="color: #4E36E2">Kembali</a>
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

    var count = 1

    function tambah_detail() {
        $('.tambah_detail').append(`
            <div class="row delete_detail mt-4">
                <div class="col-md">
                    <input id="nama_item` + count + `" name="nama_item[]" class="form-control" required />
                </div>
                <div class="col-md-1">
                    <input id="qty` + count + `" name="qty[]" class="form-control" onkeyup="updateTotal(` + count + `)" type="number" min="1" value="1" required />
                </div>
                <div class="col-md-1">
                    <select id="satuan` + count + `" name="satuan[]" class="form-control satuan" required ></select>
                </div>
                <div class="col-md">
                    <input id="harga` + count + `" name="harga[]" class="form-control harga" onkeyup="updateTotal(` +
            count + `)" value="1" min="1" required />
                </div>
                <div class="col-md">
                    <input id="keterangan` + count + `" name="keterangan[]" class="form-control" />
                </div>
                <div class="col-md">
                    <input id="pengiriman` + count +
            `" name="pengiriman[]" class="form-control pengiriman" value="0" onkeyup="updateTotal(` +
            count + `)"  />
                </div>
                <div class="col-md">
                    <input id="jumlah` + count + `" name="jumlah[]" class="form-control jumlah" value="1" readonly />
                </div>
                <div class="col-md">
                    <input id="file` + count + `" name="file` + count + `" type="file" class="form-control" accept="image/*" />
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

        $('.hapus_detail').click(function() {
            $(this).closest('.delete_detail').remove();
            countNilai()
        });
        $(".harga").priceFormat({
            prefix: 'Rp. ',
            centsSeparator: ',',
            thousandsSeparator: '.',
            centsLimit: 0
        });
        $(".pengiriman").priceFormat({
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

        $('#total_nilai').val(parseInt($('#total_nilai').val().replace('Rp. ', '').replaceAll(",", "").replaceAll(".",
            "")) + 1);
        $('#total_nilai').priceFormat({
            prefix: 'Rp. ',
            centsSeparator: ',',
            thousandsSeparator: '.',
            centsLimit: 0
        });

        count++;
    }

    function updateTotal(data) {
        var qty = $('#qty' + data).val().replace("Rp. ", "").replaceAll(",", "").replaceAll(".", "");
        var harga = $('#harga' + data).val().replace("Rp. ", "").replaceAll(",", "").replaceAll(".", "");
        var pengiriman = $('#pengiriman' + data).val().replace("Rp. ", "").replaceAll(",", "").replaceAll(".", "");
        var total = parseInt(qty) * parseInt(harga) + parseInt(pengiriman);
        console.log(total);

        $('#jumlah' + data).val(total);
        $(".jumlah").priceFormat({
            prefix: 'Rp. ',
            centsSeparator: ',',
            thousandsSeparator: '.',
            centsLimit: 0
        });
        countNilai()
    }


    $('.hapus_detail').click(function() {
        $(this).closest('.delete_detail').remove();
        countNilai()
    })

    function countNilai() {
        var sum_value = 0;
        $('.jumlah').each(function() {
            sum_value += +$(this).val().replace("Rp. ", "").replaceAll(",", "").replaceAll(".", "");
            $('#total_nilai').val(sum_value);
        })

        $('#total_nilai').priceFormat({
            prefix: 'Rp. ',
            centsSeparator: ',',
            thousandsSeparator: '.',
            centsLimit: 0
        });
        $(".harga").priceFormat({
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
    $(".pengiriman").priceFormat({
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
    $('#total_nilai').priceFormat({
        prefix: 'Rp. ',
        centsSeparator: ',',
        thousandsSeparator: '.',
        centsLimit: 0
    });
</script>
@endsection
