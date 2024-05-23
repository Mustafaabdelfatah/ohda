@extends('dashboard.temp.layout')

@section('page_title','تعديل المستخدم')


@section('action')
@if(auth()->guard('admin')->user()->hasPermission('read_admins'))
    <a class="dropdown-item" href="{{ route('admin.admins.index') }}"><i class="mdi mdi-arrow-left-thick "></i>   المشرفين </a>
@endif
@endsection

@section('parent','الرئيسيه')

@section('content')



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.admins.update',$admin->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">
                             <div class="col-md-6">
                               <div class="form-group">
                                    <label>الاسم </label>
                                    <input type="text"  required value="{{ $admin->name }}" name="name" class="form-control">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label>رقم الهاتف   </label>
                                    <input type="number"  required value="{{ $admin->phone }}" name="phone" class="form-control">
                                    @error('phone')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label>كلمه المرور </label>
                                    <input type="password"  required   name="password" class="form-control">
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                              {{--roles--}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الادوار</label>
                                    <select name="role_id" class="form-control">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{ $admin->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>
                    <div class="form-actions text-left">
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i> حفظ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- end cart -->
@endsection
