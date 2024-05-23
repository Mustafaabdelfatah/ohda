@extends('dashboard.temp.layout')

@section('page_title', 'تعديل مستند الصنف')


@section('action')
    @if (auth()->guard('admin')->user()->hasPermission('read_items'))
        <a class="dropdown-item" href="{{ route('admin.items.index') }}"><i class="mdi mdi-arrow-left-thick "></i> الاصناف
        </a>
    @endif
@endsection

@section('parent', 'الرئيسيه')

@section('content')



    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.items.update', $items->id) }}">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputName" class="control-label">النوع</label>
                                    <select name="type" onchange="change_type(this);" class="form-control SlectBox">
                                        <!--placeholder-->
                                        <option value="" selected disabled>حدد النوع</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->name }}" data-id="{{ $type->id }}">
                                                {{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputName" class="control-label">الطراز</label>
                                    <select id="model" name="model" class="form-control">
                                    </select>
                                    @error('model')
                                        <span class="text-danger"> this field is required</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputName" class="control-label">مستند صرف</label>
                                    <select class="form-control select2" name="document[]"  multiple="multiple">
                                        @foreach ($items->document as $tag)
                                            <option selected {{ $tag }} value="{{ $tag }}">{{ $tag }}</option>
                                        @endforeach       
                                    </select>
                                
                                
                                    @error('document')
                                        <span class="text-danger"> this field is required</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputName" class="control-label">رقم الصفحه</label>
                                    <input type="text" value="{{ $items->page }}" name="page" class="form-control">
                                    @error('document')
                                        <span class="text-danger"> this field is required</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" >تاريخ الصرف</label>
                                    <select class="form-control select2" name="date[]"  multiple="multiple">
                                        @foreach ($items->date as $tag)
                                                <option selected {{ $tag }} value="{{ $tag }}">{{ $tag }}</option>
                                        @endforeach
                                    </select>
                                    @error('date')
                                        <span class="text-danger"> this field is required</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1"> الموقف من العهده <span class="text-danger">*</span></label>
                                    <select name="ohda_status" class="form-control">
                                        <option value="added" {{ $items->ohda_status == 'added' ? 'selected' : '' }}>
                                            مضاف
                                        </option>
                                        <option value="removed" {{ $items->ohda_status == 'removed' ? 'selected' : '' }}>
                                            غير مضاف
                                        </option>
                                    </select>
                                    @error('ohda_status')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputName" class="control-label">الكميه </label>
                                    <input name="quantity" value="{{ $items->quantity }}" type="number"
                                        class="form-control">
                                    @error('quantity')
                                        <span class="text-danger"> this field is required</span>
                                    @enderror
                                </div>
                            </div>

                    

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ملحوظات</label>
                                    <div>
                                        <input type="text" value="{{ $items->description }}" id="description"
                                            class="form-control" placeholder="" name="description">
                                      
                                    </div>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                           


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1"> البوصله </label>
                                    <div class="controls">
                                        <input type="checkbox" {{ $items->bosla == 'active' ? 'checked' : '' }}
                                            name="bosla" id="bosla" value="active">
                                    </div>
                                    @error('bosla')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1"> بدون سريال </label>
                                    <div class="controls">
                                        <input type="checkbox" {{ $items->not_serial == 'active' ? 'checked' : '' }}
                                            name="not_serial" id="not_serial" value="active">
                                    </div>
                                    @error('not_serial')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                        
                                    <select name="boslatype_id" id="boslaTypeId" style="display: none" class="form-control SlectBox">
                                        <option value="">حدد نوع البوصله</option>
                                        @foreach ($boslaType as $type)
                                            <option {{ $items->boslatype_id == $type->id ? 'selected' : '' }}
                                                value="{{ $type->id }}"> {{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('model')
                                        <span class="text-danger"> this field is required</span>
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

    @endsection


    @push('js')
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        <script>
            $(document).ready(function() {

                if($('#bosla').is(":checked")){
                    
                    $('#boslaTypeId').css('display', 'block');
                }else{
 
                    $('#bosla').on('click', function()
                    {
                        var $this = $(this);
                        console.log($this);
                        if ($this.is(":checked")) {
                            $('#boslaTypeId').css('display', 'block');
                        } else {
                            $('#boslaTypeId').css('display', 'none');
                        }
                    });
                }

            });

            function change_type(obj) {
                var id = obj.options[obj.selectedIndex].getAttribute('data-id');

                if (id) {
                    $.ajax({
                        url: "{{ URL::to('model') }}/" + id,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id
                        },
                        success: function(data) {
                            console.log(data);
                            $('select[name="model"]').empty();
                            data.data.forEach((obj) => {
                                $('select[name="model"]').append('<option value="' + obj.name + '">' + obj
                                    .name + '</option>');
                            })
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            }
        </script>
    @endpush
