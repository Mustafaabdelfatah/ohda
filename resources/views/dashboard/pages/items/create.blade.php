@extends('dashboard.temp.layout')
@section('page_title', 'اضافه مستند صنف جديد')
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

                    <form class="form" action="{{ route('admin.items.store') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-home"></i> بيانات الصنف </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">النوع</label>
                                        <select name="type" onchange="change_type(this);" required
                                            class="form-control SlectBox">
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
                                        <select class="form-control select2" required name="document[]"  multiple="multiple">
                                        </select>
                                        @error('document')
                                            <span class="text-danger"> this field is required</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">رقم الصفحه</label>
                                        <input type="text" name="page" class="form-control">
                                        @error('page')
                                            <span class="text-danger"> this field is required</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput1"> الموقف من العهده <span
                                                class="text-danger">*</span></label>
                                        <select name="ohda_status" class="form-control" required>
                                            <option value="added" {{ old('ohda_status') == 'added' ? 'selected' : '' }}>
                                                مضاف
                                            </option>
                                            <option value="removed"
                                                {{ old('ohda_status') == 'removed' ? 'selected' : '' }}> غير مضاف
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
                                        <input name="quantity" required value="1" type="number" class="form-control">
                                        @error('quantity')
                                            <span class="text-danger"> this field is required</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">تاريخ الصرف</label>
                                        <select class="form-control select2" required name="date[]"  multiple="multiple">
                                        </select>
                                     
                                   
                                        @error('date')
                                            <span class="text-danger"> this field is required</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ملحوظات</label>
                                        <div>
                                            <input type="text" value="" id="description" class="form-control"
                                                placeholder="" name="description">
                                         
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
                                            <input type="checkbox" name="bosla" id="bosla" value="active">
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
                                            <input type="checkbox" name="not_serial" id="not_serial" value="active">
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
                                                 
                                                <option value="{{ $type->id }}"> {{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                            </div>
                        </div>

                        <div class="form-actions text-left">
                            {{-- <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
                    <i class="ft-x"></i> تراجع
                </button> --}}
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> اضافه
                            </button>
                        </div>
                    </form>


                </div><!-- end of tile -->
            </div><!-- end of col -->
        </div><!-- end of row -->

    @endsection

    @push('js')
        <script>
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
                                $('select[name="model"]').empty();
                                data.data.forEach((obj) => {
                                    $('select[name="model"]').append(
                                        '<option value="' + obj.name + '">' + obj.name + '</option>'
                                    );
                                })
                            },
                        });
                    } else {
                        console.log('AJAX load did not work');
                    }
                }
                $(document).ready(function() {
                    $('#bosla').on('click', function()
                    {
                        var $this = $(this);
                        if ($this.is(":checked")) {
                            $('#boslaTypeId').css('display', 'block');
                        } else {
                            $('#boslaTypeId').css('display', 'none');
                        }
                    });
                });
           
        </script>
    @endpush
