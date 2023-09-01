<?php

    namespace App\Mail;

    use App\Models\Contacts;
    use App\Models\Kontakts;
    use App\Models\Parking;
    use Carbon\Carbon;
    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Mail\Mailables\Content;
    use Illuminate\Mail\Mailables\Envelope;
    use Illuminate\Notifications\Messages\MailMessage;
    use Illuminate\Queue\SerializesModels;

    class OrderMail extends Mailable
    {
        use Queueable, SerializesModels;

        /**
         * Create a new message instance.
         *
         * @return void
         */
        use Queueable, SerializesModels;

        public $formData;
        public $pdfFile;

        public function __construct(Parking $order, $pdfPath)
        {
            $this->formData = $order;
            $this->pdfFile = $pdfPath;
        }

        /**
         * Get the message envelope.
         *
         * @return \Illuminate\Mail\Mailables\Envelope
         */
        public function envelope()
        {
            return new Envelope(
                subject: 'Nowa rezerwacja',
            );
        }

        public function toMail($notifiable)
        {
            $arrivalDate = Carbon::createFromFormat('Y-m-d H:i:s', $this->formData->arrival)->format('d/m/Y H:i');
            $departureDate = Carbon::createFromFormat('Y-m-d H:i:s', $this->formData->departure)->format('d/m/Y H:i');
            $contacts = Contacts::all();
            return (new MailMessage)
                ->subject('Nowa rezerwacja')
                ->markdown('email.order_mail', ['order' => $this->formData, 'arrivalDate' => $arrivalDate, 'departureDate' => $departureDate, 'contacts' => $contacts])
                ->attach($this->pdfFile, ['as' => 'order_' . $this->formData->id . '.pdf', 'mime' => 'application/pdf'])
                ->cc(config('mail.admin_address')); // Use the admin email address from your .env
        }

        /**
         * Get the message content definition.
         *
         * @return \Illuminate\Mail\Mailables\Content
         */
        public function content()
        {
            return new Content(
                view: 'email.order_mail',
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
