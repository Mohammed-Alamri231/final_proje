@extends('front_end.index')

@section('content')

<style>

        .boxing{
          
          overflow-x: scroll;
          /* overflow-y: scroll; */
        }
        
        
        </style>
<div class="container">
    <div class="boxing">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th class="hidden-xs" style="width:20%">{{ trans('admin.picture') }}</th>

            <th style="width:10%">{{ trans('admin.Product1') }}</th>
             <th style="width:10%">{{ trans('admin.all_quan') }}</th>

            <th style="width:10%">{{ trans('admin.Price') }}</th>
            <th style="width:8%">{{ trans('admin.Quantity') }}</th>
            <th style="width:22%" class="text-center">{{ trans('admin.Subtotal') }}</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

        <?php $total = 0;
        
        $i=0;?>

        @if(session('cart'))
            @foreach((array) session('cart') as $id => $details)

                <?php 
                $i++;
                $total += $details['price'] * $details['quantity'];
                 ?>

                <tr>
                    <td data-th="Product" class="hidden-xs">
                        {{-- <div class="row"> --}}
                            <div class="col-sm-3 "><img src="/final_proje/storage/app/public/{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                    </td>  
                    <td data-th="Product">
                            <div class="col-sm-4">
                                    <h4 class="nomargin">{{ $details['name_pro'] }}</h4>
                            </div>
                     </td>  
                    <td data-th="Product">
                            <div class="col-sm-4">
                                <h4 class="nomargin">{{ $details['all_quantity'] }}</h4>
                                <input type="hidden"  id="<?php echo "all_quantity".$i ?>" value="{{ $details['all_quantity'] }}">
                                <input type="hidden"  id="<?php echo "main_quantity".$i?>" value="{{ $details['quantity'] }}">

                            </div>
                        {{-- </div> --}}
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        {{-- value="{{ $details['quantity'] }}" min="1" max="{{ $details['all_quantity']  }}" --}}
                        <input type="number"  id="<?php echo "quantityss".$i?>" onkeyup="myfunction('<?php echo 'quantityss'.$i?>','<?php echo 'all_quantity'.$i?>','<?php echo 'main_quantity'.$i?>')" value="{{ $details['quantity'] }}" min="1" max="{{ $details['all_quantity']  }}" class="form-control quantity"  />
                    </td>
                    <td data-th="Subtotal" class="text-center">$<span class="product-subtotal">{{ $details['price'] * $details['quantity'] }}</span></td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                        <i class="fa fa-circle-o-notch fa-spin btn-loading" style="font-size:24px; display: none"></i>
                    </td>
                </tr>

         <script>
            "use strict"
           var i=1;     
                
      
                </script>
            @endforeach
        @endif

        </tbody>
        <hr>
        <tfoot>
        
        
        <tr class="visible-xs">
            <td class="text-center"><strong>{{ trans('admin.Total') }} $<span class="cart-total">{{ $total }}</span></strong></td>
        </tr>
        
       <tr>
       <td><a href="{{ url('home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>{{ trans('admin.Continue Shopping') }} </a></td>
       <td colspan="4" class="hidden-xs"></td>
       <td class="hidden-xs text-center"><strong>{{ trans('admin.Total') }} $<span class="cart-total">{{ $total }}</span></strong></td>
     @if(auth()->guard('admin')->check() && (admin()->user()->type=='admin'||admin()->user()->type=='pharmacy'))
         <td><a href="{{ url('check') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>{{ trans('admin.Cheack out') }} </a></td>
      @endif

   </tr>
</tfoot>
</table>
</div>
<span id="status" class="text-center"></span>
@endsection

@section('scripts')



<script type="text/javascript">


function myfunction(quanin,all_quanin,main_quanin){
        var quan=document.getElementById(quanin);
        var all_quan=document.getElementById(all_quanin);
        var main_quan=document.getElementById(main_quanin);

          
            var x = parseInt(quan.value,10);
            var y = parseInt(all_quan.value,10);
            var main =parseInt(main_quan.value,10);
             console.log(x+3);
            
           //alert('all_quan.value', x );
            if( y >= x )
            {

            }
           else if(Number.isNaN(x))
           {
               // quan.value=main;
           }
           else if(x >y)
           {

              quan.value=main;
              alert('avialibele quantity is');
           }
        };
       
      
        $(".update-cart").click(function (e) {
            e.preventDefault();
           
            var ele = $(this);

            var parent_row = ele.parents("tr");

            var quantity = parent_row.find(".quantity").val();

            var product_subtotal = parent_row.find("span.product-subtotal");

            var cart_total = $(".cart-total");

            var loading = parent_row.find(".btn-loading");

            loading.show();

            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: quantity},
                dataType: "json",
                success: function (response) {

                    loading.hide();

                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');

                    $("#header-bar").html(response.data);

                    product_subtotal.text(response.subTotal);

                    cart_total.text(response.total);
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            var parent_row = ele.parents("tr");

            var cart_total = $(".cart-total");

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    dataType: "json",
                    success: function (response) {

                        parent_row.remove();

                        $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');
                        // window.alert(response.msg);
                        $("#header-bar").html(response.data);

                        cart_total.text(response.total);
                    }
                });
            }
        });


    </script>
</div>
@endsection


