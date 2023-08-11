<?php

    namespace App\Mail;

    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Mail\Mailables\Content;
    use Illuminate\Mail\Mailables\Envelope;
    use Illuminate\Notifications\Messages\MailMessage;
    use Illuminate\Queue\SerializesModels;

    class NewSubscriberNotification extends Mailable
    {
        use Queueable, SerializesModels;

        /**
         * Create a new message instance.
         *
         * @return void
         */
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

//        public function build()
//        {
//            return $this->from($this->subscriptionFormData['email'])
//                ->subject('Contact Form Submission')
//                ->view('email.subscription');
//        }

        public function toMail($notifiable)
        {
            return (new MailMessage)
                ->subject('New Subscriber')
                ->line('A new subscriber has signed up:')
                ->line('Email: ' . $this->subscriptionFormData->email)
                ->action('View Subscribers', url('/subscribers'));
        }

        /**
         * Get the message envelope.
         *
         * @return \Illuminate\Mail\Mailables\Envelope
         */
        public function envelope()
        {
            return new Envelope(
                subject: 'New Subscriber Notification',
            );
        }

        /**
         * Get the message content definition.
         *
         * @return \Illuminate\Mail\Mailables\Content
         */
        public function content()
        {
            return new Content(
                view: 'email.subscription',
            );
        }

        /**
         * Get the attachments for the message.
         *
         * @return array
         */
        public function attachments()
        {
            return [];
        }
    }
