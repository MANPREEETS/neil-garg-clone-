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
                <li class="breadcrumb-item"><a href="#">{{ $data[0]->name }}</a></li>
            </ol>
        </nav>


        <main class="main about">
            <div class="about-section">
                <div class="container">
                    {!! $data[0]->description !!}
                </div><!-- End .container -->
            </div>
        </main>

    </div>

@endsection
@push('styles')


@endpush
@push('scripts')

@endpush
