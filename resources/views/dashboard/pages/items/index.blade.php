@extends('dashboard.temp.layout')

@section('page_title','الاصناف')

@section('action')
    @if(auth()->guard('admin')->user()->hasPermission('create_items'))
        <a class="dropdown-item" href="{{ route('admin.items.create') }}"><i class="mdi mdi-plus-circle"></i> اضافه صنف جديد</a>
    @endif
@endsection

@section('parent','الرئيسيه')

@section('content')

@push('css')
<style>
    tr th{
        font-size:11px;
    }
    tbody tr td{
        font-size:12px;
        width :50px !important
    }
</style>
@endpush


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">كل الاصناف</h4>
                <p class="card-title-desc">
                </p>
                    @if ($items !== null)
                            <table id="datatable" class="  table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th> النوع </th>
                                    <th> الطراز </th>
                                    <th> الكميه </th>
                                    <th>الاجرائات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($items as $index=>$item)

                                    <tr>
                                        <td >
                                        <a href="{{url('items/'.$item->id.'/details')}}">{{$index+1}}</a> 
                                        </td>
                                        <td>
                                            {{ $item->type }}
                                        </td>
                                        <td>
                                           {{ $item->model }}
                                        </td>
                                     
                                        <td>{{$item->quantity}}</td>
                                       
                                        <td>
                                            @if(auth()->guard('admin')->user()->hasPermission('update_items'))
                                                <a title="edit" href="{{ route('admin.items.edit',$item->id) }}" class="btn btn-icon btn-success text-white mx-1 btn-sm"><i class="mdi mdi-square-edit-outline  "></i></a>
                                            @endif
                                            @if(auth()->guard('admin')->user()->hasPermission('delete_items'))
                                            <a href="#" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#delete{{ $item->id }}"><i class="mdi mdi-delete-off "></i></a>

                                            @endif

                                            <a title="edit" href="{{  url('items/details/'.$item->id) }}" class="btn btn-icon btn-success text-white mx-1 btn-sm">   اضافه التفاصيل  <i class="mdi mdi-plus  "></i></a>


                                        </td>
                                    </tr>
                                    <div class="modal fade"
                                                            id="delete{{ $item->id }}"
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
                                                                        action="{{ route('admin.items.destroy',$item->id) }}"
                                                                        method="post">
                                                                        {{ method_field('Delete') }}
                                                                        @csrf
                                                                        هل متاكد من الحذف
                                                                         <input id="id" type="hidden"
                                                                                name="id"
                                                                                class="form-control"
                                                                                value="{{ $item->id }}">
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

        $('.deleteItem').click(function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "حذف هذا الصنف سيؤدي الي حذف كل التفاصيل الخاصه به هل متاكد من الحذف  ",
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

