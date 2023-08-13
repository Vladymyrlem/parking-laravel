<style>


</style>
<section class="contacts-us-section" id="contacts-us-section" name="contacts-us-section">

    <div class="contact-us-container">
        <h2 class="contacts-title">
            {!!  getTitleBySlug('contact-us') !!}
        </h2>
        <h3>        {{ getSubtitleBySlug('contact-us') }}
        </h3>
        <div class="container">
            <form method="post" id="form_contact" name="form_contact">
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="form-group_left">
                            <input type="text" class="form-control first-name text-field form_element" id="contact_firstname" name="contact_firstname" data-rule="minlen:3"
                                   data-msg="wpisz minimum trzy pierwsze litery swojego imienia" placeholder="Twoje imię">
                            <div id="validation_contact_firstname" class="validation"></div>
                        </div>
                        <div class="form-group_left">
                            <input type="text" class="form-control last-name text-field form_element" id="contact_lastname" name="contact_lastname" data-rule="minlen:3"
                                   data-msg="wpisz minimum trzy pierwsze litery swojego nazwiska" placeholder="Twoje nazwisko">
                            <div id="validation_contact_lastname" class="validation"></div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group_right">
                            <input type="tel" class="form-control telephone text-field form_element" id="contact_phone" name="contact_phone" data-rule="phone"
                                   data-msg="wpisz swój poprawny numer telefonu z numerem kierunkowym" placeholder="Twój numer telefonu">
                            <div id="validation_contact_phone" class="validation"></div>
                        </div>
                        <div class="form-group_right">
                            <input type="email" class="form-control email text-field form_element" id="contact_email" name="contact_email" data-rule="email" data-msg="wpisz swój poprawny adres email"
                                   placeholder="Twój adres e-mail">
                            <div id="validation_contact_email" class="validation"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                        <textarea class="form-control message form_element" id="contact_message" name="contact_message" data-rule="required" data-msg="napisz coś do nas ;)"
                                  placeholder="Treść wiadomości"></textarea>
                            <div id="validation_contact_message" class="validation"></div>
                        </div>
                        <div class="approval col-12">
                            <div class="row">
                                <label class="custom-checkbox" for="checkbox1">
                                    <input type="checkbox" id="checkbox1" class="hidden-checkbox contacts-us-checkbox">
                                    <span class="custom-checkmark"></span>
                                    Wyrażam zgodę na przetwarzanie moich danych osobowych<br>
                                    Zgodnie z art.6 ust.1 lit. a ogólnego rozporządzenia o ochronie danych osobowych z dnia 27 kwietnia 2016 r. wyrażam zgodę na przetwarzanie moich danych osobowych w
                                    celach marketingowych. </label>
                            </div>
                            <div class="row">
                                <label class="custom-checkbox" for="checkbox2">
                                    <input type="checkbox" id="checkbox2" class="hidden-checkbox contacts-us-checkbox">
                                    <span class="custom-checkmark"></span>
                                    Wyrażam zgodę na przesyłanie informacji handlowej Wyrażam zgodę na przesyłanie informacji handlowej na mój adres e-mail.
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button id="contact_submit_btn" disabled type="submit" class="btn submit-message" value="Wyślij wiadomość">Wyślij wiadomość</button>
                </div>
                <div class="form-group">
                    <div class="approval_rodo">
                        <p>Zgodnie z art. 13 ogólnego rozporządzenia o ochronie danych osobowych z dnia 27 kwietnia 2016 r. (Dz. Urz. UE L 119 z 04.05.2016) informujemy, iż: » <strong><a href="#"
                                                                                                                                                                                           id="contact_approval_rodo_link_more"
                                                                                                                                                                                           class="approval_rodo_link_more"
                                                                                                                                                                                           data-target="contact_approval_rodo_more">rozwiń</a></strong>
                        </p>
                        <div id="contact_approval_rodo_more" class="approval_rodo_more isHide">

                            <p>1. Administratorem Pana/Pani danych osobowych jest Ekko-Pol z siedzibą w 54-530 Wrocław, ul. Skarżyńskiego 2.</p>
                            <p>2. Kontakt z Inspektorem Ochrony Danych jest możliwy poprzez wiadomość na email: <a href="mailto:gdpr@parkingrondo.pl">gdpr@parkingrondo.pl</a>.</p>
                            <p>3. Przetwarzamy Pani/Pana dane osobowe aby móc wysyłać informacje handlowe, ale tylko na podstawie wyrażonej zgody (podstawą prawną naszego działania jest Art. 6 ust. 1
                                lit. a ogólnego rozporządzenia o ochronie danych osobowych z dnia 27 kwietnia 2016 r. tzw. RODO).</p>
                            <p>4. Pani/Pana dane osobowe przechowywane będą do momentu odwołania zgody.</p>
                            <p>5. Posiada Pani/Pan prawo do żądania od administratora dostępu do danych osobowych, prawo do ich sprostowania, usunięcia lub ograniczenia przetwarzania, prawo do
                                cofnięcia zgody oraz prawo do przenoszenia danych.</p>
                            <p>6. Ma Pani/Pan prawo wniesienia skargi do organu nadzorczego, którym jest Generalny Inspektor Danych Osobowych w Warszawie, ul. Stawki 2, 00-193 Warszawa (po 25 maja
                                2018 do organu będącego następcą GIODO).</p>
                            <p>7. Informujemy, iż Pana/Pani dane mogą podlegać zautomatyzowanemu przetwarzaniu, w tym profilowaniu. Profilowanie odbywa się z wykorzystaniem takich narzędzi jak: pliki
                                cookies (informacje o zasadach profilowania: Cookies, np. Google Analytics – informacje o zasadach profilowania: Google Analytics). Informujemy, iż profilowanie
                                podejmowane jest w celu zapewnienia usług jak najlepszej jakości oraz do celów administracyjnych, statystycznych i reklamowych, które nie powoduje negatywnych
                                konsekwencji dla osoby, która podlega profilowaniu.</p>
                            <p>8. Podanie danych osobowych jest dobrowolne, jednakże niepodanie danych będzie skutkować niemożliwością uczestnictwa w otrzymywaniu ofert marketingowych.</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
