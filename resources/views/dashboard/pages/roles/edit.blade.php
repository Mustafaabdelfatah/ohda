@extends('dashboard.temp.layout')

@section('page_title','تعديل الدور    ')


@section('action')
@if(auth()->guard('admin')->user()->hasPermission('read_roles'))
<a class="dropdown-item" href="{{ route('admin.roles.index') }}"><i class="mdi mdi-arrow-left-thick "></i>   الادوار </a>
@endif
@endsection

@section('parent','الرئيسيه')

@section('content')



    <div class="row">
        <div class="col-md-12">
            <div class="tile shadow mb-4">

                <form method="post" action="{{ route('admin.roles.update', $role->id) }}">
                    @csrf
                    @method('put')


                    {{--name--}}
                    <div class="form-group">
                        <label>الاسم</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}">
                    </div>

                    {{--permissions--}}
                    <div class="form-group">
                        <h4>الصلاحيات</h4>
                        @php
                                    $models = ['items','types','models','mainPlaces','subPlaces','reports','settings'];
                        @endphp

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="width: 5%;">#</th>
                                <th style="width: 15%;"> الاقسام</th>
                                <th>الصلاحيات لكل قسم</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($models as $index=>$model)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td class="text-capitalize">{{ __('admin.'.$model) }}</td>
                                    <td>


                                    @php
                                        $permission_maps = ['create', 'read', 'update', 'delete'];
                                    @endphp


                                        <select name="permissions[]" class="form-control select2" multiple>
                                               
                                            @foreach ($permission_maps as $permission_map)
                                                <option
                                                {{ $role->hasPermission($permission_map . '_' . $model) ? 'selected' : '' }}
                                                value="{{ $permission_map . '_' . $model }}">{{ __('admin.'.$permission_map)  }} </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table><!-- end of table -->
                    </div>

                    <div class="form-group text-left">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> تحديث</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection
