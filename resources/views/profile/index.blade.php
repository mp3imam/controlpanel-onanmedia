@extends('layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @include('components.breadcrumb')
    @include('sweetalert::alert')
    <div class="row">
        <div class="container-fluid">
            <div class="card job-list-view-card overflow-hidden" id="job-overview">
                <img src="assets/images/logo/profile_awal.png" alt="" id="cover-img" class="object-fit-cover"
                    height="300px">
                <div class="card-body">
                    <div class="row">
                        <div class="col" onclick="document.getElementById('input-foto').click()" style="cursor: pointer">
                            <div class="avatar-md mt-n5 mb-5 card-img-overlay mx-3">
                                <div class="avatar-title bg-lightrounded-circle mx-5 my-3">
                                    @if (Auth::user()->foto)
                                        <img id="foto_profile" src="{{ Auth::user()->foto }}" alt="user-img" width="120px"
                                            height="120px" class="rounded-circle">
                                    @else
                                        <img id="foto_profile" src="assets/images/users/avatar.png" alt="user-img"
                                            width="120px" height="120px" class="p-0 rounded-circle mb-5 card-img-overlay">
                                    @endif
                                    <button class="btn btn-success btn-sm rounded-5 mt-5"><i
                                            class="ri-pencil-line"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-11">
                            <input type="file" id="input-foto" accept="image/*" hidden>
                            <div class="h4 mx-3">{{ Auth::user()->nama_lengkap }}</div>
                            <div class="h6 mx-3">{{ Auth::user()->roles[0]->name }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <div class="row">
                    <div class="col-md-3">
                        <img class="my-3" src="assets/images/logo/information_active.png" height="25px" width="25px" />
                    </div>
                    <div class="col-md-9">
                        <a class="nav-link my-2 active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home"
                            role="tab" aria-controls="v-pills-home" aria-selected="true">
                            Informasi Umum
                        </a>
                    </div>
                    <div class="col-md-3">
                        <img class="my-3" src="assets/images/logo/global_active.png" height="25px" width="25px" />
                    </div>
                    <div class="col-md-9">
                        <a class="nav-link my-2" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile"
                            role="tab" aria-controls="v-pills-profile" aria-selected="false" tabindex="-1">
                            Media Sosial
                        </a>
                    </div>
                    <div class="col-md-3">
                        <img class="my-3" src="assets/images/logo/key_active.png" height="25px" width="25px" />
                    </div>
                    <div class="col-md-9">
                        <a class="nav-link my-2" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages"
                            role="tab" aria-controls="v-pills-messages" aria-selected="false" tabindex="-1">
                            Ganti Password
                        </a>
                    </div>
                </div>


            </div>
        </div><!-- end col -->
        <div class="col-md-10">
            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title mb-2">Informasi Umum</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="nameInput" class="form-label">Nama Lengkap</label>
                                </div>
                                <div class="col-lg-9 modal_nama_append">
                                    <input type="text" class="form-control bg-light" id="nameInput"
                                        value="{{ $detail->nama_lengkap }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="email" class="form-label">Email</label>
                                </div>
                                <div class="col-lg-9 modal_email_append">
                                    <input type="email" class="form-control bg-light" id="email"
                                        value="{{ $detail->email }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="no_telp" class="form-label">Nomor Telephone</label>
                                </div>
                                <div class="col-lg-9 modal_telp_append">
                                    <input type="text" class="form-control bg-light" id="no_telp"
                                        value="{{ $detail->no_handphone }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="nik_khusus" class="form-label">Nik Khusus</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control bg-light" id="nik_khusus"
                                        value="{{ $detail->nik_khusus }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control bg-light flatpickr-input"
                                        value="{{ Carbon\Carbon::parse($detail->tanggal_lahir)->format('d-m-Y') }}"
                                        required data-provider="flatpickr" data-date-format="d-m-Y" id="tanggal_lahir">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="meassageInput" class="form-label">Agama</label>
                                </div>
                                <div class="col-lg-9">
                                    <select id="agama_id" class="form-select mb-3 bg-light"
                                        aria-label="Default select example">
                                        <option value="1" {{ $detail->agama_id == 1 ? 'selected' : '' }}>
                                            Islam
                                        </option>
                                        <option value="2" {{ $detail->agama_id == 2 ? 'selected' : '' }}>
                                            Kristen Protestan
                                        </option>
                                        <option value="3" {{ $detail->agama_id == 3 ? 'selected' : '' }}>
                                            Kristen Katolik
                                        </option>
                                        <option value="4" {{ $detail->agama_id == 4 ? 'selected' : '' }}>
                                            Budha
                                        </option>
                                        <option value="5" {{ $detail->agama_id == 5 ? 'selected' : '' }}>
                                            Hindu
                                        </option>
                                        <option value="6" {{ $detail->agama_id == 6 ? 'selected' : '' }}>
                                            Konghucu
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="meassageInput" class="form-label">Jenis Kelamin</label>
                                </div>
                                <div class="col-lg-9">
                                    <select id="jenis_kelamin" class="form-select mb-3 bg-light"
                                        aria-label="Default select example">
                                        <option
                                            {{ $detail->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}value="Laki-Laki">
                                            Laki-Laki
                                        </option>
                                        <option value="Perempuan"
                                            {{ $detail->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <button id="btn_umum" class="btn text-white fs-14 float-end rounded-4 fw-bold"
                                style="background-color:#4E36E2" type="button">Simpan
                                perubahan
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title mb-2">Media Sosial</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="linkedin" class="form-label">LinkedIn</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control bg-light" id="linkedin"
                                        value="{{ $detail->linkedin }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="facebook" class="form-label">Facebook</label>
                                </div>
                                <div class="col-lg-9">
                                    <input class="form-control bg-light" id="facebook" value="{{ $detail->facebook }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="twitter" class="form-label">Twitter</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control bg-light" id="twitter"
                                        value="{{ $detail->twitter }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="instagram" class="form-label">Instagram</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control bg-light" id="instagram"
                                        value="{{ $detail->instagram }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="web_fortofolio" class="form-label">Website Fortofolio</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control bg-light" id="web_fortofolio"
                                        value="{{ $detail->website }}">
                                </div>
                            </div>
                            <button id="btn_medsos" class="btn text-white fs-14 float-end rounded-4 fw-bold"
                                style="background-color:#4E36E2" type="button">Simpan
                                perubahan
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title mb-2">Ganti Password</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="email" class="form-label">Email</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control bg-black text-light" id="email_password"
                                        value="{{ $detail->email }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="pass_lama" class="form-label">Password Lama</label>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-icon right">
                                        <input class="form-control bg-light toggle_pass" onclick="togglePassword()"
                                            id="pass_lama" type="password" required>
                                        <i class="ri-eye-off-line btn_pass"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="pass_baru" class="form-label">Password Baru</label>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-icon right">
                                        <input type="password" onclick="togglePassword()"
                                            class="form-control bg-light toggle_pass" id="pass_baru" required>
                                        <i class="ri-eye-off-line btn_pass"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="konfirmasi" class="form-label">Konfirmasi Password Baru</label>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-icon right">
                                        <input type="password" onclick="togglePassword()"
                                            class="form-control bg-light toggle_pass" id="konfirmasi" required>
                                        <i class="ri-eye-off-line btn_pass"></i>
                                    </div>
                                </div>
                            </div>
                            <button class="btn text-white fs-14 float-end rounded-4 fw-bold"
                                style="background-color:#4E36E2" type="button">Simpan
                                perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--  end col -->
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function() {
            var table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('pekerjaan.create') }}",
                    data: function(d) {
                        d.username_id = $('#username_id').val()
                        d.roles_id = $('#roles_id').val()
                    }
                },
                columns: [{
                    data: "id",
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                }, {
                    data: 'nama',
                    name: 'Pekerjaan',
                    render: function(data, type, row, meta) {
                        return `<button class="btn btn-ghost-primary waves-effect waves-light text-right btn-sm" type="button" target="_blank" onclick="modal_crud('Edit','` +
                            row.id + `', '` + row.nama +
                            `')" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">` +
                            data + `</button>`;
                    }
                }]
            });

            $('#username_id').keyup(function() {
                table.draw();
            });
        });

        $('.btn_pass').click(function() {
            var passwordField = $('.toggle_pass');
            passwordField.attr('type', passwordField.attr('type') === 'password' ? 'text' : 'password');
            $('#eyeIcon').toggleClass('ri-eye-off-line ri-eye-line');
        });

        $('#btn_umum').click(function() {
            var data = new FormData()
            data.append('id_update', "{{ auth()->user()->id }}")
            data.append('nameInput', $('#nameInput').val())
            data.append('email', $('#email').val())
            data.append('no_telp', $('#no_telp').val())
            data.append('nik_khusus', $('#nik_khusus').val())
            data.append('tanggal_lahir', $('#tanggal_lahir').val())
            data.append('agama_id', $('#agama_id').val())
            data.append('jenis_kelamin', $('#jenis_kelamin').val())
            data.append('foto', $('#foto_profile').val())

            $.ajax({
                type: "post",
                url: "{{ route('profile.simpan.umum') }}",
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        Swal.fire({
                            title: 'Mengubah Data Profile!',
                            text: 'Data berhasil di ubah.',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: false,
                            timer: 1500
                        })
                    } else {
                        $('.remove_umum').remove()
                        if (response.message.namaInput == 'The name input field is required.') {
                            $('.modal_nama_append').append(`
                                <span class="remove_umum text-danger">Data Tidak Boleh Kosong</span>
                            `)
                        }
                        if (response.message.email == 'The email input field is required.') {
                            $('.modal_email_append').append(`
                            <span class="remove_umum text-danger">Data Tidak Boleh Kosong</span>
                        `)
                        }
                        if (response.message.no_telp == 'The no telp input field is required.') {
                            $('.modal_telp_append').append(`
                            <span class="remove_umum text-danger">Data Tidak Boleh Kosong</span>
                        `)
                        }
                    }
                }
            });
        });

        $('#btn_medsos').click(function() {
            var data = new FormData()
            data.append('id_update', "{{ auth()->user()->id }}")
            data.append('linkedin', $('#linkedin').val())
            data.append('facebook', $('#facebook').val())
            data.append('twitter', $('#twitter').val())
            data.append('instagram', $('#instagram').val())
            data.append('web_fortofolio', $('#web_fortofolio').val())

            $.ajax({
                type: "post",
                url: "{{ route('profile.simpan.medsos') }}",
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        Swal.fire({
                            title: 'Mengubah Data Profile Medsos!',
                            text: 'Data berhasil di ubah.',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: false,
                            timer: 1500
                        })
                    }
                }
            });
        });

        function modal_crud(data, id, nama) {
            var nama_modal = nama ?? ''
            button_hapus = id ?
                `<a href="#" type="button" onclick="alert_delete('${id}','${nama}')" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Hapus</a>` :
                ''

            $('#modal_content').html(`
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">${data} Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-xxl-12" id="modal_Pekerjaan_append">
                        <label for="Pekerjaan" class="form-label">Nama Pekerjaan</label>
                        <input class="form-control" id="modal_pekerjaan" placeholder="Enter Pekerjaan" value="${nama_modal}">
                    </div>
                    <div class="col-lg-12 d-flex justify-content-between">
                        <div class="d-flex">
                            ${button_hapus}
                        </div>
                        <div class="d-flex">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>&nbsp;
                            <button type="submit" class="btn btn-primary add" id="row` + id + `">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        `)

            if (id !== undefined) {
                $('#row' + id).removeClass('add')
                $('#row' + id).removeClass('btn-primary')
                $('#row' + id).addClass('edit')
                $('#row' + id).addClass('btn-warning')
            } else {
                $('#rowundefined').removeClass('edit')
                $('#rowundefined').addClass('add')
                $('#rowundefined').removeClass('btn-warning')
                $('#rowundefined').addClass('btn-primary')
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.add').on('click', function() {
                var data = new FormData()
                data.append('pekerjaan', $('#modal_pekerjaan').val())
                $.ajax({
                    type: "post",
                    url: "{{ url('pekerjaan') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        if (result.status == 200) {
                            Swal.fire({
                                title: 'Add!',
                                text: 'Your file has been add.',
                                icon: 'success',
                                confirmButtonClass: 'btn btn-primary w-xs mt-2',
                                buttonsStyling: false
                            }).then(function() {
                                $('#dataTable').DataTable().ajax.reload()
                                $('#exampleModalgrid').modal('hide')
                            });
                        } else {
                            $('.remove_username').remove()
                            $('.remove_nama_lengkap').remove()
                            $('.remove_role').remove()
                            // if (result.)
                            $('.modal_username_append').append(`
                            <span class="remove_username text-danger">Data Tidak Boleh Kosong</span>
                        `)

                        }

                    }
                });

            })

            $('.edit').on('click', function() {
                var data = new FormData()
                data.append('_method', 'PUT')
                data.append('id', id)
                data.append('pekerjaan', $('#modal_pekerjaan').val())
                $.ajax({
                    url: "{{ url('pekerjaan') }}/" + id,
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        if (result.status == 200) {
                            Swal.fire({
                                title: 'Edit!',
                                text: 'Your file has been edit.',
                                icon: 'success',
                                confirmButtonClass: 'btn btn-primary w-xs mt-2',
                                buttonsStyling: false
                            }).then(function() {
                                $('#dataTable').DataTable().ajax.reload()
                                $('#exampleModalgrid').modal('hide')
                            });
                        } else {
                            $('.remove_username').remove()
                            $('.remove_nama_lengkap').remove()
                            $('.remove_role').remove()
                            // if (result.)
                            $('.modal_username_append').append(`
                            <span class="remove_username text-danger">Data Tidak Boleh Kosong</span>
                        `)

                        }

                    }
                });

            })
        }

        function alert_delete(id, nama) {
            Swal.fire({
                title: `Hapus Data`,
                text: "Apakah anda yakin untuk menghapus data '" + nama + "'",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "delete",
                        url: "{{ url('pekerjaan') }}" + '/' + id,
                        data: {
                            "_method": 'delete',
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(result) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                icon: 'success',
                                confirmButtonClass: 'btn btn-primary w-xs mt-2',
                                buttonsStyling: false
                            }).then(function() {
                                $('#dataTable').DataTable().ajax.reload()
                            });
                        }
                    });
                }

            });
        }

        $('.btn-pdf').on('click', function() {
            $('#modal_content').html(`
            <div class="modal-body text-center p-5">
                <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:120px;height:120px"></lord-icon>

                <div class="mt-4">
                    <h4 class="mb-3">Sedang Mendownload PDF</h4>
                    <p class="text-muted mb-4"> Mohon Tunggu Sebentar. </p>
                </div>
            </div>
        `)
            $("#exampleModal").modal('show');

            var fd = new FormData()
            fd.append('username_id', $('#username_id').val())
            fd.append('nama_lengkap_id', $('#nama_lengkap_id').val())
            $.ajax({
                type: 'post',
                url: "{{ route('users.pdf') }}",
                data: fd,
                processData: false,
                contentType: false,
                xhrFields: {
                    responseType: 'blob' // to avoid binary data being mangled on charset conversion
                },
                success: function(blob, status, xhr) {
                    // check for a filename
                    var filename = "";
                    var disposition = xhr.getResponseHeader('Content-Disposition');
                    if (disposition && disposition.indexOf('attachment') !== -1) {
                        var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                        var matches = filenameRegex.exec(disposition);
                        if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
                    }

                    if (typeof window.navigator.msSaveBlob !== 'undefined') {
                        // IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
                        window.navigator.msSaveBlob(blob, filename);
                    } else {
                        var URL = window.URL || window.webkitURL;
                        var downloadUrl = URL.createObjectURL(blob);

                        if (filename) {
                            // use HTML5 a[download] attribute to specify filename
                            var a = document.createElement("a");
                            // safari doesn't support this yet
                            if (typeof a.download === 'undefined') {
                                window.location.href = downloadUrl;
                            } else {
                                a.href = downloadUrl;
                                a.download = filename;
                                document.body.appendChild(a);
                                a.click();
                            }
                        } else {
                            window.location.href = downloadUrl;
                        }

                        setTimeout(function() {
                            URL.revokeObjectURL(downloadUrl);
                        }, 100); // cleanup
                    }
                }
            }).done(function() { //use this
                $('#exampleModal').modal('hide')
            });
        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection
