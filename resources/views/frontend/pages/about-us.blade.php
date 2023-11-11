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
                <li class="breadcrumb-item"><a href="#">About us</a></li>
            </ol>
        </nav>


        <main class="main about">
            <div class="about-section">
                <div class="container">
                    <h2 class="subtitle">OUR STORY</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book.</p>

                    <p class="lead">“ Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                        default model search for evolved over sometimes by accident, sometimes on purpose ”</p>
                </div><!-- End .container -->
            </div>
        </main>

    </div>

@endsection
@push('styles')


@endpush
@push('scripts')

@endpush
