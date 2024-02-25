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
                            <h4 class="text-control text-white">Tender Detail</h4>
                        </div>
                        <div class="card-body">
                            <div class="card p-2" style="background-color: #E0E0E0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1 text-center">
                                            <img class="rounded-circle w-75 h-75" src="{{ $detail->user->image }}" />
                                        </div>
                                        <div class="col-md">
                                            <div class="fs-14">{{ $detail->user->name }}</div>
                                            <div class="fs-12" style="color: #55B9DB">{{ $detail->kategori }}</div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <span class="text-muted">Budget</span>
                                            </div>
                                            <div class="col-md-2">
                                                <span class="text-muted">Level Kualifikasi</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="fs-14">{{ $detail->budget }} / {{ $detail->MetodePembayaran }}</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="fs-14" style="color: #8682B9">{{ $detail->kategori }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h1>{{ $detail->judulTender }}</h1>
                            <span class="text-muted">{{ Carbon\Carbon::parse($detail->createdAt)->diffForHumans() }}</span>
                            <hr>

                            <h6 class="fw-bold mt-5">Deskripsi</h6>
                            <p>{!! $detail->deskripsiPekerjaan !!}</p>

                            <h6 class="fw-bold mt-5">Lingkup Pekerjaan</h6>
                            <p>{{ $detail->LingkupPekerjaan }}</p>

                            <h6 class="fw-bold mt-5">Skills dan Keahlian</h6>
                            @foreach (explode(',', $detail->skills) as $skill)
                                <span class="badge bg-light fs-16 p-3" style="color: #828282">{{ trim($skill, '"{}') }}</span>
                            @endforeach

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
                                <select class="form-control mb-3" id="verifikasi_tender">
                                    <option value="0" {{ $detail->status->id == 0 ? "selected" : "" }}>Draft</option>
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
                                <h5 class="text-control text-muted fs-12 keterangan" hidden>Keterangan</h5>
                                <textarea class="form-control keterangan" id="keterangan" hidden required></textarea>
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
    $('#verifikasi_tender').change(function(){
        $('.keterangan').attr('hidden', true)
        if ($(this).val() == 3 || $(this).val() == 4 || $(this).val() == 5)
            $('.keterangan').attr('hidden', false)
    });

    function simpan() {
        var detailId = "{{ $detail->id }}";
        var url = "{{ route('daftar_tender.update', ':detailId') }}";
        url = url.replace(':detailId', detailId);

        $.ajax({
            type: "PUT",
            url: url,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                detail_id: detailId,
                verifikasi_tender: $('#verifikasi_tender').val(),
                keterangan: $('#keterangan').val(),
            },
            dataType: "json",
            success: function (response) {
                if (response.status == 200){
                    Swal.fire({
                        title: "Good job!",
                        text: "Data Berhasil disimpan",
                        icon: "success",
                        timer: 1500
                    });
                }else{
                    Swal.fire({
                        title: "Error!",
                        text: "Keterangan kosong!",
                        icon: "Error",
                        timer: 1500
                    });
                }
            },
            error:function(res){
                Swal.fire({
                    title: "Error!",
                    text: "Keterangan kosong!",
                    icon: "Error",
                    timer: 1500
                });
            },
        });
    }
    </script>
@endsection
