<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">


                <a href="#" class="logo logo-light">
                    <span class="logo-lg">
                        العهدة
                        <img style="margin: 10px" src="{{ URL::asset('dashboard') }}/assets/images/logo-sm.png" alt="" height="18">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>


        </div>

        <div class="d-flex">





            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>



            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ URL::asset('dashboard') }}/assets/images/users/IMG20211007213718.jpg" alt="Header Avatar">
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle font-size-17 align-middle mr-1"></i> الملف الشخصي</a>

                    <a class="dropdown-item text-danger" href="{{ url('admin/logout') }}" onclick="event.preventDefault();document.getElementById('admin-logout-form').submit();"><i class="mdi mdi-logout"></i>
                        تسجيل الخروج
                    </a>
                    <form id="admin-logout-form" action="{{ url('admin/logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </div>



        </div>
    </div>
</header>
