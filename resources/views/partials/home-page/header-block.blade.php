<div class="header-block" id="header-block" name="#header-block" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0.75) 100%), url('{{asset('images/head-bkg.png')}}'),
lightgray
        50% / cover
        no-repeat;
margin-top: 94px">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-12 header-left">
                <div class="reservation" id="rezerwui">
                    <div class="reservation-block-message d-flex flex-column align-items-center text-center">
                        <p>Brak wolnych miejsc na Parkingu Rondo w dniach:</p>
                        <div class="reservation-blocked-dates" id="reservation-blocked-dates">
                        </div>
                        <p>W razie zapytań prosimy o telefon - 606 550 570</p>
                    </div>
                    <form id="orderForm" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <!-- Form fields -->
                        <div class="styled-select-car">
                            <select name="order_car_select" id="order_car_select" class="strtoupper form_element" data-rule="required" data-msg="to pole jest wymagane">
                                <optgroup label="Wybierz typ pojazdu">
                                    <option value="1" selected {{ old('order_car_select') == '1' ? 'selected' : '' }}>samochód osobowy</option>
                                    <option value="2" {{ old('order_car_select') == '2' ? 'selected' : '' }}>samochód dostawczy</option>
                                    <option value="3" {{ old('order_car_select') == '3' ? 'selected' : '' }}>SUV / VAN</option>
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
                                           class="form-control form_element" placeholder="yyyy-mm-dd">
                                </div>
                                <div id="validation_order_pick_up_date" class="validation"></div>
                            </div>
                            <div class="time pull-right">
                                <div class="styled-select-time">
                                    <select name="order_pick_up_time" id="order_pick_up_time" class="form_element" data-rule="required" data-msg="podaj godzinę rozpoczęcia rezerwacji">
                                        <?php
                                            for ($i = 0; $i < 24; $i++) {
                                                for ($j = 0; $j < 2; $j++) {
                                                    $time = str_pad($i, 2, 0, STR_PAD_LEFT) . ':' . ($j % 2 ? '30' : '00');
                                                    echo '<option value="' . $time . '">' . $time . '</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div id="validation_order_drop_off_time" class="validation"></div>
                            </div>

                        </div>
                        <div class="datetime drop-off d-flex justify-content-between">
                            <div class="date pull-left">
                                <div class="input-group d-flex flex-row">
         <span class="input-group-addon pixelfix d-flex flex-row">
                                                  <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13 2.5H11.5V2C11.5 1.86739 11.4473 1.74021 11.3536 1.64645C11.2598 1.55268 11.1326 1.5 11 1.5C10.8674 1.5 10.7402 1.55268 10.6464 1.64645C10.5527 1.74021 10.5 1.86739 10.5 2V2.5H5.5V2C5.5 1.86739 5.44732 1.74021 5.35355 1.64645C5.25979 1.55268 5.13261 1.5 5 1.5C4.86739 1.5 4.74021 1.55268 4.64645 1.64645C4.55268 1.74021 4.5 1.86739 4.5 2V2.5H3C2.73478 2.5 2.48043 2.60536 2.29289 2.79289C2.10536 2.98043 2 3.23478 2 3.5V13.5C2 13.7652 2.10536 14.0196 2.29289 14.2071C2.48043 14.3946 2.73478 14.5 3 14.5H13C13.2652 14.5 13.5196 14.3946 13.7071 14.2071C13.8946 14.0196 14 13.7652 14 13.5V3.5C14 3.23478 13.8946 2.98043 13.7071 2.79289C13.5196 2.60536 13.2652 2.5 13 2.5ZM4.5 3.5V4C4.5 4.13261 4.55268 4.25979 4.64645 4.35355C4.74021 4.44732 4.86739 4.5 5 4.5C5.13261 4.5 5.25979 4.44732 5.35355 4.35355C5.44732 4.25979 5.5 4.13261 5.5 4V3.5H10.5V4C10.5 4.13261 10.5527 4.25979 10.6464 4.35355C10.7402 4.44732 10.8674 4.5 11 4.5C11.1326 4.5 11.2598 4.44732 11.3536 4.35355C11.4473 4.25979 11.5 4.13261 11.5 4V3.5H13V5.5H3V3.5H4.5ZM13 13.5H3V6.5H13V13.5Z"
                                            fill="#151616"/>
                                    </svg>   Do dnia
         </span>
                                    <input type="text" name="order_drop_off_date" autocomplete="off" id="order_drop_off_date" data-rule="required"
                                           data-msg="podaj datę zakończenia rezerwacji"
                                           class="form-control form_element" placeholder="yyyy-mm-dd">

                                </div>
                                <div id="validation_order_drop_off_date" class="validation"></div>
                            </div>
                            <div class="time pull-right">
                                <div class="styled-select-time">
                                    <select name="order_drop_off_time" id="order_drop_off_time" data-rule="required" data-msg="podaj godzinę zakończenia rezerwacji" class="form_element">
                                        <?php
                                            $startTime = strtotime('00:00');
                                            $endTime = strtotime('23:30');
                                            $current = $startTime;
                                            while ($current <= $endTime) {
                                                echo '<option value="' . date('H:i', $current) . '">' . date('H:i', $current) . '</option>';
                                                $current = strtotime('+30 minutes', $current);
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div id="validation_order_drop_off_time" class="validation"></div>

                            </div>

                        </div>
                        <div class="decor-order-line"></div>
                        <div class="form-group styled-input-car">
                            <input type="text" id="client_phone" name="client_phone" placeholder="Podaj swój telefon">
                        </div>
                        <div id="validation_client_phone" class="validation"></div>

                        <div class="form-group styled-input-car">
                            <input type="email" id="client_email" name="client_email" placeholder="Wpisz swój adres email">
                        </div>
                        <div id="validation_client_email" class="validation"></div>

                        <button type="submit" id="order_submit_btn" class="submit" disabled>dokończ rezerwację</button>
                    </form>
                </div>
                @include('partials.modal.reservation-modal')
            </div>
            <div class="col-lg-5 col-12 header-right">
                <div id="headblockCarousel" class="slick">
                    @foreach($headBlocks as $headBlock)
                        <div class="">
                            <span class="headblock-title mb-2 fw-bold">{{ $headBlock->title }}</span>
                            <p class="headblock-subtitle ml-0 mr-0 w-100">{!!  $headBlock->subtitle !!}</p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
