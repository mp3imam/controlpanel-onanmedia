@extends('layouts.master')

<!-- @section('title')
    {{ $title }}
@endsection -->

@section('content')
    @include('components.breadcrumb')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-info">
                            <h4 class="text-control text-white">Jasa Detail</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills arrow-navtabs bg-info nav-success bg-light mb-3" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#arrow-detail" role="tab" aria-selected="true">
                                        <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                                        <span class="d-none d-sm-block">Detail</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#arrow-deskripsi" role="tab" aria-selected="false" tabindex="-1">
                                        <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                                        <span class="d-none d-sm-block">Deskripsi</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#arrow-foto" role="tab" aria-selected="false" tabindex="-1">
                                        <span class="d-block d-sm-none"><i class="mdi mdi-email"></i></span>
                                        <span class="d-none d-sm-block">Foto</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#arrow-pricing" role="tab" aria-selected="false" tabindex="-1">
                                        <span class="d-block d-sm-none"><i class="mdi mdi-email"></i></span>
                                        <span class="d-none d-sm-block">Pricing</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content text-muted">
                                <div class="tab-pane active show" id="arrow-detail" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="col-md-4 text-muted">Nama Jasa</div>
                                            <div class="col-md-8 fs-14 fw-bold">{{ $detail->nama }}</div>
                                        </div>
                                        <div class="col-md mb-3">
                                            <div class="col-md-4 text-muted">Nama User</div>
                                            <div class="col-md-8 fs-14 fw-bold">{{ $detail->UserPosting }}</div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="col-md-4 text-muted">Kategori</div>
                                            <div class="col-md-8 fs-14 fw-bold">{{ $detail->kategori->nama }}</div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="col-md-4 text-muted">Tags</div>
                                            <div class="col-md-8 fs-14 fw-bold">{{ $detail->tags }}</div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="col-md-4 text-muted">SubKategori</div>
                                            <div class="col-md-8 fs-14 fw-bold">{{ $detail->subkategori->nama }}</div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="col-md-4 text-muted">Slug</div>
                                            <div class="col-md-8 fs-14 fw-bold">{{ $detail->slug }}</div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="col-md-4 text-muted">Impresi</div>
                                            <div class="col-md-8 fs-14 fw-bold">{{ $detail->impresi }}</div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="col-md-4 text-muted">Harga Termahal</div>
                                            <div class="col-md-8 fs-14 fw-bold">{{ $detail->hargaTermahal }}</div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="col-md-4 text-muted">Klik</div>
                                            <div class="col-md-8 fs-14 fw-bold">{{ $detail->klik }}</div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="col-md-4 text-muted">Harga Termurah</div>
                                            <div class="col-md-8 fs-14 fw-bold">{{ $detail->hargaTermurah }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="arrow-deskripsi" role="tabpanel">
                                    <p class="mb-0">
                                        {!!  $detail->deskripsi !!}
                                    </p>
                                </div>
                                <div class="tab-pane" id="arrow-foto" role="tabpanel">
                                    <p class="mb-0">
                                        @foreach ($detail->productDoc as $productDoc)
                                            <img class="m-3" src="{{ $productDoc->url }}" width="250px" height="250px">
                                        @endforeach
                                    </p>
                                </div>
                                <div class="tab-pane" id="arrow-pricing" role="tabpanel">
                                    <p class="mb-0">
                                        Tabel Harga
                                    </p>
                                    <table class="table table-striped table-bordered table-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col">Jumlah Periode</th>
                                                <th scope="col">Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detail->productPricing as $productPricing)
                                                <tr>
                                                    <th scope="row">{{ $productPricing->nama }}</th>
                                                    <td>{!! $productPricing->deskripsi !!}</td>
                                                    <td>{{ $productPricing->jumlahPeriode }} {{ $productPricing->periode }}</td>
                                                    <td>{{ $productPricing->harga }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h4 class="text-control text-white">Status</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="text-control text-muted fs-12">Status Verifikasi Jasa</h5>
                                <select class="form-control mb-3" id="verifikasi_jasa">
                                    <option value="1" {{ $detail->status->id == 0 ? "selected" : "" }}>Draft</option>
                                    <option value="1" {{ $detail->status->id == 1 ? "selected" : "" }}>Aktif</option>
                                    <option value="2" {{ $detail->status->id == 2 ? "selected" : "" }}>Sedang Verifikasi</option>
                                    <option value="3" {{ $detail->status->id == 3 ? "selected" : "" }}>Diminta Perubahan</option>
                                    <option value="4" {{ $detail->status->id == 4 ? "selected" : "" }}>Ditolak</option>
                                    <option value="5" {{ $detail->status->id == 5 ? "selected" : "" }}>Ditahan</option>
                                    <option value="6" {{ $detail->status->id == 6 ? "selected" : "" }}>Non Aktif</option>
                                </select>
                                <h5 class="text-control text-muted fs-12">Pengambilan</h5>
                                <select class="form-control mb-3" id="pengambilan">
                                    <option value="0" {{ $detail->isPengambilan == 0 ? "selected" : "" }}>Tidak Aktif</option>
                                    <option value="1"  {{ $detail->isPengambilan == 1 ? "selected" : "" }}>Aktif</option>
                                </select>
                                <h5 class="text-control text-muted fs-12">Pengiriman</h5>
                                <select class="form-control mb-3" id="pengiriman">
                                    <option value="0" {{ $detail->isPengiriman == 0 ? "selected" : "" }}>Tidak Aktif</option>
                                    <option value="1"  {{ $detail->isPengiriman == 1 ? "selected" : "" }}>Aktif</option>
                                </select>
                                <h5 class="text-control text-muted fs-12">Unggulan</h5>
                                <select class="form-control mb-3" id="unggulan">
                                    <option value="0" {{ $detail->isUnggulan == 0 ? "selected" : "" }}>Tidak Aktif</option>
                                    <option value="1"  {{ $detail->isUnggulan == 1 ? "selected" : "" }}>Aktif</option>
                                </select>
                            </div>
                            <div class="card-footer">
                                <a href="javascript:void(0);" class="btn btn-success" onclick="simpan()">Simpan</a>
                                <a href="javascript:void(0);" class="btn btn-warning">Batal </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script type="text/javascript">
    function simpan() {
        var detailId = "{{ $detail->id }}";
        var url = "{{ route('daftar_product_jasa.update', ':detailId') }}";
        url = url.replace(':detailId', detailId);

        $.ajax({
            type: "PUT",
            url: url,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                detail_id: detailId,
                verifikasi_jasa: $('#verifikasi_jasa').val(),
                pengambilan: $('#pengambilan').val(),
                pengiriman: $('#pengiriman').val(),
                unggulan: $('#unggulan').val(),
            },
            dataType: "json",
            success: function (response) {
                Swal.fire({
                    title: "Good job!",
                    text: "Data Berhasil disimpan",
                    icon: "success",
                    timer: 1500
                });
            },
            error:function(res){
                Swal.fire({
                    title: "Error!",
                    text: "You clicked the button!",
                    icon: "Error",
                    timer: 1500
                });
            },
        });
    }
    </script>
@endsection
