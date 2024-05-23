@extends('dashboard.temp.layout')

@section('page_title','تعديل النوع')


@section('action')
@if (auth()->guard('admin')->user()->hasPermission('read_types'))
    <a class="dropdown-item" href="{{ route('admin.types.index') }}"><i class="mdi mdi-arrow-left-thick "></i>   الانواع </a>
@endif
@endsection

@section('parent','الرئيسيه')

@section('content')



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('admin.types.update',$types->id) }}" >
                    @csrf
                    @method('put')

                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> اسم النوع </label>
                                <input type="text" value="{{ $types->name }}" class="form-control" placeholder=" " name="name">
                                @error('name')
                                    <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                        </div>
                      
                    </div>

                    <div class="form-group text-left">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> تحديث</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection
