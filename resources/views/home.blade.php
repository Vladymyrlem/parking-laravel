@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <div class="content">
        <!-- Header Block Section begin -->
        @include('partials.home-page.header-block')
        <!-- Header Block Section end -->
        <!-- About Us Section begin -->
        @include('partials.home-page.about-us')
        <!-- About Us Section end -->
        <!-- Services Section begin -->
        @include('partials.home-page.services')
        <!-- Services Section end -->
        <!-- Newsletter Section begin-->
        @include('partials.home-page.newsletter')
        <!-- Newsletter Section end-->
        <!-- Prices Section begin-->
        @include('partials.home-page.prices')
        <!-- Prices Section end-->
        <!-- Information Section begin-->
        @include('partials.home-page.information')
        <!-- Information Section end-->
        <!-- Partners Section begin-->
        @include('partials.home-page.partners')
        <!-- Partners Section end-->
        <!-- Gallery Section begin-->
        @include('partials.home-page.gallery')
        <!-- Gallery Section end-->
        <!-- Reviews Section begin-->
        @include('partials.home-page.reviews')
        <!-- Reviews Section end-->
        <!-- Contacts Section begin -->
        @include('partials.home-page.contacts-content')
        <!-- Contacts Section end -->
        <!-- Locations Section begin-->
        @include('partials.home-page.locations')
        <!-- Locations Section end-->
        <!-- Contact Us Section begin-->
        @include('partials.home-page.contacts-us')
        <!-- Contact Us Section end-->
        <!-- Privacy policy Section begin-->
        @include('partials.home-page.terms')
        <!-- Privacy Policy Section end-->
    </div>
    <!-- /.content -->
@endsection


