@extends('dashboard.temp.layout')

@section('page_title','حاله الاصناف')

@section('action')
    <a class="dropdown-item" href="{{ route('admin.items.index') }}"><i class="mdi mdi-plus-circle"></i> الذهاب الي كل الاصناف الموجوده</a>
@endsection

@section('parent','الرئيسيه')

@section('content')



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">حاله الاصناف</h4>
                <p class="card-title-desc">
                </p>
                    @if ($old_status !== null)
                            <table id="datatable" class="  table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th> النوع </th>
                                    <th> الطراز </th>
                                    <th> الفرع </th>
                                    <th> المحور </th>

                                    <th> الحاله الفنيه </th>

                                    {{-- <th>الاجرائات</th> --}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($old_status as $index=>$item)

                                    <tr>
                                        <td>
                                        <a href="{{url('items/'.$item->id.'/details')}}"> {{$index+1}}</a>
                                        </td>
                                        <td>
                                            {{ $item->type }}
                                        </td>
                                        <td>
                                           {{ $item->model }}
                                        </td>
                                        <td>
                                        @foreach(transactions->unique('main_place') as $trans )
                                          <span class="btn btn-success"> {{ $trans->main_place }}</span>
                                        @endforeach
                                        </td>
                                        <td>
                                        @foreach( transactions->unique('sub_place') as $trans )
                                        <span class="btn btn-success"> {{ $trans->sub_place }}</span>
                                        @endforeach
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
                                        </td>

                                        {{-- <td>
                                            <a type="submit"  data-statid="{{ $item->id }}" data-status="{{ $item->status }}"
                                                class="btn btn-icon btn-success text-white mx-1"
                                                data-toggle="modal" data-target="#ChangeStatus">تغيير حاله الصنف</a>
                                        </td> --}}
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

       {{-- <!-- ChangeStatus -->
       <div class="modal fade" id="ChangeStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>

                <form action="{{route('admin.changeStatus',$item->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="status_id" id="stat_id" value="{{$item->id}}">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1">  تغيير الحاله   <span class="text-danger">*</span></label>
                            <select name="status" id="stat" class="form-control" required  >
                                <option value="new" {{ old('status') == 'approved'? 'selected' : '' }}>جديد
                                </option>
                                <option value="old" {{ old('status') == 'pending'? 'selected' : '' }}> كهنه
                                </option>
                                <option value="used" {{ old('status') == 'decline'? 'selected' : '' }}> مستخدم
                                </option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{$message}} </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> تغيير
                    </button>
                </form>

            </div>
        </div>
    </div>
    <!-- /ChangeStatus --> --}}

@endsection

{{-- @push('js')
<script>


    $('#ChangeStatus').on('show.bs.modal', function (event) {


        var button = $(event.relatedTarget)


        var status = button.data('status')
        console.log(status);
        var status_id = button.data('statid')
         console.log(status_id)
        var modal = $(this)

        modal.find('.modal-body #stat').val(status);
        modal.find('.modal-body #stat_id').val(1);
    });

</script>
@endpush --}}
