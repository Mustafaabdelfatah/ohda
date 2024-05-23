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

                    <form class="form" action="{{ route('admin.settings.store') }}" method="POST">
                        @csrf

                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-home"></i> الاعدادات العامه </h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">اسم المعتمد </label>
                                        <input type="text" class="form-control" name="name" id="">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">الرتبه </label>
                                        <input type="text" class="form-control" name="degree" id="">
                                        @error('degree')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">وارد من </label>
                                        <input type="text" class="form-control" name="recieve" id="">
                                        @error('recieve')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">جهه </label>
                                        <input type="text" class="form-control" name="side" id="">
                                        @error('side')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">الوظيفه </label>
                                        <input type="text" class="form-control" name="boss" id="">
                                        @error('boss')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">درجه المسلم </label>
                                        <input type="text" class="form-control" name="take_degree" id="">
                                        @error('take_degree')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">اسم المسلم </label>
                                        <input type="text" class="form-control" name="take_name" id="">
                                        @error('take_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">الرقم العسكري للمسلم </label>
                                        <input type="number" class="form-control" name="take_num_mil" id="">
                                        @error('take_num_mil')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput1"> فعال ام لا </label>
                                        <div class="controls">
                                            <input type="checkbox" name="act" id="act" value="active">
                                        </div>
                                        @error('act')
                                            <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>







                            </div>
                        </div>

                        <div class="form-actions text-left">
                            {{-- <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
                    <i class="ft-x"></i> تراجع
                </button> --}}
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> اضافه
                            </button>
                        </div>
                    </form>


                </div><!-- end of tile -->
            </div><!-- end of col -->
        </div><!-- end of row -->

    @endsection
