@extends('dashboard.temp.layout')

@section('page_title', 'التقارير')


@section('parent', 'الرئيسيه')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <form class="form" action="{{ route('admin.reports.boslapdf') }}" method="post">
                        @csrf
                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-home"></i>  </h4>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">النوع في البوصله</label>
                                        <select name="boslatype_id" required class="form-control SlectBox">

                                            <option value="" selected disabled>اختر النوع </option>
                                            @foreach ($types as $type)
                                                <option  value="{{$type->id}}"> {{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('type')
                                            <span class="text-danger">{{ $message }}</span>
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


