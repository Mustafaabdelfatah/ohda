@extends('dashboard.temp.layout')

@section('page_title','تفاصيل الصنف')

@section('action')
    <a class="dropdown-item" href="{{ route('admin.items.create') }}"><i class="mdi mdi-plus-circle"></i> اضافه تفاصيل للصنف</a>
@endsection

@section('parent','الرئيسيه')

@section('content')

 <!-- add item details -->
<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-12">

                <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('admin.adddetails',$itemDetails->id)}}" name="add_product"
                    id="add_product">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $itemDetails->id }}">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-3" for="projectinput1"> نوع هذا الصنف </label>
                                    <label class="col-md-3" for="projectinput1"> <strong
                                            style="color: #17416b">{{ $itemDetails->type }}</strong>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-3" for="projectinput1"> طراز هذا الصنف </label>
                                    <label class="col-md-3" for="projectinput1"> <strong
                                            style="color: #17416b">{{$itemDetails->model}}</strong> </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3" for="projectinput1"> اقصي كميه لهذا الصنف     </label>
                                    <label class="col-md-3" for="projectinput1"> <strong
                                            style="color: #17416b">{{$itemDetails->quantity}}</strong> </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3" for="projectinput1"> الكميه المتبقيه لهذا الصنف           </label>
                                    <label class="col-md-3" for="projectinput1"> <strong
                                            style="color: #17416b">{{$itemDetails->quantity - $transaction}}</strong> </label>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"></label>
                        <div class="controls field_wrapper" style="margin-left: 14px">
                            <div class="row">
                                @if($itemDetails->not_serial == 'un_active')
                                <input  title="الرقم المسلسل" type="text" class="form-control col-md-2"
                                    name="sn[]" id="sn" placeholder="رقم المسلسل">
                                @endif
                                <div class="col-md-3 d-flex px-0">
                                    <select name="main_place[]" data-id="{{$itemDetails->id}}"  class="form-control SlectBox col-md-6">
                                        <!--placeholder-->
                                        <option value="" selected disabled>اختر الفرع</option>
                                        @foreach ($places as $place)
                                            <option value="{{ $place->name }}" id="{{$place->id}}"> {{ $place->name }}</option>
                                        @endforeach
                                    </select>
                                    <select name="sub_place[]" id="sub_{{$itemDetails->id}}" pla class="form-control col-md-6 test">
                                        <option value="" selected disabled>اختر المحور</option>

                                    </select>
                                </div>

                                
                                
                                <div class="col-md-2 d-flex px-0">
                                    <select name="status[]"   required class="form-control col-md-4" >
                                        <option value="new" {{ old('status') == 'approved'? 'selected' : '' }}>جديد
                                        </option>
                                        <option value="old" {{ old('status') == 'pending'? 'selected' : '' }}> كهنه
                                        </option>
                                        <option value="used" {{ old('status') == 'decline'? 'selected' : '' }}> مستخدم
                                        </option>
                                    </select>
                                    <input title="الرام" type="text" class="form-control col-md-4"
                                    name="ram[]" id="ram" placeholder="ram">
                                    <input   title="الهارد" type="text" class="form-control col-md-4"
                                    name="hd[]" id="hd" placeholder="hd">
                                </div>
                                <input   title="المعالج" type="text" class="form-control col-md-1"
                                name="cpu[]" id="cpu" placeholder="cpu">

                                <input   title="نوع الشاشة" type="text" class="form-control col-md-1"
                                name="screen_type[]" id="screen_type" placeholder="screen type">
                                <input   title="رقم المسلسل" type="text" class="form-control col-md-2"
                                name="screen_serial[]" id="screen_serial" placeholder="screen serial">

                               <div class="col-md-1 d-flex px-0">
                               <input   title="الكميه" type="number" class="form-control col-md-6"
                                name="quantity[]" id="quantity" placeholder="عدد">
                                <a href="javascript:void(0);" style="text-decoration: none; width:50px; background: #153b61; color: #f2f2f2;text-align: center; margin: 0 5px; border-radius: 5px; padding-top: 6px;" class="add_button" title="Add field"><i class="mdi mdi-plus  "></i></a>
                               </div>

                            </div>
                        </div>
                    </div>

                    <div class="form-actions" style="margin-top: 10px;margin-bottom:20px">
                        <input type="submit" value="اضافه تفاصيل الصنف" class="btn btn-primary">
                    </div>
                </form>

            </div><!-- end of col 12 -->

        </div><!-- end of row -->
    </div><!-- end of tile -->
