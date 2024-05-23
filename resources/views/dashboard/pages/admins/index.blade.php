@extends('dashboard.temp.layout')

@section('page_title','المشرفين')

@section('action')

    @if(auth()->guard('admin')->user()->hasPermission('create_admins'))
        <a class="dropdown-item" href="{{ route('admin.admins.create') }}"><i class="mdi mdi-plus-circle"></i> اضافه مشرف جديد</a>
    @endif
@endsection

@section('parent','الرئيسيه')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">كل المشرفين</h4>
                <p class="card-title-desc">
                </p>

                <table id="datatable" class="  table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th> الاسم</th>
                        <th> رقم الهاتف   </th>
                        <th> الدور     </th>
                        <th>الاجرائات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($admins as $index=>$admin)


                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>
                                {{$admin->phone}}
                            </td>
                            <td>
                                @foreach ($admin->roles as $role)
                                    <h5 style="display: inline-block;"><span class="badge badge-primary">{{ $role->name }}</span></h5>
                                @endforeach
                            </td>

                            <td>
                                @if(auth()->guard('admin')->user()->hasPermission('update_admins'))
                                    <a title="edit" href="{{ route('admin.admins.edit',$admin->id) }}" class="btn btn-icon btn-success text-white mx-1"><i class="mdi mdi-square-edit-outline  "></i></a>
                                @endif
                                @if(auth()->guard('admin')->user()->hasPermission('delete_admins'))
                                <a href="#" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#delete{{ $admin->id }}"><i class="mdi mdi-delete-off "></i></a>

                                 @endif

                            </td>
                        </tr>
                        <div class="modal fade"
                                                            id="delete{{ $admin->id }}"
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
                                                                        action="{{ route('admin.admins.destroy',$admin->id) }}"
                                                                        method="post">
                                                                        {{ method_field('Delete') }}
                                                                        @csrf
                                                                          هل متاكد من الحذف
                                                                        <input id="id" type="hidden"
                                                                                name="id"
                                                                                class="form-control"
                                                                                value="{{ $admin->id }}">
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
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
