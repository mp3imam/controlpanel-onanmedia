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
                    <h4 class="card-title mb-0">Tambah Isi Saldo Kasir</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <form action="{{ route('master_bank_cash.store') }}" method="POST">
                        @csrf
                        <div class="col-md-12 mb-4">
                            <label for="tanggal_transaksi" class="form-label">TGL. TRANSAKSI</label>
                            <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required/>
                        </div>

                        <div class="col-md-12 mb-4">
                            <label for="bank_id" class="form-label">SUMBER</label>
                            <select id="modal_bank_id" name="bank_id" class="form-control" required></select>
                        </div>

                        <div class="col-md-12 mb-4">
                            <label for="jenis_transaksi" class="form-label">JENIS TRANSAKSI</label>
                            {{-- <input class="form-control" id="jenis_transaksi" name="jenis_transaksi" /> --}}
                            <select class="form-control" name="jenis_transaksi" required>
                                <option value="1" selected>Transfer</option>
                                <option value="2">Cash</option>
                            </select>
                        </div>

                        {{-- <div class="col-md-12 mb-4">
                            <label for="user_pelaksana" class="form-label">USER PELAKSANA</label>
                            <select id="modal_user_id" name="user_id" class="form-control"></select>
                        </div> --}}

                        <div class="col-md-12 mb-4">
                            <label for="nominal" class="form-label text-uppercase">Nominal</label>
                            <input type="text" class="form-control" id="nominal" name="nominal" value="0" required />
                        </div>

                        <div class="col-md-12 mb-4">
                            <label for="keterangan" class="form-label">KETERANGAN</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
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
<script type="text/javascript">
    $(function () {
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

        $(document).ready(function(){
            $("#nominal").maskMoney({prefix: 'Rp. ', affixesStay: false, precision: 0});
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
    })
</script>
@endsection
