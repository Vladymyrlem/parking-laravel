<?php

    namespace App\Mail;

    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Mail\Mailables\Content;
    use Illuminate\Mail\Mailables\Envelope;
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
                view: 'view.name',
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

        /**
         * Build the message.
         *
         * @return $this
         */
        public function build()
        {
            return $this->from($this->contactFormData['email'])
                ->subject('Contact Form Submission')
                ->view('emails.contact');
        }
    }
