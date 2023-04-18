<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailBookingToBranch extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('mitracare@terraexpress.id', 'Mitracare'),
            subject: 'Pemberitahuan Online Service Booking',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.booking_notif_to_branch',
            with: [
                'customerName' => $this->data->name,
                'branchName' => $this->data->branch_name,
                'bookingDate' => $this->data->booking_date,
                'bookingTime' => $this->data->booking_time,
                'brandName' => $this->data->brand_name,
                'modelName' => $this->data->model_name,
                'complaints' => $this->data->complaints,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
