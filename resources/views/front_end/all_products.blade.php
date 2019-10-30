@extends('front_end.index')

@section('content')

<section class="best-seller-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titie-section wow fadeInDown animated ">
                    <h1>{{ trans('admin.ALL PRODUCTS') }}</h1>
                </div>
            </div>
        </div>
        <div class="row">
        <?php  $delay=0.1; 
        $i=0;
        ?>
        @foreach($products as $product)
        <?php $i++?>
        <div class="col-md-3 col-sm-6 col-xs-10 col-sm-offset-0 col-xs-offset-1  wow fadeInDown animated" data-wow-delay="<?php  echo $delay."s";?>">
            <div  class="product-item ">
            @if ($product->photo)
                <img src="/final_proje/storage/app/public/{{$product->photo}}" class="img-responsive" width="255" height="322" alt="">
            @endif          
                <div class="product-hover">
                    <div class="product-meta">
                         <a href="#"><i class="pe-7s-like"></i></a>
                        <a href="#"><i class="pe-7s-shuffle"></i></a> 
                        <a href="#" onclick="document.getElementById('<?php echo'id01'.$i ?>').style.display='block'" ><i class="pe-7s-clock"></i></a>
                        <a href="javascript:void(0);" data-id="{{ $product->id }}" class="btn add-to-cart" role="button"><i class="pe-7s-cart"></i>{{ trans('admin.Add to Cart') }}</a>
                        {{-- <a href="{{ url('admin/add-to-cart/'.$product->id) }}"><i class="pe-7s-cart"></i>Add to Cart</a> --}}
                    </div>
                </div>
                <div class="product-title">
                    <a href="#">
                         <h3>{{ $product['title'] }}</h3>
                        <span>${{ $product['price'] }}</span>
                    </a>
                </div>
            </div>
        </div>
    
               

               <!-- The Modal -->
               <div id='<?php echo 'id01'.$i ?>' class="modal">
                <span onclick="document.getElementById('<?php echo 'id01'.$i ?>').style.display='none'"
                class="close" title="Close Modal">&times;</span>

                <!-- Modal Content -->
                <form class="modal-content animate" action="">
                    <div class="col-md-4 hidden-xs">
                    <img src="/final_proje/storage/app/public/{{$product->photo}}" class="img-responsive" width="270" height="360" alt="">
                   
                    </div>

                    <div class="container">
                     
                     <div class="col-md-2"> 
                             <h3> Name : <strong> {{ $product['title'] }} </strong></h3>
                             <br>
                            <span> Price :<strong>${{ $product['price'] }} </strong></span>
                            <br>
                            <h3> Stor Quantity:<strong> {{ $product['quantity'] }} </strong></h3>
                            <br>
                     </div>
                     
                      <div class="col-md-3" >
                      <h3> Short Description: {{ $product['content'] }} </h3>
                      </div>
                    </div>
                </form>
                </div> 
                      
                <script>
                // // Get the modal
                // var modal = document.getElementById('<?php echo 'id01'.$i ?>');

                // // When the user clicks anywhere outside of the modal, close it
                // window.onclick = function(event) {
                //     if (event.target == modal) {
                //         modal.style.display = "none";
                //     }
                // }
                </script>

                
                    
   <?php  $delay +=0.1; ?>


         @endforeach
 
    </div>

    <div class="row">
        <?php  $delay=0.1; 
        $i=0;
        ?>
        @foreach($products as $product)
        <?php $i++?>
            <div class="col-md-3 col-sm-6 col-xs-10 col-sm-offset-0 col-xs-offset-1  wow fadeInDown animated" data-wow-delay="<?php  echo $delay."s";?>">
                <div  class="product-item ">
                @if ($product->photo)
                    <img src="/final_proje/storage/app/public/{{$product->photo}}" class="img-responsive" width="255" height="322" alt="">
                @endif          
                    <div class="product-hover">
                        <div class="product-meta">
                             <a href="#"><i class="pe-7s-like"></i></a>
                            <a href="#"><i class="pe-7s-shuffle"></i></a> 
                            <a href="#" onclick="document.getElementById('<?php echo'id01'.$i ?>').style.display='block'" ><i class="pe-7s-clock"></i></a>
                            <a href="javascript:void(0);" data-id="{{ $product->id }}" class="btn add-to-cart" role="button"><i class="pe-7s-cart"></i>{{ trans('admin.Add to Cart') }}</a>
                            {{-- <a href="{{ url('admin/add-to-cart/'.$product->id) }}"><i class="pe-7s-cart"></i>Add to Cart</a> --}}
                        </div>
                    </div>
                    <div class="product-title">
                        <a href="#">
                             <h3>{{ $product['title'] }}</h3>
                            <span>${{ $product['price'] }}</span>
                        </a>
                    </div>
                </div>
            </div>
        
                   

                   <!-- The Modal -->
                   <div id='<?php echo 'id01'.$i ?>' class="modal">
                    <span onclick="document.getElementById('<?php echo 'id01'.$i ?>').style.display='none'"
                    class="close" title="Close Modal">&times;</span>

                    <!-- Modal Content -->
                    <form class="modal-content animate" action="">
                        <div class="col-md-4 hidden-xs">
                        <img src="/final_proje/storage/app/public/{{$product->photo}}" class="img-responsive" width="270" height="360" alt="">
                       
                        </div>

                        <div class="container">
                         
                         <div class="col-md-2"> 
                                 <h3> Name : <strong> {{ $product['title'] }} </strong></h3>
                                 <br>
                                <span> Price :<strong>${{ $product['price'] }} </strong></span>
                                <br>
                                <h3> Stor Quantity:<strong> {{ $product['quantity'] }} </strong></h3>
                                <br>
                         </div>
                         
                          <div class="col-md-3" >
                          <h3> Short Description: {{ $product['content'] }} </h3>
                          </div>
                        </div>
                    </form>
                    </div> 
                          
                    <script>
                    // // Get the modal
                    // var modal = document.getElementById('<?php echo 'id01'.$i ?>');

                    // // When the user clicks anywhere outside of the modal, close it
                    // window.onclick = function(event) {
                    //     if (event.target == modal) {
                    //         modal.style.display = "none";
                    //     }
                    // }
                    </script>

                    
                        
       <?php  $delay +=0.1; ?>

         @endforeach
 
    </div>
   
</section>

<!-- Button to open the modal login form -->



@endsection



@section('scripts')

    <script type="text/javascript">
        $(".add-to-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            ele.siblings('.btn-loading').show();

            $.ajax({
                url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
                method: "get",
                data: {_token: '{{ csrf_token() }}'},
                dataType: "json",
                success: function (response) {

                    ele.siblings('.btn-loading').hide();

                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');
                    $("#header-bar").html(response.data);
                }
            });
        });
    </script>

@stop






