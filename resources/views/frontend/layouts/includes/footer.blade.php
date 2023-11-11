@php
$settings = DB::table('settings')->get();
@endphp

<footer class="footer">
    <div class="footer-middle">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-lg-3 col-sm-6 d-flex justify-content-center">
                    <div class="widget">
                        <a href="{{ route('home') }}">
                            <img src="@foreach ($settings as $data) {{ $data->photo }} @endforeach" alt="logo" width="200">
                        </a>
                        {{-- <h4 class="widget-title">ABOUT GARG ENTERPRISES</h4>
                        <p style="color:#fff">Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt qui
                            esse pariatur duis deserunt mollit dolore cillum minim tempor enim. Elit aute irure tempor
                            cupidatat incididunt sint deserunt ut voluptate aute id deserunt nisi.</p> --}}
                    </div>
                    <!-- End .widget -->
                </div>
                <!-- End .col-lg-3 -->

                <div class="col-lg-3 col-sm-6 d-md-flex justify-content-center">
                    <div class="widget">
                        <h4 class="widget-title">QUICK LINKS</h4>

                        <ul class="links">
                            <li style="color: #fff"><a href="{{ route('allProducts') }}">All Products</a></li>
                            @foreach ($aboutPage as $name => $slug)
                                <li style="color: #fff">
                                    <a href="{{route('customPages', ['slug' => $slug])}}">{{ $name }}</a>
                                </li>
                            @endforeach
                            <li style="color: #fff"><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li>Home</li>
                        </ul>
                    </div>
                    <!-- End .widget -->
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">CONTACT US</h4>

                        <ul class="links d-flex flex-column" style="gap:10px">
                            <li style="color: #fff" class="d-flex align-items-center ">
                                <img class="mr-3" src="{{ asset('frontend/img/svg/map-pin.svg') }}" alt="">
                                <a href="#" target="_blank">{{ $settings[0]->address }}</span>
                            </li>

                            <div class="contact-details">
                                <img class="mr-3" src="{{ asset('frontend/img/svg/phone.svg') }}" alt="">

                                <li style="color: #fff" class="d-flex align-items-center">
                                    <?php
                                    // echo $settings[0]->phone; die;
                                    ?>
                                        @if(strpos($settings[0]->phone, ',') !== false)
                                            @php
                                                $phones = explode(',', $settings[0]->phone);
                                            @endphp
                                            <a href="tel:+91 {{ $phones[0] }}">+91 {{ $phones[0] }}</a>
                                            <a href="tel:+91 {{ $phones[1] }}">+91 {{ $phones[1] }}</a>
                                        @else
                                        <a href="tel:+91 {{ $settings[0]->phone }}">+91 {{ $settings[0]->phone }}</a>
                                        @endif
                                </li>
                            </div>

                            <li style="color: #fff" class="d-flex align-items-center">
                                <img class="mr-3" src="{{ asset('frontend/img/svg/mail.svg') }}" alt="">
                                <a href="mailto:{{ $settings[0]->email }}">{{ $settings[0]->email }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End .widget -->
                </div>


            </div>
            <!-- End .row -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .footer-middle -->

    <div class="container">
        <div class="footer-bottom">
            <div class="container d-sm-flex align-items-center justify-content-center">
                <div class="footer-left">
                    <span class="footer-copyright" style="color: #fff">© {{ date('Y') }} | Garg Enterprises | All Rights Reserved | Designed by <a  href="https://www.evolvan.com"
                            target="_blank">Evolvan</a></span>
                </div>
            </div>
        </div>
        <!-- End .footer-bottom -->
    </div>
    <!-- End .container -->
</footer>
<!-- End .footer -->

<div class="whatsapp"><a target="_blank" rel="noreferrer" href="https://api.whatsapp.com/send?phone=919815961447"><img src="{{ asset('images/whatsapp.png') }}" alt=""></a></div>
