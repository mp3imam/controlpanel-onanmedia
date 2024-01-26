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
                    <h4 class="card-title mb-0">Tambah Isi Saldo Kasir</h4>
                </div><!-- end card header -->

                <form action="{{ route('upload.file') }}" enctype="multipart/form-data"
                    class="dropzone dz-clickable"
                    id="image-upload" method="post" id="gambar-dropzone">
                    @csrf
                    <input id="random_text" name="random_text" value="{{ $random_string }}" hidden />
                    <input id="folder" name="folder" value="Jurnal_Umum" hidden />
                    <input id="folder_role" name="folder_role" value="Finance" hidden />
                    <div class="dz-default dz-message">
                        <div>Drag & drop a photo or</div>
                        <span class="text-primary">Browse</span>
                    </div>
                    <ul class="list-unstyled mb-0" id="dropzone-preview"></ul>
                </form>
                <form action="{{ route('master_bank_cash.store') }}" method="POST" class="mt-3">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <input id="random_text" name="random_text" value="{{ $random_string }}" hidden />
                                <label for="tanggal_transaksi" class="form-label">TANGGAL TRANSAKSI</label>
                                <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required/>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="bank_id" class="form-label">SUMBER</label>
                                <select id="modal_bank_id" name="bank_id" class="form-control" required></select>
                            </div>


                            <div class="col-md-6 mb-4">
                                <div>
                                    <p class="text-muted fw-medium text-uppercase">Jenis Transaksi</p>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_transaksi" id="jenis_transaksi_1" value="1" checked>
                                        <label class="form-check-label" for="jenis_transaksi_1">
                                            Transfer
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_transaksi" id="jenis_transaksi_2" value="2">
                                        <label class="form-check-label" for="jenis_transaksi_2">
                                            Cash
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="tujuan_id" class="form-label">TUJUAN</label>
                                <select id="modal_tujuan_id" name="tujuan_id" class="form-control" required></select>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="nominal" class="form-label text-uppercase">Nominal</label>
                                <input type="text" class="form-control" id="nominal" name="nominal" required />
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="keterangan" class="form-label">KETERANGAN</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="1"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-auto mb-4">
                                    <a class="btn btn-warning float-end text-white rounded-5 me-3" href="{{ route('master_bank_cash.index') }}" >
                                        <i class="ri-arrow-go-back-line"></i> Kembali
                                    </a>
                                    <button class="btn float-end btn-success text-white rounded-5 me-3" style="background-color: #4E36E2">
                                        <i class="bx bxs-save label-icon align-middle fs-16 me-2"></i> Simpan
                                    </button>
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
    $(function () {
        $("#nominal").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});

        $("#modal_bank_id").select2({
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

        $("#modal_tujuan_id").select2({
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
    })
</script>
@endsection
