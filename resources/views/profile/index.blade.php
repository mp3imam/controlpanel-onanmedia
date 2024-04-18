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
                        <div class="col">
                            <div class="avatar-md mt-n5 mb-5">
                                <div class="avatar-title bg-light rounded-circle mx-5 my-3">
                                    @if (Auth::user()->foto)
                                        <img src="{{ Auth::user()->foto }}" alt="user-img" width="120px" height="120px"
                                            class="rounded-circle">
                                    @else
                                        <img src="assets/images/users/avatar.png" alt="user-img" width="120px"
                                            height="120px" class="rounded-circle">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-11">
                            <div class="h4 mx-4">{{ Auth::user()->nama_lengkap }}</div>
                            <div class="h6 mx-4">{{ Auth::user()->roles[0]->name }}</div>
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
                                <div class="col-lg-9">
                                    <input type="text" class="form-control bg-light" id="nameInput">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="email" class="form-label">Email</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="email" class="form-control bg-light" id="email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="no_telp" class="form-label">Nomor Telephone</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control bg-light" id="no_telp"
                                        readonly="readonly">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="nik_khusus" class="form-label">Nik Khusus</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control bg-light" id="nik_khusus"
                                        readonly="readonly">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control bg-light flatpickr-input"
                                        data-provider="flatpickr" id="tanggal_lahir" readonly="readonly">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="meassageInput" class="form-label">Agama</label>
                                </div>
                                <div class="col-lg-9">
                                    <select class="form-select mb-3 bg-light" aria-label="Default select example">
                                        <option value="1" selected>Islam</option>
                                        <option value="2">Kristen Protestan</option>
                                        <option value="3">Kristen Katolik</option>
                                        <option value="4">Budha</option>
                                        <option value="5">Hindu</option>
                                        <option value="6">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="meassageInput" class="form-label">Jenis Kelamin</label>
                                </div>
                                <div class="col-lg-9">
                                    <select class="form-select mb-3 bg-light" aria-label="Default select example">
                                        <option selected="" value="0">Laki-laki</option>
                                        <option value="1">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn text-white fs-14 float-end rounded-4 fw-bold"
                                style="background-color:#4E36E2" type="button">Simpan
                                perubahan
                            </button>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="d-flex mb-2">
                        <div class="flex-shrink-0">
                            <img src="assets/images/small/img-5.jpg" alt="" width="150" class="rounded">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="mb-0"> I also decreased the transparency in the text so that the mountains come
                                through the text, bringing the quote truly to life. Make sure that the placement of your
                                text is pleasing to look at, and you try to achieve symmetry for this effect.</p>
                        </div>
                    </div>
                    <p class="mb-0">
                        You've probably heard that opposites attract. The same is true for fonts. Don't be afraid to combine
                        font styles that are different but complementary. You can always play around with the text that is
                        overlaid on an image.
                    </p>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="d-flex mb-2">
                        <div class="flex-shrink-0">
                            <img src="assets/images/small/img-6.jpg" alt="" width="150" class="rounded">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="mb-0">In this image, you can see that the line height has been reduced
                                significantly, and the size was brought up exponentially. Experiment and play around with
                                the fonts that you already have in the software you’re working with reputable font websites.
                            </p>
                        </div>
                    </div>
                    <p class="mb-0">
                        They highly encourage that you use different fonts in one design, but do not over-exaggerate and go
                        overboard This may be the most commonly encountered tip I received from the designers I spoke with.
                    </p>
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
