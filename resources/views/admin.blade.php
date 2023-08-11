@extends('layouts.app')

@section('content')
    <style>
        .main-header {
            position: fixed;
        }

        .content-header {
            margin-top: 70px;
        }
    </style>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Dashboard') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div id="orders-table" name="#orders-table">
        <div class="toolbar">
            <button id="b1" class="btn btn-secondary">przyjazd dzisiaj</button>
            <button id="b2" class="btn btn-secondary">wyjazd dzisiaj</button>
            <button id="b3" class="btn btn-secondary">z dzisiaj</button>
            <button id="b5" class="btn btn-secondary">pokaż starsze</button>
            <button id="b4" class="btn btn-secondary">wyczyść filtr</button>
        </div>
        <!-- /.content-header -->
        <table id="parkingTable" data-toggle="table"
               data-search="true"
               data-show-refresh="true"
               data-show-toggle="true"
               data-show-fullscreen="true"
               data-show-columns="true"
               data-show-columns-toggle-all="true"
               data-detail-view="true"
               data-show-export="true"
               data-click-to-select="true"
               data-detail-formatter="detailFormatter"
               data-minimum-count-columns="2"
               data-show-pagination-switch="true"
               data-pagination="true"
               data-id-field="id"
               data-page-size="25"
               data-toolbar=".toolbar"
               data-page-list="[10, 25, 50, 100, all]"
               data-show-footer="true">
            <thead>
            <tr>

                <th data-field="id" data-sortable="true">numer</th>
                <th data-field="created_at" data-sortable="true">z dnia</th>
                <th data-field="arrival" data-sortable="true" data-sorter="dateSort">przyjazd</th>
                <th data-field="departure" data-sortable="true">wyjazd</th>
                <th data-field="count_days" data-sortable="true">ilość dni</th>
                <th data-field="price" data-sortable="true">cena</th>
                <th data-field="number_peoples" data-sortable="true">osob</th>
                <th data-field="contacts" data-sortable="true">kontakt</th>
                <th data-field="cars" data-sortable="true">pojazd</th>
                <!-- Add more data-field attributes as needed -->
            </tr>
            </thead>
            <tbody>

            @foreach($parkings as $parking)
                <tr>
                    <td class="id">{{ $parking->id }}</td>
                    <td class="created-date">{{ $parking->created_at }}
                        <button class="btn btn-danger delete-btn" data-order-id="{{ $parking->id }}">Delete</button>

                    </td>
                    <td class="arrival-date">{{ $parking->arrival }}</td>
                    <td class="departure-date">{{ $parking->departure }}</td>
                    <td>{{ $parking->number_days }}</td>
                    <td>{{ $parking->price }}</td>
                    <td>{{ $parking->number_peoples }}</td>
                    <td>
                        <div class="d-flex flex-column">
                            <div class="d-flex">
                                {{ $parking->client_name }}&nbsp;
                                {{ $parking->client_surname }}
                            </div>
                            <div class="d-flex">telefon:&nbsp;{{ $parking->phone_number }}</div>
                            email:
                            <a href="mailto:{{ $parking->email }}">{{ $parking->email }}</a>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            @if ($parking->type_car == 1)

                                Samochód osobowy
                            @elseif ($parking->type_car == 2)

                                Samochód dostawczy
                            @else
                                SUV / VAN
                            @endif
                            <br>
                            {{ $parking->car_number }}
                            <div class="d-flex">
                                {{ $parking->car_mark }}&nbsp;
                                {{ $parking->car_model }}
                            </div>
                        </div>
                    </td>
                    <!-- Add more table data cells as needed -->
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!--Header Block-->
                    <div class="header-block" id="header-block" name="#header-block">
                        <h2 class="fs-2">Header block</h2>
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right">
                                    <button id="btn_add" name="btn_add" class="btn btn-default pull-right">Add New Head Row</button>
                                </div>
                                <button id="toggleRowsButton" class="btn btn-primary">Show All Rows</button>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-offset-2">
                                <table class="table table-striped table-hover" id="headerTable">
                                    <thead>
                                    <tr class="info">
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                    </tr>
                                    </thead>
                                    <tbody id="headblock-list" name="headblock-list">
                                    @foreach ($headBlocks as $headBlock)
                                        <tr id="headblock-{{$headBlock->id}}" class="active">
                                            <td> {{$headBlock->id}} </td>
                                            <td> {{$headBlock->title}} </td>
                                            <td>{{$headBlock->subtitle}}</td>
                                            <td width="35%">
                                                <button class="btn btn-warning btn-detail open_header_modal" value="{{$headBlock->id}}">Edit</button>
                                                <button class="btn btn-danger btn-delete delete-product" value="{{$headBlock->id}}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="about-us-block" id="about-us" name="#about-us">
                        @include('partials.about-us-block.table')
                    </div>
                    <!-- Prices Block -->
                    <div class="prices-block" id="prices" name="#prices">
                        <h2 class="fs-2">Prices block</h2>

                        @include('partials.prices-block.table')
                        @include('partials.prices-block.create')
                    </div>
                    <div class="modal" id="deleteConfirmationModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirm Deletion</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this product?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Information Block-->
                    <div class="info-block" id="info" name="#info">
                        @csrf
                        <h2 class="fs-2">Information block</h2>
                        @include('partials.information.table')
                        @include('partials.information.create')
                    </div>
                    <!-- Reviews Block-->
                    <div class="reviews-section" id="reviews" name="#reviews">
                        <h2 class="fs-2">Reviews</h2>
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right">
                                    <button id="btn_add_review" name="btn_add_review" class="btn btn-default pull-right">Add New Review</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-offset-2">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr class="reviews">
                                        <th>ID</th>
                                        <th>Content</th>
                                        <th>Author</th>
                                    </tr>
                                    </thead>
                                    <tbody id="reviews-list" name="reviews-list">
                                    @foreach ($reviews as $review)
                                        <tr id="review-{{$review->id}}" class="active">
                                            <td>{{$review->id}}</td>
                                            <td>{{$review->content}}</td>
                                            <td>{{$review->author}}</td>
                                            <td width="35%">
                                                <button class="btn btn-warning btn-detail open_review_modal" value="{{$review->id}}">Edit</button>
                                                <button class="btn btn-danger btn-delete delete-review" value="{{$review->id}}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Contacts Block-->
                    <div class="contacts-block" id="contacts" name="#contacts">
                        <h2 class="fs-2">Contacts block</h2>
                        @include('partials.contacts.table')
                    </div>
                    <!--Header Block-->
                    <div class="section-title-block" id="titles" name="#titles">
                        <h2 class="fs-2">Sections title block</h2>
                        @include('partials.sections-title.section-title')
                    </div>
                    <!-- Services Block-->
                    <div class="services-block" id="services" name="#services">
                        <h2 class="fs-2">Services block</h2>
                        @include('partials.services.table')
                    </div>
                    @include('partials.newsletter.create')

                    <div class="section-text-content" id="text-content" name="#text-content">
                        <h2 class="fs-2 text-center">Text Content Section</h2>
                        @include('partials.text-content.table')
                        @include('partials.text-content.create')
                    </div>
                </div>
            </div>
            <section class="calendar" id="calendar" name="#calendar">
                <h2 class="calendar__title">Dni w których wyłączona jest możliwość złożenia zamówienia</h2>
                <div class="calendar__container">
                    <div class="calendar__visual_wrapper">
                        <div class="calendar__main_calendar"></div>
                    </div>
                    <div class="calendar__date_list_wrapper">
                        <ul class="calendar__date_list js_list_blocked_dates">
                            {{--                            <li class="calendar__date_item"><span>07/08/2023 [ </span><a href="#">usuń</a><span> ]</span></li>--}}
                        </ul>
                        <div class="calendar__add_date_w">
                            <ul class="calendar__add_date_list"></ul>

                            <div class="calendar__add_date_btn_w">
                                <button type="button" class="calendar__add_date_btn js_select_repeater">dodaj nowy</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calendar__btn_submit_w">
                    <button type="submit" class="calendar__btn_submit js_btn_submit">zapisz</button>
                </div>
            </section>


            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

