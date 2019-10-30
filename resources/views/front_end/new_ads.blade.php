@extends('front_end.index')
@section('content')

                          

                        
<section class="best-seller-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titie-section wow fadeInDown animated ">
                 
                    <h1>{{ trans('admin.note_pro') }} </h1>
                </div>
            </div>
        </div>
        <div class="row">

        <form method="POST"  action="{{ url('make_new')}}"   enctype="multipart/form-data">
          {{ csrf_field() }} 
        <?php  $delay=0.1; 
        $i=0;
        ?>
          @foreach($ads as $product)
          <?php  $i++; ?>
            <div class="col-md-3 col-sm-6 col-xs-10 col-sm-offset-0 col-xs-offset-1 wow fadeInDown animated" data-wow-delay="<?php  echo $delay."s";?>">
                <div class="product-item">
                    <div class="product-hover">
                        <div class="product-meta">
                            <a href="#"><i class="pe-7s-like"></i></a>
                            <a href="#" onclick="
                                                document.getElementById('name_pro').value = document.getElementById('<?php echo 'name_pro'.$i ?>').value
                                                document.getElementById('id_product').value = document.getElementById('<?php echo 'id_product'.$i ?>').value
                                                document.getElementById('base_price').value = document.getElementById('<?php echo 'price'.$i ?>').value 
                            "><i class="pe-7s-shuffle"></i></a>
                            <a href="#" onclick="document.getElementById('<?php echo'id01'.$i ?>').style.display='block'" ><i class="pe-7s-clock"></i></a>
                            <a href="{{ url('add-to-cart/'.$product->id) }}"><i class="pe-7s-cart"></i>{{ trans('admin.Add to Cart') }}</a>
                        </div>
                    </div>
                    @if ($product->photo)
                    <img src="/final_proje/storage/app/public/{{$product->photo}}" class="img-responsive" width="255" height="322" alt="">
                   @endif 
                    <div class="product-title">
                        <a href="#">
                             <h3>{{ $product->title }}</h3>
                            <span>${{ $product->price }}</span>
                        </a>
                    </div>
                </div>
            </div>
            <input type="hidden" id="<?php echo "id_product".$i ?>" name="<?php echo "id_product".$i ?>" value="{{ $product->id }}">
            <input type="hidden" id="<?php echo "name_pro".$i ?>" name="<?php echo "name_pro".$i ?>" value="{{ $product->title }}">
            <input type="hidden" id="<?php echo "price".$i ?>" name="<?php echo "price".$i ?>" value="{{ $product->price }}">
             <?php  $delay +=0.1; ?>

         @endforeach
   </div>
                        <div class="row ">
                            <div class="col-md-6 mb-3">
                                <label for="id_product">{{ trans('admin.No product') }}</label>
                                <input type="text" class="form-control" id="id_product" name="id_product" >
                         
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="name_pro">{{ trans('admin.Name Product') }}</label>
                                <input type="text" class="form-control" id="name_pro" name="name_pro" value="">
                             
                            </div>

                         </div>
                         
                            <div class="row">
                            <div  class="col-md-3 mb-3">
                                <label for="base_price">{{ trans('admin.Base price') }}</label>
                                <input type="text" class="form-control" id="base_price" >
                                
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="ofer_price">{{ trans('admin.offer price') }}</label>
                                <input type="text" class="form-control" id="ofer_price" name="price_offer"  placeholder="" required>
                                
                            </div>
                         
                            <div class="col-md-3 mb-3">
                                <label for="start_date">{{ trans('admin.Start Date') }}</label>
                                <input type="date"   class="form-control" id="start_offer_at" name="start_offer_at"   placeholder="" required>
                                
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="end_date">{{ trans('admin.End Date') }}</label>
                                <input type="date"  class="form-control" id="end_offer_at" name="end_offer_at"  placeholder="" required>
                                
                            </div>
                         </div>
                        
                        <hr class="mb-4">
                        <div  class="col-md-12 mb-6  text-center">
                        <button class="btn btn-success " type="submit">{{ trans('admin.Make a new Ads') }}  </button>
                        </div>
        </form>
    </section>
@endsection