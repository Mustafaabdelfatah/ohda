<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>تسجيل الدخول | {{ config('app.name') }} </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('dashboard/assets') }}/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="{{ asset('dashboard/assets') }}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('dashboard/assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('dashboard/assets') }}/css/app-rtl.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary">
                                <div class="text-primary text-center p-4">
                                    <h5 class="text-white font-size-20">أهلا بك !</h5>
                                    <p class="text-white-50">قم بتسجيل الدخول للوحة التحكم</p>
                                    <a href="index.html" class="logo logo-admin">
                                        <img src="{{ asset('dashboard/assets') }}/images/logo-sm.png" height="24" alt="logo">
                                    </a>
                                </div>
                            </div>

                            <div class="card-body p-4">
                                <div class="p-3">
                                    <form class="form-horizontal mt-4" action="{{ url('admin/login') }}" method="post">
                                        @if (session()->has('error_admin_login'))
                                        <div class="alert bg-danger text-center text-white  mb-2 font-weight-normal" role="alert">
                                            {{ session()->get('error_admin_login') }}
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="username">
                                                رقم الهاتف
                                            </label>
                                            <input type="number" name="phone" class="form-control" id="username" placeholder="رقم الهاتف  " required>
                                        </div>

                                        <div class="form-group">
                                            <label for="userpassword">
                                                كلمة المرور
                                            </label>
                                            <input type="password" class="form-control" name="password" id="userpassword" placeholder="كلمة المرور" min="6" required>
                                        </div>
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                    <label class="custom-control-label" for="customControlInline">تذكرني</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-right">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">تسجيل الدخول</button>
                                            </div>
                                        </div>

                                        <div class="form-group mt-2 mb-0 row">
                                            <div class="col-12 mt-4">
                                                <a href="pages-recoverpw.html"><i class="mdi mdi-lock"></i> نسيت كلمة السر ؟ </a>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>

                        </div>

                        <div class="mt-5 text-center">

                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('dashboard/assets') }}/libs/jquery/jquery.min.js"></script>
        <script src="{{ asset('dashboard/assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('dashboard/assets') }}/libs/metismenu/metisMenu.min.js"></script>
        <script src="{{ asset('dashboard/assets') }}/libs/simplebar/simplebar.min.js"></script>
        <script src="{{ asset('dashboard/assets') }}/libs/node-waves/waves.min.js"></script>

        <script src="{{ asset('dashboard/assets') }}/js/app.js"></script>

    </body>

</html>
