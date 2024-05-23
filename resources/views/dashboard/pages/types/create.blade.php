@extends('dashboard.temp.layout')
@section('page_title','اضافه نوع وطراز  ')
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

            <form class="form" action="{{ route('admin.types.store')}}" method="POST">
                @csrf
                <div class="form-body">
                <h4 class="form-section"><i class="ft-home"></i>    اضافه نوع </h4>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                                <label for="projectinput1"> اسم النوع </label>
                                <input type="text" class="form-control" required value="{{ old('name') }}" placeholder="" name="name">
                                @error("name")
                                <span class="text-danger">{{$message}}</span>
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
</div><!-- end of row -->


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

            <form class="form" action="{{ route('admin.models.store')}}" method="POST">
                @csrf
                <div class="form-body">
                <h4 class="form-section"><i class="ft-home"></i>  اضافه  طراز </h4>
                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> الطراز </label>
                                <input type="text" class="form-control" required value="{{ old('name') }}" placeholder="" name="name">
                                @error("name")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">  النوع   </label>
                                <select name="type_id" required class="form-control">
                                    @foreach ($types as $type)
                                    <option value="{{ $type->id }}"> {{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error("type_id")
                                <span class="text-danger"> this field is required</span>
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
