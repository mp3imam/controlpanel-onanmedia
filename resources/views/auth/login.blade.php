@extends('layouts.master-without-nav')
@section('title')
    @lang('translation.signin')
@endsection
@section('content')
<div class="row vh-100 g-0">
    <div class="col-lg-6">
        <div class="vh-100 gv-0">
            <img src="{{ URL::asset('assets/images/logo/OnanMediaLogin.png') }}" height="100%" width="100%" />
            <div style="position: absolute; top: 320px; left: 40px; font-family: 'Poppins-Black'; url({{ URL::asset('assets/fonts/Poppins-Bold.ttf') }}) format('truetype') transform: translate(-50px, -50px);" class="text-white fs-48 text-uppercase">SOLUSI KEBUTUHAN</div>
            <div style="position: absolute; top: 380px; left: 40px;  font-family: 'Poppins-Black'; url({{ URL::asset('assets/fonts/Poppins-Bold.ttf') }}) format('truetype') transform: translate(-50px, -50px);" class="text-white fs-48 text-uppercase">harian anda</div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-lg-6">
        <div class="p-lg-5 pt-5 my-5">
            <div class="mt-5 text-center">
                <img src="{{ URL::asset('assets/images/logo/onanmedia-login.png') }}">
            </div>

            <div class="mt-4">
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="mb-5">
                        <div class="position-relative auth-pass-inputgroup mb-3">
                            <input type="password" class="form-control pe-5 password-input" placeholder="Password" id="password-input" name="password">
                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="btn w-100 btn-secondary" style="background-color: #4E36E2;" type="submit">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
</div>
@endsection

@section('script')
    <script src="{{ URL::asset('assets/js/pages/password-addon.init.js') }}"></script>
@endsection
