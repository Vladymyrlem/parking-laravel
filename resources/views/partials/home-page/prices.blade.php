<section id="prices" class="container" name="#prices">
    <div id="cennik" class="row">
        <div class="col-md-12 text-center">
            <h2 class="title" style="visibility: visible; animation-name: fadeInDown;">Parking RONDO - <span class="subtitle">Obowiązujący cennik parkingu.</span>
            </h2>
        </div>
        @php
            $now = Carbon\Carbon::now('Europe/Warsaw');
//                $currentMonth = date('n');
//                    $monthPromotionalPrice = $seasonPrices->first(function ($price) use ($currentMonth) {
//        return !empty($price['month_' . $currentMonth]);
//    });
        @endphp

        <div class="row text-center prices-grid">

            @foreach($prices as $price)
                @php
                    $currentMonth = date('n'); // Отримуємо номер поточного місяця
                    $currentDay = $price->count_days; // Отримуємо номер поточного дня

                    // Отримуємо акційні ціни для поточного місяця з таблиці prices
                    $monthPromotionalPrices = $prices->filter(function ($price) use ($currentMonth, $currentDay) {
                        return !empty($price['month_' . $currentMonth]) && $price->count_days == $currentDay;
                    });

                    // Отримуємо акційну ціну для поточного дня з таблиці prices
                    $currentMonthPrice = null;
                    if ($monthPromotionalPrices->isNotEmpty()) {
                        $currentMonthPrice = $monthPromotionalPrices->first();
                    }

                    // Отримуємо акційні ціни для поточного місяця з таблиці seasonPrices
                    $seasonPromotionalPrices = $seasonPrices->filter(function ($seasonPrice) use ($currentMonth, $currentDay) {
                        return !empty($seasonPrice['month_' . $currentMonth]) && $seasonPrice->count_days == $currentDay;
                    });

                    // Отримуємо акційну ціну для поточного дня з таблиці seasonPrices
                    $currentSeasonPrice = null;
                    if ($seasonPromotionalPrices->isNotEmpty()) {
                        $currentSeasonPrice = $seasonPromotionalPrices->first();
                    }
                @endphp

                <div id="day-{{ $loop->iteration }}" class="text-center box_content
                @if( !empty($price->promotional_price) && $price->end_promotional_date >= $now  && !empty( $currentSeasonPrice ))  promo @endif
                @if(!empty( $currentSeasonPrice ) && empty($price->promotional_price)) season @endif"
                     @if( !empty($price->promotional_price) && $price->end_promotional_date >= $now ) data-start-date="{{$price->start_promotional_date}}"
                     data-end-date="{{ $price->end_promotional_date }}" @endif
                >
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
                    <div class="bottom-price-box">
                        <h4>
                            @if (!empty($currentSeasonPrice && empty($price->promotional_price)))
                                <span class="promotional-price month-price">
                                    {{ $currentSeasonPrice->{'month_' . $currentMonth} }}
                                    <small>PLN</small>
                                </span>
                                <span class="promotional-price-month-value d-none">
                                    {{ $currentSeasonPrice->{'month_' . $currentMonth} }}
                                </span>
                                <span class="standart-price d-none"><s>{{ $price->standart_price }}&nbsp;PLN</s></span>
                            @elseif (!empty($price->promotional_price) && !empty($currentSeasonPrice))
                                {{ $price->promotional_price }} <small>PLN</small>
                                <span class="promotional-price-value d-none">{{ $price->promotional_price }}<small>PLN</small></span>
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
                                {{ $price->standart_price }}<small>PLN</small>
                            @endif
                            @foreach($seasonPromotionalPrices as $season)
                                    @foreach(range(1, 12) as $i)
                                        @if(isset($season->{'month_' . $i}))
                                            <span class="d-none month_{{ $i }}">{{ $season->{'month_' . $i} }}</span>
                                        @endif
                                    @endforeach
                            @endforeach
                          </h4>
                    </div>
                </div>
                {{--                </div>--}}
            @endforeach
            {{--            <div class=" box">--}}
                @foreach($prices16 as $price)

                <div class=" text-center box_content">
                <div class="top-price-box">
                    <h2>&gt; 15 dni</h2>
                    <h3 class="subtitle">każdy kolejny dzień</h3>
                </div>
                <div class="bottom-price-box">
                    <h4><span class="more-price">{{$price->standart_price}}</span> <small>PLN</small></h4>
                </div>
            </div>
                @endforeach

                {{--            </div>--}}
        </div>
        <h5>    {{ getTitleBySlug('opis-cennika') }}
        </h5>
    </div>
</section>
