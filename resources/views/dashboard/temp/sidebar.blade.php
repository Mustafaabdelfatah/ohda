<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu" class="text-capitalize">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                {{-- PAGES LINKS --}}
                <li class="menu-title">الصفحات</li>
                {{-- <span class="badge badge-pill badge-primary float-right">2</span> --}}
                <li>
                    <a href="{{ url('/') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>الرئيسية</span>
                    </a>
                </li>
                {{-- PAGES LINKS END --}}



                {{-- Admin Link --}}
                @if(auth()->guard('admin')->user()->hasPermission('read_admins'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-users"></i>
                        <span>المشرفين</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.admins.index') }}">كل المشرفين</a></li>
                        <li><a href="{{ route('admin.admins.create') }}">اضافه مشرف جديد</a></li>

                    </ul>
                </li>

                @endif
                {{-- ./admin --}}

                 {{-- roles Link --}}
                 @if(auth()->guard('admin')->user()->hasPermission('read_roles'))

                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-lock"></i>
                        <span>الصلاحيات</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.roles.index') }}">جميع الصلاحيات</a></li>
                        <li><a href="{{ route('admin.roles.create') }}">اضافه صلاحيات جديده</a></li>

                    </ul>
                </li>
                @endif
                {{-- ./roles --}}





                {{-- ohda Link --}}
                @if(auth()->guard('admin')->user()->hasPermission('read_items'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-laptop"></i>
                        <span>الاصناف</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.items.index') }}">كل الاصناف</a></li>
                        <li><a href="{{ route('admin.items.create') }}">اضافه صنف جديد </a></li>

                    </ul>
                </li>
                {{-- ./ohda --}}
                @endif

                
                @if(auth()->guard('admin')->user()->hasPermission('read_types'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-braille"></i>
                        <span>الانواع</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.types.index') }}">كل الانواع</a></li>
                        <li><a href="{{ route('admin.types.create') }}">اضافه نوع جديد </a></li>

                    </ul>
                </li>
                @endif
                {{-- ./types --}}

                {{-- models Link --}}
                @if(auth()->guard('admin')->user()->hasPermission('read_models'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow  waves-effect">
                        <i class="fas fa-compress"></i>
                        <span>الطراز</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.models.index') }}">كل الطرازات</a></li>
                        <li><a href="{{ route('admin.types.create') }}">اضافه طراز جديد </a></li>


                    </ul>
                </li>
                @endif
                {{-- ./types --}}


                @if(auth()->guard('admin')->user()->hasPermission('read_types'))
                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="fas fa-braille"></i>
                         <span>انواع البوصله</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('admin.bosla-types.index') }}">كل انواع البوصله</a></li>
                         <li><a href="{{ route('admin.bosla-types.create') }}">اضافه نوع جديد </a></li>

                     </ul>
                 </li>
                 @endif
                {{-- main places Link --}}
                @if(auth()->guard('admin')->user()->hasPermission('read_mainPlaces'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-globe"></i>
                        <span>الافرع الرئيسيه</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.main-places.index') }}">كل الافرع الرئيسيه</a></li>
                        <li><a href="{{ route('admin.main-places.create') }}">اضافه فرع جديد </a></li>

                    </ul>
                </li>
                @endif
                {{-- ./places --}}

                {{-- sub places Link --}}
                @if(auth()->guard('admin')->user()->hasPermission('read_subPlaces'))

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-location-arrow"></i>
                        <span>المحاور الفرعيه</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.sub-places.index') }}">كل المحاور الفرعيه</a></li>
                        <li><a href="{{ route('admin.main-places.create') }}">اضافه محور جديد </a></li>
                    </ul>
                </li>
                @endif
                {{-- ./places --}}




                {{-- reports Link --}}
                @if(auth()->guard('admin')->user()->hasPermission('read_reports'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-file"></i>
                        <span>التقارير</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.reports.index') }}"> مستنـــــد 2 أ ت </a></li>
                        <li><a href="{{ route('admin.reports.all') }}"> انشاء تقارير محدده </a></li>
                        <li><a href="{{ route('admin.reports.type') }}"> بيان بالنوع </a></li>
                        <li><a href="{{ route('admin.reports.add') }}"> الاصناف المضافه في العهده </a></li>
                        <li><a href="{{ route('admin.reports.notadd') }}"> الاصناف الغير مضافه في العهده </a></li>
                        <li><a href="{{ route('admin.reports.old') }}"> لجنه كهنه </a></li>
                        <li><a href="{{ route('admin.reports.bosla') }}"> البوصله   </a></li>

                     </ul>
                </li>
                @endif
                {{-- ./reports --}}


                {{-- reports Link --}}
                @if(auth()->guard('admin')->user()->hasPermission('read_settings'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-cog"></i>
                        <span>الاعدادات</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href=" {{ url('change-pass') }}" class="waves-effect">
                                <i class="mdi mdi-key-link"> </i>
                                <span>تغيير كلمة السر</span>
                            </a></li>
                         <li><a href="{{ route('admin.settings.index') }}">   اعدادات المشروع </a></li>
                         <li><a href="{{ route('admin.settings.create') }}">  تغيير بيانات الاعدادات     </a></li>
                         <li><a href="{{ route('admin.backup') }}">  انشاء نسخه احتياطيه للمشروع     </a></li>
                         <li><a href="{{ route('admin.items.trash') }}">  ارشيف المحذوف من الاصناف      </a></li>
                    </ul>
                </li>
                @endif
                {{-- ./reports --}}











            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
