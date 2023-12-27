@extends('layouts.master')

<!-- @section('title')
    {{ $title }}
@endsection -->

@section('content')
@section('css')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link
    href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
    rel="stylesheet"
/>
@endsection
@include('components.breadcrumb')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Tambah Jurnal Umum</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <form action="{{ route('master_jurnal.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input type="file" name="attachment" id="attachment">
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="tanggal_transaksi" class="form-label">TGL. TRANSAKSI</label>
                                <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required/>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="keterangan" class="form-label">KETERANGAN</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="1"></textarea>
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
                                            <button class="btn float-end text-white rounded-pill" type="button" onclick="tambah_detail()" style="background-color: #4E36E2">Tambah Data Baris</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-header">
                                        <div class="row font-weight-bold">
                                            <div class="col-md-3">Akun Belanja</div>
                                            <div class="col-md-3">Keterangan</div>
                                            <div class="col-md-3">Nilai</div>
                                            <div class="col-md-3 text-center"></div>
                                        </div>
                                    </div>
                                    <div class="card-body tambah_detail">
                                        <div class="row delete_detail">
                                            <div class="col-md-3">
                                                <select id="akun_belanja" name="akun_belanja[]" class="form-control akun_belanja" required ></select>
                                            </div>
                                            <div class="col-md-3">
                                                <input id="keterangan[]" name="keterangan[]" class="form-control" />
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control nilai" type="number" number="nilai[]" name="nilai[]" onkeyup="countNilai()" />
                                            </div>
                                            <div class="col-md-3 text-center hapus_detail">
                                                <i class="ri-delete-bin-line text-danger ri-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-3 text-uppercase">TOTAL
                                            </div>
                                            <div class="col-md-3">
                                                <label class="" id="total_nilai">0</label>
                                            </div>
                                            <div class="col-md-3 text-center">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
@section('script')

<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script>
    FilePond.registerPlugin(FilePondPluginImagePreview);

    const inputElement = document.querySelector('input[id="attachment"]');
    const pond = FilePond.create(inputElement);
    const pondBox = document.querySelector('.filepond--root');
    pondBox.addEventListener('FilePond:addfile', e => {
        var fileName = pond.getFile().filename;
    });

    FilePond.setOptions({
        allowMultiple: true,
        server: {
            process: "/upload_foto_jurnal_umum",
            headers:{'X-CSRF-TOKEN': '{{ csrf_token() }}'}
        }
    });

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
    })

    $(".akun_belanja").select2({
        allowClear: true,
        width: '100%',
        ajax: {
            url: "{{ route('api.get_select2_banks_gabungan_kasir') }}",
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

    var count = 1
    function tambah_detail() {
        $('.tambah_detail').append(`
            <div class="row delete_detail">
                <div class="col-md-3">
                    <select id="akun_belanja`+count+++`" name="akun_belanja[]" class="form-control akun_belanja" required ></select>
                </div>
                <div class="col-md-3">
                    <input id="keterangan" name="keterangan[]" class="form-control" />
                </div>
                <div class="col-md-3">
                    <input class="form-control nilai" type="number" id="nilai" name="nilai[]" onkeyup="countNilai()" />
                </div>
                <div class="col-md-3 text-center hapus_detail">
                    <i class="ri-delete-bin-line text-danger ri-2x"></i>
                </div>
            </div>
        `);

        // Inisialisasi Select2 pada elemen dengan class akun_belanja
        $(".akun_belanja").select2({
            allowClear: true,
            width: '100%',
            ajax: {
                url: "{{ route('api.get_select2_banks_gabungan_kasir') }}",
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
    }

    $('.hapus_detail').click(function(){
        $(this).closest('.delete_detail').remove();
        countNilai()
    })

    function countNilai() {
        var sum_value = 0;
        $('.nilai').each(function(){
            sum_value += +$(this).val();
            $('#total_nilai').text(sum_value);
        })
    }


</script>
@endsection
