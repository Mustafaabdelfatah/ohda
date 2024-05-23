@extends('dashboard.temp.layout')

@section('page_title','طباعه العهده')

@section('action')
<a class="dropdown-item" href="{{ route('admin.items.index') }}"><i class="mdi mdi-arrow-left-thick "></i>  جميع العهد </a>
@endsection

@push('css')
<style>



</style>
 @endpush

@section('content')

    <div class="">
        <div class="custom-actions-btns mb-5">
            <button class="btn btn-secondary" id="print"
                style="width: 150px; height: 50px; background: #333547; color: #fff;  font-size: 20px;">
                <i class="icon-printer"></i> طباعة
            </button>
        </div>
    </div>


    
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body real-print">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <input type="text" placeholder="النوع    "   class="form-control" disabled value="{{$items->type}}" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <input type="text"  placeholder="الطراز    "  class="form-control" disabled value="{{$items->model}}" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                              
                                    
                                    @foreach ($items->document as $tag)
                                    <input type="text"  class="form-control" disabled value="{{$tag}}" >

                                     @endforeach
                                    
                               
                          
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" disabled value="{{ $items->page }}" placeholder=" الصفحه/ الدفتر " class="form-control">
                                  
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                            
                                    
                                    @foreach ($items->date as $tag)
                                    <input type="text"  class="form-control" disabled value="{{$tag}}" >
                                    @endforeach
                                    
                               
                             
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                  
                                    <input placeholder=" الموقف في العهده "  value="{{ $items->getSetuation() }}" disabled type="text"
                                        class="form-control">
                                
                                </div>
                            </div>

                          

                            <div class="col-md-6">
                                <div class="form-group">
                                  
                                    <div>
                                        <input type="text" placeholder="البوصله "  disabled value="{{ $items->getStatus() }}" id="description"
                                            class="form-control" >
                                      
                                    </div>
                               
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  
                                    <div>
                                        <input type="number" placeholder="الكميه"  disabled value="{{ $items->quantity }}" id="description"
                                            class="form-control" >
                                      
                                    </div>
                               
                                </div>
                            </div>


                       



                        


                        </div>


                    </form><!-- end of form -->

                </div><!-- end of tile -->

            </div><!-- end of col -->

        </div><!-- end of row -->

@endsection

@push('js')
<script>

    $(document).ready(function(){
        $("#print").click(function(){
        var myIframe = document.getElementById("real-print");
        $.print(myIframe);
        return false;
    });

    });

</script>
@endpush
