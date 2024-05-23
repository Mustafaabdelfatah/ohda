@extends('dashboard.temp.layout')

@section('page_title','تغيير كلمه السر')

@section('action')
{{-- <a class="dropdown-item" href="{{ url('admin/backup/make_backup') }}"><i class="la la-cart-plus"></i>Backup Now</a>
--}}

{{-- <a class="dropdown-item" href="#">Action</a> --}}
@endsection

@section('parent','الاعدادات')



@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">تغيير كلمة السر</h4>
            <p class="card-title-desc"> </p>

            <form class="custom-validation" action="{{ route('admin.change_password') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>كلمة السر الحالية</label>
                    <div>
                        <input type="password" min="8" name="current_pass" class="form-control" required placeholder="كلمه السر" />
                    </div>
                    @error ('current_pass')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>كلمة السر الجديدة</label>
                    <div>
                        <input type="password" id="pass2" min="8" name="new_password" class="form-control" required placeholder="كلمه السر" />
                    </div>
                    @error ('new_password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>اعادة كلمة السر</label>

                    <div class="mt-2">
                        <input type="password" min="8" name="new_password_confirmation" class="form-control" required data-parsley-equalto="#pass2" placeholder="اعاده كلمه السر" />
                    </div>
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success waves-effect waves-light mr-1">
                        <i class="mdi mdi-key-link"></i> تغير كلمة السر
                    </button>
                </div>
            </form>

        </div>
    </div>
</div> <!-- end col -->
@endsection
