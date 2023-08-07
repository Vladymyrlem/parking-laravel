@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <div class="content">
        @include('partials.home-page.header-block')
        @include('partials.home-page.about-us')
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

        <!-- Newsletter Section begin-->
        @include('partials.home-page.newsletter')
        <!-- Newsletter Section end-->
        @include('partials.home-page.contacts-content')

        <!-- Locations Section begin-->
        @include('partials.home-page.locations')
        <!-- Locations Section end-->
        <!-- Contacts Section begin-->
        @include('partials.home-page.contacts-us')
        <!-- Contacts Section end-->
        <!-- Privacy policy Section begin-->
        @include('partials.home-page.terms')
        <!-- Privacy Policy Section end-->
    </div>
    <!-- /.content -->
@endsection


