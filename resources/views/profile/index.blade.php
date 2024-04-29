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
                                <div class="avatar-title bg-light rounded-circle mx-5 my-3">
                                    @if (Auth::user()->foto)
                                        <img id="foto_profile" src="{{ Auth::user()->foto }}" alt="user-img" width="120px"
                                            height="120px" class="p-0 rounded-circle mb-5 card-img-overlay">
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
                                    <input class="form-control bg-light" id="twitter" value="{{ $detail->twitter }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="instagram" class="form-label">Instagram</label>
                                </div>
                                <div class="col-lg-9">
                                    <input class="form-control bg-light" id="instagram"
                                        value="{{ $detail->instagram }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="web_fortofolio" class="form-label">Website Fortofolio</label>
                                </div>
                                <div class="col-lg-9">
                                    <input class="form-control bg-light" id="web_fortofolio"
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
                                    <div id="id_pass_lama" class="form-icon right">
                                        <input class="form-control bg-light toggle_pass" id="pass_lama" type="password"
                                            required>
                                        <i class="ri-eye-off-line btn_pass"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="password" class="form-label">Password Baru</label>
                                </div>
                                <div class="col-lg-9">
                                    <div id="id_pass_baru" class="form-icon right">
                                        <input type="password" class="form-control bg-light toggle_pass" id="password"
                                            required>
                                        <i class="ri-eye-off-line btn_pass"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="konfirmasi" class="form-label">Konfirmasi Password Baru</label>
                                </div>
                                <div class="col-lg-9">
                                    <div id="id_pass_konfirmasi" class="form-icon right">
                                        <input type="password" class="form-control bg-light toggle_pass"
                                            id="password_confirmation" required>
                                        <i class="ri-eye-off-line btn_pass"></i>
                                    </div>
                                </div>
                            </div>
                            <button id="btn_pass" class="btn text-white fs-14 float-end rounded-4 fw-bold"
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

        $('#input-foto').change(function() {
            var file = this.files[0];
            if (file && file.type.match('image.*')) {
                $('#foto_profile').attr('src', URL.createObjectURL(file));
                $('.header-profile-user').attr('src', URL.createObjectURL(file));

                $('a[href="#v-pills-home"]').tab('show');
                Swal.fire({
                    title: "Berhasil!",
                    text: "Pastikan simpan untuk merubah gambar",
                    icon: "success",
                    timer: 2500
                });
            }
        });

        $('.btn_pass').click(function() {
            var passwordField = $('.toggle_pass');
            passwordField.attr('type', passwordField.attr('type') === 'password' ? 'text' : 'password');
            $('.btn_pass').toggleClass('ri-eye-off-line ri-eye-line');
        });

        $('#btn_umum').click(function() {
            var data = new FormData()
            data.append('nameInput', $('#nameInput').val())
            data.append('email', $('#email').val())
            data.append('no_telp', $('#no_telp').val())
            data.append('nik_khusus', $('#nik_khusus').val())
            data.append('tanggal_lahir', $('#tanggal_lahir').val())
            data.append('agama_id', $('#agama_id').val())
            data.append('jenis_kelamin', $('#jenis_kelamin').val())
            var foto = $('#input-foto')[0].files;
            if (foto.length > 0) {
                data.append('foto', foto[0])
            }

            $.ajax({
                type: "post",
                url: "{{ route('profile.simpan.umum') }}",
                contentType: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                success: function(response) {
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
                        if (response.message.email == 'The email has already been taken.') {
                            $('.modal_email_append').append(`
                            <span class="remove_umum text-danger">Email sudah terdaftar</span>
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

        $('#btn_pass').click(function() {
            var data = new FormData()
            data.append('pass_lama', $('#pass_lama').val())
            data.append('password', $('#password').val())
            data.append('password_confirmation', $('#password_confirmation').val())

            $.ajax({
                type: "post",
                url: "{{ route('profile.simpan.password') }}",
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        Swal.fire({
                            title: 'Mengubah Data Profile Password!',
                            text: 'Data berhasil di ubah.',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: false,
                            timer: 1500
                        })
                    } else if (response.status == 400) {
                        $('.remove_pass').remove()
                        if (response.message.pass_lama == 'The pass lama field is required.') {
                            $('#id_pass_lama').append(
                                `<span class="remove_pass text-danger">${response.message.pass_lama}</span>`
                            )
                        }
                        if (response.message.password ==
                            'The password field and password must be different.' ||
                            response.message.password ==
                            'The password field must be at least 6 characters.' ||
                            response.message.password ==
                            'The password field must be at max 50 characters.') {
                            $('#id_pass_baru').append(
                                `<span class="remove_pass text-danger">${response.message.password}</span>`
                            )
                        }
                        if (response.message.password_confirmation ==
                            'The password field and password must be different.' ||
                            'The password field must be at least 6 characters.' ||
                            'The password field must be at max 50 characters.') {
                            $('#id_pass_konfirmasi').append(
                                `<span class="remove_pass text-danger">${response.message.password_confirmation}</span>`
                            )
                        }
                    } else if (response.status == 409) {
                        $('.remove_pass').remove()
                        $('#id_pass_lama').append(
                            `<span class="remove_pass text-danger">${response.message}</span>`
                        )
                    }
                }
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection
