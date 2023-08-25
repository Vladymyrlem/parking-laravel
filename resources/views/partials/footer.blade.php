<a href="#top" class="scrollup fadeInRight animated" style="display: inline;">na górę strony</a>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 top-foot row justify-content-between">
                <div class="foot-left col-md-6 col-lg-auto pl-0">
                    <a href="/" class="logo foot-logo">
                        <img src="{{ asset('images/parking-logo.png') }}" alt="">
                    </a>
                    <div class="foot-reservation-block">
                        <h2 class="foot-reservation-block__title">Rezerwacja online</h2>
                        <h3 class="foot-reservation-block__subtitle">Zarezerwowanie miejsca jest bardzo proste.</h3>
                        <a href="#header-block" class="foot-reservation-block__link">Zarezerwuj</a>
                    </div>
                </div>
                <nav class="col-md-6 col-lg-auto footer-nav">
                    <div class="foot-label">Nawigacja</div>
                    <ul>
                        <li class="menu-item"><a class="nav-link scroll-to" href="#header-block" data-scroll>Start</a></li>
                        <li class="menu-item"><a class="nav-link scroll-to" href="#aboutus" data-scroll>O Nas</a></li>
                        <li class="menu-item"><a class="nav-link scroll-to" href="#prices" data-scroll>Cennik</a></li>
                        <li class="menu-item"><a class="nav-link scroll-to" href="#gallery" data-scroll>Galeria</a></li>
                        <li class="menu-item"><a class="nav-link scroll-to" href="#locations" data-scroll>Dojazd</a></li>
                        <li class="menu-item"><a class="nav-link scroll-to" href="#contacts-section" data-scroll>Kontakt</a></li>
                        <li class="menu-item"><a class="nav-link scroll-to" href="#terms" data-scroll>Regulamin</a></li>
                    </ul>
                </nav>
                <div class="foot-contacts col-12 col-lg-5 pr-lg-0 pl-lg-0">
                    <div class="foot-label">Kontakt</div>
                    <div class="contacts-grid">
        <span class="contact-name">        {!!  getTitleBySlug('contact-mail') !!}
</span>
                        @php
                            use Illuminate\Support\Str;
                            $email = Str::ucfirst(getContact('email'));
                        @endphp
                        <div class="contact-value"><a class="" href="mailto:{!! getContact('email') !!}">{{ getContact('email') }}</a></div>
                        <span class="contact-name">        {!!  getTitleBySlug('contact-address') !!}
</span>
                        <div class="contact-value"><a href="{!! getContact('map_link') !!}">{!! getContact('address') !!}</a></div>
                        <span class="contact-name">        {!!  getTitleBySlug('contact-phone') !!}
</span>
                        <div class="contact-value phones-list d-flex flex-column">
                            <a href="tel:{!! getContact('phone_number_1') !!}">{!! getContact('phone_number_1') !!}</a>
                            <a href="tel:{!! getContact('phone_number_2') !!}">{!! getContact('phone_number_2') !!}</a>

                        </div>
                        <span class="contact-name">        {!!  getTitleBySlug('contact-gps') !!}
</span>
                        <div class="contact-value">
                            <a href="https://goo.gl/maps/ZsiHYaYKb67FrXiS7">
                          51.109251,16.902584
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer col-12">
        <span class="rights-reserved">
            Wszelkie prawa zastrzeżone
        </span>
                <div class="created-by">
                    Created by <a href="https://entsolve.pl">Entsolve.pl</a>
                </div>
            </div>
        </div>
    </div>
</footer>
