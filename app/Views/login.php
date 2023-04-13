<!DOCTYPE html>
<html lang="en">
    <!-- Mirrored from adminlte.io/themes/v3/pages/examples/login-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Jan 2022 04:52:47 GMT -->
    <!-- Added by HTTrack -->
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <!-- /Added by HTTrack -->
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Onanmedia Panel</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback" />
        {$maincss}
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-danger">
                <div class="card-header text-center">
                    <img src="{$baseurl}assets/images/logo.webp" />
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Login Aplikasi Onanmedia Panel</p>
                    <form action="{$baseurl}login/process" method="post">
                        <div class="input-group mb-3">
                            <input type="text" data-val="true" data-val-required="The Username field is required." id="Username" name="usr"  class="form-control" placeholder="Username" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" data-val="true" data-val-required="The Password field is required." id="Password" name="pwd" class="form-control" placeholder="Password" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success btn-block">Log In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->
        {$mainjs}
    </body>
</html>
