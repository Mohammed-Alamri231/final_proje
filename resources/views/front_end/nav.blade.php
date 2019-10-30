<style>


  /*** for regesration dropdown withe hover ***/
  li.dropdown {
      display: inline-block;
  }

  .dropdown-content {
      display: none;
      position: absolute;
      background-color: #1abc9c;
      min-width: 120px;
      /* box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); */
      z-index:1;

  }



  /* .dropdown-content a:hover {background-color: #e9f0fd} */

  .dropdown:hover .dropdown-content {
      display: block;
  }
  </style>

  <body>


  <div id="preloader">
      <div class="preloader-area">
          <div class="preloader-box">
              <div class="preloader"></div>
          </div>
      </div>
  </div>


  <section class="header-top-section">
      <div class="container">
          <div class="row">
              <div  class="col-md-6 hidden-xs">
                  <div class="header-top-content">
                      <ul class="nav nav-pills navbar-left">
                          <li><a href="#"><i class="pe-7s-call"></i><span>+967-735152506</span></a></li>
                          <li><a href="#"><i class="pe-7s-mail"></i><span>{{ setting()->email }}</span></a></li>
                      </ul>
                  </div>
              </div>
              <div  class="col-md-6">
                  <div class="header-top-menu">
                      <ul class="nav nav-pills navbar-right">

                          {{-- <li class="dropdown user user-menu">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-globe"></i>
                                <span class="hidden-xs"> </span>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="{{ aurl('lang/ar') }}"><i class="fa fa-flag"></i> عربى</a></li>
                                <li><a href="{{ aurl('lang/en') }}"><i class="fa fa-flag"></i> English</a></li>
                              </ul>
                            </li> --}}
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropbtn"><i class="fa fa-globe"></i></a>
                                <div class="dropdown-content">
                                    <a href="{{ aurl('lang/ar') }}"><i class="fa fa-flag"></i> عربى</a>
                                    <a href="{{ aurl('lang/en') }}"><i class="fa fa-flag"></i> English</a>
                                </div>
                              </li>

                      @if(auth()->guard('admin')->check())
                          <li><a href=""> {{ trans('admin.Wellcome :') }} {{ admin()->user()->name}}</a></li>
                          @endif

                         @if(auth()->guard('admin')->check() && (admin()->user()->type=='admin'||admin()->user()->type=='pharmacy'))
                         <li><a href="{{url('check')}}">{{ trans('admin.Checkout') }}</a></li>
                         @endif


                         @if(auth()->guard('admin')->check())
                         <li><a href="{{url('logout')}}">{{ trans('admin.sign_out') }}</a></li>
                         @endif

                         @if(!auth()->guard('admin')->check())
                          <li > <a data-toggle="modal" data-target="#myModal" href="#" >{{ trans('admin.sign_in') }}  </a> </li>

                        <li class="dropdown">
                          <a href="javascript:void(0)" class="dropbtn">{{ trans('admin.register') }}</a>
                          <div class="dropdown-content">
                            <a href="company">{{ trans('admin.company') }}</a>
                            <a href="pharmacy" >{{ trans('admin.pharmacy') }}</a>
                          </div>
                        </li>
                        @endif

                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <header class="header-section">
      <nav class="navbar navbar-default">
          <div class="container">
              <!-- Brand and toggle get grouped for better mobile display  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" -->
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" id="topkk" onclick="myFunction()" >
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  @if (lang()=='ar')
                  <a class="navbar-brand" href="#"> <b>{{ trans('admin.S') }}</b>{{ trans('admin.tore') }} <b>{{ trans('admin.M') }}</b>{{ trans('admin.edicines') }}</a>
                  @elseif(lang()=='en')
                  <a class="navbar-brand" href="#"><b>{{ trans('admin.M') }}</b>{{ trans('admin.edicines') }} <b>{{ trans('admin.S') }}</b>{{ trans('admin.tore') }}</a>
                  @endif
              </div>

              <!-- Collect the nav links, forms, and other content for toggling  navbar-collapse collapse show in //id="bs-example-navbar-collapse-1"  style aria-expanded="true"-->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                      <li class=""><a href="{{url('home')}}">{{ trans('admin.Home') }}</a></li>
                      <li><a href="{{ url('all_products')}}">{{ trans('admin.Product') }}</a></li>
                      <li><a href="{{ url('service')}}">{{ trans('admin.Service') }}</a></li>

                    <li class="dropdown" id="ads">
                      {{-- {{ trans('admin.Advertistement') }} --}}
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"  >{{ trans('admin.Advertistement') }}
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu" id="dd">
                    <li><a href="{{url('ads')}}">{{ trans('admin.all Ads') }} </a></li>
                    @if(auth()->guard('admin')->check() && admin()->user()->type=='company')
                    <li><a href="{{url('new_ads')}}/{{admin()->user()->id_type}}">{{ trans('admin.make a new') }} make a new </a></li>
                    @endif

                    </ul>

                  </li>
                    @if(auth()->guard('admin')->check() && admin()->user()->type=='pharmacy')
                      <li><a href="{{ aurl('update_order')}}">{{ trans('admin.review order') }}</a></li>
                      @endif


{{--
                      @if(auth()->guard('admin')->check() && (admin()->user()->type=='admin'||admin()->user()->type=='company'))
                         <li><a href="{{url('admin')}}">{{ trans('admin.Dashbord') }}</a></li>
                         <li><a href="{{url('accepting_comp')}}">{{ trans('admin.A.C') }}</a></li>
                         <li><a href="{{url('accepting_pharm')}}">{{ trans('admin.A.P') }}</a></li>

                      @endif --}}
                      @if(auth()->guard('admin')->check() && admin()->user()->type=='admin')

                      <li class="dropdown" id="add">
                        {{-- {{ trans('admin.Advertistement') data-target="myJsFunc()" }} --}}
                      <a class="dropdown-toggle"  data-toggle="dropdown" href="#" >{{ trans('admin.additional') }}
                      <span class="caret"></span></a>
                      <ul class="dropdown-menu" >
                        <li><a href="{{url('admin')}}">{{ trans('admin.Dashbord') }}</a></li>
                        <li><a href="{{url('accepting_comp')}}">{{ trans('admin.Accspting Company') }}</a></li>
                        <li><a href="{{url('accepting_pharm')}}">{{ trans('admin.Accspting Pharmacy') }}</a></li>

                      </ul>

                    </li>
                    @endif
                    <li><a href="{{url('about')}}">{{ trans('admin.About Us') }}</a></li>
                    <li><a href="{{url('help')}}">{{trans('admin.help')}}</a></li>
                  </ul>

                  <ul class="nav navbar-nav navbar-right cart-menu">
                     <li><a href="#" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                      <!-- {{-- <li><a href="{{url('cart')}}"><span> Cart </span> <span class="shoping-cart">{{ session('cart')!=null?count(session('cart')):0 }}</span></a></li>
                      {{ --<divclass="row"id="header-bar">-- }} --}} -->
                       <li id="header-bar"> @include('front_end._header_cart')</li>

                    </ul>
              </div><!-- /.navbar-collapse -->

          </div><!-- /.container -->
          <!-- addding loooooook at   -->
          {{-- <div class="dropdown-menu">
                      <div class="row total-header-section"> --}}
                         {{-- < <div class="col-lg-6 col-sm-6 col-6"> --}}
                              {{-- <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ session('cart')!=null?count(session('cart')):0 }}</span>
                          </div> --}}


          <!--   addding loooooook at  -->
      </nav>
  </header>

  <section class="search-section">
      <div class="container">
          <div class="row subscribe-from">
              <div class="col-md-12">
              <form class="form-inline col-md-12 wow fadeInDown animated" action="{{ url('search_product') }}" method="post">
                  {{--  <form action="{{ url('/search_product') }}" method="post">  --}}
                  {{ csrf_field() }}
                      <div class="form-group">
                          <input type="search" class="form-control subscribe" autocomplete="on" autofocus="on"  name="product" placeholder="{{ trans('admin.Search prodcut') }}">
                          @if (lang() == 'en')
                          <button type="submit" class="suscribe-btn" ><i class="pe-7s-search"></i></button>
                          @endif
                      </div>
                  {{--  </form>      --}}
                  </form><!-- end /. form -->
              </div>
          </div><!-- end of/. row -->
      </div><!-- end of /.container -->
  </section><!-- end of /.news letter section -->

        <!-- Modal-->
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content" style="  width: 90%;">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">{{ trans('admin.Signin Modal') }}</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">

                              <form  method="post"  action="{{ url('login')}}" >
                                {{ csrf_field() }}
                                <div class="form-group">
                                  <label>{{ trans('admin.Email') }}</label>
                                  <input type="email" name="email" placeholder="{{ trans('admin.Email Address') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>{{ trans('admin.Password') }}</label>
                                  <input type="password" name="password" placeholder="{{ trans('admin.Password') }}" class="form-control">
                                </div>
                                <div class="form-group">

                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-secondary">{{ trans('admin.Close') }}</button>
                                <button type="submit"  class="btn btn-primary">{{ trans('admin.Sing In') }}</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

         <script type="text/javascript" >
              /* When the user clicks on the button,
              toggle between hiding and showing the dropdown content */
              function myFunction() {
                  document.getElementById("myDropdown").classList.toggle("show");
              }

              // Close the dropdown if the user clicks outside of it
              window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {

                  var dropdowns = document.getElementsByClassName("dropdown-content");
                  var i;
                  for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                      openDropdown.classList.remove('show');
                    }
                  }
                }
           }

                  function myFunction() {
                          var x = document.getElementById("bs-example-navbar-collapse-1");
                          var y = document.getElementById("topkk");

                          if (x.className === "collapse navbar-collapse") {
                              x.className = " collapse navbar-collapse show in";
                              y.className ="navbar-toggle";
                              // y.setAttribute( style aria-expanded="true");
                          } else {
                              x.className = "collapse navbar-collapse";
                              y.className ="navbar-toggle collapsed";

                          }
                      }


                      // function myJsFun() {

                      //           var f = document.getElementById("ads");
                      //           var dd = document.getElementById("dd");

                      //           if (f.className === "dropdown show open" || f.className === "dropdown show" || f.className === "dropdown open show" || f.className === "dropdown open") {
                      //               f.className = "dropdown";
                      //               dd.className = "dropdown-menu";
                      //           } else {
                      //               f.className = "dropdown show";

                      //           }

  </script>
