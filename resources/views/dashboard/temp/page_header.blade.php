<!-- start page title -->
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">@yield('page_title')</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">@yield('parent')</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">@yield('page_title')</a></li>
            </ol>
        </div>
    </div>
    <div class="col-sm-6">

        <div class="float-right d-none d-md-block">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-settings mr-2"></i> الاعدادات
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    @yield('action')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->
