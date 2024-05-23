@extends('dashboard.temp.layout')

@section('page_title', 'لجنه الكهنه')


@section('parent', 'الرئيسيه')

@section('content')

  

    <form action="{{route('admin.oldpdf')}}" method="POST">

        @csrf
        <button type="submit" style="width: 120px;
            height: 40px;
            line-height: 32px;
            font-size: 13px;
            position:relative;
            right:48%;
            margin-bottom:20px;
            font-weight: bold;"
        class="btn btn-secondary btn-sm ml-auto">
        <i class="fa fa-file-pdf"></i> تصدير الي PDF
        </button>
        </form>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                  

                 
                    @if ($oldTrans !== null)
                        <table id="datatable" class="  table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                
                                    <th> النوع </th>
                                    <th> الطراز </th>
                                   
                                    <th> الرقم المسلسل </th>
                                    <th> الملاحظات   </th>
                                    <!-- <th> الاجراء   </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($oldTrans as $index => $old)
                                    <tr>
                                        <td>
                                             {{ $index + 1 }}
                                        </td>
                                        
                                        <td>
                                            {{ $old->item->type }}
                                        </td>
                                        <td>
                                           {{ $old->item->model }}
                                        </td>
                                        
                                        <td>
                                            {{$old->sn}}
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <!-- <td>
                                            <form  action="{{ route('admin.items.deleteReport',$old->id) }}" method="POST" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <a title="delete" class="btn btn-icon btn-danger text-white mx-1 delete">
                                                        <i class="mdi mdi-delete-off "></i>
                                                </a>
                                             </form>
                                        </td> -->
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
