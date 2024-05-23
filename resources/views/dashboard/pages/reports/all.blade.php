@extends('dashboard.temp.layout')

@section('page_title', 'التقارير')

@section('parent', 'الرئيسيه')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <form class="form" action="{{ route('admin.reports.specific') }}" method="get">

                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-home"></i> ابحث بالفرع والمحور </h4>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">الفرع</label>
                                        <select name="main_place" onchange="change_place(this);" required
                                            class="form-control SlectBox">
                                            <!--placeholder-->
                                            <option value="" selected disabled>اختر الفرع </option>
                                            @foreach ($main_places as $place)
                                                <option data-id="{{ $place->id }}"> {{ $place->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('place')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">المحور</label>
                                        <select id="sub" name="sub_place" class="form-control">
                                        </select>
                                        @error('sub')
                                            <span class="text-danger"> this field is required</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions text-left">
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> بحث
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
        function change_place(obj) {
            var id = obj.options[obj.selectedIndex].getAttribute('data-id');
            if (id) {
                $.ajax({
                    url: "{{ URL::to('place') }}/" + id,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function(data) {
                        console.log(data);
                        $('select[name="sub_place"]').empty();
                        $('select[name="sub_place"]').append('<option value="">' + 'الكل' + '</option>');

                        data.data.forEach((obj) => {
                            $('select[name="sub_place"]').append('<option value="' + obj.name + '">' +
                                obj.name + '</option>');
                        })
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        }
    </script>
@endpush
