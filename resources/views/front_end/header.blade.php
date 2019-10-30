<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
    @if (!empty($meta_title)) {{ $meta_title }}     
   @else Medicines Store @endif
 </title>
   @if (!empty($meta_description))
   <meta name="description" content="{{ $meta_description }}">      
   @endif
    @if (!empty($meta_keywords))
   <meta name="keywords" content="{{ $meta_keywords }}">      
   @endif
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="icon" href="{{url('/')}}/mart/images/favicon.png">

    <link rel="stylesheet" href="{{url('/')}}/mart/css/style.css">
    <!--Font Awesome  for checkout 
    -->
    
 <link rel="stylesheet" href="{{url('/')}}/dist/font-awesome/css/font-awesome.min.css" />
 <!-- Custom CSS -->
 
 
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  @if (lang()=='ar')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">  
    @endif
 {{-- <!--just adding for cart--> 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 <!-- just adding for cart
    [if lt IE 9]> -->
    <script src="{{url('/')}}/mart/html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script>window.html5 || document.write('<script src="{{url('/')}}/mart/js/vendor/html5shiv.js"><\/script>')</script>
    <![endif]
     --}}
   
</head>
