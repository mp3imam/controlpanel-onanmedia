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
                            <h4 class="card-title mb-0">Edit Rekening Bank</h4>
                        </div>
                        <div class="col-md-4 d-flex justify-content-md-end">
                            <button id="deleteButton" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('master_kas_belanja.update', $detail->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12 mb-4">
                            <label for="nomor_transaksi" class="form-label">No. Transaksi</label>
                            <input class="form-control" id="nomor_transaksi" name="nomor_transaksi" value="{{ $detail->nomor_transaksi }}" />
                        </div>

                        <div class="col-md-12 mb-4">
                            <label for="tanggal_transaksi" class="form-label">TGL. TRANSAKSI</label>
                            <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="{{ $detail->tanggal_transaksi }}" />
                        </div>

                        <div class="col-md-12 mb-4">
                            <label for="bank_id" class="form-label">SUMBER</label>
                            <select id="modal_bank_id" name="bank_id" class="form-control"></select>
                        </div>

                        <div class="col-md-12 mb-4">
                            <label for="jenis_transaksi" class="form-label">JENIS TRANSAKSI</label>
                            <input class="form-control" id="jenis_transaksi" name="jenis_transaksi" value="{{ $detail->jenis_transaksi }}" />
                        </div>

                        <div class="col-md-12 mb-4">
                            <label for="nilai" class="form-label">NILAI</label>
                            <input type="number" class="form-control" id="nilai" name="nilai" value="{{ $detail->nilai }}" />
                        </div>

                        <div class="col-md-12 mb-4">
                            <label for="keterangan" class="form-label">KETERANGAN</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ $detail->keterangan }}</textarea>
                        </div>

                        <button class="btn btn-success form-control text-white" style="background-color: #4E36E2"><i
                                class="bx bxs-save label-icon align-middle fs-16 me-2"></i> Simpan</button>
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
                        url: '{{ url('master_kas_belanja', $detail->id) }}',
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
                                window.location = "{{ route('master_kas_belanja.index') }}"
                            }
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    window.location = "{{ route('master_kas_belanja.index') }}"
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

        $("#modal_bank_id").select2({
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
    });

    var dataId = "{{ $detail->bank_id }}"
    var dataName = "{{ $detail->banks->nama }}"
    var dataBank = {id: dataId,text: dataName, selected: true};
    var newOptionBank = new Option(dataBank.text, dataBank.id, false, false)
    $('#modal_bank_id').append(newOptionBank).trigger('change')
    $('#modal_bank_id').select2()

</script>
@endsection
