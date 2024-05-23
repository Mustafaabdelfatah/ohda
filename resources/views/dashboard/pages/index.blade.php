@extends('dashboard.temp.layout')

@section('page_title','عهده فرع نظم المعلومات')

@section('content')

@push('css')
<style>
.col-xl-3{
    max-width:17%;
}
.font-size-16{
    font-size: 12px!important;
    color:#fff !important;
}
.head-add{
    text-align: center;
    color: #fff;
    background: #333547;
    width: 300px;
    margin: 20px auto;
    border-radius: 10px;
    padding: 10px;
}
.head-add:hover{
    background: #626ed4;
    transition: 0.4s ease-in-out;
}
.visible{
    visibility:visible
}
.hidden{
    visibility:hidden
}
</style>
@endpush
<h3 class="head-add"> <i class="ti-home"  onclick="privateClick()" id="test"></i> المضاف في العهده</h3>

<div class="row">
 
    @if($data)
    @foreach ($data as $key=>$item)
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-left mini-stat-img mr-4">
                        <img src="assets/images/services-icon/01.png" alt="">
                    </div>
                    <h5 class="font-size-16 text-uppercase mt-0 text-white-50"> عدد {{$key}}   في الهيئه </h5>
                    <h4 class="font-weight-medium font-size-24">{{($item)->sum('quantity')}} <i
                            class="mdi mdi-arrow-up text-success ml-2"></i></h4>
                </div>
                <div class="pt-2">
                    <div class="float-right">
                        <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <a href="{{url($key)}}" class="text-white-50 mb-0 mt-1">   {{$key}}   في الهيئه </a>
                 </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>
<!-- end row -->
<div   class="toggle hidden">
        <h3 class="head-add"> الغير مضاف في العهده</h3>
        <div class="row">
        
            @if($not_add)
            @foreach ($not_add as $key=>$item)
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <img src="assets/images/services-icon/01.png" alt="">
                            </div>
                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50"> عدد {{$key}}   في الهيئه </h5>
                            <h4 class="font-weight-medium font-size-24">{{($item)->sum('quantity')}} <i
                                    class="mdi mdi-arrow-up text-success ml-2"></i></h4>

                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>

                            <a href="{{url($key.'/not-added')}}" class="text-white-50 mb-0 mt-1">   {{$key}}   في الهيئه </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
</div>

<!-- end row -->

@endsection

@push('js')
    <script>
    function privateClick()
    {
       
        $(".toggle").toggleClass('visible hidden');
    }

        
    </script>
@endpush
