<?php

    use Illuminate\Mail\Mailable;

    class SubscriptionConfirmation extends Mailable
    {
        public function build()
        {
            return $this->view('subscription_email');
        }
    }
