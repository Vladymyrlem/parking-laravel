<div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="subscribeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subscribeModalLabel">Subscribe Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="subscribeForm" action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="Enter your email" required>

                    <label for="agree">
                        <input type="checkbox" id="agree" name="agree" required>
                        I agree to the terms and conditions
                    </label>

                    <!-- Add your CAPTCHA code here, e.g., Google reCAPTCHA -->
                    <!-- Replace YOUR_CAPTCHA_SITE_KEY with your actual CAPTCHA site key -->
                    <div class="g-recaptcha" data-sitekey="YOUR_CAPTCHA_SITE_KEY"></div>

                    <button type="submit" id="subscribeButton" disabled>Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</div>
