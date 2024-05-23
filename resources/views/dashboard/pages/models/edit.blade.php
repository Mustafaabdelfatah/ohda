@extends('dashboard.temp.layout')

@section('page_title','تعديل الفرع')


@section('action')
<a class="dropdown-item" href="{{ route('admin.models.index') }}"><i class="mdi mdi-arrow-left-thick "></i>   المحاور </a>
@endsection

@section('parent','الرئيسيه')

@section('content')



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('admin.models.update',$models->id) }}" >
                    @csrf
                    @method('put')

                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> اسم  الطراز </label>
                                <input type="text" value="{{ $models->name }}" class="form-control" placeholder=" " name="name">
                                @error('name')
                                    <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">     اختار النوع الذي ينتمي اليه الطراز </label>
                                <select name="type_id" id="type_id" class="form-control">
                                    @foreach ($types as $type )
                                    <option {{ $type->id == $models->type_id ? 'selected' : ' ' }}
                                        value="{{ $type->id }}">
                                        {{ $type->name }}
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
