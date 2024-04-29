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
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @foreach ($nomor_transaksi as $detail)
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="card-title mb-0">{{ $detail['nomor'] }} -
                                                    {{ $detail['detail'][0]->username }}</h6>
                                            </div>
                                            <div class="col-md-6 text-end text-mute">
                                                <input id="id" name="id" value="{{ Request::get('id') }}"
                                                    class="form-control" hidden />
                                                <input id="belanja_id" name="belanja_id[]"
                                                    value="{{ $detail['detail'][0]->id }}" class="form-control" hidden />
                                                {{ Carbon\Carbon::parse($detail['detail'][0]->created_at)->format('d F Y') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body rounded-top-4">
                                        <div class="card-header text-center fs-16" style="background-color: #CCC4FF">
                                            <div class="row font-weight-bold">
                                                <div class="col-md">
                                                    <select id="selectAll{{ $detail['detail'][0]->id }}" name="selectAll[]"
                                                        class="form-control text-white selectAll"
                                                        style="background-color:#00bd9d" disabled>
                                                        <option value="1" selected>Approve All</option>
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
                                            @foreach ($detail['detail'] as $belanja => $b)
                                                <div class="row delete_detail {{ $belanja != 0 ? 'mt-3' : '' }}">
                                                    <div class="col-md">
                                                        <select id="selectDetail{{ $b->id }}" name="selectDetail[]"
                                                            class="form-control selectDetail text-white"
                                                            style="background-color: #00bd9d" disabled>
                                                            <option selected>Approve</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select id="akun{{ $b->id }}" name="akun[]"
                                                            class="form-control akun" disabled>
                                                            <option selected>{{ $b->akun_belanja->uraian }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md">
                                                        <input id="nama_item" name="nama_item[]" class="form-control"
                                                            value="{{ $b->nama_item }}" disabled />
                                                    </div>
                                                    <div class="col-md">
                                                        <input id="qty{{ $b->id }}" name="qty[]"
                                                            class="form-control" type="number"
                                                            onkeyup="updateTotal({{ $b->id }})" min="1"
                                                            value="{{ $b->qty }}" disabled />
                                                    </div>
                                                    <div class="col-md">
                                                        <select id="satuan{{ $b->id }}" name="satuan[]"
                                                            class="form-control satuan" disabled>
                                                            <option selected>{{ $b->satuan_belanja->nama }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input id="harga{{ $b->id }}" name="harga[]"
                                                            class="form-control harga" value="{{ $b->harga }}"
                                                            onkeyup="updateTotal({{ $b->id }})" min="1"
                                                            disabled />
                                                    </div>
                                                    <div class="col-md">
                                                        <input id="keterangan{{ $b->id }}" name="keterangan[]"
                                                            class="form-control keterangan" value="{{ $b->keterangan }}"
                                                            disabled />
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input id="jumlah{{ $b->id }}" name="jumlah[]"
                                                            class="form-control jumlah{{ $belanja }}"
                                                            value="{{ $b->jumlah }}" disabled />
                                                    </div>
                                                    @if ($b->file)
                                                        <div class="col-md text-center"
                                                            onclick="zoomOutImage(`{{ $b->file }}`)">
                                                            <img src="{{ $b->file }}" alt="" width="50px"
                                                                height="50px">
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
                                                        id="total_nilai{{ $b->id }}"
                                                        style="border-color:#4E36E2; background-color: #4E36E2"
                                                        value="{{ $detail['jumlah'] }}" name="total_nilai[]" readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="card bg-success">
                                <div class="card-body rounded-top-4">
                                    <div class="row">
                                        <div class="col-md text-end fs-20 text-white">
                                            Total Pembayaran <span class=" seluruh_total mb-2">-</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
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
        countSeluruhTotal()

        function countSeluruhTotal() {
            var sum_value = 0;
            $('.total_nilai').each(function() {
                sum_value += +$(this).val().replace("Rp. ", "").replaceAll(",", "").replaceAll(".", "");
                $('.seluruh_total').text(sum_value);
            })

            $('.seluruh_total').priceFormat({
                prefix: 'Rp. ',
                centsSeparator: ',',
                thousandsSeparator: '.',
                centsLimit: 0
            });
        }

        $('.total_nilai').priceFormat({
            prefix: 'Rp. ',
            centsSeparator: ',',
            thousandsSeparator: '.',
            centsLimit: 0
        });

        function zoomOutImage(url) {
            Swal.fire({
                imageUrl: url
            });
        }
    </script>
@endsection
