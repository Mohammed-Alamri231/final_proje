@extends('front_end.index')
@section('content')

<style>

/**/
.adver_info 
{
	margin-top: 60px;
	padding-top: 1px;
	background-color: #e9f0fd;
	color: white;
    padding-right:10px;
    padding-left:10px;
    width:100%;
}
.adver_info .adver_content
{
	border-radius: 10px;
	box-shadow: -1px 1px 5px #000000 ;
	margin-right: 5px;
	margin-bottom: 30px;
	background-color:#e9f0fd;
	padding-top: 20px;
	padding-bottom: 20px;
	padding-left: 10px;
}
.adver_info .adver_content >input
{
	display: block;
	margin: 5px;
	padding: 8px;
	color: #000000;
	border-style: none;
	border-bottom-width: 0.5px;
	border-bottom-style: solid;

}
.adver_info .butens
{
	text-align: center;
	margin-bottom: 30px;

}
.adver_info .butens > button
{
	color: #000000;
	margin: 10px;
	padding: 8px;
	
}

/**/
/*the thired page delivery*/

.price
{
	background-color: #e9f0fd;
	padding-top: 20px;
	padding-bottom: 40px;
    padding-right:10px;
    padding-left:10px;
    width:100%;

}
.price h1
{
	margin-top: 10px;
	/*font-style: bold;*/
	/*font-size: 20px;*/
	margin-bottom: 30px;
}
.price .del
{
	background-color: #fff;
	padding: 10px;
	margin-bottom:10px;
	border-radius: 8px;
	box-shadow: -1px 1px 5px #000000 ;
}

.price .del h4
{

	font-style: bold;
	font-size: 16px;
	margin-bottom: 5px;
	
	
}
.price .del:hover p
{
	transform: scale(1.1,1.1) rotate(360deg) ;
	border: 1px solid #008800;
}
.price .del p
{
	width: 80px;
	height: 80px;
	line-height: 80px;
	border-radius: 50px;
	color: #000000;
	font-size: 18px;	
	margin: 0 33.33% 0 33.33%;
	background-color: #ccc;
	transition-duration: 0.7s;

}
.price .del ul
{
	color: #000000;
	margin: 10px 0 10px;
	line-height: 2.5em;
}
.price .del a
{
	margin-bottom: 10px;
}

</style>


<section class="price text-center">
        <div class="container">
        <div class="titie-section wow fadeInDown animated ">
                    <h1>{{ trans('admin.Price Delivery') }}</h1>
         </div>
           <div style=" height:20px;">
           </div>
            <div class="row ">
               @foreach ($distances as $distanc)
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="del ">
                        <h4 class="text-success"><strong>{{ trans('admin.Distance') }} </strong> </h4>
                        <p>${{ $distanc['price'] }}</p>
                        <ul class="list-unstyled">
                            <li>{{ trans('admin.distanc start :') }}{{ $distanc['start_at'] }} {{ trans('admin.km') }}</li>
                            <li>{{ trans('admin.distanc end :') }}{{ $distanc['end_at'] }} {{ trans('admin.km') }} </li>
                            <li>{{ trans('admin.details') }}</li>
                        </ul>
                        <a href="#" class="btn btn-info">{{ trans('admin.show more') }}</a>
                    </div>     
                </div>
              @endforeach

              @foreach ($weights as $distanc)
              <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="del ">
                      <h4 class="text-success"><strong>{{ trans('admin.Weight') }}</strong> </h4>
                      <p>${{$distanc['price'] }}</p>
                      <ul class="list-unstyled">
                          <li>{{ trans('admin.distanc start :') }}{{ $distanc['from_is'] }}{{ trans('admin.km') }} </li>
                          <li>{{ trans('admin.distanc end :') }}{{ $distanc['to_is'] }}{{ trans('admin.km') }} </li>
                          <li>{{ trans('admin.details') }}</li>
                      </ul>
                      <a href="#" class="btn btn-info">{{ trans('admin.show more') }}</a>
                  </div>     
              </div>
            @endforeach
              
             
                  
            </div>
        </div>
     </section>

     <section class="price text-center">
            <div class="container">
            <div class="titie-section wow fadeInDown animated ">
                    <h1>{{ trans('admin.Price Adverstaetments') }}</h1>
                </div>
                <div style=" height:20px;">
           </div>
                <div class="row">
                    <?php $ads=1; ?>
                 @for($das=1; $ads<5; $ads++)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="del ">
                            <h4 class="text-success"><strong>{{ trans('admin.In crousel') }} </strong> </h4>
                            <p>$15</p>
                            <ul class="list-unstyled">
                                <li>{{ trans('admin.under entry...') }} </li>
                                <li>{{ trans('admin.under entry...') }} </li>
                                <li>{{ trans('admin.under entry...') }} </li>
                             
                            </ul>
                            <a href="#" class="btn btn-info">{{ trans('admin.show more') }}</a>
                        </div>     
                    </div>
                 @endfor

                    
                </div>
            </div>
         </section>
    
    <!--end codding body -->


@endsection