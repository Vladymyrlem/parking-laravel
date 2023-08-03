@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="header-block" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0.75) 100%), url('{{asset('images/head-bkg.png')}}'), lightgray 50% / cover no-repeat;
">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <form id="myForm">
                            <!-- Form fields -->
                            <input type="text" name="name" placeholder="Name">
                            <input type="email" name="email" placeholder="Email">
                            <!-- Other fields -->
                            <div class="form-group">
                                <label for="start_date">Start Date:</label>
                                <input type="date" class="form-control" name="order_pick_up_date" id="start_date">
                                <input type="time" class="form-control" name="order_pick_up_time" id="start_time">
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date:</label>
                                <input type="date" class="form-control" name="order_drop_off_date" id="end_date">
                                <input type="time" class="form-control" name="order_drop_off_time" id="end_time">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        @include('partials.modal.reservation-modal')
                    </div>
                    <div class="col-md-6 col-12">
                        <div id="headblockCarousel" class="slick">
                            @foreach($headBlocks as $headBlock)
                                <div class="">
                                    <span class="headblock-title mb-2 fw-bold">{{ $headBlock->title }}</span>
                                    <span class="headblock-subtitle">{{ $headBlock->subtitle }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Prices Section begin-->
        @include('partials.home-page.prices')
        <!-- Prices Section end-->
        <section id="partners">
            {!! getTitleBySlug('partners') !!}
            <div class="row">
                <div class="container">
                    {!! getContentBySlug('partners') !!}
                </div>
            </div>
        </section>
        <section id="gallery" name="#galeria" class="container">
            <h2>{{ getTitleBySlug('gallery') }}</h2>
            <div class="row text-center">
                {!! getContentBySlug('gallery') !!}
            </div>
        </section>
        <!-- Reviews Section begin-->
        @include('partials.home-page.reviews')
        <!-- Reviews Section end-->

        <!-- Information Section begin-->
        @include('partials.home-page.information')
        <!-- Information Section end-->
        @include('partials.home-page.newsletter')

        @include('partials.home-page.contacts-content')
        <section id="terms" name="#regulamin" class="wow fadeIn animated" data-wow-offset="100" style="visibility: visible; animation-name: fadeIn;">
            <div id="regulamin" class="container">
                <div class="row">
                    {!! getContentBySlug('privacy-policy') !!}
                </div>
            </div>
        </section>
    </div>
    <!-- /.content -->
@endsection


