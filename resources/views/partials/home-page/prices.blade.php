<section id="prices" name="#cennik" class="container">
    <div id="cennik" class="row">
        <div class="col-md-12 text-center">
            <h2 class="title wow fadeInDown animated" data-wow-offset="200" style="visibility: visible; animation-name: fadeInDown;">Parking RONDO - <span class="subtitle">Obowiązujący cennik parkingu.</span>
            </h2>
        </div>

        <div class="row text-center">
            @foreach($prices as $price)
                <div class="col-md-3 text-center box">
                    <div class="box_content"><h1>{{$price->count_days}}</h1><span class="subtitle">
                                    @if(1 === $price->count_days)
                                dzień
                            @else
                                dni
                            @endif
                                </span>
                        <h2>{{$price->standart_price}} <small>PLN</small></h2></div>
                </div>
            @endforeach
            <div class="col-md-3 text-center box">
                <div class="box_content"><h1>&gt; 15 dni</h1><span class="subtitle"><small class="blue">każdy kolejny dzień</small></span>
                    <h2>10.00 <small>PLN</small></h2></div>
            </div>
        </div>
    </div>
</section>
