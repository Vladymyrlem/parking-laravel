<div class="header-block" id="header-block" name="#header-block" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0.75) 100%), url('{{asset('images/head-bkg.png')}}'),
lightgray
        50% / cover
        no-repeat;
margin-top: 94px">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-12">
                <div class="reservation" id="rezerwui">
                    <form id="orderForm" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <!-- Form fields -->
                        <div class="styled-select-car">
                            <select name="order_car_select" id="order_car_select" class="strtoupper form_element" data-rule="required" data-msg="to pole jest wymagane">
                                <optgroup label="Wybierz typ pojazdu">
                                    <option value="1">samochód osobowy</option>
                                    <option value="2">samochód dostawczy</option>
                                    <option value="3">SUV / VAN</option>
                                </optgroup>
                            </select>
                        </div>
                        <!-- Other fields -->
                        <div class="datetime pick-up d-flex justify-content-between">
                            <div class="date pull-left">
                                <div class="input-group">
                                    <span class="input-group-addon pixelfix d-flex flex-row">
                                                  <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13 2.5H11.5V2C11.5 1.86739 11.4473 1.74021 11.3536 1.64645C11.2598 1.55268 11.1326 1.5 11 1.5C10.8674 1.5 10.7402 1.55268 10.6464 1.64645C10.5527 1.74021 10.5 1.86739 10.5 2V2.5H5.5V2C5.5 1.86739 5.44732 1.74021 5.35355 1.64645C5.25979 1.55268 5.13261 1.5 5 1.5C4.86739 1.5 4.74021 1.55268 4.64645 1.64645C4.55268 1.74021 4.5 1.86739 4.5 2V2.5H3C2.73478 2.5 2.48043 2.60536 2.29289 2.79289C2.10536 2.98043 2 3.23478 2 3.5V13.5C2 13.7652 2.10536 14.0196 2.29289 14.2071C2.48043 14.3946 2.73478 14.5 3 14.5H13C13.2652 14.5 13.5196 14.3946 13.7071 14.2071C13.8946 14.0196 14 13.7652 14 13.5V3.5C14 3.23478 13.8946 2.98043 13.7071 2.79289C13.5196 2.60536 13.2652 2.5 13 2.5ZM4.5 3.5V4C4.5 4.13261 4.55268 4.25979 4.64645 4.35355C4.74021 4.44732 4.86739 4.5 5 4.5C5.13261 4.5 5.25979 4.44732 5.35355 4.35355C5.44732 4.25979 5.5 4.13261 5.5 4V3.5H10.5V4C10.5 4.13261 10.5527 4.25979 10.6464 4.35355C10.7402 4.44732 10.8674 4.5 11 4.5C11.1326 4.5 11.2598 4.44732 11.3536 4.35355C11.4473 4.25979 11.5 4.13261 11.5 4V3.5H13V5.5H3V3.5H4.5ZM13 13.5H3V6.5H13V13.5Z"
                                            fill="#151616"/>
                                    </svg>
                                        Od dnia</span>
                                    <input type="text" name="order_pick_up_date" autocomplete="off" id="order_pick_up_date" data-rule="required" data-msg="podaj datę rozpoczęcia rezerwacji"
                                           class="form-control form_element" placeholder="dd/mm/yyyy">
                                </div>
                                <div id="validation_order_pick_up_date" class="validation"></div>
                            </div>
                            <div class="time pull-right">
                                <div class="styled-select-time">
                                    <input type="time" class="form-control" name="order_pick_up_time" id="start_time">
                                </div>
                                <div id="validation_order_pick_up_time" class="validation"></div>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                        <div class="form-group row">
                            <div class="order-date-box input-group">
                                <span for="end_date" class="input-group-text">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13 2.5H11.5V2C11.5 1.86739 11.4473 1.74021 11.3536 1.64645C11.2598 1.55268 11.1326 1.5 11 1.5C10.8674 1.5 10.7402 1.55268 10.6464 1.64645C10.5527 1.74021 10.5 1.86739 10.5 2V2.5H5.5V2C5.5 1.86739 5.44732 1.74021 5.35355 1.64645C5.25979 1.55268 5.13261 1.5 5 1.5C4.86739 1.5 4.74021 1.55268 4.64645 1.64645C4.55268 1.74021 4.5 1.86739 4.5 2V2.5H3C2.73478 2.5 2.48043 2.60536 2.29289 2.79289C2.10536 2.98043 2 3.23478 2 3.5V13.5C2 13.7652 2.10536 14.0196 2.29289 14.2071C2.48043 14.3946 2.73478 14.5 3 14.5H13C13.2652 14.5 13.5196 14.3946 13.7071 14.2071C13.8946 14.0196 14 13.7652 14 13.5V3.5C14 3.23478 13.8946 2.98043 13.7071 2.79289C13.5196 2.60536 13.2652 2.5 13 2.5ZM4.5 3.5V4C4.5 4.13261 4.55268 4.25979 4.64645 4.35355C4.74021 4.44732 4.86739 4.5 5 4.5C5.13261 4.5 5.25979 4.44732 5.35355 4.35355C5.44732 4.25979 5.5 4.13261 5.5 4V3.5H10.5V4C10.5 4.13261 10.5527 4.25979 10.6464 4.35355C10.7402 4.44732 10.8674 4.5 11 4.5C11.1326 4.5 11.2598 4.44732 11.3536 4.35355C11.4473 4.25979 11.5 4.13261 11.5 4V3.5H13V5.5H3V3.5H4.5ZM13 13.5H3V6.5H13V13.5Z"
                                            fill="#151616"/>
                                    </svg>
                                    Do dnia
                                </span>
                                <input type="date" class="form-control" name="order_drop_off_date" id="end_date">
                            </div>
                            <input type="time" class="form-control" name="order_drop_off_time" id="end_time">
                        </div>
                        <div class="form-group">
                            <input type="text" id="client_phone" name="client_phone" placeholder="Podaj swój telefon">
                        </div>
                        <div class="form-group">
                            <input type="email" id="client_email" name="client_email" placeholder="Wpisz swój adres email">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                @include('partials.modal.reservation-modal')
            </div>
            <div class="col-md-5 col-12">
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
