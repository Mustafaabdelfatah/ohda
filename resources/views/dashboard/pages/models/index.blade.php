@extends('dashboard.temp.layout')

@section('page_title','الطرازات')

@section('action')
    @if(auth()->guard('admin')->user()->hasPermission('create_models'))
        <a class="dropdown-item" href="{{ route('admin.types.create') }}"><i class="mdi mdi-plus-circle"></i> اضافه طراز جديد</a>
    @endif
@endsection

@section('parent','الرئيسيه')

@section('content')
 



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">كل الطرازات</h4>
                <p class="card-title-desc">
                </p>
                    @if ($models !== null)
                            <table id="datatable" class="  table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>م</th>
                                    <th> اسم الطراز </th>
                                    <th> النوع   </th>
                                    <th>الاجرائات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($models as $index=>$model)
                             

                                
                                    <tr>
                                        <td>{{ $index+1 }}  </td>
                                        <td>{{ $model->name }}</td>
                                        <td>
                                            <span  >{{ $model->types->name }}</span>
                                        </td>

                                        <td>
                                        @if(auth()->guard('admin')->user()->hasPermission('update_models'))
                                            <a title="edit" href="{{ route('admin.models.edit',$model->id) }}" class="btn btn-icon btn-success text-white mx-1"><i class="mdi mdi-square-edit-outline  "></i></a>
                                           @endif
                                           @if(auth()->guard('admin')->user()->hasPermission('delete_models'))
                                           
                                                <a href="#" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#delete{{ $model->id }}"><i class="mdi mdi-delete-off "></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    
                                          <!-- delete_modal_Grade -->
                                        <div class="modal fade"
                                                            id="delete{{ $model->id }}"
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
                                                                        action="{{ route('admin.models.destroy',$model->id) }}"
                                                                        method="post">
                                                                        {{ method_field('Delete') }}
                                                                        @csrf
                                                                         هل متاكد من الحذف
                                                                        <input id="id" type="hidden"
                                                                                name="id"
                                                                                class="form-control"
                                                                                value="{{ $model->id }}">
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
            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection


@push('js')
    <script>
         


      
       
    </script>
@endpush
