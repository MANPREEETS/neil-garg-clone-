@extends('frontend.layouts.master')

@section('meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
    <meta name="description" content="">
    <meta property="og:url" content="">
    <meta property="og:type" content="article">
    <meta property="og:title" content="">
    <meta property="og:image" content="">
    <meta property="og:description" content="">
@endsection
@section('title', 'Garg Enterprise')
@section('main-content')

    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Categories</a></li>
                {{-- <li class="breadcrumb-item"><a href="#"><b>{{ $product_detail->title }}</b></a></li> --}}
            </ol>
        </nav>

        <form action="{{ route('product-cat', ['slug' => request()->segment(2)]) }}" method="get" id="filtersForm">
        <div class="row" id="sorted-products">
            <div class="col-lg-12 main-content">
                <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                    <div class="toolbox-left">
                        <a href="#" class="sidebar-toggle">
                            <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                <path
                                    d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                    class="cls-2"></path>
                                <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                <path
                                    d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                    class="cls-2"></path>
                            </svg>
                            <span>Filter</span>
                        </a>

                        <div class="toolbox-item toolbox-sort">
                            <label>Sort By:</label>

                            <div class="select-custom">
                                <select name="sortBy" class="form-control" onchange="this.form.submit();">
                                    <option value="">Default</option>
                                    <option value="title-asc" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='title-asc') selected @endif>Name (A-Z)</option>
                                    <option value="title-des" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='title-des') selected @endif>Name (Z-A)</option>
                                    <option value="price-asc" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='price-asc') selected @endif>Price (Low to High)</option>
                                    <option value="price-des" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='price-des') selected @endif>Price (igh to Low)</option>
                                </select>
                            </div>
                            <!-- End .select-custom -->


                        </div>
                        <!-- End .toolbox-item -->
                    </div>
                    <!-- End .toolbox-left -->

                    <div class="toolbox-right">
                        <div class="toolbox-item toolbox-show">


                            {{-- @php
                               print_r($products->products->links());
                            @endphp --}}
                            {{-- {{ ) }} --}}

                            {{--
                            {{ $products->products->appends($_GET)->links() }} --}}

                            {{-- {!! $products->products->withQueryString()->links() !!} --}}

                            <label>Show:</label>

                            <div class="select-custom">
                                <select name="show" class="form-control" onchange="this.form.submit()">
                                    {{-- <option value="">Default</option> --}}
                                    <option @if(!empty($_GET['show']) && $_GET['show']=='12') selected @endif value="12">12</option>
                                    <option @if(!empty($_GET['show']) && $_GET['show']=='24') selected @endif value="24">24</option>
                                    <option @if(!empty($_GET['show']) && $_GET['show']=='36') selected @endif value="36">36</option>
                                </select>
                            </div>
                            <!-- End .select-custom -->
                        </div>
                        <!-- End .toolbox-item -->

                        <div class="toolbox-item layout-modes">
                            <a href="javascript:void(0)" class="layout-btn btn-grid products-grid-view-btn" title="Grid">
                                <i class="icon-mode-grid"></i>
                            </a>
                            <a href="javascript:void(0)" class="layout-btn btn-list products-list-view-btn" title="List">
                                <i class="icon-mode-list"></i>
                            </a>
                        </div>
                        <!-- End .layout-modes -->
                    </div>
                    <!-- End .toolbox-right -->
                </nav>

                <div class="row" id="products-grid-view" style="display: none">
                    @foreach ($products as $product)
                        <div class="col-6 col-sm-4">
                            <div class="product-default">
                                <figure>
                                    <a href="{{ route('product-detail' , ['slug' => $product->slug]) }}">
                                        <div class="overlay">
                                            <p style="height: 100%; min-height:100px; opacity:0;">&nbsp;</p>
                                            @if (strpos($product->photo, ','))
                                            <?php
                                                $photos = explode(',',$product->photo);
                                            ?>
                                            <img class="default-img" src="{{ asset($photos[0]) }}" width="280" height="280"  alt="product" />
                                            <img class="hover-img" src="{{ asset($photos[1]) }}" width="280" height="280" alt="product">

                                        @else
                                            <img class="default-img" src="{{ asset($product->photo) }}" alt="">
                                        @endif

                                        {{-- <img src="{{ asset() }}" width="280" height="280" alt="product" />
                                        <img src="assets/images/products/product-1-2.jpg" width="280" height="280" alt="product" /> --}}
                                        </div>
                                    </a>

                                    {{-- <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                        <div class="product-label label-sale">-20%</div>
                                    </div> --}}
                                </figure>

                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="javascript:void(0)" class="product-category">{{ $categoryInfo[0]->title }}</a>
                                        </div>
                                    </div>

                                    <h3 class="product-title"> <a href="{{ route('product-detail' , ['slug' => $product->slug]) }}">{{ $product->title }}</a> </h3>

                                    {{-- <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div> --}}
                                    <!-- End .product-container -->

                                    <div class="price-box">
                                        {{-- <span class="old-price">$90.00</span> --}}
                                        <span class="product-price">₹ {{ $product->price }}</span>
                                    </div>
                                    <!-- End .price-box -->

                                    <div class="product-action">
                                        {{-- <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                                class="icon-heart"></i></a>
                                        <a href="product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i><span>SELECT
                                                OPTIONS</span></a>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a> --}}
                                        <a href="{{ route('contact', ['info' => $product->slug, 'product' =>  $product->title]) }}" class="sendQueryBtn w-100 btn">Send Query <img class="arrowIcon" width="20px"
                                            src="{{ asset('frontend/img/svg/arrow-up-right.svg') }}" alt=""></a>
                                    </div>
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- End .row -->

                <div class="row pb-4" id="products-list-view"  style="display: none">
                    @foreach ($products as $product)
                        <div class="col-sm-12 col-6 product-default left-details product-list mb-2">
                            <figure>
                                <a href="{{ route('product-detail' , ['slug' => $product->slug]) }}">
                                    @if (strpos($product->photo, ','))
                                        <?php
                                            $photos = explode(',',$product->photo);
                                        ?>
                                        <img src="{{ asset($photos[0]) }}" width="250" height="250"  alt="{{  $product->title  }}" />
                                        <img src="{{ asset($photos[1]) }}" width="250" height="250" alt="{{  $product->title  }}">

                                    @else
                                        <img class="default-img" src="{{ asset($product->photo) }}" alt="{{ $product->title }}">
                                    @endif
                                    {{-- <img src="{{ $products[0]->photo }}" width="250" height="250" alt="product" />
                                    <img src="{{ $products[0]->photo }}" width="250" height="250" alt="product" /> --}}
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="javascript:void(0)" class="product-category">{{ $categoryInfo[0]->title }}</a>
                                </div>
                                <h3 class="product-title"> <a href="{{ route('product-detail' , ['slug' => $product->slug]) }}">{{ $product->title }}</a>
                                </h3>
                                {{-- <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div> --}}
                                <!-- End .product-container -->
                                <p class="product-description">
                                    @php
                                        $html = $product->description;
                                        $text = strip_tags($html);
                                        $short_text = Str::limit($text, 280);
                                        echo $short_text;
                                        // $html = str_replace($text, $short_text, $html);
                                        // echo $html;
                                    @endphp
                                </p>
                                <div class="price-box">
                                    <span class="product-price">₹ {{ $product->price }}</span>
                                </div>
                                <!-- End .price-box -->
                                <div class="product-action">
                                    <a  href="{{ route('contact', ['info' => $product->slug, 'product' =>  $product->title]) }}" class="sendQueryBtn w-100 btn">Send Query <img class="arrowIcon" width="20px"
                                        src="{{ asset('frontend/img/svg/arrow-up-right.svg') }}" alt=""></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                    @endforeach
                </div>
                <!-- End .row -->

                <nav class="toolbox toolbox-pagination">
                    <div class="toolbox-item toolbox-show">
                        {{-- <label>Show:</label>

                        <div class="select-custom">
                            <select name="count" class="form-control">
                                <option value="12">12</option>
                                <option value="24">24</option>
                                <option value="36">36</option>
                            </select>
                        </div> --}}
                        <!-- End .select-custom -->
                    </div>
                    <!-- End .toolbox-item -->

                    {{-- {{ dd($products->links()) }} --}}

                    @if ($totalPages > 1)
                        <ul class="pagination toolbox-item" >
                            <input type="hidden" name="currentPage" id="currentPage" value="1">
                            {{-- <li class="page-item disabled">
                                <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                            </li> --}}

                            @for ($i = 1; $i <= $totalPages; $i++)
                                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                    <a class="page-link pagination-val" data-id="{{ $i }}" href="javascript:void(0)">{{ $i }} <span class="sr-only">(current)</span></a>
                                </li>
                            @endfor

                            {{-- <li class="page-item ">
                                <a class="page-link pagination-val"  data-id="2" href="javascript:void(0)">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#"  value="1">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><span class="page-link">...</span></li>
                            <li class="page-item">
                                <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                            </li> --}}

                        </ul>
                    @endif
                </nav>
            </div>
            <!-- End .col-lg-12 -->
            <div class="collapse show" id="widget-body-2">
                <div class="widget-body">
                    <ul class="cat-list">
                        @foreach ($allCategoriesWithCount as $cat)
                            <li class="cat {{ request()->segment(2) == $cat->slug ? 'active' : '' }}" ><a class="cat-link" href="{{ route('product-cat', ['slug' => $cat->slug]) }}">{{ $cat->title }}</a></li>
                        @endforeach

                    </ul>
                </div>
                <!-- End .widget-body -->
            </div>
            <!-- End .col-lg-3 -->
        </div>

        </form>

    </div>

@endsection
@push('styles')
    <style>
    </style>
@endpush
@push('scripts')
<script src="{{ asset('frontend/js/nouislider.min.js') }}"></script>

<script>
    $(document).ready(function(){
        $('.pagination-val').click(function() {
            // alert($(this).attr("data-id"))
            $('#currentPage').val($(this).attr("data-id"))
            $('#filtersForm').submit();
        });

        $('.products-grid-view-btn').click(function() {
            localStorage.setItem("productsView", 'products-grid-view');
            $('#products-grid-view').show();
            $('#products-list-view').hide();
        });

        $('.products-list-view-btn').click(function() {
            localStorage.setItem("productsView", 'products-list-view');
            $('#products-grid-view').hide();
            $('#products-list-view').show();
        });

    });

    if(localStorage.getItem("productsView") == "products-grid-view") {
        $('#products-grid-view').show();
        $('#products-list-view').hide();
    }

    if(localStorage.getItem("productsView") == "products-list-view") {
        $('#products-grid-view').hide();
        $('#products-list-view').show();
    }

</script>

@endpush
