@extends('frontend.layouts.master')
@section('title', 'Garg Enterprise')
@section('main-content')

    {{-- <body>
        <div class="page-wrapper">
            <!-- End .top-notice --> --}}

    {{-- <main class="main"> --}}
    {{--  @if (count($banners) > 0)
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($banners as $key => $banner)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                        @if ($key == 0) class="active" @endif></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($banners as $key => $banner)
                    <div class="carousel-item @if ($key == 0) active @endif">
                        <img class="d-block w-100" src="{{ $banner->photo }}" alt="{{ $banner->title }}">
                        <div class="carousel-caption d-md-block">
                            <h3 class="text-white">{{ $banner->title }}</h3>
                            <p>{!! html_entity_decode($banner->description) !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    @endif
    <!-- End .home-slider -->  --}}
    <!-- Banner/Slider -->
    <div id="slider" class="banner banner-slider carousel slide carousel-fade">
        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('{{ asset('frontend/img/banner/[GetPaidStock.com]-6549db3b2e17c.jpg') }}');">
                    <div class="banner-content">
                        <div class="container">
                            <div class="row">
                                <div class="banner-text al-left pos-left dark">
                                    <div class="animated fadeInRight">
                                        <h2 class="ucap">Leading Provider of Industrial Solutions</h2>
                                        <p>Ullamcorper fringi tortor consec adipis elit sed do eiusmod tempor.</p>
                                        <div class="banner-cta">
                                            <a class="btn" href="solution-single.html">Learn More</a>
                                            <a class="btn btn-alt btn-outline" href="contact.html">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('{{ asset('frontend/img/banner/[GetPaidStock.com]-6549fadfbcf8f.jpg') }}');">
                    <div class="banner-content">
                        <div class="container">
                            <div class="row">
                                <div class="banner-text al-left pos-left light">
                                    <div class="animated fadeInRight">
                                        <h2 class="ucap">Highest standards <br>of conduct</h2>
                                        <p>Massa sit amet ullamcorper fringilla tortor consec adipis elit sedsmod.</p>
                                        <div class="banner-cta">
                                            <a class="btn" href="solution-single-alter.html">Learn More</a>
                                            <a class="btn btn-light btn-outline" href="contact.html">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>					
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('{{ asset('frontend/img/banner/[GetPaidStock.com]-6549db3b2e17c.jpg') }}');">
                    <div class="banner-content">
                        <div class="container">
                            <div class="row">
                                <div class="banner-text al-left pos-left light">
                                    <div class="animated fadeInRight">
                                        <h2 class="ucap">We are team of the professionals</h2>
                                        <p>Praesent gravida massa sit amet ullamcorper fringilla tortor consec.</p>
                                        <div class="banner-cta">
                                            <a class="btn" href="solution-single-extend.html">Learn More</a>
                                            <a class="btn btn-light btn-outline" href="contact.html">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>					
                </div>
            </div>
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#slider" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- #end Banner/Slider -->

    <div class="px-5" style="background-color: #E7E7E7;">
        <ul class="row d-flex justify-content-around align-items-center mb-0">
            <li class="col-md-4 col-sm-6 col-12  d-flex justify-content-center pt-sm-0 my-4">
                {{-- <img src="frontend/img/svg/dollarInCircle.svg" alt=""> --}}
                {{-- <i class="fa fa-handshake-o" aria-hidden="true"></i> --}}
                <span class="fa-stack fa-2x">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fas fa-handshake fa-stack-1x fa-inverse"></i>
                </span>
                <span class="d-flex flex-column ml-3 font-weight-bold" style="color: #324257;">
                    ORIGINAL PRODUCTS
                    <span class="font-weight-light" style="color: #75787B;">
                        100% Genuine products
                    </span>
                </span>
            </li>

            <li class="col-md-4 col-sm-6 col-12 d-flex justify-content-center pt-sm-0 my-4">
                {{-- <img src="frontend/img/svg/truck.svg" alt=""> --}}
                <span class="fa-stack fa-2x">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fas fa-flag fa-stack-1x fa-inverse"></i>
                </span>
                <span class="d-flex flex-column ml-3 font-weight-bold" style="color: #324257;">
                    700 + PRODUCTS
                    <span class="font-weight-light" style="color: #75787B;">
                      Wide range of Appliances
                    </span>
                </span>
            </li>

            <li class="col-md-4 col-sm-6 col-12  d-flex justify-content-center pt-md-0 pt-sm-5 my-4 ">
                <span class="fa-stack fa-2x">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fas fa-thumbs-up fa-stack-1x fa-inverse"></i>
                </span>
                <span class="d-flex flex-column ml-3 font-weight-bold" style="color: #324257;">
                    We are the BEST
                    <span class="font-weight-light" style="color: #75787B;">
                        Best in Class and Prices
                    </span>
                </span>
            </li>

        </ul>
    </div>

        <div class="d-flex justify-content-center cat-sec">
            <h2 class="cat-head" style="color: #324257">CATEGORIES</h2>
            <div class="feature-row feature-service-row row justify-content-center">
                @if ($category_lists)
                    @foreach ($category_lists as $cat)
                        <!-- Single Banner  -->
                        <div class="col-md-4 col-sm-6">
                            <a href="{{ route('product-cat', ['slug' => $cat->slug]) }}">
                                <div class="feature boxed d-flex flex-column align-items-center">
                                    @if ($cat->photo)
                                        <div class="fbox-photo">
                                            <img src="{{ $cat->photo }}" alt="{{ $cat->photo }}" style="max-width: 265px;">
                                        </div>
                                    @else
                                        <img src="https://via.placeholder.com/600x370" alt="#">
                                    @endif
                                    <div class="content mt-3 d-flex flex-column align-items-center">
                                        <h4>{{ $cat->title }}</h4>
                                        <span class="text-uppercase letter-spacing-1">{{ $cat->active_products_in_category_count }} Products</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- /End Single Banner  -->
                    @endforeach
                @endif
            </div>
        </div>

        <div class="bg-light section-pad">
            <div class="container">
                <div class="content row">
                    <div class="wide-sm center">
                        <h1>A hight level service provider that recommended to any companies, firms or industries.</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a enim aliquam, condimentum nisl a, laoreet lectus. Aliquam convallis sed elit nec vehicula. Praesent gravida, massa sit amet ullamcorper fringilla, tortor nunc ultrices dui porttitor mi non, elementum dui.</p>
                    </div>
                </div>			
            </div>
        </div>

        <div class="section section-about section-pad">
            <div class="container">
                <div class="content row">
                    
                    <div class="row row-vm">
                        <div class="col-md-6 res-m-bttm">
                            <h2>We are team of the professionals who will build everything for you</h2>
                            <p>Vivamus finibus accumsan ultricies orem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend consequat metus, ac egestas tortor placerat vehicula. Nulla tincidunt risus nisl, sed iaculis elit dapibus id. Suspendisse quis lorem nibh. Fusce a magna sollicitudin, semper justo a sagittis.</p>
                            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curay. Fusce a magna sollicitudin, semper justo a sagittis est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curay.</p>
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <img src="{{asset('frontend/new-assets/Images/[GetPaidStock.com]-654df2e9a77e9.jpg')}}" alt="">
                        </div>
                    </div>
                    <!-- End Section -->
    
                </div>	
            </div>
        </div>

        <!-- CTA-Parallax -->
        <div class="call-action has-parallax cta-large" style="background-image: url('frontend/new-assets/Images/[GetPaidStock.com]-6549db3b2e17c.jpg');background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
            <div class="cta-block">
                <div class="container">
                    <div class="content row">
    
                        <div class="cta-content wide-sm center">
                            <h2>We provide innovative product solutions for sustainable progress.</h2>
                            <p>Here is important that you state all your requirements and our team of engineers with a lot of experience will present you with the possible solution for your needs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Section -->

        	<!-- Call Action -->
	<div class="call-action cta-small">
		<div class="cta-block">
			<div class="container">
				<div class="content row">

					<div class="cta-sameline">
						<h3>Any kind of business solution or consultation don’t hesitate to contact.</h3>
						<a class="btn btn-light" href="contact.html">Contact Us</a>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- End Section -->

    <section class="testimonial-section mt-8">
        <div class="container text-center">
            <h2 style="color: #324257">Brands</h2>
        </div>
        <div class="testimonial-bg"
            data-image-src="https://img.freepik.com/free-photo/grunge-paint-background_1409-1337.jpg">
            <div class="container">
                <div class="owl-carousel owl-theme owl-dots-simple mb-4 mb-lg-0 appear-animate"
                    data-owl-options="{
                            'loop': true,
                            'autoplay': true,
                            'dots': true,
                            'margin': 20,
                            'autoplayTimeout':2000,
                            'responsive': {
                                '768': {
                                    'items': 3
                                },
                                '992': {
                                    'items': 4
                                }
                            }
                        }"
                    data-animation-name="fadeInRightShorter" data-animation-delay="200">

                    @foreach ($brands as $brand)
                        <div class="testimonial testimonial-type1 blockquote-both inner-blockquote owner-center">
                            <div class="testimonial-owner">
                                <div>
                                    <img src="{{ asset($brand->photo) }}" width="250" alt="client" style="width: 180px;">
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    {{-- <div class="container p-5 mt-5">
                    <h2 style="color: #324257" class="ls-n-10 text-center text-uppercase m-b-4">Offers and Deals</h2>

                    <div class="row justify-content-around">

                        <div class="col-md-6 mb-2">
                            <div class="offerCard row banner h-100 appear-animate" data-animation-name="fadeIn"
                                data-animation-delay="300">

                                <div class="d-flex bg-white align-items-center p-5">

                                    <div class="col-6 d-flex flex-column">
                                        <h3 class="">Exclusive Shoes</h3>
                                        <h4 class="text-uppercase font-italic font-weight-light" style="font-size: 48px;">50% </h4>
                                        <h4 class="text-uppercase mb-2 font-italic" style="font-size: 48px;">Off</h4>
                                        <button class="text-uppercase shopNowBtn">Shop Now</button>
                                    </div>

                                    <div class="col-6">
                                        <img src="frontend/img/offer-1.png" alt="banner" width="530" height="249">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="offerCard row banner h-100 appear-animate" data-animation-name="fadeIn"
                                data-animation-delay="300">

                                <div class="d-flex bg-white align-items-center p-5">

                                    <div class="col-6 d-flex flex-column">
                                        <h3 class="">Amazing</h3>
                                        <h4 class="text-uppercase font-weight-light" style="font-size: 28px;">Kitchen Appliances</h4>
                                        <span class="mb-2">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet</span>
                                        <button class="text-uppercase shopNowBtn">EXPLORE NOW</button>
                                    </div>

                                    <div class="col-6">
                                        <img src="frontend/img/offer-2.png" alt="banner" width="530" height="249">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> --}}
        @if (count($featured)>0)
        <div style="background-color: #E7E7E7;">
            <div class="container p-5 mt-5">
                <h2 style="color: #324257" class="ls-n-10 text-center text-uppercase m-b-3">Featured Products
                </h2>

                <div class="row justify-content-center flex-wrap">
                    @foreach ($featured as $key => $product)
                        <div class="col-sm-3 product-default inner-quickview inner-icon">
                            <figure>
                                <a href="{{ route('product-detail', ['slug' => $product->slug]) }}">
                                    @php
                                        $photo = explode(',', $product->photo);
                                    @endphp
                                    <img class="default-img" src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                    @if (count($photo) > 1)
                                        <img class="hover-img" src="{{ $photo[1] }}" alt="{{ $photo[1] }}">
                                    @endif
                                </a>
                                {{-- <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div> --}}
                                {{-- <a href="/" class="btn-quickview" title="Quick View">Quick
                                                View</a> --}}
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="#" class="product-category">{{ $product->cat_info->title ?? '' }}</a>
                                    </div>
                                </div>
                                <h3 class="product-title">
                                    <a
                                        href="{{ route('product-detail', ['slug' => $product->slug]) }}">{{ $product->title }}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">&#8377; {{ $product->price }}</span>
                                </div>
                            </div>
                            <a href="{{ route('contact', ['info' => $product->slug, 'product' =>  $product->title]) }}" class="sendQueryBtn btn">Send Query <img class="arrowIcon" width="20px"
                                    src="{{ asset('frontend/img/svg/arrow-up-right.svg') }}" alt=""></a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        @endif

    <div class="container p-5 mt-5">
        <h2 style="color: #324257" class="ls-n-10 text-center text-uppercase m-b-4">TESTIMONIALS</h2>

        <div id="carouselExampleControls" class="carousel slide mt-2" data-ride="carousel">
            <div class="carousel-inner">

                @foreach ($testimonials as $testimonial)
                    <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
                        <div class="bg-white d-flex flex-column align-items-center">
                            <img src="{{ asset($testimonial->photo) }}" alt="testimonial" width="100" height="100"
                                class="rounded-circle">
                            <div class="d-flex flex-column align-items-center" style="color: #324257; width: 700px">
                                <h5>{{ $testimonial->name }}</h5>
                                <p class="text-center">{{ $testimonial->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="carousel-item">
                                <div class="bg-white d-flex flex-column align-items-center">
                                    <img src="frontend/img/testimonial/client.png" alt="First slide">
                                    <div class="d-flex flex-column align-items-center"
                                        style="color: #324257; width: 700px">
                                        <h5>Name-test-2</h5>
                                        <p class="text-center">I just wanted to share a quick note and let you know that
                                            you guys do a really good job. I’m glad I decided to work with you. It’s really
                                            great how easy your websites are to update and manage.</p>
                                    </div>
                                </div>
                            </div> --}}

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true" style="color: #324257">
                    <i class="fas fa-sharp fa-solid fa-arrow-left"></i>
                </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="" aria-hidden="true" style="color: #324257">
                    <i class="fas fa-sharp fa-solid fa-arrow-right"></i>
                </span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>



    {{-- </main> --}}
    <!-- End .main -->

    {{-- </div>
        <!-- End .page-wrapper -->

    </body> --}}


@endsection

@push('styles')
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            // $('.carousel').carousel();

        });
    </script>
@endpush
