@extends('frontend.layouts.master')

@section('meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
    <meta name="description" content="{{ $product_detail->summary }}">
    <meta property="og:url" content="{{ route('product-detail', $product_detail->slug) }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $product_detail->title }}">
    <meta property="og:image" content="{{ $product_detail->photo }}">
    <meta property="og:description" content="{{ $product_detail->description }}">
@endsection
@section('title', 'Garg Enterprise')
@section('main-content')

    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('product-cat',$product_detail->cat_info->slug)}}">{{ $product_detail->cat_info->title }}</a></li>
                <li class="breadcrumb-item"><a href="#"><b>{{ $product_detail->title }}</b></a></li>
            </ol>
        </nav>

        <div class="product-single-container product-single-default">
            <div class="row">
                <div class="col-lg-5 col-md-6 product-single-gallery">
                    <div class="product-slider-container">

                        <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">

                            @if (strpos($product_detail->photo, ','))
                                @php
                                    $photos = explode(',',$product_detail->photo);
                                @endphp
                                @foreach ($photos as $photo)
                                    <div class="product-item">
                                        <img class="product-single-image" src="{{ asset($photo) }}"
                                            data-zoom-image="{{ asset($photo) }}" width="468" height="468"
                                            alt="product" />
                                    </div>
                                @endforeach
                            @else
                                <div class="product-item">
                                    <img class="product-single-image" src="{{ asset($product_detail->photo) }}"
                                        data-zoom-image="{{ asset($product_detail->photo) }}" width="468" height="468"
                                        alt="product" />
                                </div>
                            @endif



                            {{-- <div class="product-item">
                                <img class="product-single-image" src="{{ asset('frontend/img/offer-2.png') }}"
                                    data-zoom-image="{{ asset('frontend/img/offer-2.png') }}" width="468" height="468"
                                    alt="product" />
                            </div>
                            <div class="product-item">
                                <img class="product-single-image" src="{{ asset('frontend/img/offer-2.png') }}"
                                    data-zoom-image="{{ asset('frontend/img/offer-2.png') }}" width="468" height="468"
                                    alt="product" />
                            </div>
                            <div class="product-item">
                                <img class="product-single-image" src="{{ asset('frontend/img/offer-2.png') }}"
                                    data-zoom-image="{{ asset('frontend/img/offer-2.png') }}" width="468" height="468"
                                    alt="product" />
                            </div>
                            <div class="product-item">
                                <img class="product-single-image" src="{{ asset('frontend/img/offer-2.png') }}"
                                    data-zoom-image="{{ asset('frontend/img/offer-2.png') }}" width="468" height="468"
                                    alt="product" />
                            </div> --}}
                        </div>
                        <!-- End .product-single-carousel -->
                        <span class="prod-full-screen">
                            <i class="icon-plus"></i>
                        </span>
                    </div>

                    <div class="prod-thumbnail owl-dots">
                        @if (strpos($product_detail->photo, ','))
                            @php
                                $photos = explode(',',$product_detail->photo);
                            @endphp
                            {{-- {{ dd($photos) }} --}}
                            @foreach ($photos as $photo)
                                <div class="product-item">
                                    <div class="owl-dot">
                                        <img src="{{ asset($photo) }}" width="110" height="110" alt="product-thumbnail" />
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        {{-- <div class="owl-dot">
                            <img src="{{ asset('frontend/img/offer-2.png') }}" width="110" height="110"
                                alt="product-thumbnail" />
                        </div>
                        <div class="owl-dot">
                            <img src="{{ asset('frontend/img/offer-2.png') }}" width="110" height="110"
                                alt="product-thumbnail" />
                        </div>
                        <div class="owl-dot">
                            <img src="{{ asset('frontend/img/offer-2.png') }}" width="110" height="110"
                                alt="product-thumbnail" />
                        </div>
                        <div class="owl-dot">
                            <img src="{{ asset('frontend/img/offer-2.png') }}" width="110" height="110"
                                alt="product-thumbnail" />
                        </div> --}}
                    </div>
                </div>
                <!-- End .product-single-gallery -->

                <div class="col-lg-7 col-md-6 product-single-details">
                    <h1 class="product-title">{{ $product_detail->title }}</h1>

                    <hr class="short-divider">

                    <div class="price-box">
                        <span class="product-price"> ₹ {{ $product_detail->price }}</span>
                    </div>
                    <!-- End .price-box -->

                    <div class="product-desc">
                        <p>
                            @php
                                $html = $product_detail->description;
                                $text = strip_tags($html);
                                $short_text = Str::limit($text, 400);
                                echo $short_text;
                                // $html = str_replace($text, $short_text, $html);
                                // echo $html;
                            @endphp
                        </p>
                    </div>
                    <!-- End .product-desc -->

                    <ul class="single-info-list">
                        <li>
                            CATEGORY:
                            <strong>
                                <a href="{{route('product-cat',$product_detail->cat_info->slug)}}" class="product-category">{{ $product_detail->cat_info->title }}</a>
                            </strong>
                        </li>
                    </ul>

                    <div class="product-action col-4">
                        <a href="{{ route('contact', ['info' => $product_detail->slug, 'product' =>  $product_detail->title]) }}" class="sendQueryBtn btn btn-lg">Send Query <img class="arrowIcon" width="20px"
                            src="{{ asset('frontend/img/svg/arrow-up-right.svg') }}" alt=""></a>
                        {{-- <a href="javascript:;" class="btn btn-dark  mr-2" title="Add to Cart">Send a Query</a> --}}
                    </div>
                    <!-- End .product-action -->

                    <!-- End .product single-share -->
                </div>
                <!-- End .product-single-details -->
            </div>
            <!-- End .row -->
        </div>


        <div class="product-single-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content"
                        role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content"
                        role="tab" aria-controls="product-tags-content" aria-selected="false">Additional
                        Information</a>
                </li>


            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                    aria-labelledby="product-tab-desc">
                    <div class="product-desc-content">
                        <p>{!! $product_detail->description !!}</p>
                    </div>
                    <!-- End .product-desc-content -->
                    <hr class="short-divider">

                </div>
                <!-- End .tab-pane -->

                <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                    {!! $product_detail->summary !!}

                    {{-- <table class="table table-striped mt-2">
                        <tbody>
                            <tr>
                                <th>Weight</th>
                                <td>23 kg</td>
                            </tr>

                            <tr>
                                <th>Dimensions</th>
                                <td>12 × 24 × 35 cm</td>
                            </tr>

                            <tr>
                                <th>Color</th>
                                <td>Black, Green, Indigo</td>
                            </tr>

                            <tr>
                                <th>Size</th>
                                <td>Large, Medium, Small</td>
                            </tr>
                        </tbody>
                    </table> --}}

                    <hr class="short-divider">
                </div>
                <!-- End .tab-pane -->

            </div>

            <div class="row flex-column">
                <h4 class="mb-2">Product Specification</h4>
                <ul class="list-unstyled col-md-6">
                    <li class="d-flex justify-content-between align-items-baseline"
                        style="color: #000; font-size: 16px;  padding: 12px 0;">
                        <span class="font-weight-bold w-50">Brand</span>
                        <span>-</span>
                        <span class="flex-grow-1 text-right" style="font-weight: 400; color:#324257">{{ $product_detail->brand->title }}</span>
                    </li>
                    <li class="d-flex justify-content-between align-items-baseline"
                        style="color: #000; font-size: 16px;  padding: 12px 0;">
                        <span class="font-weight-bold w-50">Size</span>
                        <span>-</span>
                        <span class="flex-grow-1 text-right" style="font-weight: 400; color:#324257">{{ $product_detail->size }}</span>
                    </li>

                    @php($specifications = $product_detail->specifications)
                    @if($specifications != null)
                        @php($specifications = unserialize($specifications))
                        @if(count($specifications) > 0)
                            @foreach ($specifications as $item)
                                <li class="d-flex justify-content-between align-items-baseline"
                                    style="color: #000; font-size: 16px;  padding: 12px 0;">
                                    <span class="font-weight-bold w-50">{{ $item['key'] }}</span>
                                    <span>-</span>
                                    <span class="flex-grow-1 text-right" style="font-weight: 400; color:#324257">{{ $item['value'] }}</span>
                                </li>
                            @endforeach
                        @endif
                    @endif


                    {{-- <li class="d-flex justify-content-between align-items-baseline"
                        style="color: #000; font-size: 16px;  padding: 12px 0;">
                        <span class="font-weight-bold w-50">Airflow (M3/Hr)</span>
                        <span>-</span>
                        <span class="flex-grow-1 text-right" style="font-weight: 400; color:#324257">1200 cu.mtr/hr</span>
                    </li>
                    <li class="d-flex justify-content-between align-items-baseline"
                        style="color: #000; font-size: 16px;  padding: 12px 0;">
                        <span class="font-weight-bold w-50">Filterless</span>
                        <span>-</span>
                        <span class="flex-grow-1 text-right" style="font-weight: 400; color:#324257">Yes</span>
                    </li> --}}
                </ul>
            </div>
            <hr class="short-divider">

            <div>
                <h4 class="mb-2">RELATED PRODUCTS</h4>
                <div class="row justify-content-center flex-wrap">
                    @foreach ($product_detail->rel_prods as $rel_prods)
                        <div class="col-sm-3 product-default inner-quickview inner-icon">
                            <figure>
                                <a href="{{ route('product-detail' , ['slug' => $rel_prods->slug]) }}">
                                    @if (strpos($rel_prods->photo, ','))
                                        <?php
                                            $photos = explode(',',$rel_prods->photo);
                                        ?>
                                        <img class="default-img" src="{{ asset($photos[0]) }}"  alt="product" />
                                        <img class="hover-img" src="{{ asset($photos[1]) }}" alt="product">

                                    @else
                                        <img class="default-img" src="{{ asset($rel_prods->photo) }}" alt="">
                                    @endif
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="#" class="product-category">{{ $product_detail->cat_info->title }}</a>
                                    </div>
                                </div>
                                <h3 class="product-title">
                                    <a href="{{ route('product-detail' , ['slug' => $rel_prods->slug]) }}">{{ $rel_prods->title }}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">&#8377; {{ $rel_prods->price }}</span>
                                </div>
                            </div>
                            {{-- <button class="sendQueryBtn">Send Query <img class="arrowIcon" width="20px"
                                    src="{{ asset('frontend/img/svg/arrow-up-right.svg') }}" alt=""></button> --}}
                        </div>
                    @endforeach
                </div>
            </div>


            <!-- End .tab-content -->
        </div>
        <!-- End .product-single-tabs -->

        <!-- End .product-single-container -->

    </div>


@endsection
@push('styles')
    <style>


    </style>
@endpush

@push('scripts')
@endpush
