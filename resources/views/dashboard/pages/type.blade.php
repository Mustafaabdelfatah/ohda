@extends('dashboard.temp.layout')

@section('page_title',' العهده ')

@section('content')



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">   </h4>
                <p class="card-title-desc">
                </p>
                    @if ($data !== null)
                            <table id="datatable" class="  table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th style="width:10px"> م </th>
                                    <th> الرقم المسلسل </th>
                                    <th> الفرع </th>
                                    <th> المحور </th>
                                    <th> الرام </th>
                                    <th>الهارد </th>
                                    <th> المعالج </th>
                                  

                                </tr>
                                </thead>
                                <tbody>
                                @php 
                        $key=1
                        @endphp
                  
                                @foreach ($data  as  $item)

                                    @foreach ($item->transactions as $item)
                                        <tr>
                                           
                                            <td>
                                                {{  $key++ }}
                                            </td>
                                            <td>{{$item->sn}}</td>
                                            
                                            <td>
                                                {{ $item->main_place }}
                                            </td>
                                            <td>
                                            {{ $item->sub_place }}
                                            </td>
                                            <td>
                                            {{ $item->ram }}

                                            </td>
                                            <td>
                                            {{ $item->hd }}
                                            </td>

                                            <td>{{$item->cpu}}</td>

                                          

                                        </tr>
                                     
                                    @endforeach

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

@endsection
