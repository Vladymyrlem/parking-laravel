<?php

    use Illuminate\Mail\Mailable;
    use Illuminate\Notifications\Messages\MailMessage;

    class SubscriptionConfirmation extends Mailable
    {
        public $subscriptionFormData;

        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct($subscriptionFormData)
        {
            $this->subscriptionFormData = $subscriptionFormData;
        }

        public function build()
        {
            return $this->from($this->subscriptionFormData['email'])
                ->subject('Contact Form Submission')
                ->view('email.subscription');
        }

        public function toMail($notifiable)
        {
            return (new MailMessage)
                ->subject('New Subscriber')
                ->line('A new subscriber has signed up:')
                ->line('Email: ' . $this->subscriptionFormData->email)
                ->action('View Subscribers', url('/subscribers'));
        }
    }
