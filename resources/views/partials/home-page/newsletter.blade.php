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
                <form id="subscribe-form" method="post">
                    @csrf
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                    <br>
                    <input type="checkbox" name="agree" id="agree" required>
                    <label for="agree">I agree to the terms and conditions</label>
                    <br>
                    <!-- Implement Google reCAPTCHA v3 here. -->
                    <input type="hidden" name="recaptcha" id="recaptcha" value="6LcivXInAAAAAOSU4FzhvY87QghSlLPDMnuTOlt7">
                    <br>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // $(document).ready(function () {
    //     $('#subscribe-form').submit(function (event) {
    //         event.preventDefault();
    //         var gtoken = grecaptcha.getResponse();
    //         $.ajax({
    //             type: 'POST',
    //             url: '/subscribe',
    //             data: $(this).serialize(),
    //             dataType: 'json',
    //             success: function (response) {
    //                 console.log($(this).serialize());
    //                 alert(response.message);
    //                 console.log(response);
    //                 // Optionally, update the page content or show a success message
    //             },
    //             error: function (error) {
    //                 console.error(error);
    //                 alert('Failed to subscribe. Please try again later.');
    //             }
    //         });
    //     });
    // });
</script>
