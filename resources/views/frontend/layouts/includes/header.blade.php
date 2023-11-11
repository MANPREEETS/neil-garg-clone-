<header class="header">
    <!-- End .header-top -->
    <div class="sticky-wrapper" style=""><div class="header-middle sticky-header" style="">
        <div class="topbar">
			<div class="container">
				<div class="row">
					<div class="top-aside top-left">
						<ul class="top-nav">
							<li><a href="resources.html">Knowledge Centre</a></li>
							<li><a href="careers.html">Career</a></li>
							<li><a href="news.html">News</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
					<div class="top-aside top-right clearfix">
						<ul class="top-contact clearfix">
							<li class="t-email t-email1">
								<em class="fa fa-envelope" aria-hidden="true"></em>
								<span><a href="#">sales@industrial.com</a></span>
							</li>
							<li class="t-phone t-phone1">
								<em class="fa fa-phone" aria-hidden="true"></em>
								<span>+123-456-789</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler" type="button">
                    <i class="fas fa-bars"></i>
                </button>
                @php
                    $settings = DB::table('settings')->get();
                @endphp
                <a href="{{ route('home') }}">
                    <img class="garg-logo" src="@foreach ($settings as $data) {{ $data->logo }} @endforeach" alt="logo" width="150">
                </a>
            </div>
            <!-- End .header-left -->

            <div class="header-right">

                <nav class="main-nav w-100">
                    <ul class="menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">
                        <li class="{{ request()->is('/') ? 'active' : '' }}">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="{{ request()->is('page/about-us') ? 'active' : '' }}">
                            <a href="{{ route('customPages', ['slug' => $aboutPage[0]->slug]) }}">{{ $aboutPage[0]->name }}</a>
                        </li>

                        <li class="{{ request()->is('category/*') ? 'active' : '' }}">
                            <a href="#">Categories</a>
                            <div class="megamenu megamenu-fixed-width megamenu-3cols">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="submenu">
                                            @foreach ($categories as $category)
                                                <li class="{{ request()->segment(2) == $category->slug ? 'active' : '' }}"><a href="{{ route('product-cat', ['slug' => $category->slug]) }}">{{ $category->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End .megamenu -->
                        </li>
                        <li class="{{ request()->is('all-products') ? 'active' : '' }}">
                            <a href="{{ route('allProducts') }}">Products</a>
                        </li>

                        <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </nav>

                <div class="header-search header-search-popup header-search-category d-flex ml-xl-5">
                    <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                    <form action="{{ route('product.search') }}" method="get">
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control" style="max-width: 450px" name="search" placeholder="Search..." required value="{{ request()->has('search') ? request()->input('search') : '' }}" />
                            <div class="select-custom">
                                <select name="cat_id" style="cursor: pointer">
                                    <option value="all">ALL</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="sortBy">
                            <input type="hidden" name="show" value="12">
                            <input type="hidden" name="currentPage" value="1">
                            <!-- End .select-custom -->
                            <button class="btn icon-magnifier p-0" title="search" type="submit"></button>
                        </div>
                        <!-- End .header-search-wrapper -->
                    </form>
                </div>

                <span class="separator d-inline-block d-none"></span>

                <div class="header-contact d-sm-flex">
                    <img alt="phone" src="{{ asset('frontend/img/phone.png') }}" width="30" height="30" class="pb-1" />
                    <h6>
                        <span>Call us now</span>
                        @if(strpos($settings[0]->phone, ',') !== false)
                            @php
                                $phones = explode(',', $settings[0]->phone);
                            @endphp
                            <a href="tel:+91 {{ $phones[0] }}" class="text-dark font1">+91 {{ $phones[0] }}</a>
                        @else
                            <a href="tel:+91 {{ $settings[0]->phone }}" class="text-dark font1">+91 {{ $settings[0]->phone }}
                        @endif
                        </a>
                    </h6>
                </div>

                <span class="separator d-md-inline-block d-none"></span>

                <!-- End .dropdown -->
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container -->
    </div></div>
    <!-- End .header-middle -->
</header>


<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="">
                    <a href="{{ route('customPages', ['slug' => $aboutPage[0]->slug]) }}">{{ $aboutPage[0]->name }}</a>
                </li>
                <li>
                    <a href="#">Categories</a>
                    <div class="megamenu megamenu-fixed-width megamenu-3cols">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="submenu">
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('product-cat', ['slug' => $category->slug]) }}">{{ $category->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End .megamenu -->
                </li>
                <li>
                    <a href="{{ route('allProducts') }}">Products</a>

                </li>
                <li>
                    <a href="/contact">Contact Us</a>

                </li>

            </ul>
        </nav>
        <!-- End .mobile-nav -->

        <div class="social-icons">
            <a href="https://www.facebook.com/renvoxforlife?mibextid=LQQJ4d" class="social-icon social-facebook icon-facebook" target="_blank">
            </a>
            <a href="https://www.instagram.com/garg5425/" class="social-icon social-instagram icon-instagram" target="_blank">
            </a>
            <a href="https://www.linkedin.com/company/garg-enterprises-india/" class="social-icon social-linkedin" target="_blank">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div>
    </div>
    <!-- End .mobile-menu-wrapper -->
</div>
<!-- End .mobile-menu-container -->
