@extends('dashboard.temp.layout')

@section('page_title','تعديل الفرع')


@section('action')
@if (auth()->guard('admin')->user()->hasPermission('read_subPlaces'))
<a class="dropdown-item" href="{{ route('admin.sub-places.index') }}"><i class="mdi mdi-arrow-left-thick "></i>   المحاور </a>
@endif
@endsection

@section('parent','الرئيسيه')

@section('content')



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('admin.sub-places.update',$places->id) }}" >
                    @csrf
                    @method('put')

                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> اسم  المحور </label>
                                <input type="text" value="{{ $places->name }}" class="form-control" placeholder=" " name="name">
                                @error('name')
                                    <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">     اختار الفرع الذي ينتمي اليه المحور   </label>
                                <select name="master_id" id="master_id" class="form-control">
                                    @foreach ($mainPlaces as $main )
                                    <option {{ $main->id == $places->master_id ? 'selected' : ' ' }}
                                        value="{{ $main->id }}">
                                        {{ $main->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('parent_id')
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
