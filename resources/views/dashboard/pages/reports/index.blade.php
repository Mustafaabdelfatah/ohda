@extends('dashboard.temp.layout')

@section('page_title', 'التقارير')


@section('parent', 'الرئيسيه')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <form class="form" action="{{ route('admin.reports.index') }}" method="get">

                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-home"></i> ابحث بالفرع والمحور </h4>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">الفرع</label>
                                        <select name="main_place" onchange="change_place(this);"
                                            class="form-control SlectBox">
                                            <!--placeholder-->
                                            <option value="" selected>اختر الفرع </option>
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
                                        {{-- <select id="sub" name="sub_place" class="form-control">


                                        </select> --}}
                                        <select class="form-control select2" required id="sub" name="sub_place[]"
                                            multiple="multiple">
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

    {{-- {{ dd($sub_place) }} --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">كل الاصناف الخاصه بفرع {{ app('request')->input('main_place') }} محور
                        {{-- {{ app('request')->input('sub_place') }} </h4> --}}

                        <p class="card-title-desc" style="text-align: center">
                        <form action="{{ route('admin.pdf') }}">

                            <input type="hidden" name="mainPlace" value="{{ app('request')->input('main_place') }}">
                            @foreach ($arr as $arr2)
                                <input type="hidden" name="subPlace[]" value="{{ $arr2 }}">
                            @endforeach



                            <button type="submit"
                                style="width: 120px;
                                height: 40px;
                                line-height: 32px;
                                font-size: 13px;
                                font-weight: bold;"
                                class="btn btn-secondary btn-sm ml-auto">
                                <i class="fa fa-file-pdf"></i> تصدير الي PDF
                            </button>
                        </form>

                        </p>
                        @if ($items !== null)
                            <table id="datatable" class="  table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> النوع </th>
                                        <th> الطراز </th>
                                        <th> الكميه </th>
                                        <th> الهارد </th>
                                        <th> الرام </th>
                                        <th> المعالج </th>
                                        <th> الرقم المسلسل </th>
                                        <th> الاجراء </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $index => $item)
                                        <tr>
                                            <td>
                                                {{ $index + 1 }}
                                            </td>
                                            <td>
                                                {{ $item->item->type }}
                                            </td>
                                            <td>
                                                {{ $item->item->model }}
                                            </td>
                                            <td>
                                                {{ $item->quantity }}
                                            </td>
                                            <td>
                                                {{ $item->hd }}
                                            </td>
                                            <td>
                                                {{ $item->ram }}
                                            </td>
                                            <td>
                                                {{ $item->cpu }}
                                            </td>
                                            <td>
                                                {{ $item->sn }}
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.items.deleteReport', $item->id) }}"
                                                    method="POST" style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a title="delete"
                                                        class="btn btn-icon btn-danger text-white mx-1 delete">
                                                        <i class="mdi mdi-delete-off "></i>
                                                    </a>
                                                </form>
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

    </div><!-- end of row -->









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

                        $('select[name="sub_place[]"]').empty();
                        $('select[name="sub_place[]"]').append('<option value="">' + 'الكل' + '</option>');
                        data.data.forEach((obj) => {
                            $('select[name="sub_place[]"]').append('<option value="' + obj.name + '">' +
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
