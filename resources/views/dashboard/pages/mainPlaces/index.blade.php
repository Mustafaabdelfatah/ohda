@extends('dashboard.temp.layout')

@section('page_title','الافرع الرئيسيه')

@section('action')
    @if(auth()->guard('admin')->user()->hasPermission('create_mainPlaces'))
        <a class="dropdown-item" href="{{ route('admin.main-places.create') }}"><i class="mdi mdi-plus-circle"></i> اضافه فرع رئيسي جديد</a>
    @endif
@endsection

@section('parent','الرئيسيه')

@section('content')



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">كل الاماكن</h4>
                <p class="card-title-desc">
                </p>
                    @if ($mainPlaces  !== null)
                            <table id="datatable" class="  table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>   اسم الفرع </th>
                                    <th>الاجرائات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($mainPlaces as  $index=>$place)
                                  

                                    <tr>
                                       
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $place->name }}</td>
                                       
                                        <td>
                                            @if(auth()->guard('admin')->user()->hasPermission('update_mainPlaces'))

                                            <a title="edit" href="{{ route('admin.main-places.edit',$place->id) }}" class="btn btn-icon btn-success text-white mx-1"><i class="mdi mdi-square-edit-outline  "></i></a>
                                           @endif
                                           @if(auth()->guard('admin')->user()->hasPermission('delete_mainPlaces'))
                                           <a href="#" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#delete{{ $place->id }}"><i class="mdi mdi-delete-off "></i></a>

                                             
                                             @endif
                                        </td>
                                    </tr>
                                    <div class="modal fade"
                                                            id="delete{{ $place->id }}"
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
                                                                        action="{{ route('admin.main-places.destroy',$place->id) }}"
                                                                        method="post">
                                                                        {{ method_field('Delete') }}
                                                                        @csrf
                                                                          حذف هذا الفرع سيؤدي الي حذف المحاور التابعه له وكل تفاصيل الاصناف الخاصه به
                                                                        <input id="id" type="hidden"
                                                                                name="id"
                                                                                class="form-control"
                                                                                value="{{ $place->id }}">
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
    $(document).ready(function () {

        $('.deleteplace').click(function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "حذف هذا الفرع سيؤدي الي حذف كل المحاور التابعه له وتفاصيل الاصناف هل متاكد من الحذف",
                type: "warning",
                killer: true,
                buttons: [
                    Noty.button("نعم", 'btn btn-success mr-2', function () {
                        that.closest('form').submit();
                    }),

                    Noty.button("لا", 'btn btn-primary mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();


        })
      
    });

</script>
@endpush

