<section class="about-us" id="aboutus" name="#aboutus">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12 left-about-us">
                <img src="{{ asset('images/parking-logo.png') }}" alt="">
                <span> {{ $about_us_title }}
                </span>
            </div>
            <div class="col-md-6 col-12 about-us-content">
                {!! $about_us_content !!}
            </div>
        </div>
    </div>
</section>
