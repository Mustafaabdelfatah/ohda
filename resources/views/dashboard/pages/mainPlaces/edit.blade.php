@extends('dashboard.temp.layout')

@section('page_title','تعديل الفرع')


@section('action')
@if(auth()->guard('admin')->user()->hasPermission('read_mainPlaces'))
    <a class="dropdown-item" href="{{ route('admin.main-places.index') }}"><i class="mdi mdi-arrow-left-thick "></i>   الافرع </a>
@endif
@endsection

@section('parent','الرئيسيه')

@section('content')



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('admin.main-places.update',$places->id) }}" >
                    @csrf
                    @method('put')

                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1"> اسم الفرع / المحور </label>
                                <input type="text" value="{{ $places->name }}" class="form-control" placeholder=" " name="name">
                                @error('name')
                                    <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-left">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> تحديث</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->



    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">تفاصيل هذا الصنف  </h4>
                <p class="card-title-desc">
                </p>
                    @if ($transaction !== null)
                            <table id="datatable" class="  table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الفرع </th>
                                    <th> المحور </th>
                                    <th> رقم المسلسل </th>
                                    <th> الرام </th>
                                    <th> الهارد </th>
                                    <th> المعالج </th>
                                    <th> نوع الشاشة </th>
                                    <th> رقم المسلسل </th>
                                    <th> الكميه </th>
                                    <th> الحاله </th>

                                    <th>الاجرائات</th>
                                </tr>
                                </thead>
                                <tbody>



                                @foreach ($transaction as $index=>$item)



                                    <tr>
                                        <td>
                                            {{$index+1}}
                                        </td>

                                        <td>
                                           {{ $item->main_place }} 
                                        </td>

                                        <td>
                                        {{ $item->sub_place }} 
                                        </td>
                                        <td>
                                          {{ $item->sn == null ? 'لا يوجد رقم مسلسل' : $item->sn }}
                                        </td>
                                        <td>
                                            {{ $item->ram }}
                                        </td>
                                        <td>
                                            {{ $item->hd }}
                                        </td>
                                        <td>
                                            {{ $item->cpu }}
                                        </td>
                                        <td>
                                            {{ $item->screen_type }}
                                        </td>
                                        <td>
                                            {{ $item->screen_serial }}
                                        </td>
                                        <td>
                                            {{ $item->quantity }}
                                        </td>
                                        <td>
                                        <form action="{{route('admin.changeStatus',$item->id)}}" method="post" style="display: flex;justify-content:space-between">
                                                @csrf
                                                <input type="hidden" name="status_id"  value="{{$item->id}}">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                         <select name="status"  class="form-control" required  >
                                                            <option value="new" {{ $item->status == 'new' ? 'selected' : '' }}>جديد
                                                            </option>
                                                            <option value="old" {{ $item->status == 'old' ? 'selected' : '' }}> كهنه
                                                            </option>
                                                            <option value="used" {{ $item->status == 'used' ? 'selected' : '' }}> مستخدم
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit" style="width:90px;height:40px" >
                                                     تغيير
                                                </button>
                                            </form>
                                            <!-- {{ $item->getStatus() }} -->
                                        </td>
                                        <td>
                                            <a style="color: #1c4e80" data-toggle="modal" data-target="#EditModal"
                                                data-itemid="{{ $item->id }}" data-sn="{{ $item->sn }}"
                                                data-main="{{ $item->main_place }}" data-status="{{$item->status}}" data-sub="{{ $item->sub_place }}"
                                                data-ram="{{ $item->ram }}" data-hd="{{ $item->hd }}" data-cpu="{{ $item->cpu }}" data-quantity="{{ $item->quantity }}" data-screen_type="{{ $item->screen_type }}" data-screen_serial="{{ $item->screen_serial }}"  class="" title="Edit"> <i
                                                    class="fa fa-edit"></i>
                                            </a>

                                            <a href="#" class="btn btn-outline-danger btn-sm"data-toggle="modal" data-target="#delete{{ $item->id }}"><i class="mdi mdi-delete-off "></i></a>


                                            <!-- <form method="post"
                                                action="{{ route('admin.item.destroy', $item->id) }}"
                                                style="display: inline-block;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit"
                                                    style="background: none;border:0px;color:#c13232;outline:0" class="delete"
                                                    title="Delete"><i class="fa fa-trash"></i></button>
                                            </form>end of form -->


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
                                                                        action="{{ route('admin.item.destroy',$item->id) }}"
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
        </div><!-- end of tile -->

        {{-- edit modal --}}
        <!-- Edit -->
            <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        @if(isset($transaction))
                        <form  action="/ohda/public/main-places/{{$places->id}}/edit" method="POST">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name="item_id" id="item_id" value="">


                                <div class="form-group">
                                    <label class="control-label col-md-4"> الفرع : </label>
                                    <div class="col-md-8">
                                        <input type="text" name="main_place" id="main" class="form-control" />
                                        @if (Session::has('edit_transaction') && $errors->has('main_place'))
                                        <span class="text-danger">{{ $errors->first('main_place') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4"> المحور : </label>
                                    <div class="col-md-8">
                                        <input type="text" name="sub_place" id="sub" class="form-control" />
                                        @if (Session::has('edit_transaction') && $errors->has('sub_place'))
                                        <span class="text-danger">{{ $errors->first('sub_place') }}</span>
                                        @endif
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label class="control-label col-md-4"> الحاله : </label>
                                    <div class="col-md-8">
                                        <select name="status[]"   required class="form-control" >
                                            @if(!empty($item))
                                            <option value="new" {{ $item->status == 'new' ? 'selected' : '' }}>جديد
                                            </option>
                                            <option value="old" {{ $item->status == 'old' ? 'selected' : '' }}> كهنه
                                            </option>
                                            <option value="used" {{ $item->status == 'used' ? 'selected' : '' }}> مستخدم
                                            </option>
                                            @endif
                                        </select>
                                        @if (Session::has('edit_transaction') && $errors->has('status'))
                                        <span class="text-danger">{{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <label class="control-label col-md-4"> رقم المسلسل : </label>
                                    <div class="col-md-8">
                                        <input type="text" name="sn" id="sn" class="form-control" />
                                        @if (Session::has('edit_transaction') && $errors->has('sn'))
                                        <span class="text-danger">{{ $errors->first('sn') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4"> الرام   : </label>
                                    <div class="col-md-8">
                                        <input type="text" name="ram" id="ram" class="form-control" />
                                        @if (Session::has('edit_transaction') && $errors->has('ram'))
                                        <span class="text-danger">{{ $errors->first('ram') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4"> الهارد   : </label>
                                    <div class="col-md-8">
                                        <input type="text" name="hd" id="hd" class="form-control" />
                                        @if (Session::has('edit_transaction') && $errors->has('hd'))
                                        <span class="text-danger">{{ $errors->first('hd') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4"> المعالج   : </label>
                                    <div class="col-md-8">
                                        <input type="text" name="cpu" id="cpu" class="form-control" />
                                        @if (Session::has('edit_transaction') && $errors->has('cpu'))
                                        <span class="text-danger">{{ $errors->first('cpu') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4"> نوع الشاشة   : </label>
                                    <div class="col-md-8">
                                        <input type="text" name="screen_type" id="screen_type" class="form-control" />
                                        @if (Session::has('edit_transaction') && $errors->has('screen_type'))
                                        <span class="text-danger">{{ $errors->first('screen_type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">   رقم المسلسل : </label>
                                    <div class="col-md-8">
                                        <input type="text" name="screen_serial" id="screen_serial" class="form-control" />
                                        @if (Session::has('edit_transaction') && $errors->has('screen_serial'))
                                        <span class="text-danger">{{ $errors->first('screen_serial') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4"> الكميه   : </label>
                                    <div class="col-md-8">
                                        <input type="text" name="quantity" id="quantity" class="form-control" />
                                        @if (Session::has('edit_transaction') && $errors->has('quantity'))
                                        <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                        @endif
                                    </div>
                                </div>




                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                                <button type="submit" class="btn btn-primary"> تحديث</button>
                            </div>
                        </form>

                        @endif

                    </div>
                </div>
            </div>

        <!-- /edit -->


@endsection


@push('js')
    <script>
   $('#EditModal').on('show.bs.modal', function (event) {


            var button = $(event.relatedTarget)


            // console.log(size)
            var main = button.data('main')
            var sub = button.data('sub')


            var sn = button.data('sn')
            var ram = button.data('ram')
            var hd = button.data('hd')
            var cpu = button.data('cpu')
            var quantity = button.data('quantity')
            var status = button.data('status')
            var screen_serial = button.data('screen_serial')
            var screen_type = button.data('screen_type')

            var item_id = button.data('itemid')
            //  console.log(trans_id)
            var modal = $(this)

            modal.find('.modal-body #main').val(main);
            modal.find('.modal-body #sub').val(sub);
            modal.find('.modal-body #sn').val(sn);
            modal.find('.modal-body #ram').val(ram);
            modal.find('.modal-body #hd').val(hd);
            modal.find('.modal-body #cpu').val(cpu);
            modal.find('.modal-body #screen_serial').val(screen_serial);
            modal.find('.modal-body #screen_type').val(screen_type);
            modal.find('.modal-body #quantity').val(quantity);
            modal.find('.modal-body #status').val(status);
            modal.find('.modal-body #item_id').val(item_id);
            
            });

        



        $(document).on('change','.SlectBox',function(){


            let next= $(this).next(".test");
            let id = $(this).find('option:selected').attr('id');

            if (id) {
                $.ajax({
                    url: "{{ URL::to('place')}}/"+id,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function(data){

                        $(next).empty();
                        data.data.forEach((obj) =>{
                            $(next).append('<option value="' + obj.name + '">' + obj.name + '</option>');
                        })
                    },
                });
                } else {
                console.log('AJAX load did not work');
                }

            // change_place(elemnt_id,id);
        });


    </script>
@endpush
