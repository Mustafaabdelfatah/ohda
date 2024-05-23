@extends('dashboard.temp.layout')

@section('page_title','اضافه صلاحيات جديد  ')


@section('action')
@if(auth()->guard('admin')->user()->hasPermission('read_roles'))
<a class="dropdown-item" href="{{ route('admin.roles.index') }}"><i class="mdi mdi-arrow-left-thick "></i>   الصلاحيات </a>
@endif
@endsection

@section('parent','الرئيسيه')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">

                <form method="post" action="{{ route('admin.roles.store') }}">
                    @csrf
                    @method('post')


                    {{--name--}}
                    <div class="form-group">
                        <label>الاسم</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    {{--permissions--}}
                    <div class="form-group">
                        <h4>الصلاحيات</h4>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="width: 5%;">#</th>
                                <th style="width: 15%;">الاقسام</th>
                                <th>الصلاحيات لكل قسم</th>
                            </tr>
                            </thead>

                            <tbody>

                                @php
                                    $models = ['items','types','models','mainPlaces','subPlaces','reports','settings'];
                                @endphp
                                @foreach ($models as $index=>$model)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="text-capitalize">{{ __('admin.'.$model) }}</td>
                                    <td>

                                        @php
                                            $permission_maps = ['create', 'read', 'update', 'delete'];
                                        @endphp

                                        <select name="permissions[]" class="form-control select2" multiple>
                                            @foreach ($permission_maps as $permission_map)
                                            <option value="{{ $permission_map . '_' . $model }}">
                                              {{ __('admin.'.$permission_map)  }}  
                                                <!-- {{ $permission_map }} -->
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('permissions')
                                        <span class="text-danger">{{$message}} </span>
                                        @enderror
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> اضافه</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->
        </div><!-- end of col -->
    </div><!-- end of row -->

@endsection
