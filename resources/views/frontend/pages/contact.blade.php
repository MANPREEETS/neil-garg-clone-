@extends('frontend.layouts.master')
@section('title', 'Garg Enterprise')
@section('main-content')
    <!-- Breadcrumbs -->
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Contact</a></li>
            </ol>
        </nav>
    </div>
    <!-- End Breadcrumbs -->
    @php
        $settings = DB::table('settings')->get();
    @endphp

    <!-- Start Contact -->
    <div class="container contact-us-container mb-10">
        <div class="row">
            <div class="col-lg-6 ">

                @include('frontend.layouts.notification')

                <h2 class="mt-6 mb-2">Send Us a Message</h2>
                <form class="mb-0" method="post" action="{{ route('contact') }}">
                    @csrf
                    <div class="form-group">
                        <label class="mb-1" for="contact-name">Your Name
                            <span class="required">*</span></label>
                        <input type="text" class="form-control" id="contact-name" name="name" required />
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-1" for="contact-email">Your E-mail
                            <span class="required">*</span></label>
                        <input type="email" class="form-control" id="contact-email" name="email" required />
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-1" for="contact-email">Subject
                            <span class="required">*</span></label>
                        <input type="text" class="form-control" id="" name="subject" required value="{{ request()->has('product') ? 'Product: ' . request()->input('product') : '' }}" />
                        @error('subject')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-1" for="contact-message">Your Message
                            <span class="required">*</span></label>
                        <textarea cols="30" rows="1" id="message" class="form-control" name="message">{{ request()->has('info') ? 'I want information about ' . route('product-detail' , ['slug' => request()->input('info')]) . ' '   : '' }}</textarea>
                        @error('message')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-footer mb-0">
                        <button type="submit" class="btn btn-primary">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-lg-6">
                <!-- Map Section -->
                <div class="map-section mt-6 mb-2">
                    <div id="myMap">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3424.07741422817!2d75.820735!3d30.8844953!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a82348318e08b%3A0x469dac567a407aae!2sGarg%20Enterprises!5e0!3m2!1sen!2sin!4v1682673733998!5m2!1sen!2sin"
                            width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <!--/ End Map Section -->
            </div>

        </div>

        <div class="row">
            <div class="contact-info">
                <div class="row">
                    <div class="col-12 mb-5 mt-5">
                        <h2 class="ls-n-25 m-b-1">
                            Contact Info
                        </h2>

                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box text-center">
                            <i class="fa fa-map-marker"></i>
                            <div class="feature-box-content">
                                <h3>Address</h3>
                                <a target="_blank"  href="#">
                                    <h6>{{ $settings[0]->address }}</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box text-center">
                            <i class="fa fa-mobile-alt"></i>
                            <div class="feature-box-content">
                                <h3>Phone Number</h3>
                                @if(strpos($settings[0]->phone, ',') !== false)
                                    @php
                                        $phones = explode(',', $settings[0]->phone);
                                    @endphp
                                    <a href="tel:+91 {{ $phones[0] }}"><h6 class="mb-1" >+91 {{ $phones[0] }}</h6></a>
                                    <a href="tel:+91 {{ $phones[1] }}"><h6>+91 {{ $phones[1] }}</h6></a>
                                @else
                                <a href="tel:+91 {{ $settings[0]->phone }}"><h6>+91 {{ $settings[0]->phone }}</h6></a>
                                @endif

                                {{-- <a href="tel:+91{{ $settings[0]->phone }}">
                                    <h6>+91 {{ $settings[0]->phone }}</h6>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box text-center">
                            <i class="far fa-envelope"></i>
                            <div class="feature-box-content">
                                <h3>E-mail Address</h3>
                                <h6><a class="text-dark" href="mailto:{{ $settings[0]->email }}">
                                        {{ $settings[0]->email }}
                                    </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box text-center">
                            <i class="far fa-calendar-alt"></i>
                            <div class="feature-box-content">
                                <h3>Working Days/Hours</h3>
                                <h6>Mon - Sun <br> 9:00AM - 8:00PM</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Contact -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid shadow-lg" src="{{ asset($settings[0]->contact_image_1) }}" alt="garg-enterprises">
            </div>
            <div class="col-md-6">
                <img class="img-fluid shadow-lg" src="{{ asset($settings[0]->contact_image_2) }}" alt="garg-enterprises">
            </div>
        </div>
    </div>


@endsection

@push('styles')
    <style>
        .modal-dialog .modal-content .modal-header {
            position: initial;
            padding: 10px 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .modal-dialog .modal-content .modal-body {
            height: 100px;
            padding: 10px 20px;
        }

        .modal-dialog .modal-content {
            width: 50%;
            border-radius: 0;
            margin: auto;
        }
    </style>
@endpush
@push('scripts')

@endpush