</div><!-- end of row -->
 <!-- end item details -->

        <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">تفاصيل هذا الصنف  </h4>
                <p class="card-title-desc">
                </p>
                    @if ($itemDetails->transactions !== null)
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



                                @foreach ($itemDetails->transactions as $index=>$item)



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
                        @if(isset($itemDetails))
                        <form  action="{{ route('admin.editdetails',$itemDetails->id) }}" method="POST">
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

        // add more row
        $(document).ready(function () {
            let items = {!! json_encode($itemDetails->toArray()) !!};
            console.log(items);
            let count = {!! $transaction !!};
            let qty = items.quantity;

            var maxField = qty - count; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = `<div class="controls field_wrapper" style="margin: 5px 0px 5px 0px;">
            <div class="row">
            <input type="text" placeholder="رقم المسلسل" class="form-control col-md-2" name="sn[]" style="width:15%"/>&nbsp;
            <select name="main_place[]" data-id="{{$itemDetails->id}}"  class="form-control SlectBox col-md-2">
                <!--placeholder-->
                <option value="" selected disabled>اختر الفرع</option>
                @foreach ($places as $place)
                    <option value="{{ $place->name }}" id="{{$place->id}}"> {{ $place->name }}</option>
                @endforeach
            </select>
            <select name="sub_place[]" id="sub_{{$itemDetails->id}}"  class="form-control col-md-2 test">
            </select>
            <select name="status[]"   required class="form-control col-md-1" >
                <option value="new" {{ old('status') == 'approved'? 'selected' : '' }}>جديد
                </option>
                <option value="old" {{ old('status') == 'pending'? 'selected' : '' }}> كهنه
                </option>
                <option value="used" {{ old('status') == 'decline'? 'selected' : '' }}> مستخدم
                </option>
            </select>
            <input title="الرام" type="text" class="form-control col-md-1"
            name="ram[]" id="ram" placeholder="ram">
            <input   title="الهارد" type="text" class="form-control col-md-1"
            name="hd[]" id="hd" placeholder="hd">
            <input   title="المعالج" type="text" class="form-control col-md-1"
            name="cpu[]" id="cpu" placeholder="cpu">

            <input   title="نوع الشاشة" type="text" class="form-control col-md-1"
            name="screen_type[]" id="screen_type" placeholder="screen_type">
            <input   title="رقم المسلسل" type="text" class="form-control col-md-1"
            name="screen_serial[]" id="screen_serial" placeholder="screen_serial">
            
            <input   title="الكميه" type="number" class="form-control col-md-1"
            name="quantity[]" id="quantity" placeholder="quantity">
            <a href="javascript:void(0);"
            class="remove_button" style="text-decoration: none;
            width: 50px;
            height: auto;
            background: #153b61;
            color: #f2f2f2;
            text-align: center;
            line-height: -2px;
            margin:0 3px;
            border-radius: 5px;
            padding-top: 6px;" title="Remove field">      <i class="mdi mdi-delete-off delete"></i></a>
            </div>
            </div>`;

            var x = 1; //Initial field counter is 1
            $(addButton).click(function () { //Once add button is clicked


                if (x < maxField) { //Check maximum number of input fields


                    x++; //Increment field counter


                    $(wrapper).append(fieldHTML); // Add field html
                }
            });
            $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });

        // ./add more row



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
