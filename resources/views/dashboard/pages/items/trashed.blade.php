@extends('dashboard.temp.layout')

@section('page_title','المحذوف')



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
                <h4 class="card-title">كل المحذوف</h4>
                <p class="card-title-desc">
                </p>
                    @if ($trash !== null)
                            <table id="datatable" class="  table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th> النوع </th>
                                    <th> الطراز </th>
                                    <th> الفرع </th>
                                    <th> المحور </th>
                                    <th>الاجرائات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($trash as $index=>$trash)

                                    <tr>
                                        <td>
                                        {{$index+1}}
                                        </td>
                                        <td>
                                            {{ $trash->item->type }}
                                        </td>
                                        <td>
                                            {{ $trash->item->model }}
                                        </td>
                                        <td>
                                            {{ $trash->main_place }}
                                        </td>
                                        <td>
                                           {{ $trash->sub_place }}
                                        </td>
                                        <td>

                                            @if(auth()->guard('admin')->user()->hasPermission('delete_items'))
                                            <form  action="{{ route('admin.items.forcedelete',$trash->id) }}" method="POST" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <a title="حذف نهائي" class="btn btn-icon btn-danger text-white mx-1 deleteItem">
                                                        <i class="mdi mdi-delete-off "></i>
                                                </a>
                                            </form>
                                            @endif

                                            <a title="اعاده" href="{{  url('restore/'.$trash->id) }}" class="btn btn-icon btn-success text-white mx-1 btn-sm">   اعاده   <i class="mdi mdi-refresh  "></i></a>


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

@push('js')
<script>
    $(document).ready(function () {

        $('.deleteItem').click(function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "هل متاكد من الحذف ",
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

