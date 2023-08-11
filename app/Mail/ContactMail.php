<?php

    namespace App\Mail;

    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Mail\Mailables\Content;
    use Illuminate\Mail\Mailables\Envelope;
    use Illuminate\Notifications\Messages\MailMessage;
    use Illuminate\Queue\SerializesModels;

    class ContactMail extends Mailable
    {
        use Queueable, SerializesModels;

        public $contactFormData;

        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct($contactFormData)
        {
            $this->contactFormData = $contactFormData;
        }

        /**
         * Get the message envelope.
         *
         * @return \Illuminate\Mail\Mailables\Envelope
         */
        public function envelope()
        {
            return new Envelope(
                subject: 'Contact Mail',
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
                view: 'email.contact',
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

        public function toMail($notifiable)
        {
            return (new MailMessage)
                ->subject('New Subscriber')
                ->line('A new subscriber has signed up:')
                ->line('Email: ' . $this->contactFormData->contact_email)
                ->action('View Subscribers', url('/send-contact'));
        }
    }
