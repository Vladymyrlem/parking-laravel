<section id="services" name="#onas" class="container">
    <div class="services-container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>{{ getTitleBySlug('services') }}</h2>
            </div>
            @foreach($services as $service)
                <!-- Service Box start -->
                <div class="col-md-6">
                    <div class="service-box wow fadeInLeft animated" data-wow-offset="100" style="visibility: visible; animation-name: fadeInLeft;">
                        <div class="service-icon">
                            {!! getIconHtml("$service->image", 58, 58) !!} <!-- Width and height set to 58x58 -->
                        </div>
                        <h3 class="service-title">{{ $service->service_title }}</h3>
                        <p class="service-content">
                            {{ $service->service_content }}
                        </p>
                    </div>
                </div>
            @endforeach
            <!-- Service Box end -->
        </div>
    </div>
</section>
