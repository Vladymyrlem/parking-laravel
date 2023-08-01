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
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <input type="text" name="checkout_pick_up_date" value="" id="pick-up-date">
                                        <input type="text" name="checkout_pick_up_time" value="" id="pick-up-time">
                                        <!-- Custom block to display form data -->
                                        <div id="displayData"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        <!-- Reviews Section begin-->
        @include('partials.home-page.reviews')
        <!-- Reviews Section end-->
        <!-- Information Section begin-->
        @include('partials.home-page.information')
        <!-- Information Section end-->
    </div>
    <!-- /.content -->
@endsection


