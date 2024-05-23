@extends('dashboard.temp.layout')

@section('page_title', 'التقارير')

@section('parent', 'الرئيسيه')

@section('content')

    @push('css')
        <style>
            .table-bordered {
                border-width: thick !important;
                border-style: double !important;
                border-color: black !important
            }

            .table-bordered td{
                border: 1px solid #000 !important;
                color:#000
            }
            .table-bordered thead{
                background:#bfbcbc;
            }
            .table-bordered th {
                border: 1px solid #000 !important;
                font-weight:bold;
                font-size:12px;

            }

            table {
                text-align: center;
                /* border: 3px double #000 */
                border-collapse: collapse;


            }


           table thead th
              {

                border-collapse: collapse;
                font-weight:bold;
                color:#000
            }



        </style>
    @endpush


        <div style="display:flex; justify-content:space-between">

            <div class="">
                <h3> اختر العناصر اللتي سوف تستخدمها في الجدول</h3>
                <!-- Multiple Select -->
                <select multiple="multiple" name="toggle_column" id="toggle_column">
                    <option value="0">المسلسل</option>
                    <option value="1">الفرع</option>
                    <option value="2">المحور</option>
                    <option value="3">النوع</option>
                    <option value="4">طراز</option>
                    <option value="5">الكميه</option>
                    <option value="6">مستند صرف</option>
                    <option value="7">تاريخ الصرف </option>
                    <option value="8">رقم المسلسل </option>
                </select>
            </div>
            <div class="">
                <div class="custom-actions-btns mb-5">
                    <button class="btn btn-secondary" id="print"
                        style="width: 150px; height: 50px; background: #333547; color: #fff;  font-size: 20px;">
                        <i class="icon-printer"></i> طباعة
                    </button>
                </div>
            </div>
        </div>





    <div style="margin-top:50px">
        <h3 style="padding-right:4px"> ضع عنوانا مناسبا </h3>
        <input style="margin-bottom:10px" type="text" class="comment" name="" id="txt_name">
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body  real-print">

                    @if ($items !== null)
                        <table id="myTable" class=" table table-bordered  "
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;  ">

                            <h3 style="text-align:center" class="comment"></h3>
                            <thead>
                                <tr>
                                    <th style="width:0.3%">م</th>
                                    <th style="width:3%"> الفرع</th>
                                    <th style="width:8%"> المحور</th>
                                    <th style="width:3%"> النوع</th>
                                    <th style="width:3%"> طراز</th>
                                    <th style="width:3%">الكميه</th>
                                    <th style="width:3%">مستند صرف</th>
                                    <th style="width:3%">تاريخ الصرف</th>
                                    <th style="width:5%">رقم المسلسل </th>
                                </tr>
                            </thead>
                            <tbody>
                           
                                @foreach ($items as $index => $item)
                                    <tr>
                                        <td style="width:0.3%">
                                            {{ $index + 1 }}
                                        </td>

                                        <td style="width:3%">
                                            <span>{{ $item->main_place }}</span>
                                        </td>

                                        <td style="width:8%">
                                            <span>{{ $item->sub_place }}</span>
                                        </td>

                                        <td style="width:3%">
                                            <span>{{ $item->item->type }}</span>
                                        </td>

                                        <td style="width:15%">
                                            <span>{{ $item->item->model }}</span>
                                        </td>

                                        <td style="width:3%">
                                        {{ $item->quantity }}
                                        </td>
                                        
                                        <td style="width:15%">
                                            @for($var = 0 ; $var < count($item->item->document) ; $var ++) 
                                                <span style="margin:0 2px" class="badge badge-primary">{{$item->item->document[$var]}}</span>
                                            @endfor
                                        </td>
                                        
                                        <td style="width:15%">
                                            @for($var = 0 ; $var < count($item->item->date) ; $var ++) 
                                                <span style="margin:0 2px" class="badge badge-primary">{{$item->item->date[$var]}}</span>
                                            @endfor
                                        </td>

                                        <td style="width:3%;font-size:11px">
                                          {{$item->sn}}
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
        $(document).ready(function() {
            $("#print").click(function() {
                var myIframe = document.getElementsByClassName("real-print");
                $.print(myIframe);
                return false;
            });


            $("#txt_name").change(function() {
                var oldComment = $('.comment').val();

                $('.comment').text('');

                $('.comment').append(oldComment);

                // var oldComment =  $('.comment').val();
                // var newComment =
                // console.log( $('.comment').val());
                // $('.comment').val(' ');


            });

        });


        function hideAllCol() {
            for (var i = 0; i < 9; i++) {
                columns = my_table.columns(i).visible(0);
            }
        }

        function showAllCol() {
            for (var i = 0; i < 9; i++) {
                columns = my_table.columns(i).visible(1);
            }
        }
        $(function() {
            my_table = $('#myTable').DataTable({
                "paging": false,
                "ordering": false,
                "info": false,
                "searching": false


            });
            $('#toggle_column').multipleSelect({
                width: 400,
                onClick: function(view) {
                    var selectItems = $('#toggle_column').multipleSelect("getSelects");
                    console.log(selectItems);
                    hideAllCol();

                    for (var i = 0; i < selectItems.length; i++) {
                        var s = selectItems[i];
                        my_table.columns(s).visible(1);
                    }
                },
                onCheckAll: function(view) {
                    showAllCol();
                },
                onUncheckAll: function(view) {
                    hideAllCol();
                },
            });
        });
    </script>
@endpush
