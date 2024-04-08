<section id="prices" class="container" name="#prices">
    <div id="cennik" class="row">
        <div class="col-md-12 text-center">
            <h2 class="title" style="visibility: visible; animation-name: fadeInDown;">Parking RONDO - <span class="subtitle">Obowiązujący cennik parkingu.</span>
            </h2>
        </div>
        @php
            $now = Carbon\Carbon::now('Europe/Warsaw');
        @endphp
        <div class="row text-center prices-grid">

            @foreach($prices as $price)

                <div id="day-{{ $loop->iteration }}" class="text-center box_content @if( !empty($price->promotional_price) && $price->end_promotional_date >= $now )  promo @endif"
                     @if( !empty($price->promotional_price) && $price->end_promotional_date >= $now ) data-start-date="{{$price->start_promotional_date}}"
                     data-end-date="{{ $price->end_promotional_date }}" @endif>
                    <div class="top-price-box">
                        <h2>{{$price->count_days}}</h2>
                        <h3 class="subtitle">
                            @if(1 === $price->count_days)
                                dzień
                            @else
                                dni
                            @endif
                        </h3>
                    </div>
                    <div class="bottom-price-box ">
                        <h4>
                            @if( $price->promotional_price && $price->end_promotional_date >= $now)
                                <span class="promotional-price"> {{ $price->promotional_price }}&nbsp;<small>PLN</small></span>
                                <span class="standart-price">
                                    <s>{{$price->standart_price}} &nbsp;PLN</s>
                                </span>
                                <div class="promo-range d-flex flex-column">
                                    {{--                                    {{ strftime('%d %B %Y %H:%M', strtotime($price->start_promotional_date)) }}--}}

                                    <p class="start-promotional">od: {{formatDate($price->start_promotional_date)}}</p>
                                    <span class="start-promotional-value d-none">{{ $price->start_promotional_date }}</span>
                                    <p class="end-promotional">do: {{formatDate($price->end_promotional_date)}}</p>
                                    <span class="d-none end-promotional-value">{{ $price->end_promotional_date }}</span>
                                </div>
                            @else
                                {{$price->standart_price}} <small>PLN</small>
                            @endif
                            @if( !empty( $price->promotional_price))
                                <span class="promotional-price-value d-none">{{ $price->promotional_price }}</span>
                            @endif

                            <span class="standart-price-value d-none">{{$price->standart_price}}</span>
                        </h4>
                    </div>
                </div>
            @endforeach
            <div id="more-15-days" class=" text-center box_content">
                <div class="top-price-box">
                    <h2>&gt; 15 dni</h2>
                    <h3 class="subtitle">każdy kolejny dzień</h3>
                </div>
                <div class="bottom-price-box">
                    <h4>15.00 <small>PLN</small></h4>
                </div>
            </div>
        </div>
    </div>
</section>
