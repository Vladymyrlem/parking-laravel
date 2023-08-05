<section id="newsletter" class="wow slideInLeft animated" data-wow-offset="300" style="visibility: visible; animation-name: slideInLeft;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert hidden" id="newsletter_form_msg"></div>
            </div>
            <div class="col-md-7 col-xs-12">
                <h2 class="title">Zostaw swój adres e-mail</h2>
                <h3>Prześlemy informację o aktualnych i przyszłych promocjach.</h3>
                <div class="approval_rodo">
                    <p>Zgodnie z art. 13 ogólnego rozporządzenia o ochronie danych osobowych z dnia 27 kwietnia 2016 r. (Dz. Urz. UE L 119 z 04.05.2016) informujemy, iż: » <strong><a href="#"
                                                                                                                                                                                       id="newsletter_approval_rodo_link_more"
                                                                                                                                                                                       class="approval_rodo_link_more"
                                                                                                                                                                                       data-target="newsletter_approval_rodo_more">rozwiń</a></strong>
                    </p>
                    <div id="newsletter_approval_rodo_more" class="approval_rodo_more isHide" style="display: none;">

                        <p>1. Administratorem Pana/Pani danych osobowych jest Ekko-Pol z siedzibą w 54-530 Wrocław, ul. Skarżyńskiego 2.</p>
                        <p>2. Kontakt z Inspektorem Ochrony Danych jest możliwy poprzez wiadomość na email: <a href="mailto:gdpr@parkingrondo.pl">gdpr@parkingrondo.pl</a>.</p>
                        <p>3. Przetwarzamy Pani/Pana dane osobowe aby móc wysyłać informacje handlowe, ale tylko na podstawie wyrażonej zgody (podstawą prawną naszego działania jest Art. 6 ust. 1 lit.
                            a ogólnego rozporządzenia o ochronie danych osobowych z dnia 27 kwietnia 2016 r. tzw. RODO).</p>
                        <p>4. Pani/Pana dane osobowe przechowywane będą do momentu odwołania zgody.</p>
                        <p>5. Posiada Pani/Pan prawo do żądania od administratora dostępu do danych osobowych, prawo do ich sprostowania, usunięcia lub ograniczenia przetwarzania, prawo do cofnięcia
                            zgody oraz prawo do przenoszenia danych.</p>
                        <p>6. Ma Pani/Pan prawo wniesienia skargi do organu nadzorczego, którym jest Generalny Inspektor Danych Osobowych w Warszawie, ul. Stawki 2, 00-193 Warszawa (po 25 maja 2018 do
                            organu będącego następcą GIODO).</p>
                        <p>7. Informujemy, iż Pana/Pani dane mogą podlegać zautomatyzowanemu przetwarzaniu, w tym profilowaniu. Profilowanie odbywa się z wykorzystaniem takich narzędzi jak: pliki
                            cookies (informacje o zasadach profilowania: Cookies, np. Google Analytics – informacje o zasadach profilowania: Google Analytics). Informujemy, iż profilowanie podejmowane
                            jest w celu zapewnienia usług jak najlepszej jakości oraz do celów administracyjnych, statystycznych i reklamowych, które nie powoduje negatywnych konsekwencji dla osoby,
                            która podlega profilowaniu.</p>
                        <p>8. Podanie danych osobowych jest dobrowolne, jednakże niepodanie danych będzie skutkować niemożliwością uczestnictwa w otrzymywaniu ofert marketingowych.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-xs-12">
                <form id="subscribe-form" method="post" action="/subscribe">
                    {{--                    @csrf--}}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">E-Mail Address</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <br>
                    <!-- ReCAPTCHA v3 checkbox -->
                    <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                        <div class="col-md-6">
                            {!! RecaptchaV3::field('subscribe') !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <!-- "I agree" checkbox -->
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="agree" id="agree" class="checkbox" required>
                            I agree to the terms and conditions.
                        </label>
                    </div>
                    <br>
                    <button type="submit">Subscribe</button>
                    <div id="successMessage" style="display: none;">You have been subscribed successfully!</div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    $(document).ready(function () {
        // Submit the form using Ajax
        $('#subscribe-form').submit(function (event) {
            event.preventDefault();
            const form = this; // Store a reference to the form element

            // Get the reCAPTCHA response
            grecaptcha.ready(function () {
                grecaptcha.execute('6LeHhXsnAAAAAA8R-e12ZJPKy68yTcIAfeCvDjOK', {action: 'subscribe'}).then(function (token) {
                    // Add the CSRF token and reCAPTCHA response to form data
                    const formData = new FormData(form); // Use the stored reference to the form element
                    formData.append('_token', '{{ csrf_token() }}');
                    formData.append('g-recaptcha-response', token);

                    // Submit the form
                    $.ajax({
                        type: 'POST',
                        url: '/subscribe',
                        data: formData,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            $('#successMessage').show();
                        },
                        error: function (error) {
                            console.log(error);
                            // Handle error response if needed
                        }
                    });
                }.bind(this)); // Explicitly bind the context to the promise callback
            });
        });
    });
</script>
