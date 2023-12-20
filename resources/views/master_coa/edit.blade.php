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
                    <form method="POST" action="{{ route('master_coa.update', $detail->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12 mb-4">
                            <label for="uraian" class="form-label">Uraian</label>
                            <input class="form-control" id="uraian" name="uraian" value="{{ $detail->uraian }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="rekening_bank" class="form-label">Rekening Bank</label>
                            <input class="form-control" id="rekening_bank" name="rekening_bank" value="{{ $detail->rekening_bank }}" />
                            @error('rekening_bank')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                            {{-- @dd($errors->has('rekening_bank')) --}}

                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="alamat_bank" class="form-label">Alamat Bank</label>
                            <textarea class="form-control" id="alamat_bank" name="alamat_bank">{{ $detail->alamat_bank }}</textarea>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="nama_bank" class="form-label">Nama Bank</label>
                            <input class="form-control" id="nama_bank" name="nama_bank" value="{{ $detail->nama_bank }}" required />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="account_name" class="form-label">Account Name</label>
                            <input class="form-control" id="account_name" name="account_name" value="{{ $detail->account_name }}" required />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="swift_code" class="form-label">Swift Code</label>
                            <input class="form-control" id="swift_code" name="swift_code" value="{{ $detail->swift_code }}" required />
                        </div>
                        <button class="btn form-control text-white" style="background-color: #4E36E2">Ubah</button>
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
                        url: '{{ url('master_coa', $detail->id) }}',
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
                                window.location = "{{ route('master_coa.index') }}"
                            }
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    window.location = "{{ route('master_coa.index') }}"
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
    });
</script>
@endsection
