@extends('dashboard.temp.layout')

@section('page_title','الصلاحيات')

@section('action')
    @if (auth()->guard('admin')->user()->hasPermission('create_roles'))
    <li class="breadcrumb-item"><a href="{{ route('admin.roles.create') }}"> اضافه صلاحيات جديد </a></li>
    @endif
 @endsection

@section('parent','الرئيسيه')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">كل الصلاحيات</h4>
                <p class="card-title-desc">
                </p>

                @if ($roles->count() > 0)
                <table class="table table-hover datatable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم   </th>
                        <th>الصلاحيات</th>
                        <th>عدد المشرفين</th>
                        <th>الاجرائات</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($roles as $index=>$role)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach ($role->permissions as $permission)
                                    <h5 style="display: inline-block;"><span class="badge badge-primary">{{__('admin.'.$permission->name)}}</span></h5>
                                @endforeach
                            </td>
                            <td>{{ $role->admins_count }}</td>
                            <td style="display:flex">
                                @if (auth()->guard('admin')->user()->hasPermission('update_roles'))
                                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> </a>
                                @else
                                    <a href="#" disabled class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> </a>
                                @endif
                                @if (auth()->guard('admin')->user()->hasPermission('delete_roles'))
                                <a href="#" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#delete{{ $role->id }}"><i class="mdi mdi-delete-off "></i></a>

                                @else
                                    <a href="#" disabled class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                @endif
                            </td>
                        </tr>
                        <div class="modal fade"
                                                            id="delete{{ $role->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                        class="modal-title"
                                                                        id="exampleModalLabel">
                                                                        مودال الحذف
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                    <span
                                                                        aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.roles.destroy',$role->id) }}"
                                                                        method="post">
                                                                        {{ method_field('Delete') }}
                                                                        @csrf
                                                                          هل متاكد من الحذف
                                                                        <input id="id" type="hidden"
                                                                                name="id"
                                                                                class="form-control"
                                                                                value="{{ $role->id }}">
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">قفل</button>
                                                                            <button type="submit"
                                                                                    class="btn btn-danger">حذف</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                    @endforeach

                    </tbody>
                </table>


            @else
                <h3 style="font-weight: 400;">Sorry no records found</h3>
            @endif
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
