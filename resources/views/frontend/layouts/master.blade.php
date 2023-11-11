<!DOCTYPE html>
<html lang="zxx">
<head>
	@include('frontend.layouts.includes.head')
</head>
<body >

	<!-- Header -->
	@include('frontend.layouts.includes.header')
	<!--/ End Header -->

    <body>
        <div class="page-wrapper">
            <main class="main">
                @yield('main-content')
            </main>
        </div>

        @include('frontend.layouts.includes.footerAdditonalLinks')
    </body>

	@include('frontend.layouts.includes.footer')
    <script>
        if(localStorage.getItem("productsView") == null) {
            localStorage.setItem("productsView", "products-grid-view");
        }
    </script>
    @stack('styles')
    @stack('scripts')

</body>
</html>
