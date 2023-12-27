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
                    <h4 class="card-title mb-0">Tambah Jurnal Umum</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <form action="{{ route('master_jurnal.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="tanggal_transaksi" class="form-label">TGL. TRANSAKSI</label>
                                <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required/>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="jenis_transaksi" class="form-label">JENIS TRANSAKSI</label>
                                <select class="form-control" name="jenis_transaksi" required>
                                    <option value="1" selected>Transfer</option>
                                    <option value="2">Cash</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="keterangan" class="form-label">KETERANGAN</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="1"></textarea>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="keterangan" class="form-label">Jenis Mata Uang</label>
                                <select id="modal_mata_uang_id" name="mata_uang_id" class="form-control" required></select>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="nameInput" class="form-label">Gambar</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="file" name="attachment" id="attachment">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="card-title mb-0">Detail Jurnal</h6>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body tambah_detail">
                                    <div class="card-header">
                                        <div class="row font-weight-bold">
                                            <div class="col-md-3">Rekening</div>
                                            <div class="col">Keterangan</div>
                                            <div class="col">Debet</div>
                                            <div class="col">Kredit</div>
                                            <div class="col text-center">Action</div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row delete_detail1">
                                            <div class="col-md-3">
                                                <input id="rekening[]" name="rekening[]" class="form-control" required />
                                            </div>
                                            <div class="col">
                                                <input id="keterangan[]" name="keterangan[]" class="form-control" />
                                            </div>
                                            <div class="col">
                                                <input type="text" id="debet[]" name="debet[]" onkeypress="countDebet()" />
                                            </div>
                                            <div class="col">
                                                <input type="text" id="kredit[]" name="kredit[]" onkeypress="countKredit()" />
                                            </div>
                                            <div class="col text-center">
                                                <i class="ri-delete-bin-line text-danger ri-2x" onclick="hapus_detail(1)"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row delete_detail1">
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col">
                                            </div>
                                            <div class="col">
                                                <label class="form-control" id="debetAll">0</label>
                                            </div>
                                            <div class="col">
                                                <label class="form-control" id="kreditAll">0</label>
                                            </div>
                                            <div class="col text-center">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn form-control text-white rounded-pill" type="button" onclick="tambah_baris()" style="background-color: #4E36E2">Tambah Data Baris</button>
                        <button class="btn btn-success float-end mt-4"><i class="bx bxs-save label-icon align-middle fs-16 me-2"></i> Simpan</button>
                    </form>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!--end row-->
@endsection
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
@section('script')
<script type="text/javascript">
    $(function () {
        $("#modal_mata_uang_id").select2({
            allowClear: true,
            width: '100%',
            ajax: {
                url: "{{ route('api.get_select2_mata_uangs') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.id,
                            text: item.nama
                        }
                    })
                };
                }
            }
        });

        FilePond.registerPlugin(FilePondPluginImagePreview);

        const inputElement = document.querySelector('input[id="attachment"]');
        const pond = FilePond.create(inputElement);
        const pondBox = document.querySelector('.filepond--root');
        pondBox.addEventListener('FilePond:addfile', e => {
            console.log('file added event', e.detail);
            var fileName = pond.getFile().filename;
            console.log(fileName);
        });

        FilePond.setOptions({
            allowMultiple: true,
            server: {
                process: "/upload_foto_jurnal_umum",
                headers:{'X-CSRF-TOKEN': '{{ csrf_token() }}'}
            }
        });

    })
</script>
@endsection
