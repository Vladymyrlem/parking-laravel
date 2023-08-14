<div class="modal fade" id="checkoutModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal header start -->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Zakończ rejestrację</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="row m-0">
                <form method="post" id="form_checkout" name="form_checkout">
                    @csrf
                    @method('POST')
                    <!-- Modal header end -->
                    <!-- Modal body start -->
                    <div class="modal-body">

                        <!-- Checkout Info start -->
                        <div class="checkout-info-box">
                            <h3>
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16 3C13.4288 3 10.9154 3.76244 8.77759 5.1909C6.63975 6.61935 4.97351 8.64968 3.98957 11.0251C3.00563 13.4006 2.74819 16.0144 3.2498 18.5362C3.75141 21.0579 4.98953 23.3743 6.80762 25.1924C8.6257 27.0105 10.9421 28.2486 13.4638 28.7502C15.9856 29.2518 18.5995 28.9944 20.9749 28.0104C23.3503 27.0265 25.3807 25.3603 26.8091 23.2224C28.2376 21.0846 29 18.5712 29 16C28.9964 12.5533 27.6256 9.24882 25.1884 6.81163C22.7512 4.37445 19.4467 3.00364 16 3ZM16 27C13.8244 27 11.6977 26.3549 9.88873 25.1462C8.07979 23.9375 6.66989 22.2195 5.83733 20.2095C5.00477 18.1995 4.78693 15.9878 5.21137 13.854C5.63581 11.7202 6.68345 9.7602 8.22183 8.22183C9.76021 6.68345 11.7202 5.6358 13.854 5.21136C15.9878 4.78692 18.1995 5.00476 20.2095 5.83733C22.2195 6.66989 23.9375 8.07979 25.1462 9.88873C26.3549 11.6977 27 13.8244 27 16C26.9967 18.9164 25.8367 21.7123 23.7745 23.7745C21.7123 25.8367 18.9164 26.9967 16 27ZM18 22C18 22.2652 17.8946 22.5196 17.7071 22.7071C17.5196 22.8946 17.2652 23 17 23C16.4696 23 15.9609 22.7893 15.5858 22.4142C15.2107 22.0391 15 21.5304 15 21V16C14.7348 16 14.4804 15.8946 14.2929 15.7071C14.1054 15.5196 14 15.2652 14 15C14 14.7348 14.1054 14.4804 14.2929 14.2929C14.4804 14.1054 14.7348 14 15 14C15.5304 14 16.0391 14.2107 16.4142 14.5858C16.7893 14.9609 17 15.4696 17 16V21C17.2652 21 17.5196 21.1054 17.7071 21.2929C17.8946 21.4804 18 21.7348 18 22ZM14 10.5C14 10.2033 14.088 9.91332 14.2528 9.66665C14.4176 9.41997 14.6519 9.22771 14.926 9.11418C15.2001 9.00065 15.5017 8.97094 15.7926 9.02882C16.0836 9.0867 16.3509 9.22956 16.5607 9.43934C16.7704 9.64912 16.9133 9.91639 16.9712 10.2074C17.0291 10.4983 16.9994 10.7999 16.8858 11.074C16.7723 11.3481 16.58 11.5824 16.3334 11.7472C16.0867 11.912 15.7967 12 15.5 12C15.1022 12 14.7206 11.842 14.4393 11.5607C14.158 11.2794 14 10.8978 14 10.5Z"
                                        fill="#0074B7"/>
                                </svg>
                                Rezerwacja miejsca na parkingu
                            </h3>
                            <p>Uzupełnij poniższe dane by dokonać rezerwacji miejsca.</p>
                        </div>
                        <!-- Checkout Info end -->

                        <div class="checkout-info">

                            <h3>Podsumowanie:</h3>

                            <div class="clearfix"></div>

                            <div class="checkout-info-left">

                                <div class="info-box">
                                    <div class="checkout-title">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M19.5 3H17.25V2.25C17.25 2.05109 17.171 1.86032 17.0303 1.71967C16.8897 1.57902 16.6989 1.5 16.5 1.5C16.3011 1.5 16.1103 1.57902 15.9697 1.71967C15.829 1.86032 15.75 2.05109 15.75 2.25V3H8.25V2.25C8.25 2.05109 8.17098 1.86032 8.03033 1.71967C7.88968 1.57902 7.69891 1.5 7.5 1.5C7.30109 1.5 7.11032 1.57902 6.96967 1.71967C6.82902 1.86032 6.75 2.05109 6.75 2.25V3H4.5C4.10218 3 3.72064 3.15804 3.43934 3.43934C3.15804 3.72064 3 4.10218 3 4.5V19.5C3 19.8978 3.15804 20.2794 3.43934 20.5607C3.72064 20.842 4.10218 21 4.5 21H19.5C19.8978 21 20.2794 20.842 20.5607 20.5607C20.842 20.2794 21 19.8978 21 19.5V4.5C21 4.10218 20.842 3.72064 20.5607 3.43934C20.2794 3.15804 19.8978 3 19.5 3ZM6.75 4.5V5.25C6.75 5.44891 6.82902 5.63968 6.96967 5.78033C7.11032 5.92098 7.30109 6 7.5 6C7.69891 6 7.88968 5.92098 8.03033 5.78033C8.17098 5.63968 8.25 5.44891 8.25 5.25V4.5H15.75V5.25C15.75 5.44891 15.829 5.63968 15.9697 5.78033C16.1103 5.92098 16.3011 6 16.5 6C16.6989 6 16.8897 5.92098 17.0303 5.78033C17.171 5.63968 17.25 5.44891 17.25 5.25V4.5H19.5V7.5H4.5V4.5H6.75ZM19.5 19.5H4.5V9H19.5V19.5ZM15 14.25C15 14.4489 14.921 14.6397 14.7803 14.7803C14.6397 14.921 14.4489 15 14.25 15H12.75V16.5C12.75 16.6989 12.671 16.8897 12.5303 17.0303C12.3897 17.171 12.1989 17.25 12 17.25C11.8011 17.25 11.6103 17.171 11.4697 17.0303C11.329 16.8897 11.25 16.6989 11.25 16.5V15H9.75C9.55109 15 9.36032 14.921 9.21967 14.7803C9.07902 14.6397 9 14.4489 9 14.25C9 14.0511 9.07902 13.8603 9.21967 13.7197C9.36032 13.579 9.55109 13.5 9.75 13.5H11.25V12C11.25 11.8011 11.329 11.6103 11.4697 11.4697C11.6103 11.329 11.8011 11.25 12 11.25C12.1989 11.25 12.3897 11.329 12.5303 11.4697C12.671 11.6103 12.75 11.8011 12.75 12V13.5H14.25C14.4489 13.5 14.6397 13.579 14.7803 13.7197C14.921 13.8603 15 14.0511 15 14.25Z"
                                                fill="#3D405C"/>
                                        </svg>
                                        <h4 class="info-box-title">Rezerwacja od dnia:</h4>
                                    </div>
                                    <p class="info-box-description"><span id="checkout_pick_up_date_desc">...</span> godzina: <span id="checkout_pick_up_time_desc">...</span></p>
                                    <input type="hidden" name="checkout_pick_up_date" id="checkout_pick_up_date" value="" class="form_element" data-rule="required"
                                           data-msg="dzień rozpoczęcia rezerwacji jest polem wymaganym">
                                    <div id="validation_checkout_pick_up_date" class="validation"></div>
                                    <input type="hidden" name="checkout_pick_up_time" id="checkout_pick_up_time" value="" class="form_element" data-rule="required"
                                           data-msg="godzina rozpoczęcia rezerwacji jest polem wymaganym">
                                    <div id="validation_checkout_pick_up_time" class="validation"></div>
                                </div>
                                <div class="info-box">
                                    <div class="checkout-title">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M19.5 3H17.25V2.25C17.25 2.05109 17.171 1.86032 17.0303 1.71967C16.8897 1.57902 16.6989 1.5 16.5 1.5C16.3011 1.5 16.1103 1.57902 15.9697 1.71967C15.829 1.86032 15.75 2.05109 15.75 2.25V3H8.25V2.25C8.25 2.05109 8.17098 1.86032 8.03033 1.71967C7.88968 1.57902 7.69891 1.5 7.5 1.5C7.30109 1.5 7.11032 1.57902 6.96967 1.71967C6.82902 1.86032 6.75 2.05109 6.75 2.25V3H4.5C4.10218 3 3.72064 3.15804 3.43934 3.43934C3.15804 3.72064 3 4.10218 3 4.5V19.5C3 19.8978 3.15804 20.2794 3.43934 20.5607C3.72064 20.842 4.10218 21 4.5 21H19.5C19.8978 21 20.2794 20.842 20.5607 20.5607C20.842 20.2794 21 19.8978 21 19.5V4.5C21 4.10218 20.842 3.72064 20.5607 3.43934C20.2794 3.15804 19.8978 3 19.5 3ZM6.75 4.5V5.25C6.75 5.44891 6.82902 5.63968 6.96967 5.78033C7.11032 5.92098 7.30109 6 7.5 6C7.69891 6 7.88968 5.92098 8.03033 5.78033C8.17098 5.63968 8.25 5.44891 8.25 5.25V4.5H15.75V5.25C15.75 5.44891 15.829 5.63968 15.9697 5.78033C16.1103 5.92098 16.3011 6 16.5 6C16.6989 6 16.8897 5.92098 17.0303 5.78033C17.171 5.63968 17.25 5.44891 17.25 5.25V4.5H19.5V7.5H4.5V4.5H6.75ZM19.5 19.5H4.5V9H19.5V19.5ZM15 14.25C15 14.4489 14.921 14.6397 14.7803 14.7803C14.6397 14.921 14.4489 15 14.25 15H12.75V16.5C12.75 16.6989 12.671 16.8897 12.5303 17.0303C12.3897 17.171 12.1989 17.25 12 17.25C11.8011 17.25 11.6103 17.171 11.4697 17.0303C11.329 16.8897 11.25 16.6989 11.25 16.5V15H9.75C9.55109 15 9.36032 14.921 9.21967 14.7803C9.07902 14.6397 9 14.4489 9 14.25C9 14.0511 9.07902 13.8603 9.21967 13.7197C9.36032 13.579 9.55109 13.5 9.75 13.5H11.25V12C11.25 11.8011 11.329 11.6103 11.4697 11.4697C11.6103 11.329 11.8011 11.25 12 11.25C12.1989 11.25 12.3897 11.329 12.5303 11.4697C12.671 11.6103 12.75 11.8011 12.75 12V13.5H14.25C14.4489 13.5 14.6397 13.579 14.7803 13.7197C14.921 13.8603 15 14.0511 15 14.25Z"
                                                fill="#3D405C"/>
                                        </svg>
                                        <h4 class="info-box-title">Rezerwacja do dnia:</h4>
                                    </div>
                                    <p class="info-box-description"><span id="checkout_drop_off_date_desc">...</span> godzina: <span id="checkout_drop_off_time_desc">...</span></p>
                                    <input type="hidden" name="checkout_drop_off_date" id="checkout_drop_off_date" value="" class="form_element" data-rule="required"
                                           data-msg="dzień zakończenia rezerwacji jest polem wymaganym">
                                    <div id="validation_checkout_drop_off_date" class="validation"></div>
                                    <input type="hidden" name="checkout_drop_off_time" id="checkout_drop_off_time" value="" class="form_element" data-rule="required"
                                           data-msg="godzina zakończenia rezerwacji jest polem wymaganym">
                                    <div id="validation_checkout_drop_off_time" class="validation"></div>
                                </div>
                                <div class="info-box">
                                    <div class="checkout-title">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 6C11.2583 6 10.5333 6.21993 9.91661 6.63199C9.29993 7.04404 8.81928 7.62971 8.53545 8.31494C8.25162 9.00016 8.17736 9.75416 8.32205 10.4816C8.46675 11.209 8.8239 11.8772 9.34835 12.4017C9.8728 12.9261 10.541 13.2833 11.2684 13.4279C11.9958 13.5726 12.7498 13.4984 13.4351 13.2145C14.1203 12.9307 14.706 12.4501 15.118 11.8334C15.5301 11.2167 15.75 10.4917 15.75 9.75C15.75 8.75544 15.3549 7.80161 14.6517 7.09835C13.9484 6.39509 12.9946 6 12 6ZM12 12C11.555 12 11.12 11.868 10.75 11.6208C10.38 11.3736 10.0916 11.0222 9.92127 10.611C9.75097 10.1999 9.70642 9.7475 9.79323 9.31105C9.88005 8.87459 10.0943 8.47368 10.409 8.15901C10.7237 7.84434 11.1246 7.63005 11.561 7.54323C11.9975 7.45642 12.4499 7.50097 12.861 7.67127C13.2722 7.84157 13.6236 8.12996 13.8708 8.49997C14.118 8.86998 14.25 9.30499 14.25 9.75C14.25 10.3467 14.0129 10.919 13.591 11.341C13.169 11.7629 12.5967 12 12 12ZM12 1.5C9.81273 1.50248 7.71575 2.37247 6.16911 3.91911C4.62247 5.46575 3.75248 7.56273 3.75 9.75C3.75 12.6938 5.11031 15.8138 7.6875 18.7734C8.84552 20.1108 10.1489 21.3151 11.5734 22.3641C11.6995 22.4524 11.8498 22.4998 12.0037 22.4998C12.1577 22.4998 12.308 22.4524 12.4341 22.3641C13.856 21.3147 15.1568 20.1104 16.3125 18.7734C18.8859 15.8138 20.25 12.6938 20.25 9.75C20.2475 7.56273 19.3775 5.46575 17.8309 3.91911C16.2843 2.37247 14.1873 1.50248 12 1.5ZM12 20.8125C10.4503 19.5938 5.25 15.1172 5.25 9.75C5.25 7.95979 5.96116 6.2429 7.22703 4.97703C8.4929 3.71116 10.2098 3 12 3C13.7902 3 15.5071 3.71116 16.773 4.97703C18.0388 6.2429 18.75 7.95979 18.75 9.75C18.75 15.1153 13.5497 19.5938 12 20.8125Z"
                                                fill="#3D405C"/>
                                        </svg>
                                        <h4 class="info-box-title">Lokalizacja:</h4>
                                    </div>
                                    <p class="info-box-description" id="checkout_location_desc">...</p>
                                    <input type="hidden" name="checkout_location" id="checkout_location" value="" class="form_element" data-rule="required"
                                           data-msg="lokalizacja jest polem wymaganym">
                                </div>
                                <div class="info-box">
                                    <div class="checkout-title">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM12 20.25C10.3683 20.25 8.77326 19.7661 7.41655 18.8596C6.05984 17.9531 5.00242 16.6646 4.378 15.1571C3.75358 13.6496 3.5902 11.9908 3.90853 10.3905C4.22685 8.79016 5.01259 7.32015 6.16637 6.16637C7.32016 5.01259 8.79017 4.22685 10.3905 3.90852C11.9909 3.59019 13.6497 3.75357 15.1571 4.37799C16.6646 5.00242 17.9531 6.05984 18.8596 7.41655C19.7661 8.77325 20.25 10.3683 20.25 12C20.2475 14.1873 19.3775 16.2843 17.8309 17.8309C16.2843 19.3775 14.1873 20.2475 12 20.25ZM18 12C18 12.1989 17.921 12.3897 17.7803 12.5303C17.6397 12.671 17.4489 12.75 17.25 12.75H12C11.8011 12.75 11.6103 12.671 11.4697 12.5303C11.329 12.3897 11.25 12.1989 11.25 12V6.75C11.25 6.55109 11.329 6.36032 11.4697 6.21967C11.6103 6.07902 11.8011 6 12 6C12.1989 6 12.3897 6.07902 12.5303 6.21967C12.671 6.36032 12.75 6.55109 12.75 6.75V11.25H17.25C17.4489 11.25 17.6397 11.329 17.7803 11.4697C17.921 11.6103 18 11.8011 18 12Z"
                                                fill="#3D405C"/>
                                        </svg>

                                        <h4 class="info-box-title">Ilość dni:</h4>
                                    </div>
                                    <p class="info-box-description" id="checkout_days_desc">...</p>
                                    <input type="hidden" name="checkout_days" id="checkout_days" value="" class="form_element" data-rule="required" data-msg="adres email jest polem wymaganym">
                                    <div id="validation_checkout_days" class="validation"></div>
                                </div>

                            </div>
                            <div class="checkout-info-right">

                                <div class="info-box">
                                    <div class="checkout-title">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.75 14.2501C15.75 14.449 15.671 14.6398 15.5303 14.7804C15.3897 14.9211 15.1989 15.0001 15 15.0001H9C8.80109 15.0001 8.61032 14.9211 8.46967 14.7804C8.32902 14.6398 8.25 14.449 8.25 14.2501C8.25 14.0512 8.32902 13.8604 8.46967 13.7198C8.61032 13.5791 8.80109 13.5001 9 13.5001H15C15.1989 13.5001 15.3897 13.5791 15.5303 13.7198C15.671 13.8604 15.75 14.0512 15.75 14.2501ZM15 10.5001H9C8.80109 10.5001 8.61032 10.5791 8.46967 10.7198C8.32902 10.8604 8.25 11.0512 8.25 11.2501C8.25 11.449 8.32902 11.6398 8.46967 11.7804C8.61032 11.9211 8.80109 12.0001 9 12.0001H15C15.1989 12.0001 15.3897 11.9211 15.5303 11.7804C15.671 11.6398 15.75 11.449 15.75 11.2501C15.75 11.0512 15.671 10.8604 15.5303 10.7198C15.3897 10.5791 15.1989 10.5001 15 10.5001ZM20.25 4.50011V20.2501C20.25 20.6479 20.092 21.0295 19.8107 21.3108C19.5294 21.5921 19.1478 21.7501 18.75 21.7501H5.25C4.85218 21.7501 4.47064 21.5921 4.18934 21.3108C3.90804 21.0295 3.75 20.6479 3.75 20.2501V4.50011C3.75 4.10228 3.90804 3.72075 4.18934 3.43945C4.47064 3.15814 4.85218 3.00011 5.25 3.00011H8.64937C9.07079 2.52829 9.58709 2.15079 10.1645 1.89232C10.7419 1.63385 11.3674 1.50024 12 1.50024C12.6326 1.50024 13.2581 1.63385 13.8355 1.89232C14.4129 2.15079 14.9292 2.52829 15.3506 3.00011H18.75C19.1478 3.00011 19.5294 3.15814 19.8107 3.43945C20.092 3.72075 20.25 4.10228 20.25 4.50011ZM9 6.00011H15C15 5.20446 14.6839 4.4414 14.1213 3.87879C13.5587 3.31618 12.7956 3.00011 12 3.00011C11.2044 3.00011 10.4413 3.31618 9.87868 3.87879C9.31607 4.4414 9 5.20446 9 6.00011ZM18.75 4.50011H16.2422C16.4128 4.98181 16.5 5.48909 16.5 6.00011V6.75011C16.5 6.94902 16.421 7.13979 16.2803 7.28044C16.1397 7.42109 15.9489 7.50011 15.75 7.50011H8.25C8.05109 7.50011 7.86032 7.42109 7.71967 7.28044C7.57902 7.13979 7.5 6.94902 7.5 6.75011V6.00011C7.50002 5.48909 7.58721 4.98181 7.75781 4.50011H5.25V20.2501H18.75V4.50011Z"
                                                fill="#3D405C"/>
                                        </svg>
                                        <h4 class="info-box-title">Rodzaj auta:</h4>
                                    </div>
                                    <p class="info-box-description" id="checkout_car_desc">...</p>
                                    <input type="hidden" id="checkout_car" name="checkout_car" value="Car Type Value" class="form_element" data-rule="required" data-msg="rodzaj pojazdu jest polem
                                    wymaganym">
                                    <div id="validation_checkout_car" class="validation"></div>
                                </div>
                                <div class="info-box">
                                    <div class="checkout-title">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.5 1.5H7.5C6.90326 1.5 6.33097 1.73705 5.90901 2.15901C5.48705 2.58097 5.25 3.15326 5.25 3.75V20.25C5.25 20.8467 5.48705 21.419 5.90901 21.841C6.33097 22.2629 6.90326 22.5 7.5 22.5H16.5C17.0967 22.5 17.669 22.2629 18.091 21.841C18.5129 21.419 18.75 20.8467 18.75 20.25V3.75C18.75 3.15326 18.5129 2.58097 18.091 2.15901C17.669 1.73705 17.0967 1.5 16.5 1.5ZM6.75 6H17.25V18H6.75V6ZM7.5 3H16.5C16.6989 3 16.8897 3.07902 17.0303 3.21967C17.171 3.36032 17.25 3.55109 17.25 3.75V4.5H6.75V3.75C6.75 3.55109 6.82902 3.36032 6.96967 3.21967C7.11032 3.07902 7.30109 3 7.5 3ZM16.5 21H7.5C7.30109 21 7.11032 20.921 6.96967 20.7803C6.82902 20.6397 6.75 20.4489 6.75 20.25V19.5H17.25V20.25C17.25 20.4489 17.171 20.6397 17.0303 20.7803C16.8897 20.921 16.6989 21 16.5 21Z"
                                                fill="#3D405C"/>
                                        </svg>
                                        <h4 class="info-box-title">Telefon kontaktowy:</h4>
                                    </div>
                                    <p class="info-box-description" id="checkout_phone_desc">...</p>
                                    <input type="hidden" name="checkout_phone" id="checkout_phone" value="" class="form_element" data-rule="required"
                                           data-msg="telefon kontaktowy jest polem wymaganym">
                                    <div id="validation_checkout_phone" class="validation"></div>
                                </div>
                                <div class="info-box">
                                    <div class="checkout-title">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21 4.5H3C2.80109 4.5 2.61032 4.57902 2.46967 4.71967C2.32902 4.86032 2.25 5.05109 2.25 5.25V18C2.25 18.3978 2.40804 18.7794 2.68934 19.0607C2.97064 19.342 3.35218 19.5 3.75 19.5H20.25C20.6478 19.5 21.0294 19.342 21.3107 19.0607C21.592 18.7794 21.75 18.3978 21.75 18V5.25C21.75 5.05109 21.671 4.86032 21.5303 4.71967C21.3897 4.57902 21.1989 4.5 21 4.5ZM19.0716 6L12 12.4828L4.92844 6H19.0716ZM20.25 18H3.75V6.95531L11.4928 14.0531C11.6312 14.1801 11.8122 14.2506 12 14.2506C12.1878 14.2506 12.3688 14.1801 12.5072 14.0531L20.25 6.95531V18Z"
                                                fill="#3D405C"/>
                                        </svg>

                                        <h4 class="info-box-title">Email:</h4>
                                    </div>
                                    <p class="info-box-description" id="checkout_email_desc">...</p>
                                    <input type="hidden" name="checkout_email" id="checkout_email" value="" class="form_element" data-rule="required" data-msg="adres email jest polem wymaganym">
                                    <div id="validation_checkout_email" class="validation"></div>
                                </div>
                                <div class="info-box">
                                    <div class="checkout-title">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20.8256 5.51906C20.7552 5.43481 20.6672 5.36705 20.5677 5.32056C20.4683 5.27407 20.3598 5.24998 20.25 5.25H5.12625L4.66781 2.73187C4.60502 2.38625 4.42292 2.07363 4.15325 1.84851C3.88359 1.62339 3.54347 1.50005 3.19219 1.5H1.5C1.30109 1.5 1.11032 1.57902 0.96967 1.71967C0.829018 1.86032 0.75 2.05109 0.75 2.25C0.75 2.44891 0.829018 2.63968 0.96967 2.78033C1.11032 2.92098 1.30109 3 1.5 3H3.1875L5.58375 16.1522C5.65434 16.5422 5.82671 16.9067 6.08344 17.2087C5.72911 17.5397 5.47336 17.9623 5.34455 18.4298C5.21575 18.8972 5.21892 19.3912 5.35371 19.8569C5.48851 20.3226 5.74966 20.7419 6.10821 21.0683C6.46676 21.3947 6.9087 21.6154 7.38502 21.7059C7.86134 21.7965 8.35344 21.7533 8.80673 21.5813C9.26003 21.4092 9.65682 21.115 9.9531 20.7312C10.2494 20.3474 10.4336 19.889 10.4853 19.407C10.537 18.9249 10.4541 18.4379 10.2459 18H14.5041C14.3363 18.3513 14.2495 18.7357 14.25 19.125C14.25 19.6442 14.404 20.1517 14.6924 20.5834C14.9808 21.0151 15.3908 21.3515 15.8705 21.5502C16.3501 21.7489 16.8779 21.8008 17.3871 21.6996C17.8963 21.5983 18.364 21.3483 18.7312 20.9812C19.0983 20.614 19.3483 20.1463 19.4496 19.6371C19.5508 19.1279 19.4989 18.6001 19.3002 18.1205C19.1015 17.6408 18.7651 17.2308 18.3334 16.9424C17.9017 16.654 17.3942 16.5 16.875 16.5H7.79719C7.62155 16.5 7.45149 16.4383 7.31665 16.3257C7.18182 16.2132 7.09077 16.0569 7.05938 15.8841L6.76219 14.25H17.6372C18.1641 14.2499 18.6743 14.0649 19.0788 13.7272C19.4833 13.3896 19.7564 12.9206 19.8506 12.4022L20.9906 6.13406C21.0099 6.02572 21.0051 5.91447 20.9766 5.80818C20.9481 5.7019 20.8966 5.60319 20.8256 5.51906ZM9 19.125C9 19.3475 8.93402 19.565 8.8104 19.75C8.68679 19.935 8.51109 20.0792 8.30552 20.1644C8.09995 20.2495 7.87375 20.2718 7.65552 20.2284C7.43729 20.185 7.23684 20.0778 7.0795 19.9205C6.92217 19.7632 6.81502 19.5627 6.77162 19.3445C6.72821 19.1262 6.75049 18.9 6.83564 18.6945C6.92078 18.4889 7.06498 18.3132 7.24998 18.1896C7.43499 18.066 7.6525 18 7.875 18C8.17337 18 8.45952 18.1185 8.6705 18.3295C8.88147 18.5405 9 18.8266 9 19.125ZM18 19.125C18 19.3475 17.934 19.565 17.8104 19.75C17.6868 19.935 17.5111 20.0792 17.3055 20.1644C17.1 20.2495 16.8738 20.2718 16.6555 20.2284C16.4373 20.185 16.2368 20.0778 16.0795 19.9205C15.9222 19.7632 15.815 19.5627 15.7716 19.3445C15.7282 19.1262 15.7505 18.9 15.8356 18.6945C15.9208 18.4889 16.065 18.3132 16.25 18.1896C16.435 18.066 16.6525 18 16.875 18C17.1734 18 17.4595 18.1185 17.6705 18.3295C17.8815 18.5405 18 18.8266 18 19.125ZM18.375 12.1341C18.3435 12.3074 18.2521 12.464 18.1166 12.5766C17.9812 12.6893 17.8105 12.7506 17.6344 12.75H6.48938L5.39906 6.75H19.3509L18.375 12.1341Z"
                                                fill="#3D405C"/>
                                        </svg>

                                        <h4 class="info-box-title">Koszt rezerwacji:</h4>
                                    </div>
                                    <p class="info-box-description" id="checkout_price_desc">...</p>
                                    <input type="hidden" name="checkout_price" id="checkout_price" value="" class="form_element" data-rule="required" data-msg="adres email jest polem wymaganym">
                                    <div id="validation_checkout_price" class="validation"></div>
                                </div>

                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <!-- Checkout Personal Info start -->
                        <div class="checkout-personal-info">

                            <div class="alert hidden" id="checkout_form_msg"></div>

                            <h3>Dane zamawiającego:</h3>
                            <div class="row">
                                <div class="form-group left">
                                    <label for="checkout_firstname">Imię:</label>
                                    <input type="text" class="form-control form_element" name="checkout_firstname" id="checkout_firstname" data-rule="minlen:3"
                                           data-msg="wpisz minimum trzy pierwsze litery swojego imienia" placeholder="Twoje imię">
                                    <div id="validation_checkout_firstname" class="validation"></div>
                                </div>
                                <div class="form-group right">
                                    <label for="checkout_lastname">Nazwisko:</label>
                                    <input type="text" class="form-control form_element" name="checkout_lastname" id="checkout_lastname" data-rule="minlen:3"
                                           data-msg="wpisz minimum trzy pierwsze litery swojego nazwiska" placeholder="Twoje nazwisko">
                                    <div id="validation_checkout_lastname" class="validation"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group left">
                                    <label for="checkout_plate">Tablica rejestracyjna:</label>
                                    <input type="text" class="form-control form_element" name="checkout_plate" id="checkout_plate" data-rule="required" data-msg="to pole jest wymagane"
                                           placeholder="Twój numer tablicy rejestracyjnej">
                                    <div id="validation_checkout_plate" class="validation"></div>
                                </div>
                                <div class="form-group right top">
                                    <div class="form-group-left">
                                        <label for="checkout_people">Ilość osób do transferu:</label>
                                    </div>
                                    <div class="form-group-right">
                                        <div class="styled-select-age">
                                            <select name="checkout_people" id="checkout_people" class="form_element" data-rule="required" data-msg="to pole jest wymagane">

                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="validation_checkout_people" class="validation"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group left">
                                    <label for="checkout_car_brand">Marka samochodu:</label>
                                    <input type="text" name="checkout_car_brand" id="checkout_car_brand" placeholder="Marka samochodu:" value="" class="form-control form_element" data-rule=""
                                           data-msg="to pole jest wymagane">

                                    <div id="validation_checkout_car_brand" class="validation"></div>
                                </div>
                                <div class="form-group right">
                                    <label for="checkout_car_model">Model auta:</label>
                                    <input type="text" name="checkout_car_model" id="checkout_car_model" placeholder="Model auta:" value="" class="form-control form_element" data-rule=""
                                           data-msg="to pole jest wymagane">

                                    <div id="validation_checkout_car_model" class="validation"></div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <h3>Płatność:</h3>
                            <div class="row">
                                <div class="form-group all">
                                    <label for="checkout_payment">Rodzaj płatności:</label>
                                    <div class="styled-select-age">
                                        <select name="checkout_payment" id="checkout_payment" class="form_element" data-rule="required" data-msg="to pole jest wymagane">
                                            <option value="1">Płatność na parkingu gotówką lub kartą</option>
                                            <!--<option value="2">Płatność przez płatności online</option>//-->
                                        </select>
                                    </div>
                                    <div id="validation_checkout_payment" class="validation"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <h3>Niezbędne zgody:</h3>
                            <div class="row approval_rodo_row">
                                <div class="form-group all">
                                    <div class="approval_rodo">
                                        <p>Zgodnie z art. 13 ogólnego rozporządzenia o ochronie danych osobowych z dnia 27 kwietnia 2016 r. (Dz. Urz. UE L 119 z 04.05.2016) informujemy, iż: »
                                            <strong><a href="#" id="checkout_approval_rodo_link_more" class="approval_rodo_link_more" data-target="checkout_approval_rodo_more">rozwiń</a></strong>
                                        </p>
                                        <div id="checkout_approval_rodo_more" class="approval_rodo_more isHide">
                                            <p>1. Administratorem Pana/Pani danych osobowych jest Ekko-Pol z siedzibą w 54-530 Wrocław, ul. Skarżyńskiego 2.</p>
                                            <p>2. Kontakt z Inspektorem Ochrony Danych jest możliwy poprzez wiadomość na email: <a href="mailto:gdpr@parkingrondo.pl">gdpr@parkingrondo.pl</a>.</p>
                                            <p>3. Przetwarzamy Pani/Pana dane osobowe aby móc wysyłać informacje handlowe, ale tylko na podstawie wyrażonej zgody (podstawą prawną naszego działania
                                                jest Art. 6 ust. 1 lit. a ogólnego rozporządzenia o ochronie danych osobowych z dnia 27 kwietnia 2016 r. tzw. RODO).</p>
                                            <p>4. Pani/Pana dane osobowe przechowywane będą do momentu odwołania zgody.</p>
                                            <p>5. Posiada Pani/Pan prawo do żądania od administratora dostępu do danych osobowych, prawo do ich sprostowania, usunięcia lub ograniczenia
                                                przetwarzania, prawo do cofnięcia zgody oraz prawo do przenoszenia danych.</p>
                                            <p>6. Ma Pani/Pan prawo wniesienia skargi do organu nadzorczego, którym jest Generalny Inspektor Danych Osobowych w Warszawie, ul. Stawki 2, 00-193
                                                Warszawa (po 25 maja 2018 do organu będącego następcą GIODO).</p>
                                            <p>7. Informujemy, iż Pana/Pani dane mogą podlegać zautomatyzowanemu przetwarzaniu, w tym profilowaniu. Profilowanie odbywa się z wykorzystaniem takich
                                                narzędzi jak: pliki cookies (informacje o zasadach profilowania: Cookies, np. Google Analytics – informacje o zasadach profilowania: Google
                                                Analytics). Informujemy, iż profilowanie podejmowane jest w celu zapewnienia usług jak najlepszej jakości oraz do celów administracyjnych,
                                                statystycznych i reklamowych, które nie powoduje negatywnych konsekwencji dla osoby, która podlega profilowaniu.</p>
                                            <p>8. Podanie danych osobowych jest dobrowolne, jednakże niepodanie danych będzie skutkować niemożliwością uczestnictwa w otrzymywaniu ofert
                                                marketingowych.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group all mb-0">
                                    <label class="custom-checkbox approval-rodo-checkbox" for="checkout_approval_1">
                                        <input type="checkbox" id="checkout_approval_1" class="hidden-checkbox contacts-us-checkbox">
                                        <span class="custom-checkmark"></span>
                                        Wyrażam zgodę na przetwarzanie moich danych osobowych
                                        <span class="subtitle">
                                                Zgodnie z art.6 ust.1 lit. a ogólnego rozporządzenia o ochronie danych osobowych z dnia 27 kwietnia 2016 r. wyrażam zgodę na przetwarzanie moich danych osobowych w celach marketingowych.
                                            </span>
                                    </label>
                                    <div id="validation_checkout_approval_1" class="validation"></div>

                                    <input type="hidden" name="checkout_approval_2" value="no">
                                </div>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                        <!-- Checkout Personal Info end -->

                    </div>
                    <!-- Modal body end -->
                    <!-- Modal footer start -->
                    <div class="modal-footer">
                        <button type="button" class="btn " id="checkout_cancel_btn" data-dismiss="modal">Anuluj</button>
                        <button type="submit" id="checkout_submit_btn" class="btn btn-primary ">Zarezerwuj</button>
                    </div>
                    <!-- Modal footer end -->
                    {{--                    <input type="hidden" name="section" value="checkout">--}}
                    {{--                    <input type="hidden" name="action" value="add">--}}
                    {{--                    <input type="hidden" name="license" value="2E801E65DFC0ED17FF104628B6CDDBB8">--}}
                </form>
            </div>
            <!-- Custom block to display form data -->
            <div id="displayData"></div>
        </div>
    </div>
</div>
