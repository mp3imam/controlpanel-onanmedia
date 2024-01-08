@extends('layouts.master')

<!-- @section('title')
    {{ $title }}
@endsection -->

@section('content')
    @include('components.breadcrumb')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-md-8">
                            <h4 class="card-title mb-0">Edit Kas Isi Saldo</h4>
                        </div>
                        <div class="col-md-4 d-flex justify-content-md-end">
                            <button id="deleteButton" class="btn float-end btn-danger text-white rounded-5 me-3">
                                <i class="bx bxs-trash label-icon align-middle fs-16 me-2"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('master_bank_cash.update', $detail->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="tanggal_transaksi" class="form-label">TANGGAL TRANSAKSI</label>
                                <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="{{ $detail->tanggal_transaksi }}" />
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="bank_id" class="form-label">SUMBER</label>
                                <select id="modal_bank_id" name="bank_id" class="form-control"></select>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div>
                                    <p class="text-muted fw-medium text-uppercase">Jenis Transaksi</p>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_transaksi" id="jenis_transaksi_1" value="1" {{ $detail->jenis_transaksi == "1" ? "checked" : "" }} >
                                        <label class="form-check-label" for="jenis_transaksi_1">
                                            Transfer
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_transaksi" id="jenis_transaksi_2" value="2" {{ $detail->jenis_transaksi == 2 ? "checked" : "" }} >
                                        <label class="form-check-label" for="jenis_transaksi_2">
                                            Cash
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="nominal" class="form-label text-uppercase">Nominal</label>
                                <input class="form-control" id="nominal" name="nominal" value="{{ $detail->nominal }}" />
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="keterangan" class="form-label">KETERANGAN</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="1">{{ $detail->keterangan }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-auto mb-4">
                                    <a class="btn btn-warning float-end text-white rounded-5 me-3" href="{{ route('master_bank_cash.index') }}" >
                                        <i class="ri-arrow-go-back-line"></i> Kembali
                                    </a>
                                    <button class="btn float-end btn-info text-white rounded-5 me-3">
                                        <i class="bx bxs-pencil label-icon align-middle fs-16 me-2"></i> Ubah
                                    </button>
                                </div>
                            </div>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $("#nominal").priceFormat({prefix: 'Rp. ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});

    $(document).ready(function() {

        $('#deleteButton').click(function(e) {
            e.preventDefault(); // Prevent the default click behavior

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengonfirmasi
                    $.ajax({
                        url: '{{ url('master_bank_cash', $detail->id) }}',
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            let timerInterval;
                            Swal.fire({
                            title: "Berhasil!",
                            html: "Hapus",
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading();
                                const timer = Swal.getPopup().querySelector("b");
                                timerInterval = setInterval(() => {
                                timer.textContent = `${Swal.getTimerLeft()}`;
                                }, 100);
                            },
                            willClose: () => {
                                window.location = "{{ route('master_bank_cash.index') }}"
                            }
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    window.location = "{{ route('master_bank_cash.index') }}"
                                }
                            });
                        },
                        error: function(xhr) {
                            // Tindakan jika penghapusan gagal
                            console.log('Gagal menghapus data.');
                            // Tambahkan kode lain yang Anda perlukan jika penghapusan gagal
                        }
                    });
                }
            });

        });

        // $("#modal_user_id").select2({
        //     allowClear: true,
        //     width: '100%',
        //     ajax: {
        //         url: "{{ route('api.get_select2_users') }}",
        //         dataType: 'json',
        //         delay: 250,
        //         processResults: function(data) {
        //         return {
        //             results: $.map(data.data, function(item) {
        //                 return {
        //                     id: item.id,
        //                     text: item.name
        //                 }
        //             })
        //         };
        //         }
        //     }
        // });

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
    });

    var dataId = {!! json_encode($detail->coa_kas_saldo) !!}
    console.log(dataId);
    var dataBank = {id: dataId.id,text: dataId.uraian, selected: true};
    var newOptionBank = new Option(dataBank.text, dataBank.id, false, false)
    $('#modal_bank_id').append(newOptionBank).trigger('change')
    $('#modal_bank_id').select2()

    // var dataId = "{{ $detail->bank_id }}"
    // var dataName = "{{ $detail->banks->nama }}"
    // var datarole = {id: dataId,text: dataName, selected: true};
    // var newOptionrole = new Option(datarole.text, datarole.id, false, false)
    // $('#modal_user_id').append(newOptionrole).trigger('change')
    // $('#modal_user_id').select2()


</script>
@endsection
