
@section('content')
    <section class="news-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="titie-section wow fadeInDown animated ">
                        <h1>{{ trans('admin.Latest News') }}</h1>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-sm-4 wow fadeInDown animated" data-wow-delay="0.2s">
                    <div class="blog-item">
                        <a href="#"><img src="{{url('/')}}/mart/images/blog1.jpg" width="350" height="262" alt=""></a>
                        <h3>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean </h3>
                        <p>Nam nec tellus a odio tincidunt auc. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
                <div class="col-sm-4 wow fadeInDown animated" data-wow-delay="0.4s">
                    <div class="blog-item">
                        <a href="#"><img src="{{url('/')}}/mart/images/blog2.jpg" width="350" height="262" alt=""></a>
                        <h3>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean </h3>
                        <p>Nam nec tellus a odio tincidunt auc. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt</p>
                        <a href="#">Read More</a>

                    </div>
                </div>
                <div class="col-sm-4 wow fadeInDown animated" data-wow-delay="0.6s">
                    <div class="blog-item">
                        <a href="#"><img src="{{url('/')}}/mart/images/blog3.jpg" width="350" height="262" alt=""></a>
                        <h3>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean </h3>
                        <p>Nam nec tellus a odio tincidunt auc. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
