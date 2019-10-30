@extends('front_end.index')

@section('linker')
<style>

/*********omar adding ******/
.invalid-feedback {
    display: none;
    width: 100%;
    margin-top: .25rem;
    font-size: 80%;
    color: #dc3545;
}
</style>
@endsection
@section('content')
    <div class="loader"></div>

    <main id="main" role="main">
      
        <section id="checkout-container">
            <div class="container">
                <div class="row py-5">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">{{ trans('admin.Your cart') }}</span>
                            <span class="badge badge-secondary badge-pill">{{ session('cart')!=null?count(session('cart')):0 }}</span>
                        </h4>
                        <ul class="list-group mb-3">
                       

                        <?php $total = 0 ?>

                        <li class="list-group-item d-flex hidden-xs justify-content-between lh-condensed" >
                        <div class=" col-sm-3 "> <strong>{{ trans('admin.picture') }}  </strong></div>
                        <div class=" col-sm-2 " > <strong>{{ trans('admin.name') }}   </strong></div>
                        <div class=" col-sm-2 "><strong>{{ trans('admin.price') }}   </strong> </div>
                        <div class=" col-sm-2"><strong>{{ trans('admin.quantity') }}   </strong></div>
                        <div class=" col-sm-3 text-center"> <strong>{{ trans('admin.total') }} </strong>  </div>
                        <div class="clearfix">
                         </div>
                        </li>
            <?php  $count_pro=0; ?>
            <form method="POST"  action="{{ url('docheck')}}"   enctype="multipart/form-data">
                {{ csrf_field() }} 

                @if(session('cart'))
        
                    @foreach(session('cart') as $id=> $details)
                    <?php $total += $details['price']  * $details['quantity'];

                          $totale= $details['price']  * $details['quantity'];
                           $i=0;
                          $id_product= $details['id']  ;
                          $name=$details['name_pro'];
                          $quantity= $details['quantity'];
                          
                          $count_pro++;

                    ?>
                     
                            <li class="list-group-item d-flex justify-content-between lh-condensed" >
                            
                               <div class=" col-sm-3 col-xs-4 text-center ">

                               {{-- <span> {{ $details['id'] }} </span> --}}
                             
                               @if ($details['photo'])
                                <img src="/final_proje/storage/app/public/{{$details['photo']}}" width="80" height="80" class="img-responsive"/>
                                @endif 
                                </div> 
                                <div class=" col-sm-3 text-center" >
                                <h6 class="my-0">{{ $details['name_pro'] }}</h6>
                               </div>
                                <!--  input hidden-->
                                <div>
                             
                                </div>
                                <div class=" col-sm-2 text-center ">
                                <span class="text-muted">${{ $details['price'] }}</span>
                                </div>
                                <div class=" col-sm-1 text-center">
                                <span class="text-muted"> <strong> {{ $details['quantity'] }} </strong> </span>
                                </div>
                                <div class=" col-sm-2 text-center ">
                                <span class="text-muted">  ${{ $details['price'] * $details['quantity'] }}</span>
                                </div>
                                <input type="hidden" name="<?php echo "id_product".$count_pro ?>" value="{{ $details['id']  }}">
                                <input type="hidden" name="<?php echo "quantity".$count_pro ?>" value=" {{   $details['quantity'] }} ">
                                <input type="hidden" name="<?php echo "total".$count_pro ?>" value=" {{ $totale }}">
                                <input type="hidden" name="<?php echo "name_pro".$count_pro ?>" value="{{ $details['name_pro']  }}">
                                <input type="hidden" name="<?php echo "all_quantity".$count_pro ?>" value="{{ $details['all_quantity'] }} ">
                                <input type="hidden" name="<?php echo "id_stock".$count_pro ?>" value=" {{ $details['id_stock'] }} ">
                                <input type="hidden" name="<?php echo "weight".$count_pro ?>" value=" {{ $details['weight']  }} "> 
                                <input type="hidden" name="<?php echo "id_comp".$count_pro ?>" value="{{ $details['id_comp']  }} ">
                                  
                              

                   
                           <div class="clearfix">
                           </div>
                            </li>
                  <?php // $count_pro+=1;
                   
                   ?>
                @endforeach
                <?php 
                    //  echo "the count is ". $count_pro;
           
                   ?>
           @endif

            <input type="hidden" name="count_pro"  value=" {{$count_pro }}">
                  <!--<input type="hidden" name="id_pharm"  value="{{admin()->user()->id }}">--> 
                
              
         
                            <li class="list-group-item d-flex justify-content-between">
                                <span>{{ trans('admin.Count :') }}   </span>
                                <strong>{{ $count_pro }}</strong>
                                <span>{{ trans('admin.Total :') }}  </span>
                                <strong>${{ $total }}</strong>
                            </li>
                        </ul>
                      
                        {{-- <div class="payment-methods">
                            <p class="pt-4 mb-2">Payment Options</p>
                            <hr>
                            <ul class="list-inline d-flex">
                                <li class="mx-1 text-info">
                                    <i class="fa-2x fa fa-cc-visa"></i>
                                </li>
                                <li class="mx-1 text-info">
                                    <i class="fa-2x fa fa-cc-stripe"></i>
                                </li>
                                <li class="mx-1 text-info">
                                    <i class="fa-2x fa fa-cc-paypal"></i>
                                </li>
                                <li class="mx-1 text-info">
                                    <i class="fa-2x fa fa-cc-jcb"></i>
                                </li>
                                <li class="mx-1 text-info">
                                    <i class="fa-2x fa fa-cc-discover"></i>
                                </li>
                                <li class="mx-1 text-info">
                                    <i class="fa-2x fa fa-cc-amex"></i>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                    <div class="col-md-8 order-md-1">
                    <?php /*{{$count_pro}} */ ?>
                        <h4 class="mb-3">{{ trans('admin.Billing address') }} </h4>
                        <!--here is plase of start form -->
                 
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">{{ trans('admin.First name') }} </label>
                                    <input type="text" class="form-control" name="firstName" placeholder="{{ trans('admin.required') }}" value="" >
                                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">{{ trans('admin.Last name') }} </label>
                                    <input type="text" class="form-control" name="lastName" placeholder="{{ trans('admin.required') }}" value="" >
                                    
                                </div>
                            </div>

                           <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="username">{{ trans('admin.Username') }} </label>
                                    {{-- @if(auth()->guard('admin')->check() && admin()->user()->type=='pharmacy') --}}

                                        <input type="text" class="form-control" name="username" id="username" value="{{admin()->user()->name}}" placeholder="{{ trans('admin.required') }}" >
                                    {{-- @endif --}}
                                    
                                </div>
                             <!-- her this adding hidden-->
                             
                                <div class="col-md-6 mb-3">
                                    <label for="phonenumber">{{ trans('admin.Phone number') }} </label>
                                   
                                        <input type="integer" class="form-control" id="phonenumber" name="phone" placeholder="{{ trans('admin.required') }}" >
                                        <div class="invalid-feedback" style="width: 100%;">
                                            {{ trans('admin.Your phone number is required.') }} 
                                        </div>
                                   
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">{{ trans('admin.Email') }} 
                                    <span class="text-muted">{{ trans('admin.(Optional)') }} </span>
                                </label>
                                {{-- @if(auth()->guard('admin')->check() && admin()->user()->type=='pharmacy') --}}
                                <input type="email" class="form-control" name="email" id="email" value="{{admin()->user()->email}}" placeholder="{{ trans('admin.required') }}">
                                {{-- @endif --}}
                            </div>

                            <div class="mb-3">
                                <label for="address">{{ trans('admin.Address') }} </label>
                                {{-- @if(auth()->guard('admin')->check() && admin()->user()->type=='pharmacy') --}}

                                <input type="text" class="form-control" id="address" placeholder="{{ trans('admin.required') }}" >
                                {{-- @endif --}}
                            </div>

                            <div class="mb-3">
                                <label for="address2">{{ trans('admin.Address 2') }} 
                                    <span class="text-muted">{{ trans('admin.(Optional)') }}</span>
                                </label>
                                <input type="text" class="form-control" id="address2" name="distance" placeholder="{{ trans('admin.required') }}">
                            </div>
                            {{-- <button type="submit" class="btn btn-primary">go</button> --}}

        {{-- </form> --}}

    {{-- <form> --}}
                            

                            
                            <hr class="mb-4">
                            {{-- <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="same-address">
                                <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                            </div> --}}
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="save-info">
                                <label class="custom-control-label" for="save-info">{{ trans('admin.Save this information for next time') }} </label>
                            </div>
                            <hr class="mb-4">

                            <h4 class="mb-3">{{ trans('admin.Delivery') }} </h4>

                            
                            <div class="custom-control custom-radio">
                                <input id="paypal" name="paymentMethod" type="checkbox" class="custom-control-input" value="check" >
                                <label class="custom-control-label" for="othore">{{ trans('admin.with delivery') }}  </label>
                            </div>
                            <hr class="mb-4">
                            
                            <h4 class="mb-3">{{ trans('admin.Payment') }} </h4>

                            
                                <div class="custom-control custom-radio">
                                    <input id="paypal" name="paymentMethod" type="checkbox" class="custom-control-input" value="check" >
                                    <label class="custom-control-label" for="othore">{{ trans('admin.when I resive') }}  </label>
                                </div>
                            <hr class="mb-4">
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cc-name">Name on card</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                    <small class="text-muted">Full name as displayed on card</small>
                                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cc-number">Credit card number</label>
                                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">Expiration</label>
                                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                    
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">CVV</label>
                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                    
                                </div>
                            </div>
                            <hr class="mb-4">
                            <!--btn-lg btn-block   <i class="fa fa-credit-card"></i>  -->
                            --}}
                            {{-- @if(auth()->guard('admin')->check() && admin()->user()->type=='pharmacy') --}}

                            <button class="btn btn-primary col-xs-4 col-xs-offset-4 " type="submit">{{ trans('admin.Continue to checkout') }}    </button>
                            {{-- @endif --}}

                            {{-- @if(!auth()->guard('admin')->check() && !admin()->user()->type=='pharmacy') --}}
                             
                            {{-- <div class="info">
                                <h2>
                                    to continue checkout please registring 
                                </h2>
                            </div> --}}
                            {{-- @endif --}}
                        </form>
                    </div>
                </div>
            </div>
        </section>
   
      
    </main>
   
@endsection

