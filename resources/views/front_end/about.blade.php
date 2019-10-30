@extends('front_end.index')
@section('content')
<style>

.our_team1  
{
    background-color: #e9f0fd;
    margin-bottom:-20px;
}
</style>

    <section class="our_team1 text-center">
        <div class="pack">
            <div class="container5">
              
                <div class="titie-section wow fadeInDown animated ">
                    <h1>{{ trans('admin.Team preduce') }}</h1>
         </div>
           <div style=" height:20px;">
           </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">  
                        <div class="person">
                        <img style="border-radius:50%;"src="{{url('/')}}/mart/images/111.jpg" class="img-circal" alt="">
                            <h2>{{ trans('admin.Eng.Bin Modied') }}</h2>
                            <p>{{ trans('admin.description_preson') }}  </p>
                        </div>
                   </div>
                   <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="person">
                        <img style="border-radius:50%;"src="{{url('/')}}/mart/images/111.jpg" class="img-circal" alt="">
                                <h2>{{ trans('admin.Eng.Fahad Hudnah') }}</h2>
                                <p>{{ trans('admin.description_preson1') }}  </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="person">
                        <img style="border-radius:50%;"src="{{url('/')}}/mart/images/111.jpg" class="img-circal" alt="">
                                <h2>{{ trans('admin.Eng.Abood') }}</h2>
                                <p>{{ trans('admin.description_preson2') }}</p>
                        </div>  
                  </div>   
                </div>
            </div>
        </div>

    </section>
    @endsection




    
    