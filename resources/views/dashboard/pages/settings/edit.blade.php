@extends('dashboard.temp.layout')
@section('page_title', 'تعديل الاعدادات ')
@section('action')
    <a class="dropdown-item" href="{{ route('admin.settings.index') }}"><i class="mdi mdi-arrow-left-thick "></i> الاعدادات
    </a>
@endsection

@section('parent', 'الرئيسيه')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <form method="post" action="{{ route('admin.settings.update', $settings->id) }}">
                        @csrf
                        @method('put')

                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-home"></i> الاعدادات العامه </h4>
                            <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">  الاسم </label>
                                        <input type="text" value="{{$settings->name}}" class="form-control" name="name" id="">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">  الرتبه </label>
                                        <input type="text" value="{{$settings->degree}}" class="form-control" name="degree" id="">
                                        @error('degree')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">وارد من </label>
                                        <input type="text" value="{{$settings->recieve}}" class="form-control" name="recieve" id="">
                                        @error('recieve')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">جهه </label>
                                        <input type="text" value="{{$settings->side}}" class="form-control" name="side" id="">
                                        @error('side')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">الوظيفه   </label>
                                        <input type="text" value="{{$settings->boss}}" class="form-control" name="boss" id="">
                                        @error('boss')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput1"> فعال ام لا </label>
                                        <div class="controls">
                                            <input type="checkbox" {{$settings->act == 'active' ? 'checked' : '' }} name="act" id="act" value="active">
                                        </div>
                                        @error('act')
                                            <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions text-left">

                            <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> تحديث
                            </button>
                        </div>
                    </form>


                </div><!-- end of tile -->
            </div><!-- end of col -->
        </div><!-- end of row -->

    @endsection
