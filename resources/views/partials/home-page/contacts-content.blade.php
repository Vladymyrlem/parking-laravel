<section class="contacts-section" id="contacts-section" name="contacts-section">
    <div class="container p-lg-0">
        <h2 class="contacts-title">
            {!!  getTitleBySlug('contact') !!}
        </h2>
        <div class="contacts-grid">
        <span class="contact-name">        {!!  getTitleBySlug('contact-mail') !!}
</span>
            @php
                use Illuminate\Support\Str;
                $email = Str::ucfirst(getContact('email'));
            @endphp
            <div class="contact-value"><a class="" href="mailto:{!! getContact('email') !!}">{{$email}}</a></div>
            <span class="contact-name">        {!!  getTitleBySlug('contact-address') !!}
</span>
            <div class="contact-value"><a href="{!! getContact('map_link') !!}">{!! getContact('address') !!}</a></div>
            <span class="contact-name">        {!!  getTitleBySlug('contact-phone') !!}
</span>
            <div class="contact-value">
                <a href="tel:{!! getContact('phone_number_1') !!}">{!! getContact('phone_number_1') !!}</a>
                <a href="tel:{!! getContact('phone_number_2') !!}">lub&nbsp;{!! getContact('phone_number_2') !!}</a>

            </div>
            <span class="contact-name">        {!!  getTitleBySlug('contact-gps') !!}
</span>
            <div class="contact-value">
                {!! getContact('latitude') !!},{!! getContact('longitude') !!}
            </div>
        </div>
        <h4 class="address-title">Zobacz na Google Maps jak do nas trafić </h4>
        <a class="contact-map-link" href="{{ $map_link }}">prowadź do</a>
    </div>
</section>
