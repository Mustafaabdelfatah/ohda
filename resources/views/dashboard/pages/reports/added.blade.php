@extends('dashboard.temp.layout')

@section('page_title', 'التقارير')


@section('parent', 'الرئيسيه')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <form class="form" action="{{ route('admin.reports.doadded') }}" method="post">
                        @csrf
                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-home"></i>  </h4>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">النوع</label>
                                        <select name="type" onchange="change_type(this);" 
                                            class="form-control SlectBox">
                                            <!--placeholder-->
                                            <option value="" selected >اختر النوع </option>
                                            @foreach ($types as $place)
                                                <option data-id="{{ $place->id }}"> {{ $place->name }}</option>
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
                                
                            </div>
                        </div>
                        <div class="form-actions text-left">
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> تصدير الي pdf
                            </button>
                        </div>
                    </form>
                </div><!-- end of tile -->
            </div><!-- end of col -->
        </div><!-- end of row -->
    </div>


    </div><!-- end of col -->








@endsection

@push('js')
    <script>
         function change_type(obj) {
            var id = obj.options[obj.selectedIndex].getAttribute('data-id');

            if (id) {
                $.ajax({
                    url: "{{ URL::to('model')}}/"+id,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function(data) {


                        $('select[name="model"]').empty();
                        $('select[name="model"]').append('<option value="">' + 'الكل' + '</option>');


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
    </script>
@endpush
