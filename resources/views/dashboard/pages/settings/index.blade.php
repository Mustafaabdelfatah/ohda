@extends('dashboard.temp.layout')

@section('page_title','الاعدادات')

@section('action')
    @if (auth()->guard('admin')->user()->hasPermission('create_settings'))
        <a class="dropdown-item" href="{{ route('admin.settings.create') }}"><i class="mdi mdi-plus-circle"></i> </a>
    @endif
@endsection

@section('parent','الرئيسيه')

@section('content')



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">   </h4>
                <p class="card-title-desc">
                </p>
                    @if ($settings !== null)
                            <table id="datatable" class="  table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th> وارد من </th>
                                    <th> جهه </th>
                                    <th> رئيس الفرع </th>
                                    <th> الحاله </th>

                                    <th>الاجرائات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($settings as $index=>$setting)

                                    <tr>
                                        <td>
                                        {{$index+1}}
                                        </td>
                                        <td>
                                            {{ $setting->recieve }}
                                        </td>
                                        <td>
                                           {{ $setting->side }}
                                        </td>
                                        <td>
                                            {{ $setting->boss }}
                                         </td>
                                         <td>
                                           <span class="alert alert-info"> {{ $setting->status() }} </span>
                                         </td>
                                        <td>
                                            @if (auth()->guard('admin')->user()->hasPermission('update_settings'))
                                                <a title="edit" href="{{ route('admin.settings.edit',$setting->id) }}" class="btn btn-icon btn-success text-white mx-1"><i class="mdi mdi-square-edit-outline  "></i></a>
                                            @endif
                                            @if (auth()->guard('admin')->user()->hasPermission('delete_settings'))

                                            <form  action="{{ route('admin.settings.destroy',$setting->id) }}" method="POST" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <a title="delete" class="btn btn-icon btn-danger text-white mx-1 delete">
                                                        <i class="mdi mdi-delete-off "></i>
                                                </a>
                                             </form>
                                             @endif


                                        </td>
                                    </tr>


                                @endforeach

                                </tbody>
                            </table>
                        @else
                        <h3 style="font-weight: 400;">Sorry no records found</h3>
                        @endif
                    </div>
                </div>
            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection

