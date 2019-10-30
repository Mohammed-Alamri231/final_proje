{{-- 
    <!--<a href="#" class="btn btn-success scrollUp">
            <i class="fa fa-arrow-circle-o-up"></i>
        </a>

        -->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="titie-section wow fadeInDown animated ">
                    <h1>{{ trans('admin.GET IN TOUCH') }}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 wow fadeInLeft animated">
                <div class="left-content">
                @if(lang() =='ar')
                <h1><span>{{ trans('admin.S') }}</span>{{ trans('admin.tore') }} <span>{{ trans('admin.M') }}</span>{{ trans('admin.edicines') }} </h1>
                
                @elseif(lang() == 'en')
                <h1><span>{{ trans('admin.M') }}</span>{{ trans('admin.edicines') }} <span>{{ trans('admin.S') }}</span>{{ trans('admin.tore') }}</h1>  
                
                @endif
                    <h3>{{ trans("admin.We'd love To Meet You In Person Or Via The Web!") }}</h3>
                    <p>{{ trans('admin.descri_footer') }}</p>
                    <div class="contact-info">
                     @if (lang()=='ar')
                        <p><b>{{ trans('admin.Main Office:') }} : </b>{{ trans('admin.street') }}</p>
                        <p>  <b>{{ trans('admin.Phone:') }}</b></p>
                            <p>711080822 - 773700413 - 715529957 - 775736304</p>
                        <p> <b>{{ trans('admin.Email:') }} :</b> {{ setting()->email }} </p>                       
                    @endif

                    @if (lang()=='en')
                        <p><b>{{ trans('admin.Main Office:') }}</b>{{ trans('admin.street') }}</p>
                        <p><p><b>{{ trans('admin.Phone:') }}</b> 711080822 - 773700413 - 715529957 - 775736304 </p>
                        <p><b>{{ trans('admin.Email:') }}</b>{{ setting()->email }}</p>                       
                    @endif
                    </div>
                    <div class="social-media">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                     
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow fadeInRight animated">
                <form action="{{ url('touch') }}" method="POST" class="contact-form"  enctype="multipart/form-data">
                    {{ csrf_field() }} 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="fname" class="form-control" id="name" placeholder="{{ trans('admin.First Name') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text"  name="lname" class="form-control" id="name" placeholder="{{ trans('admin.Last Name') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text"  name="subject" class="form-control" id="name" placeholder="{{ trans('admin.Subject') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input name="email"  type="email" class="form-control" id="name" placeholder="{{ trans('admin.Your Email') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <textarea  name="message" id="" class="form-control" cols="30" rows="5" placeholder="{{ trans('admin.Your Message...') }}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="submit" class="contact-submit" value="{{ trans('admin.SEND') }}"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="center">Made by <a href="#" target="_blank">OFA</a>. All Rights Reserved  &copy <a href="#" target="_blank">2019</a></p>

            </div>
        </div>
    </div>
</footer>




 <!-- jQuery first, then Bootstrap JS. for check out  -->
 <script src="{{url('/')}}/dist/jquery/jquery.min.js"></script>
    <script src="{{url('/')}}/dist/popper/popper.min.js" integrity=""></script>
    <script src="{{url('/')}}/dist/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/js/main.min.js"></script>
    
    
<!-- JQUERY -->
<script src="{{url('/')}}/mart/js/vendor/jquery-1.11.2.min.js"></script>
<script src="{{url('/')}}/mart/js/vendor/bootstrap.min.js"></script>
<script src="{{url('/')}}/mart/js/isotope.pkgd.min.js"></script>
<script src="{{url('/')}}/mart/js/owl.carousel.min.js"></script>
<script src="{{url('/')}}/mart/js/wow.min.js"></script>
<script src="{{url('/')}}/mart/js/custom.js"></script>
 

 <link rel="stylesheet" href="{{  url('/design/adminlte')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 <script src="{{ url('/design/adminlte') }}/bower_components/jquery/dist/jquery.min.js"></script>
<script src="{{  url('/design/adminlte')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{  url('/design/adminlte')}}/bower_components/datatables.net-bs/js/dataTables.buttons.min.js"></script>
<script src="{{  url('/design/adminlte')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{ url('/design/adminlte') }}/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="{{ url('')}}/vendor/datatables/buttons.server-side.js"></script>
@stack('js')
@stack('css')
</body>
<!-- PRELOADER -->
</html>




{{-- second footer --}}

<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="titie-section wow fadeInDown animated ">
                    <h1>{{ trans('admin.GET IN TOUCH') }}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 wow fadeInLeft animated">
                <div class="left-content">
                @if(lang() =='ar')
                <h1><span>{{ trans('admin.S') }}</span>{{ trans('admin.tore') }} <span>{{ trans('admin.M') }}</span>{{ trans('admin.edicines') }} </h1>
                
                @elseif(lang() == 'en')
                <h1><span>{{ trans('admin.M') }}</span>{{ trans('admin.edicines') }} <span>{{ trans('admin.S') }}</span>{{ trans('admin.tore') }}</h1>  
                
                @endif
                    <h3>{{ trans("admin.We'd love To Meet You In Person Or Via The Web!") }}</h3>
                    <p>{{ trans('admin.descri_footer') }}</p>
                    <div class="contact-info">
                     @if (lang()=='ar')
                        <p><b>{{ trans('admin.Main Office:') }} : </b>{{ trans('admin.street') }}</p>
                        <p>  <b>{{ trans('admin.Phone:') }}</b></p>
                            <p>711080822 - 773700413 - 715529957 - 735152506</p>
                        <p> <b>{{ trans('admin.Email:') }} :</b> {{ setting()->email }} </p>                       
                    @endif

                    @if (lang()=='en')
                        <p><b>{{ trans('admin.Main Office:') }}</b>{{ trans('admin.street') }}</p>
                        <p><p><b>{{ trans('admin.Phone:') }}</b> 711080822 - 773700413 - 715529957 - 735152506 </p>
                        <p><b>{{ trans('admin.Email:') }}</b>{{ setting()->email }}</p>                       
                    @endif
                    </div>
                    <div class="social-media">
                        <ul>
                            <li><a href="https://m.facebook.com/omar.binmodied.1?ref=bookmarks"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                     
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://www.instagram.com/am0ri____/"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow fadeInRight animated">
                <form action="{{ url('touch') }}" method="POST" class="contact-form"  enctype="multipart/form-data">
                    {{ csrf_field() }} 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="fname" class="form-control" id="name" placeholder="{{ trans('admin.First Name') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text"  name="lname" class="form-control" id="name" placeholder="{{ trans('admin.Last Name') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text"  name="subject" class="form-control" id="name" placeholder="{{ trans('admin.Subject') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input name="email"  type="email" class="form-control" id="name" placeholder="{{ trans('admin.Your Email') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <textarea  name="message" id="" class="form-control" cols="30" rows="5" placeholder="{{ trans('admin.Your Message...') }}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="submit" class="contact-submit" value="{{ trans('admin.SEND') }}"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

          

         <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                <p class="center">Made by <a href="#" target="_blank">OFA</a>. All Rights Reserved  &copy <a href="#" target="_blank">2019</a></p>
                        
                    </div>
                </div>
            </div>
        </footer>

         <!-- jQuery first, then Bootstrap JS. for check out  -->
        <script src="{{url('/')}}/dist/jquery/jquery.min.js"></script>
        <script src="{{url('/')}}/dist/popper/popper.min.js" integrity=""></script>
        <script src="{{url('/')}}/dist/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{url('/')}}/js/main.min.js"></script>

        <!-- JQUERY -->
        <script src="{{ url('/') }}/mart/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="{{ url('/') }}/mart/js/vendor/bootstrap.min.js"></script>
        <script src="{{ url('/') }}/mart/js/isotope.pkgd.min.js"></script>
        <script src="{{ url('/') }}/mart/js/owl.carousel.min.js"></script>
        <script src="{{ url('/') }}/mart/js/wow.min.js"></script>
        <script src="{{ url('/') }}/mart/js/custom.js"></script>



        {{-- for datatable --}}

         <link rel="stylesheet" href="{{  url('/design/adminlte')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <script src="{{ url('/design/adminlte') }}/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="{{  url('/design/adminlte')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{  url('/design/adminlte')}}/bower_components/datatables.net-bs/js/dataTables.buttons.min.js"></script>
        <script src="{{  url('/design/adminlte')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="{{ url('/design/adminlte') }}/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <script src="{{ url('')}}/vendor/datatables/buttons.server-side.js"></script>
        @stack('js')
        @stack('css')
    </body>
</html>
